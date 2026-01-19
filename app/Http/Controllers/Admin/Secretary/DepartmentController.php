<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\Secretary;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRegisterRequest;
use App\Models\Department;
use App\Models\User;
use Spatie\RouteAttributes\Attributes\Get;
use Spatie\RouteAttributes\Attributes\Post;
use Spatie\RouteAttributes\Attributes\Prefix;

#[Prefix('secretary')]
class DepartmentController extends Controller
{
    #[Post('register')]
    public function register(DepartmentRegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::find($validated['secretary_id']);

        if (! isset($user) || ! $user->hasRole('education-secretary')) {
            return ApiResponse::error('Usuário não é secretario, ou não foi encontrado.');
        }

        $department = Department::create($validated);

        if (! $department) {
            return ApiResponse::error('Erro ao cadastrar o secretaria.');
        }

        return ApiResponse::success(['secretary' => $department], 'Secretaria Municipal criada com sucesso.');
    }

    #[Get('{department_id}')]
    public function getById($department_id)
    {
        $department = Department::find($department_id);
        if (! $department) {
            return ApiResponse::error('Secretaria menicipal de Edcucação não existe.');
        }

        return ApiResponse::success(['department' => $department]);
    }
}
