<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Interfaces\Services\Auth\LogoutServiceInterface;
use App\Enums\JWTAuthEnum;
use Tymon\JWTAuth\Exceptions\JWTException;

class LogoutController
{
    private LogoutServiceInterface $logoutService;

    public function __construct(LogoutServiceInterface $logoutService)
    {
        $this->logoutService = $logoutService;
    }

    public function __invoke()
    {
        try {

            $this->logoutService->execute();
            return response()->json(['message' => 'Logout realizado com sucesso!'], JWTAuthEnum::HTTP_OK);

        } catch (JWTException $e) {
            return handleTokenException($e);
        }
    }
}
