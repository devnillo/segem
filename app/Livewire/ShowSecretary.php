<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;

class ShowSecretary extends Component
{
    public $secretary = [];

    public $secreatyId;

    public function mount($secretaryId): void
    {
        $this->secretaryId = $secretaryId;
        $this->secretary = Department::findOrFail($secretaryId);
    }

    public function render()
    {
        return view('livewire.show-secretary')->layout('layouts.admin');
    }
}
