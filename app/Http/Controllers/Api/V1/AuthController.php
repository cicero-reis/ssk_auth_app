<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __invoke()
    {
        return response()->json(['message' => 'Você é um administrador!']);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Verifica se o usuário existe
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        return response()->json(['token' => $token]);
    }

    public function logout()
    {
        return response()->json(['message' => 'Logout realizado com sucesso!']);
    }

    public function register()
    {
        return response()->json(['message' => 'Registro realizado com sucesso!']);
    }
}

