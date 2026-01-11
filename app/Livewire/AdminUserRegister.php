<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class AdminUserRegister extends Component
{
    #[Validate('required')]
    public $name = '';

    #[Validate('email|required|unique:users,email')]

    public $email = '';

    #[Validate('required')]
    public $password = '';

    public $is_active = true;

    #[Validate('required')]
    public $role = '';
    public $roles = [];

    public function register()
    {
        $validated = $this->validate();
        $validated['is_active'] = $this->is_active;
        $validated['role'] = $this->role;
        $user = User::create($validated);
        $user->assignRole($this->role);

        session()->flash('message', 'Usuário registrado com sucesso!');
        $this->reset(['name', 'email', 'password']);
    }

    public function mount(): void
    {
        $this->roles = Role::all()->pluck('name');
    }
    public function render()
    {
        return view('livewire.admin-user-register')->layout('layouts.admin');
    }
}
