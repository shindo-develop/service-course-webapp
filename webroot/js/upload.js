function upload() {
    if (document.getElementById("upload_file").files.length == 0) {
        alert('アップロードするファイルを選択してください');
    } else {
        if (!confirm('ファイルをアップロードしてもよろしいですか?')) {
            return false;
        }
        document.upload_form.submit();
    }
}
