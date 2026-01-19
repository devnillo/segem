<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Secretary;

use App\Models\Department;
use Livewire\Component;

class AdminSecretary extends Component
{
    public $secrearies = [];

    public function mount(): void
    {
        $this->secrearies = Department::all();
    }

    public function render()
    {
        return view('livewire.admin.secretary.admin-secretary')->layout('layouts.admin');
    }
}
