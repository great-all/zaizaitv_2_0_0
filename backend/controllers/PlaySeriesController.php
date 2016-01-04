<?php
/**
 * @category 北京阿克米有限公司
 */
namespace backend\controllers;
use backend\services\series\PlayService;
use yii\helpers\ArrayHelper;

/**
 * Class UserController
 * @package backend\controllers
 * @author zhangchao
 * @since	Version 1.0.0
 */
class PlaySeriesController extends BaseController
{
    /**
     * 默认控制器（待用）
     * @return string
     */
    public function actionIndex()
    {
        return 'welcome to play series!';
    }

    /**
     * 热门玩剧素材
     * @return string
     */
    public function actionHotList()
    {
        $page_index = ArrayHelper::getValue($this->paramData,'page_index',1);
        $page_count = ArrayHelper::getValue($this->paramData,'page_count',10);
        $_return = PlayService::getService()->materialList(PlayService::MATERIAL_TYPE_HOT,$page_index,$page_count);
        if(is_array($_return))
            return $this->returnSuccess(['materialList'=>$_return]);

        return $this->returnError($_return);
    }

    /**
     * 最新素材列表
     * @return string
     */
    public function actionNewList()
    {
        $page_index = ArrayHelper::getValue($this->paramData,'page_index',1);
        $page_count = ArrayHelper::getValue($this->paramData,'page_count',10);
        $_return = PlayService::getService()->materialList(PlayService::MATERIAL_TYPE_NEW,$page_index,$page_count);
        if(is_array($_return))
            return $this->returnSuccess(['materialList'=>$_return]);

        return $this->returnError($_return);
    }

    /**
     * 上传素材
     * @return string
     */
    public function actionUploadMaterial()
    {
        $user_id = ArrayHelper::getValue($this->paramData,'user_id',1);
        $title = ArrayHelper::getValue($this->paramData,'title','');
        $source = ArrayHelper::getValue($this->paramData,'source','');
        if(\yii::$app->getRequest()->getIsPost())
        {
            $_return = PlayService::getService()->uploadMaterial($user_id,$title,$source);
            if($_return === true)
                return $this->returnSuccess();
            else
                return $this->returnError($_return);
        }
        return $this->returnError(\common\constants\ErrorConstant::REQUEST_METHOD_ERROR);
    }

    public function actionMaterialDetail()
    {
        $user_id   = ArrayHelper::getValue($this->paramData,'user_id');
        $parent_id = ArrayHelper::getValue($this->paramData,'parent_id');

        $_return = PlayService::getService()->materialDetail($parent_id);
        if(is_array($_return))
            return $this->returnSuccess(['materials' => $_return]);
        return $this->returnError($_return);
    }
}