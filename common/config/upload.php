<?php
return [
    'image' => [
        'extensions' => 'gif', //允许的扩展名
        'mimeTypes'  => null, //允许的mime类型
        'minSize' => 1024,    //内容最小值
        'maxSize' => 5 * 1048576,     //内容最大值
        'uploadRequired' => \common\constants\ErrorConstant::UPLOAD_FILE_REQUIRED_ERROR, //无文件内容的提示信息
        'tooBig'  => \common\constants\ErrorConstant::UPLOAD_FILE_SIZE_BIG,  //文件过大的提示信息
        'tooSmall' => \common\constants\ErrorConstant::UPLOAD_FILE_SIZE_SMALL, //文件太小的提示信息
        'tooMany' => \common\constants\ErrorConstant::UPLOAD_FILE_TOO_MANY, //文件数量过多的提示信息
        'wrongExtension' => \common\constants\ErrorConstant::UPLOAD_FILE_EXTENSION_ERROR, //扩展名不被允许的提示信息
        'wrongMimeType' => \common\constants\ErrorConstant::UPLOAD_FILE_MIME_ERROR,  //文件mime类型不被允许的提示信息
        'path'  => realpath(__DIR__ . '/../upload'), //文件保存的路径
        'url'   => 'http://localhost', //访问文件的url前缀
        'ftpTransmission' => false, //是否启用ftp传输到另外的服务器上面
    ],
    'video' => [
        'extensions' => null, //允许的扩展名
        'mimeTypes'  => null, //允许的mime类型
        'minSize' => 1024,    //内容最小值
        'maxSize' => 10 * 1048576,     //内容最大值
        'uploadRequired' => \common\constants\ErrorConstant::UPLOAD_FILE_REQUIRED_ERROR, //无文件内容的提示信息
        'tooBig'  => \common\constants\ErrorConstant::UPLOAD_FILE_SIZE_BIG,  //文件过大的提示信息
        'tooSmall' => \common\constants\ErrorConstant::UPLOAD_FILE_SIZE_SMALL, //文件太小的提示信息
        'tooMany' => \common\constants\ErrorConstant::UPLOAD_FILE_TOO_MANY, //文件数量过多的提示信息
        'wrongExtension' => \common\constants\ErrorConstant::UPLOAD_FILE_EXTENSION_ERROR, //扩展名不被允许的提示信息
        'wrongMimeType' => \common\constants\ErrorConstant::UPLOAD_FILE_MIME_ERROR,  //文件mime类型不被允许的提示信息
        'path'  => realpath(__DIR__ . '/../upload'), //文件保存的路径(如果开启允许ftp上传 改地址为远程目录地址)
        'url'   => 'http://localhost', //访问文件的url前缀
        'ftpTransmission' => false, //是否启用ftp传输到远程服务器上面
    ],
    'apk' => [
        'extensions' => null, //允许的扩展名
        'mimeTypes'  => null, //允许的mime类型
        'minSize' => 1024,    //内容最小值
        'maxSize' => 10 * 1048576,     //内容最大值
        'uploadRequired' => \common\constants\ErrorConstant::UPLOAD_FILE_REQUIRED_ERROR, //无文件内容的提示信息
        'tooBig'  => \common\constants\ErrorConstant::UPLOAD_FILE_SIZE_BIG,  //文件过大的提示信息
        'tooSmall' => \common\constants\ErrorConstant::UPLOAD_FILE_SIZE_SMALL, //文件太小的提示信息
        'tooMany' => \common\constants\ErrorConstant::UPLOAD_FILE_TOO_MANY, //文件数量过多的提示信息
        'wrongExtension' => \common\constants\ErrorConstant::UPLOAD_FILE_EXTENSION_ERROR, //扩展名不被允许的提示信息
        'wrongMimeType' => \common\constants\ErrorConstant::UPLOAD_FILE_MIME_ERROR,  //文件mime类型不被允许的提示信息
        'path'  => realpath(__DIR__ . '/../upload'), //文件保存的路径
        'url'   => 'http://localhost', //访问文件的url前缀
        'ftpTransmission' => false, //是否启用ftp传输到另外的服务器上面
    ],
];
