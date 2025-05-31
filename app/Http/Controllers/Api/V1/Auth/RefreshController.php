<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\DTOs\Auth\TokenResponseDTO;
use App\Interfaces\Services\Auth\RefreshServiceInterface;
use App\Enums\JWTAuthEnum;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\JsonResponse;

class RefreshController
{
    private RefreshServiceInterface $refreshService;

    public function __construct(RefreshServiceInterface $refreshService)
    {
        $this->refreshService = $refreshService;
    }

    /**
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        try {
            $newToken = $this->refreshService->execute();

            if ($newToken) {
                $tokenDto = TokenResponseDTO::fromToken($newToken);
                return response()->json($tokenDto->toArray(), JWTAuthEnum::HTTP_OK);
            }
            throw new JWTException();
        } catch (JWTException $e) {
            return handleTokenException($e);
        }
    }
}
