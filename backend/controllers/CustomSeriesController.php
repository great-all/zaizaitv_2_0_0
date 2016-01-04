<?php
/**
 * @category 北京阿克米有限公司
 */
namespace backend\controllers;
use backend\models\mongodb\MaterialModel;
use backend\services\series\PlayService;
use yii\helpers\ArrayHelper;

/**
 * Class UserController
 * @package backend\controllers
 * @author zhangchao
 * @since	Version 1.0.0
 */
class CustomSeriesController extends BaseController
{
    /**
     * 默认控制器（待用）
     * @return string
     */
    public function actionIndex()
    {
        return 'welcome to custom series!';
    }

    /**
     * 用户上传自制剧
     * @return string
     */
    public function actionUploadSeries()
    {
        $user_id   = ArrayHelper::getValue($this->paramData,'user_id');
        $material_id = ArrayHelper::getValue($this->paramData,'material_id');

        $_return = PlayService::getService()->uploadCustomSeries($user_id,$material_id);
        if($_return === true)
            return $this->returnSuccess();

        return $this->returnError($_return);
    }
}