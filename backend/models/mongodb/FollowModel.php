<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2015/12/9
 * Time: 15:17
 */
namespace backend\models\mongodb;

class FollowModel extends \backend\models\mongodb\ActiveRecord
{
    const FOLLOW_STATUS_OK = 1;
    const FOLLOW_STATUS_DELETED = 0;

    public static function collectionName()
    {
        return 'follow';
    }

    public function attributes()
    {
        return ['_id','beConcerned_id','user_id','status','create_time',];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['_id','beConcerned_id','user_id','status','create_time'],
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
            $this->setAttribute('status',self::FOLLOW_STATUS_OK);
        }
    }
}