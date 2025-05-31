<?php

namespace App\Services\Auth;

use App\Interfaces\Services\Auth\RefreshServiceInterface;
use Tymon\JWTAuth\Facades\JWTAuth;

class RefreshService implements RefreshServiceInterface
{
    public function execute(): ?string
    {
        /** @phpstan-ignore-next-line */
        return JWTAuth::parseToken()->refresh();
    }
}
