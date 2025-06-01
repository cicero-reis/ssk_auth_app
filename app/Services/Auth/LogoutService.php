<?php

namespace App\Services\Auth;

use App\Interfaces\Services\Auth\LogoutServiceInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutService implements LogoutServiceInterface
{
    public function execute(): void
    {
        /** @phpstan-ignore-next-line */
        JWTAuth::invalidate(JWTAuth::getToken());
    }
}
