<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __invoke()
    {
        return response()->json(['message' => 'Você é um administrador!']);
    }

    public function refresh()
    {
        try {
            /** @phpstan-ignore-next-line */
            $newToken = JWTAuth::parseToken()->refresh();
            return response()->json([
                'access_token' => $newToken,
                'token_type' => 'bearer',
                /** @phpstan-ignore-next-line */
                'expires_in' => JWTAuth::factory()->getTTL() * 60
            ]);
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['message' => 'Token inválido para refresh'], 401);
        }
    }

    // public function logout()
    // {
    //     try {
    //         JWTAuth::invalidate(JWTAuth::getToken());
    //         return response()->json(['message' => 'Logout realizado com sucesso!']);
    //     } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
    //         return response()->json(['message' => 'Falha ao realizar logout'], 500);
    //     }
    // }

    public function register()
    {
        return response()->json(['message' => 'Registro realizado com sucesso!']);
    }
}
