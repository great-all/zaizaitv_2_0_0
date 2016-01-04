<?php
namespace common\services;

use common\models\UploadForm;
use common\compenents\UploadedFile;
use common\constants\ErrorConstant;

/**
 * 文件上传服务
 * Class UploadService
 * @package common\services
 */
class UploadService extends Service
{
    //上传文件类型
    const FILE_TYPE_IMAGE = 1;//图片文件
    const FILE_TYPE_APK   = 2;//app软件应用包
    const FILE_TYPE_VIDEO = 3;//视屏文件

    public static $file_scenarios = [
        self::FILE_TYPE_IMAGE => UploadForm::UPLOAD_SCENARIO_IMAGE,
        self::FILE_TYPE_APK   => UploadForm::UPLOAD_SCENARIO_APK,
        self::FILE_TYPE_VIDEO => UploadForm::UPLOAD_SCENARIO_VIDEO,
    ];

    /**
     * 文件上传
     * @param int $file_type
     * @return bool|int|mixed
     */
    public function upload($file_type = self::FILE_TYPE_IMAGE)
    {
        if( ($file_type = \yii\helpers\ArrayHelper::getValue(static::$file_scenarios,$file_type)) === null)
            return ErrorConstant::UPLOAD_FILE_REQUIRED_ERROR;

        $model = new UploadForm(['scenario' => $file_type]);

        $model->file = UploadedFile::getInstance($model, 'file');

        if($model->file === null) return ErrorConstant::UPLOAD_FILE_REQUIRED_ERROR;

        if ($model->validate()) {
            $fullFileName = $model->path . '/'  . $model->file->baseName . '.' . $model->file->extension;
            if($model->ftpTransmission === true)
            {//上传到远程服务器
                if($model->file->saveToFtp($fullFileName))
                    return [
                        'url' => $model->urlPrefix . '/' . $model->file->baseName . '.' . $model->file->extension,
                        'fileName' => $model->file->baseName . '.' . $model->file->extension,
                        'fullFileName' => $fullFileName,
                    ];
            }else{//上传到本地
                if($model->file->saveAs($fullFileName))
                    return [
                        'url' => $model->urlPrefix . '/' . $model->file->baseName . '.' . $model->file->extension,
                        'fileName' => $model->file->baseName . '.' . $model->file->extension,
                        'fullFileName' => $fullFileName,
                    ];
            }
            return ErrorConstant::UPLOAD_FILE_FAILED;
        }else {
            //不是一个文件
            return current(current($model->getErrors()));
        }
    }
}