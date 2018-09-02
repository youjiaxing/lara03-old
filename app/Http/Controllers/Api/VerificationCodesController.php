<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\VerificationCodeRequest;
use Illuminate\Http\Request;
use Overtrue\EasySms\EasySms;
use Overtrue\EasySms\Exceptions\NoGatewayAvailableException;

class VerificationCodesController extends Controller
{
    public function store(VerificationCodeRequest $request, EasySms $easySms)
    {
        $phone = $request->phone;

        if (!app()->environment('production')) {
            $code = '1234';
        } else {
            // 生成4位随机数, 左侧补0
            $code = strval(random_int(1000, 9999));

            try {
                $result = $easySms->send($phone, [
                    'content' => "[LaraPHP]您的验证码是{$code}. 如非本人操作, 请忽略本短信, 同时不要提供给他人."
                ]);
            } catch (NoGatewayAvailableException $exception) {
                $message = $exception->getException('qcloud')->getMessage();
                return $this->response->errorInternal($message ?? '短信发送异常');
            }
        }
            $key = 'verificationCode_' . str_random(15);
            $expiredAt = now()->addMinutes(10);
            // 缓存验证码 10分钟过期
            \Cache::put($key, ['phone' => $phone, 'code' => $code], $expiredAt);

            return $this->response->array([
                'key' => $key,
                'expired_at' => $expiredAt->toDateTimeString(),
            ])->setStatusCode(201);

    }
}