﻿<?php
/**
 * Created by PhpStorm.
 * User: chao
 * Date: 2015/12/3
 * Time: 9:44
 */
use common\constants\ErrorConstant;
return [
    //user module

    //登陆
    ErrorConstant::LOGIN_PARAM_ERROR    => '参数错误',
    ErrorConstant::USER_NOT_EXISTS      => '该用户不存在!',
    ErrorConstant::USER_PASSWORD_ERROR  => '密码错误!',
    ErrorConstant::USER_IS_LOCKED       => '用户被锁',
    ErrorConstant::REQUEST_METHOD_ERROR => '请求方式错误',

    //注册
    ErrorConstant::REGISTER_PARAM_ERROR => '参数错误',
    ErrorConstant::USER_IS_EXISTS       => '该用户名以注册',
    ErrorConstant::REGISTER_NAME_SENSITIVE => '用户名中有敏感词',
    ErrorConstant::REGISTER_NICK_SENSITIVE => '昵称中有敏感词',
    ErrorConstant::NICK_NAME_IS_EXISTS     => '该昵称已被使用',
    ErrorConstant::USER_MOBILE_IS_EXISTS   => '手机号已被注册',
    ErrorConstant::REGISTER_FAIL           => '注册失败!',

    //找回密码
    ErrorConstant::MOBILE_NOT_REGISTER     => '手机号还未注册!',
    ErrorConstant::FORGET_PASSWORD_FAIED   => '找回密码失败',

    //修改用户资料
    ErrorConstant::USER_ID_ERROR           => '用户ID不合法',
    ErrorConstant::PASSWORD_UNCONFORMITY   => '两次密码输入不一致',
    ErrorConstant::CHANGE_PASSWORD_FAILED  => '密码修改失败!',

    //token module
    ErrorConstant::USER_TOKEN_NOT_EXISTS   => 'TOKEN 不存在!',
    ErrorConstant::USER_TOKEN_OVERDUE      => 'TOKEN 失效!',
    ErrorConstant::USER_TOKEN_CREATE_FAILED => 'TOKEN 生成失败!',
    ErrorConstant::USER_TOKEN_REFRESH_FAILED => 'TOKEN 刷新失败!',

    //sign module
    ErrorConstant::USER_IS_SIGNED          => '今天已经签到了哦',
    ErrorConstant::USER_SIGN_FAILED        => '签到失败了!',

    //verify code module
    ErrorConstant::MOBILE_NOT_VALIDITY     => '手机号格式不合法',
    ErrorConstant::CODE_NOT_VALIDITY       => '验证码格式不正确',
    ErrorConstant::CODE_CHECKED_FAILED     => '验证码校验失败',

    //invitation code
    ErrorConstant::CREATE_INVITATION_CODE_FAILED => '验证码生成失败',

    //upload file
    ErrorConstant::UPLOAD_FILE_MIME_ERROR => '文件mime类型错误',
    ErrorConstant::UPLOAD_FILE_SIZE_BIG   => '文件过大',
    ErrorConstant::UPLOAD_FILE_SIZE_SMALL => '文件太小',
    ErrorConstant::UPLOAD_FILE_EXTENSION_ERROR => '文件扩展名错误',
    ErrorConstant::UPLOAD_FILE_REQUIRED_ERROR => '文件错误',
    ErrorConstant::UPLOAD_FILE_TOO_MANY   => '上传文件数量过多',
];