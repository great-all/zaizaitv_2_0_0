<?php
namespace backend\controllers;

/**
 * 文件上传功能
 * Class CommonController
 * @package common\controllers
 */
class TestController extends \backend\controllers\BaseController
{
    public function actionTest()
    {
        $res = \yii::powered();
        echo $res;
        $res = \yii::$app->ftp->put('robots.txt','/home/zhangchao/haha.txt');
        return $res;
    }
}