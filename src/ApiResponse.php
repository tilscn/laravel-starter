<?php

namespace Tilscn\LaravelStarter;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    function success($data = null, string $msg = '', int $code = 0): JsonResponse
    {
        return response()->json([
            'code'    => $code,
            'msg' => $msg,
            'data'    => $data,
        ], 200);
    }
}