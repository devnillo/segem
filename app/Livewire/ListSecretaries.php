<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;

class ListSecretaries extends Component
{
    public $secretaries = [];

    public function mount(): void
    {
        $this->secretaries = Department::all();
    }

    public function render()
    {
        return view('livewire.list-secretaries')->layout('layouts.admin');
    }
}
