<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Models\Secretary;
use Livewire\Component;

class ShowSecretary extends Component
{
    public $secretary = [];

    public $secreatyId;

    public function mount($secretaryId): void
    {
        $this->secretaryId = $secretaryId;
        $this->secretary = Secretary::findOrFail($secretaryId);
    }

    public function render()
    {
        return view('livewire.show-secretary')->layout('layouts.admin');
    }
}
