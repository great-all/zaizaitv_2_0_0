<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2015/12/9
 * Time: 15:17
 */
namespace backend\models\mongodb;

class CustomSeriesModel extends \backend\models\mongodb\ActiveRecord
{
    const MATERIAL_STATUS_OK = 1;
    const MATERIAL_STATUS_DELETED = 0;

    public static function collectionName()
    {
        return 'custom_series';
    }

    public function attributes()
    {
        return ['_id','material_id','user_id','title','compose_url','status','create_time','like_num','read_num'];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['_id','material_id','user_id','title','compose_url','status','create_time','like_num','read_num'],
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
            $this->setAttribute('status',self::MATERIAL_STATUS_OK);
            $this->setAttribute('like_num',0);
            $this->setAttribute('read_id',0);
        }
    }
}