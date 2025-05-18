<?php

namespace App\DTOs\Auth;

use Tymon\JWTAuth\Facades\JWTAuth;

class TokenResponseDTO
{
    public string $accessToken;
    public string $tokenType;
    public string $expiresIn;

    public function __construct(
        string $accessToken,
        string $tokenType,
        string $expiresIn
    ){
        $this->accessToken = $accessToken;
        $this->tokenType = $tokenType;
        $this->expiresIn = $expiresIn;
    }

    public static function fromToken(string $token): self
    {
        return new self(
            accessToken: $token,
            tokenType: 'bearer',
            expiresIn: (string) JWTAuth::factory()->getTTL() * 60,
        );
    }

    public function toArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'token_type' => $this->tokenType,
            'expires_in' => $this->expiresIn,
        ];
    }
}
