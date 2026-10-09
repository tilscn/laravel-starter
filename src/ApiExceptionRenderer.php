<?php

namespace Tilscn\LaravelStarter;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Validation\ValidationException;

class ApiExceptionRenderer
{
    use ApiResponse;

    public static function render(\Throwable $e, Request $request)
    {
        if ($request->is('api/*') || $request->is('api')) {
            if ($e instanceof HttpException) {
                return self::fail($e->getMessage(), $e->getStatusCode());
            } elseif ($e instanceof ValidationException) {
                return self::fail($e->validator->errors()->first(), 422);
            }
        }
    }
}