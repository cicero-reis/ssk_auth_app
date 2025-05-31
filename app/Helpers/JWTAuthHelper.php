<?php

use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\JsonResponse;
use App\Enums\JWTAuthEnum;

if (!function_exists('handleTokenException')) {
    function handleTokenException(JWTException $e): JsonResponse
    {
        // Ordem importante! Verificamos primeiro as classes específicas
        // e depois a classe base JWTException
        if ($e instanceof TokenBlacklistedException) {
            return errorResponse(JWTAuthEnum::ERROR_TOKEN_BLACKLISTED, 'token_blacklisted', JWTAuthEnum::HTTP_UNAUTHORIZED);
        } elseif ($e instanceof TokenExpiredException) {
            return errorResponse(JWTAuthEnum::ERROR_TOKEN_EXPIRED, 'token_expired', JWTAuthEnum::HTTP_UNAUTHORIZED);
        } elseif ($e instanceof TokenInvalidException) {
            return errorResponse(JWTAuthEnum::ERROR_TOKEN_INVALID, 'token_invalid', JWTAuthEnum::HTTP_UNAUTHORIZED);
        } else {
            // Aqui tratamos JWTException e qualquer outra exceção que herde dela
            return errorResponse(JWTAuthEnum::ERROR_TOKEN_PROCESSING, 'token_error', JWTAuthEnum::HTTP_SERVER_ERROR);
        }
    }
}

if (!function_exists('errorResponse')) {
    function errorResponse(string $message, string $error, int $status): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'error' => $error
        ], $status);
    }
}
