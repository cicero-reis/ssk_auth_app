<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\DTOs\Auth\LoginDTO;
use App\Interfaces\Services\Auth\LoginServiceInterface;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController
{
    private LoginServiceInterface $loginService;

    public function __construct(
       LoginServiceInterface $loginService
    ) {
        $this->loginService = $loginService;
    }

    public function __invoke(Request $request)
    {
        $loginDTO = LoginDTO::fromRequest($request->all());

        $token = $this->loginService->execute($loginDTO);

        if ($token) {
            return response()->json(
                [
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => JWTAuth::factory()->getTTL() * 60,
                    'message' => 'Login successful'
                ], 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}