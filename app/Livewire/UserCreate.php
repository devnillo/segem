<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.semed')]
class UserCreate extends Component
{
    public $name = '';

    public $email = '';

    public $password = '';

    public $role = 'admin';

    public $is_active = true;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'role' => 'required|string',
        'is_active' => 'boolean',
    ];

    public function register()
    {
        $validated = $this->validate();

        User::create($validated);

        session()->flash('message', 'Usuário registrado com sucesso!');

        $this->reset(['name', 'email', 'password']);

    }

    public function render()
    {
        return view('livewire.user.user-create');
    }
}
