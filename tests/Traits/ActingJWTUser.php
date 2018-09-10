<?php
/**
 *
 * @author : 尤嘉兴
 * @version: 2018/9/10 20:12
 */

namespace Tests\Traits;


use App\Models\User;

trait ActingJWTUser
{
    public function JWTActingAs(User $user)
    {
        $token = \Auth::guard('api')->fromUser($user);
        $this->withHeaders(['Authorization' => 'Bearer '.$token]);

        return $this;
    }
}