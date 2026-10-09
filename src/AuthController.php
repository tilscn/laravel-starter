<?php

namespace Tilscn\LaravelStarter;

use Illuminate\Support\Facades\Validator;

class AuthController
{
    use ApiResponse;

    public function login()
    {
        $credentials = request(['email', 'password']);
        Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6'
        ])->validate();

        if (! $token = auth('api')->attempt($credentials)) {
            abort(400, '用户名或密码错误');
        }

        return self::success([
            'token' => $token,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function me()
    {
        return self::success(auth('api')->user());
    }

    public function login2()
    {
        return abort(401, 'unauthorized');
    }
}