<?php
$this->title = 'My Yii Application';
?>

<div>
    <form action="http://127.0.0.1:888/play-series/upload-material" method="post" enctype="multipart/form-data">
        <input type="file" name="UploadForm[file]" id="file">
        <input type="text" name="data[title]" value="��˹�ٷɹ���">
        <input type="text" name="data[source]" value="֣��Ȧ">
        <input type="text" name="data[user_id]" value="12">
        <input type="submit">
    </form>
</div>