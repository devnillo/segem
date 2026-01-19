<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;

class UserController extends Controller
{
    #[Get('login', name: 'login')]
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $token = auth()->attempt($credentials);

        if (!$token) {
            return ApiResponse::error('Credenciais inválidas', 401);
        }

        return ApiResponse::success([
            'token' => $token,
            'user' => auth()->user(),
        ], 'Logado com sucesso');
    }

    #[Post('register', name: 'admin.user.register')]
    public function register(UserRegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create($validated);
        $user->assignRole($validated['role']);

        return ApiResponse::success(['user' => $user], 'Cadastro realizado com sucesso');


    }
}
