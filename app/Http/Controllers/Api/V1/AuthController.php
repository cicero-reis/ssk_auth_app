<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function register()
    {
        return response()->json(['message' => 'Registro realizado com sucesso!']);
    }
}
