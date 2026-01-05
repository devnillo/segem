<?php

declare(strict_types=1);

namespace App\Livewire\Secretary;

use Livewire\Component;

class SecretaryDashboard extends Component
{
    public function render()
    {
        return view('livewire.secretary.secretary-dashboard')
            ->layout('layouts.secretary');
    }
}
