<?php

namespace App\Interfaces\Services\Auth;

use App\DTOs\Auth\LoginDTO;

interface LoginServiceInterface
{
    public function execute(LoginDTO $loginDTO): ?string;
}
