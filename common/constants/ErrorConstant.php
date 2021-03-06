<?php
namespace common\constants;

class ErrorConstant
{
    const SUCCESS = 200;//成功状态吗
    const UNKNOWN_ERROR = -1;//未知错误
    const PARAM_ERROR = - 2;//参数错误
    const REQUEST_METHOD_ERROR = -3;//请求方式错误

    //user module
    const USER_BASE = -100;

    //登陆
    const LOGIN_PARAM_ERROR = self::USER_BASE - 1;//登陆时参数错误
    const USER_NOT_EXISTS   = self::USER_BASE - 2;//登陆时用户不存在
    const USER_PASSWORD_ERROR = self::USER_BASE - 2;//登陆时密码错误
    const USER_IS_LOCKED    = self::USER_BASE - 3;//用户被锁

    //注册
    const REGISTER_PARAM_ERROR = self::USER_BASE - 4;//注册参数错误
    const USER_IS_EXISTS       = self::USER_BASE - 5;//注册时用户已经存在
    const REGISTER_NAME_SENSITIVE = self::USER_BASE - 6;//注册时用户名中包含敏感词
    const REGISTER_NICK_SENSITIVE = self::USER_BASE - 7;//注册时昵称中包含敏感词
    const NICK_NAME_IS_EXISTS   =  self::USER_BASE - 8;//注册时昵称已经存在
    const USER_MOBILE_IS_EXISTS  = self::USER_BASE - 9;//注册时手机号已经存在
    const REGISTER_FAIL          = self::USER_BASE - 10;//注册失败
    const MOBILE_FORMAT_ERROR    = self::USER_BASE - 11;//手机号格式错误

    //找回密码
    const MOBILE_NOT_REGISTER    = self::USER_BASE - 11;//手机号未注册
    const FORGET_PASSWORD_FAIED  = self::USER_BASE - 12;//找回密码失败

    //修改用户资料
    const USER_ID_ERROR   = self::USER_BASE - 13;//用户ID不合法
    const PASSWORD_UNCONFORMITY   = self::USER_BASE - 14;//两次密码输入不一致
    const CHANGE_PASSWORD_FAILED  = self::USER_BASE - 15;//密码修改失败

    //token module
    const TOKEN_BASE  = -300;
    const USER_TOKEN_NOT_EXISTS  = self::TOKEN_BASE - 1;//token不存在
    const USER_TOKEN_OVERDUE     = self::TOKEN_BASE - 2;//token过期
    const USER_TOKEN_CREATE_FAILED = self::TOKEN_BASE - 4;//token生成失败
    const USER_TOKEN_REFRESH_FAILED = self::TOKEN_BASE -5;//token刷新失败

    //sign module
    const SIGN_BASE  = -400;
    const USER_IS_SIGNED  = self::SIGN_BASE - 1;//当前已经签到
    const USER_SIGN_FAILED  = self::SIGN_BASE - 2;//签到失败

    //code module
    const CODE_BASE = -500;
    const MOBILE_NOT_VALIDITY = self::CODE_BASE -1;//手机号格式不合法
    const CODE_NOT_VALIDITY = self::CODE_BASE -2;//验证码格式不正确
    const CODE_CHECKED_FAILED = self::CODE_BASE -3;//验证码校验失败

    //invitation code
    const  INVITATION_CODE_BASE = -600;
    const CREATE_INVITATION_CODE_FAILED = self::INVITATION_CODE_BASE - 1;//验证码创建失败

    //friend module
    const FRIEND_BASE = -700;
    const FRIEND_IN_HAND = self::FRIEND_BASE - 1; //好友正在处理中
    const IS_FRIEND   = self::FRIEND_BASE - 2;//已经是好友关系了
    const ADD_FRIEND_FAILED = self::FRIEND_BASE - 3;//添加好友失败
    const NOT_INVITATION    = self::FRIEND_BASE - 4;//没有好友请求
    const AGREE_FRIEND_FAILED = self::FRIEND_BASE - 5;//同意好友请求失败
    const DISAGREE_FRIEND_FAILED = self::FRIEND_BASE - 6;//同意好友请求失败
    const FRIEND_NOT_EXISTS   = self::FRIEND_BASE - 7;//好友不存在
    const RELEASE_FRIEND_FAILED  = self::FRIEND_BASE - 8;//解除好友关系失败

    //credit
    const CREDIT_BASE = -800;
    const ADD_CREDIT_FAILED = self::CREDIT_BASE - 1;//添加积分失败
    const UPDATE_CREDIT_FAILED = self::CREDIT_BASE - 2;//跟新积分

    //actor
    const ACTOR_BASE = -900;
    const ACTOR_NOT_EXISTS = self::ACTOR_BASE - 1;//演员不存在
    const ACTOR_COMMENT_FAILED = self::ACTOR_BASE - 2;//评论失败

    //upload file
    const UPLOAD_FILE_BASE = -1000;
    const UPLOAD_FILE_MIME_ERROR = self::UPLOAD_FILE_BASE - 1;//文件类型错误
    const UPLOAD_FILE_SIZE_BIG   = self::UPLOAD_FILE_BASE - 2;//文件太大
    const UPLOAD_FILE_SIZE_SMALL = self::UPLOAD_FILE_BASE - 3;//文件太小
    const UPLOAD_FILE_EXTENSION_ERROR = self::UPLOAD_FILE_BASE - 4;//扩展名错误
    const UPLOAD_FILE_REQUIRED_ERROR = self::UPLOAD_FILE_BASE - 5;//文件错误
    const UPLOAD_FILE_TOO_MANY   = self::UPLOAD_FILE_BASE - 6;//上传文件数量过多
    const UPLOAD_FILE_FAILED     = self::UPLOAD_FILE_BASE -7; //文件上传失败

    const PLAY_SERIES_BASE = -1100;
    const UPLOAD_CUSTOM_SERIES_FAILED = self::PLAY_SERIES_BASE - 1;//上传失败
    const MATERIAL_NOT_EXISTS  = self::PLAY_SERIES_BASE - 2;//原始资源不存在
}