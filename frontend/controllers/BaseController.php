<?php
namespace frontend\controllers;
use yii\base\InvalidParamException;

/**
 * 基础控制器类
 * Class BaseController
 * @package backend\controllers
 */
class BaseController extends \common\controllers\CommonController
{
    public function beforeAction($action)
    {
        if(parent::beforeAction($action))
        {
            $token = \yii::$app->request->getPost(\yii::$app->params['tokenName']);
            if($token !== null)
            {
                $user_id = \backend\services\users\TokenService::getService()->getIdByToken($token);
                if($user_id > 0)
                    $_POST[\yii::$app->params['requestParam']]['user_id'] = $user_id;
            }
            return true;
        }
        return false;
    }

    /**
     * 解析参数
     *
     * @return mixed
     */
    protected function parseParam()
    {
        return \yii::$app->request->postGet(\yii::$app->params['requestParam'],[]);
    }

    /**
     * 验证请求
     */
    protected function checkSign()
    {

    }

    /**
     * 请求出错 返回信息
     *
     * @param int $code
     * @return string
     */
    protected function returnError($code) {
        $lang = \yii::$app->lang;
        $lang->load('error_message');
        $message = $lang->line($code);
        return $this->returnResult($code,NULL,$message);
    }

    /**
     * 请求成功 返回
     *
     * @param null $data
     * @return string
     */
    public function returnSuccess($data = NULL){
        return $this->returnResult(\common\constants\ErrorConstant::SUCCESS,$data);
    }

    /**
     * 返回请求结果
     * @param int $code
     * @param null $data
     * @param null $desc
     * @return string
     */
    public function returnResult($code,$data = NULL,$desc = NULL){
        if( ! is_numeric($code))
            throw new InvalidParamException('code not exists!');

        $_return[\yii::$app->params['returnCode']] = $code;
        if( $data !== NULL)
            $_return[\yii::$app->params['returnData']] = $data;

        if($desc !== NULL)
            $_return[\yii::$app->params['returnDesc']] = $desc;

        return $_return;
    }
}