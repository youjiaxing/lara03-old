<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CaptchaRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CaptchasController extends \App\Http\Controllers\Api\Controller
{
    public function store(CaptchaRequest $request, CaptchaBuilder $captchaBuilder)
    {
        $key = 'captcha-'.str_random(15);
        $phone = $request->phone;

        $captcha = $captchaBuilder->build();
        $expiredAt = now()->addMinutes(2);
        \Cache::put($key, ['phone' => $phone, 'code'=>$captcha->getPhrase()], $expiredAt);
        \Log::debug("$phone 图片验证码: ".$captcha->getPhrase());

        $result = [
            'captcha_key' => $key,
            'expired_at' => $expiredAt,
            'captcha_image_content' => $captcha->inline()
        ];

        return $this->response->array($result)->setStatusCode(201);
    }
}
