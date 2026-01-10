<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Secretary;
use Livewire\Component;

class ListSecretaries extends Component
{
    public $secretaries = [];

    public function mount(): void
    {
        $this->secretaries = Secretary::all();
    }

    public function render()
    {
        return view('livewire.list-secretaries')->layout('layouts.admin');
    }
}
