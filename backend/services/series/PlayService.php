<?php
namespace backend\services\series;
use backend\services\BackendService;
use backend\models\mongodb\MaterialModel;
use backend\models\mongodb\CustomSeriesModel;
use common\constants\ErrorConstant;
use common\services\UploadService;

class PlayService extends BackendService{

    //敏感词类型
    const MATERIAL_TYPE_ALL = 0;//所有素材
    const MATERIAL_TYPE_HOT = 1;//热门素材
    const MATERIAL_TYPE_NEW = 2;//最新素材

    //分页信息
    const DEFAULT_PAGE_INDEX = 1;
    const DEFAULT_PAGE_COUNT = 20;

    /**
     * 素材列表
     * @param $type
     * @param int $pageIndex
     * @param int $pageCount
     * @return $this|array|\yii\mongodb\ActiveRecord
     */
    public function materialList($type = self::MATETIAL_TYPE_ALL,$pageIndex = self::DEFAULT_PAGE_INDEX,$pageCount = self::DEFAULT_PAGE_COUNT)
    {
        $pageIndex = is_numeric($pageIndex) ? $pageIndex : self::DEFAULT_PAGE_INDEX;
        $pageCount = is_numeric($pageCount) ? $pageCount : self::DEFAULT_PAGE_COUNT;
        $offset = ($pageIndex -1) * $pageCount;
        $materialList = MaterialModel::find()->where(['status' => MaterialModel::MATERIAL_STATUS_OK,'parent_id' => 0]);
        switch($type)
        {
            case self::MATERIAL_TYPE_HOT:
                $materialList->orderBy(['play_num' => SORT_DESC,'create_time' => SORT_DESC]); break;
            case self::MATERIAL_TYPE_NEW:
                $materialList->orderBy(['create_time' => SORT_DESC,'play_num' => SORT_DESC]);break;
            default:
                break;
        }

        $materialList = $materialList->offset($offset)->limit($pageCount)->asArray()->all();
        return $materialList;
    }

    /**
     * 获取分类下的材料
     * @param $parent_id
     * @return array|int|\yii\mongodb\ActiveRecord
     */
    public function materialDetail($parent_id)
    {
        if( ! is_numeric($parent_id))
            return ErrorConstant::PARAM_ERROR;

        //获取该父id下的所有角色材料
        $materials = MaterialModel::find()->select(['_id','thumb_pic','role_name'])->where(['status' => MaterialModel::MATERIAL_STATUS_OK,'parent_id' => (int)$parent_id])
            ->asArray()->all();
        return $materials;
    }

    /**
     * 上传资源
     * @param $user_id
     * @param $title
     * @param $source
     * @return bool
     */
    public function uploadMaterial($user_id,$title,$source)
    {
        $_res = UploadService::getService()->upload(UploadService::FILE_TYPE_VIDEO);
        if(is_numeric($_res)) return $_res;

        if(is_array($_res))
        {
            $material = ['title' => $title,'source' => $source,'user_id' => (int)$user_id,'thumb_pic' => '','source_url' => $_res['url']];
            $materialModel = new MaterialModel();
            if($materialModel->add($material))
                return true;
            else
                return ErrorConstant::PLAY_SERIES_ADD_FAILED;
        }
        return ErrorConstant::PLAY_SERIES_ADD_FAILED;
    }

    /**
     * 用户上传自制短视屏
     * @param $user_id
     * @param $material_id
     * @todo 减少一次文件读写操作 直接在tmp目录下合成视屏后保存
     * @return int
     */
    public function uploadCustomSeries($user_id,$material_id)
    {
        if( ! is_numeric($user_id) || ! is_numeric($material_id))
            return ErrorConstant::PARAM_ERROR;

        $material = MaterialModel::findOne(['status' => MaterialModel::MATERIAL_STATUS_OK,'_id' => $material_id]);
        if($material === null)
            return ErrorConstant::MATERIAL_NOT_EXISTS;

        $_res = UploadService::getService()->upload(UploadService::FILE_TYPE_VIDEO);
        if(is_numeric($_res)) return $_res;

        if(is_array($_res))
        {
            $_result = shell_exec("");
            if(is_string($_result))
            {
                $customSeries = new CustomSeriesModel();
                $data = ['material_id' => $material_id,'user_id' => user_id,'title' => $material->title,'compose_url' => $_result];
                if($customSeries->add($data))
                    return true;
            }
        }
        return ErrorConstant::UPLOAD_CUSTOM_SERIES_FAILED;
    }
}