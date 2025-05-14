<?php

namespace App\Services\Auth;

use App\DTOs\Auth\LoginDTO;
use App\Interfaces\Services\Auth\LoginServiceInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginService implements LoginServiceInterface
{
    public function execute(LoginDTO $loginDTO): ?string
    {
        /** @phpstan-ignore-next-line */
        return JWTAuth::attempt($loginDTO->toArray());
    }
}
