<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\DTOs\Auth\LoginDTO;
use App\DTOs\Auth\TokenResponseDTO;
use App\Interfaces\Services\Auth\LoginServiceInterface;
use Illuminate\Http\Request;

class LoginController
{
    private LoginServiceInterface $loginService;

    public function __construct(LoginServiceInterface $loginService)
    {
        $this->loginService = $loginService;
    }

    public function __invoke(Request $request)
    {
        $loginDTO = LoginDTO::fromRequest($request->all());

        $token = $this->loginService->execute($loginDTO);

        if ($token) {
            $tokenDto = TokenResponseDTO::fromToken($token);
            return response()->json($tokenDto->toArray(), 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
