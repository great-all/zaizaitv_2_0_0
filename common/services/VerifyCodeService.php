<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2015/11/27
 * Time: 14:30
 */
namespace common\services;

use yii\base\InvalidConfigException;
use common\constants\ErrorConstant;

class VerifyCodeService extends Service
{

    public static function getMob()
    {
        return \yii::$app->get('mob');
    }

    /**
     * 校验验证码
     * @param string $mobile
     * @param string $code
     * @return mixed
     */
    public function checkCode($mobile,$code)
    {
        //检验手机号的合法性
        if(($_isRight = $this->_checkMobile($mobile)) !== true) return $_isRight;
        //校验验证码的合法性
        if(($_isRight = $this->_checkCode($code)) !== true) return $_isRight;

        //调用第三方接口校验
        $_return = static::getMob()->checkCode($mobile,$code);
        if($_return === true) return true;

        return ErrorConstant::CODE_CHECKED_FAILED;
    }

    /**
     * 手机号格式校验
     * @param string $mobile
     * @return bool|int
     */
    private function _checkMobile($mobile)
    {
        return \common\helpers\CommonHelper::isMobile($mobile) ? true : ErrorConstant::MOBILE_NOT_VALIDITY;
    }

    /**
     * 校验验证码格式
     * @param string $code
     * @return bool|int
     */
    private function _checkCode($code)
    {
        return ! empty($code) ? true : ErrorConstant::CODE_NOT_VALIDITY;
    }
}