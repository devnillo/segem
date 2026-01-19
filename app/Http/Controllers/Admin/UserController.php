<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;

class UserController extends Controller
{
    #[Post('login', name: 'user.login')]
    public function login(UserRegisterRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);

        return response()->json($user, 200);
    }


}
