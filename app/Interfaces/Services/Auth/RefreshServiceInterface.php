<?php

namespace App\Interfaces\Services\Auth;

interface RefreshServiceInterface
{
    public function execute(): ?string;
}
