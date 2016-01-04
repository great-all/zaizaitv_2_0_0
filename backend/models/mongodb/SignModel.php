<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2015/12/9
 * Time: 15:17
 */
namespace backend\models\mongodb;

class SignModel extends \backend\models\mongodb\ActiveRecord
{
    const SIGN_STATUS_OK = 1;
    const SIGN_STATUS_DELETED = 0;
    public static function collectionName()
    {
        return 'user_sign';
    }

    public function attributes()
    {
        return ['_id','user_id','status','create_time'];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['_id','user_id','status','create_time']
            ];
    }

    /**
     * 重载插入数据操作
     * @param bool $insert
     */
    protected function _beforeSave($insert)
    {
        parent::_beforeSave($insert);
        //插入前添加默认属性
        if($insert === true)
        {
            $this->setAttribute('create_time',\common\helpers\DateHelper::now());
            $this->setAttribute('status',self::SIGN_STATUS_OK);
        }
    }

}