<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2015/12/9
 * Time: 15:17
 */
namespace backend\models\mongodb;

class MaterialModel extends \backend\models\mongodb\ActiveRecord
{
    const MATERIAL_STATUS_OK = 1;
    const MATERIAL_STATUS_DELETED = 0;

    public static function collectionName()
    {
        return 'play_material';
    }

    public function attributes()
    {
        return ['_id','title','source','user_id','thumb_pic','source_url','material_url','status','create_time','play_num','parent_id','role_name'];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT => ['_id','title','source','user_id','thumb_pic','source_url','material_url','status','create_time','play_num','parent_id','role_name'],
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
            $this->setAttribute('play_num',0);
            $this->setAttribute('parent_id',0);
            $this->setAttribute('role_name','');
        }
    }
}