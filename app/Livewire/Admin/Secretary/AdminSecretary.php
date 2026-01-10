<?php

namespace App\Livewire\Admin\Secretary;

use App\Models\Secretary;
use Livewire\Component;

class AdminSecretary extends Component
{
    public $secrearies = [];
    public function mount(): void
    {
        $this->secrearies = Secretary::all();
    }
    public function render()
    {
        return view('livewire.admin.secretary.admin-secretary')->layout('layouts.admin');
    }
}
