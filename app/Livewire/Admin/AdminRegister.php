<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AdminRegister extends Component
{
    #[Validate('required')]
    public $name = '';
    #[Validate('email|required|unique:users,email')]
//    #[Validate('')]
    public $email = '';
    #[Validate('required')]
    public $password = '';
    public $is_active = true;

    public function register()
    {
        $validated = $this->validate();
        $validated['is_active'] = $this->is_active;
        $validated['role'] = 'admin';

        User::create($validated);
        session()->flash('message', 'Usuário registrado com sucesso!');
        $this->reset(['name', 'email', 'password']);
    }

    public function render()
    {
        return view('livewire.admin.admin-register')->layout('layouts.admin');
    }
}
