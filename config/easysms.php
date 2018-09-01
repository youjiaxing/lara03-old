<?php
return [
    // HTTP 请求的超时时间（秒）
    'timeout' => 5.0,

    // 默认发送配置
    'default' => [
        // 网关调用策略，默认：顺序调用
        'strategy' => \Overtrue\EasySms\Strategies\OrderStrategy::class,

        // 默认可用的发送网关
        'gateways' => [
            'errorlog',
//            'qcloud',
        ],
    ],
    // 可用的网关配置
    'gateways' => [
        'errorlog' => [
//            'file' => '/tmp/easy-sms.log',
            'file' => storage_path('logs/easy-sms.log'),
        ],
        'yunpian' => [
            'api_key' => env('YUNPIAN_API_KEY'),
        ],
        'qcloud' => [
            'sdk_app_id' => env('QCLOUD_SMS_APPID'), // SDK APP ID
            'app_key' => env('QCLOUD_SMS_KEY'), // APP KEY
            'sign_name' => env('QCLOUD_SMS_SIGN'), // 短信签名，如果使用默认签名，该字段可缺省（对应官方文档中的sign）
        ],
    ],
];