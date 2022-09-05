<?php
namespace App\Controller;

use Cake\Error\Debugger;
use App\Controller\AppController;
use \SplFileObject;

/**
 * Aeds Controller
 *
 * @property \App\Model\Table\AedsTable $Aeds
 *
 * @method \App\Model\Entity\Aed[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AedsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $aeds = $this->paginate($this->Aeds);

        $this->set(compact('aeds'));
    }

    /**
     * View method
     * @param string|null $id Aed id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $aed = $this->Aeds->get($id, [
            'contain' => []
        ]);

        $this->set('aed', $aed);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            // ファイルの拡張子がcsv以外の場合はファイル形式エラーとする。
            if (mb_strtolower(pathinfo($_FILES['upload_file']['name'], PATHINFO_EXTENSION)) != 'csv') {
                $this->Flash->error(__('csvファイルのみアップロードできます'));
                return;
            }

            // ファイル読込み準備
            $uploadFile = $_FILES['upload_file']['tmp_name'];
            file_put_contents($uploadFile, mb_convert_encoding(file_get_contents($uploadFile), 'UTF-8', 'SJIS'));
            $file = new SplFileObject($uploadFile);
            $file->setFlags(SplFileObject::READ_CSV);

            $new_aeds = array();   // データを入れておく配列
            $errors = array();      // エラーを入れておく配列

            foreach ($file as $rowIndex => $line) {
                if ($rowIndex < 1) {
                    // 1行目はヘッダー行なので読み飛ばします。
                    continue;
                }

                // 項目数が合わない場合は項目数エラー格納して次の行を処理。
                // 最終行が空の場合はスルー。
                if (count($line) != 7) {
                    if ($file->valid() || ($file->eof() && !empty($line[0]))) {
                        $errors = $this->setError($errors, $rowIndex, __('データベースの項目数とcsvファイルの項目数が一致していません。'));
                    }
                } else {
                    // 取り込んだCSVデータ行からAEDデータ配列を作成
                    $arrAed = $this->createAedArray($line);
                    // AEDデータの配列をAEDエンティティに登録
                    // このタイミングでValidationが行う
                    $aed = $this->Aeds->newEntity($arrAed);

                    // エンティティのエラーを取得して、エラー用の配列に格納する
                    $entityErrors = $aed->getErrors();
                    foreach ($entityErrors as $key => $value) {
                        if (is_array($value)) {
                            foreach ($value as $rule => $message) {
                                $errors = $this->setError($errors, $rowIndex, $message);
                            }
                        }
                    }
                    // Validationエラーが無かった場合は、一括保存のためにデータを格納する配列にいれておく
                    if (empty($errors)) {
                        array_push($new_aeds, $aed);
                    }
                }
            }

            // エラーの配列に要素がない場合データを保存し一覧画面に遷移
            // エラーがあった場合はファイル選択画面に遷移しエラー内容を表示
            if (!$errors) {
                // AEDデータを登録する
                if ($this->Aeds->saveMany($new_aeds)) {
                    $this->Flash->success(__('AEDのデータを保存成功しました'));
                    return $this->redirect(['action' => 'index']);
                }
                // データベースの登録する際にエラーがあれば、エラーを表示する
                $this->Flash->error(__('ユーザーを保存できませんでした。再試行してください。'));
            } else {
                // ファイルアップロード画面にエラー内容を渡す
                $this->Flash->error(__('誤ったデータが含まれています。メッセージを確認し、データを修正して再度アップロードしてください。'));
                $this->set(compact('errors'));
            }
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Aed id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $aed = $this->Aeds->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $aed = $this->Aeds->patchEntity($aed, $this->request->getData());
            if ($this->Aeds->save($aed)) {
                $this->Flash->success(__('The aed has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The aed could not be saved. Please, try again.'));
        }
        $this->set(compact('aed'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Aed id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $aed = $this->Aeds->get($id);
        if ($this->Aeds->delete($aed)) {
            $this->Flash->success(__('The aed has been deleted.'));
        } else {
            $this->Flash->error(__('The aed could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function download()
    {
        $_body = $this->Aeds->find()->all();

        Debugger::log($_body);

        $_serialize = '_body';
        // ヘッダーを定義
        $_header = ['id', 'location_name', 'address', 'latitude', 'longitude', 'phone', 'usable_time', 'url'];
        // フッターを定義
        $_footer = ['この行が最終行です'];
        // エンコーディングを指定
        $_csvEncoding = 'CP932';
        // 改行ををwindowsを意識してCRLFにしている
        $_newline = "\r\n";
        // 行の終わり
        $_eol = "\r\n";

        $this->response = $this->response
        // ダウンロードさせるファイル形式を指定
            ->withType('csv')
            // ダウンロードさせるファイルのデフォルト名を指定
            ->withDownload('sumidaku_aed.csv');

        $this->viewBuilder()->setClassName('CsvView.Csv');
        // compactメソッドでsetすると、変数名から配列を作成してくれる
        // compactメソッドを使えば一度で複数の変数をセット出来る
        $this->set(compact('_body', '_serialize', '_header', '_footer', '_csvEncoding', '_newline', '_eol'));
    }

    // public function upload()
    // {

    // }

    /**
     * AEDデータ取り込みcsvデータの1行から、1件のAEDデータ配列を作成
     * @param [array] $line csvの行データ配列
     * @return AEDデータ配列
     */
    public function createAedArray($line)
    {
        $arr = array();
        $arr['location_name'] = $line[0];
        $arr['address'] = $line[1];
        $arr['latitude'] = $line[2];
        $arr['longitude'] = $line[3];
        $arr['phone'] = $line[4];
        $arr['usable_time'] = $line[5];
        $arr['url'] = $line[6];

        return $arr;
    }

    /**
     * エラー情報をエラー蓄積用配列にセットし返します。
     * @param  [array] $errors エラー蓄積用配列
     * @param  [int] $rowIndex エラー発生行番号（行番号を表示したくない場合は空文字可）
     * @param  [array] $description エラーメッセージ
     * @return エラー蓄積用配列
     */
    private function setError($errors, $rowIndex, $description)
    {
        $error = array();
        empty($rowIndex) ? $error['LINE_NO'] = '' :  $error['LINE_NO'] = $rowIndex + 1;
        $error['DESCRIPTION'] =  $description;
        array_push($errors, $error);

        return $errors;
    }
}
