<?php

namespace Tilscn\LaravelStarter;

class AuthController
{
    use ApiResponse;

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            abort(400, '用户名或密码错误');
        }

        return self::success([
            'token' => $token,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

}