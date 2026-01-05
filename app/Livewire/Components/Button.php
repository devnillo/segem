<?php

namespace App\Livewire\Components;

use Livewire\Component;

class Button extends Component
{
    public $text = '';

    public $type = 'button';

    public $variant = 'primary';

    public function render()
    {
        return view('livewire.components.button');
    }
}
