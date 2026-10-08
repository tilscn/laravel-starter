<?php

namespace Tilscn\LaravelStarter;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Validation\ValidationException;

class ApiExceptionRenderer
{
    public static function render(\Throwable $e, Request $request)
    {
        if ($request->is('api/*') || $request->is('api')) {
            if ($e instanceof HttpException) {
                $code = $e->getStatusCode();
                
                return response()->json([
                    'code' => $code,
                    'msg' => $e->getMessage(),
                    'data' => null
                ], $code);
            } elseif ($e instanceof ValidationException) {
                return response()->json([
                    'code' => 422,
                    'msg' => $e->validator->errors()->first(),
                    'data' => null
                ], 422);
            }
        }
    }
}