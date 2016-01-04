<?php
namespace common\models;

use Yii;
use yii\base\Model;
use common\helpers\ArrayHelper;

/**
 * Login form
 */
class UploadForm extends Model
{
    const UPLOAD_SCENARIO_IMAGE = 'image';
    const UPLOAD_SCENARIO_APK   = 'apk';
    const UPLOAD_SCENARIO_VIDEO = 'video';

    /**
     * @var 文件对象
     */
    public $file;

    /**
     * @var 文件上传目录前缀
     */
    private $path = '';

    /**
     * 文件访问url前缀
     * @var string
     */
    private $urlPrefix = '';

    private $ftpTransmission = false;

    /**
     * 上传文件相关配置
     * @var array
     */
    private $_conf = [];

    public function init()
    {
        parent::init();
        $this->_conf = \common\helpers\CommonHelper::loadConfig('upload');

        //获取文件上传路径
        $scenario = $this->getScenario();
        $_conf = ArrayHelper::getValue($this->_conf,$scenario,[]);
        $this->path = ArrayHelper::getValue($_conf,'path','');
        $this->urlPrefix = ArrayHelper::getValue($_conf,'url','');
        $this->ftpTransmission = ArrayHelper::getValue($_conf,'ftpTransmission',false) === true ? true : false;
    }

    public function scenarios()
    {
        return ArrayHelper::merge(parent::scenarios(), [
            self::UPLOAD_SCENARIO_IMAGE => ['file'],
            self::UPLOAD_SCENARIO_APK   => ['file'],
            self::UPLOAD_SCENARIO_VIDEO => ['file'],
        ]);
    }
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
//        $_config = \common\helpers\CommonHelper::loadConfig('upload');

        $imageConfig = ArrayHelper::getValue($this->_conf,self::UPLOAD_SCENARIO_IMAGE,[]);
        $apkConfig   = ArrayHelper::getValue($this->_conf,self::UPLOAD_SCENARIO_APK,[]);
        $videoConfig = ArrayHelper::getValue($this->_conf,self::UPLOAD_SCENARIO_VIDEO,[]);
        return [
            //image
            [['file'], 'file','extensions' => ArrayHelper::getValue($imageConfig,'extensions'),
                'mimeTypes' => ArrayHelper::getValue($imageConfig,'mimeTypes'),
                'minSize' => ArrayHelper::getValue($imageConfig,'minSize'),
                'maxSize' => ArrayHelper::getValue($imageConfig,'maxSize'),
                'uploadRequired' => ArrayHelper::getValue($imageConfig,'uploadRequired'),
                'tooBig' => ArrayHelper::getValue($imageConfig,'tooBig'),
                'tooSmall' => ArrayHelper::getValue($imageConfig,'tooSmall'),
                'tooMany' => ArrayHelper::getValue($imageConfig,'tooMany'),
                'wrongExtension' => ArrayHelper::getValue($imageConfig,'wrongExtension'),
                'wrongMimeType' => ArrayHelper::getValue($imageConfig,'wrongMimeType'),
                'on' => self::UPLOAD_SCENARIO_IMAGE ],
            //apk
            [['file'], 'file','extensions' => ArrayHelper::getValue($apkConfig,'extensions'),
                'mimeTypes' => ArrayHelper::getValue($apkConfig,'mimeTypes'),
                'minSize' => ArrayHelper::getValue($apkConfig,'minSize'),
                'maxSize' => ArrayHelper::getValue($apkConfig,'maxSize'),
                'uploadRequired' => ArrayHelper::getValue($apkConfig,'uploadRequired'),
                'tooBig' => ArrayHelper::getValue($apkConfig,'tooBig'),
                'tooSmall' => ArrayHelper::getValue($apkConfig,'tooSmall'),
                'tooMany' => ArrayHelper::getValue($apkConfig,'tooMany'),
                'wrongExtension' => ArrayHelper::getValue($apkConfig,'wrongExtension'),
                'wrongMimeType' => ArrayHelper::getValue($apkConfig,'wrongMimeType'),
                'on' => self::UPLOAD_SCENARIO_APK],
            //video
            [['file'], 'file','extensions' => ArrayHelper::getValue($videoConfig,'extensions'),
                'mimeTypes' => ArrayHelper::getValue($videoConfig,'mimeTypes'),
                'minSize' => ArrayHelper::getValue($videoConfig,'minSize'),
                'maxSize' => ArrayHelper::getValue($videoConfig,'maxSize'),
                'uploadRequired' => ArrayHelper::getValue($videoConfig,'uploadRequired'),
                'tooBig' => ArrayHelper::getValue($videoConfig,'tooBig'),
                'tooSmall' => ArrayHelper::getValue($videoConfig,'tooSmall'),
                'tooMany' => ArrayHelper::getValue($videoConfig,'tooMany'),
                'wrongExtension' => ArrayHelper::getValue($videoConfig,'wrongExtension'),
                'wrongMimeType' => ArrayHelper::getValue($videoConfig,'wrongMimeType'),
                'on' => self::UPLOAD_SCENARIO_VIDEO],
        ];
    }

    public function getPath()
    {
        return rtrim($this->path,'/\\');
    }

    public function getUrlPrefix()
    {
        return rtrim($this->urlPrefix,'/\\');
    }

    public function getFtpTransmission()
    {
        return  $this->ftpTransmission;
    }
}
