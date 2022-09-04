<?php
namespace App\Controller;

use Cake\Error\Debugger;
use App\Controller\AppController;

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
     *
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
        $aed = $this->Aeds->newEntity();
        if ($this->request->is('post')) {
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
}
