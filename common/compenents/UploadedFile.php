<?php
namespace common\compenents;

class UploadedFile extends \yii\web\UploadedFile
{

    public static function getFtp()
    {
        return \yii::$app->get('ftp');
    }

    /**
     * ftp上传
     * @param $file
     * @param bool|true $deleteTempFile
     * @return bool
     */
    public function saveToFtp($file,$deleteTempFile = true)
    {
        if ($this->error == UPLOAD_ERR_OK) {
            $ftp = static::getFtp();
            if ($deleteTempFile) {
                $res = $ftp->put($this->tempName, $file,FTP_BINARY);
            } elseif (is_uploaded_file($this->tempName)) {
                $res = $ftp->put($this->tempName, $file,FTP_BINARY);
            }

            $ftp->chmod('0644',$file);
            return true;

        }
        return false;
    }
}