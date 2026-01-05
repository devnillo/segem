<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;

class UserLogin extends Component
{
    public $email = '';

    public $password = '';

    public function login()
    {
        $validated = $this->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',

        ]);

        if (auth()->attempt($validated)) {

            $user = auth()->user();
            session()->regenerate();
            if ($user->role === 'admin') {
                return $this->redirect('/admin/dashboard');
            }
            if ($user->role === 'secretary') {
                return $this->redirect('/secretary/dashboard');
            }
            if ($user->role === 'teacher') {
                return $this->redirect('/teacher/dashboard');
            }
            if ($user->role === 'student') {
                return $this->redirect('/student');
            }
            if ($user->role === 'parent') {
                return $this->redirect('/parent');
            }
        }

        $this->addError('email', 'As credenciais fornecidas estão incorretas.');
    }

    public function render()
    {
        return view('livewire.user.user-login');
    }
}
