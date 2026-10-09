<?php

namespace Tilscn\LaravelStarter;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    static function success($data = null, string $msg = '', int $code = 0): JsonResponse
    {
        return response()->json([
            'code'    => $code,
            'msg' => $msg,
            'data'    => $data,
        ], 200);
    }

    static function fail(string $msg = '操作失败!', int $code = 400, $data = null): JsonResponse
    {
        return response()->json([
            'code'    => $code,
            'msg' => $msg,
            'data'    => $data,
        ], $code);
    }
}