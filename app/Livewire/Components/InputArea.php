<?php

declare(strict_types=1);

namespace App\Livewire\Components;

use Livewire\Component;

class InputArea extends Component
{
    public $name = '';

    public $label = '';

    public $placeholder = '';

    public $value = '';

    public $type = 'text';

    public $hidden = false;

    public $model = null;

    public $errors = [];

    public function render()
    {
        return view('livewire.components.input-area');
    }
}
