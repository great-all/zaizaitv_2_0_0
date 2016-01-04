<?php
namespace frontend\controllers;

use common\services\UploadService;

/**
 * 文件上传功能
 * Class CommonController
 * @package common\controllers
 */
class UploadController extends BaseController
{
    public $layout = 'index';
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index');
    }
    /**
     * 上传图片
     * @return string
     */
    public function actionUploadImage()
    {
        if(\yii::$app->request->getIsPost())
        {
            $_return = UploadService::getService()->upload(UploadService::FILE_TYPE_IMAGE);

            if( is_numeric($_return) && (int)$_return < 0)
                return $this->returnError($_return);
            else
                return $this->returnSuccess($_return);
        }
        return $this->returnError(\common\constants\ErrorConstant::REQUEST_METHOD_ERROR);
    }

    /**
     * 上传视屏
     * @return string
     */
    public function actionUploadVideo()
    {
        if(\yii::$app->request->getIsPost())
        {
            $_return = UploadService::getService()->upload(UploadService::FILE_TYPE_VIDEO);

            if(is_array($_return))
            {
                return json_encode($_return);
            }else{
                return $_return;
            }
        }
    }

    /**
     * 上传apk文件
     * @return string
     */
    public function actionUploadApk()
    {
        if(\yii::$app->request->getIsPost())
        {
            $_return = UploadService::getService()->upload(UploadService::FILE_TYPE_APK);

            if( is_numeric($_return) && (int)$_return < 0)
                return $this->returnError($_return);
            else
                return $this->returnSuccess($_return);
        }
        return $this->returnError(\common\constants\ErrorConstant::REQUEST_METHOD_ERROR);
    }
}