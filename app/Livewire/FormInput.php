<?php

declare(strict_types=1);

namespace App\Livewire;

use Livewire\Component;

class FormInput extends Component
{
    // Propriedades públicas que podem ser passadas para o componente
    public $name;

    public $label;

    public $type = 'text';

    public $value;

    public $placeholder = '';

    public $required = false;

    public $disabled = false;

    public $readonly = false;

    public $class = '';

    public $inputClass = '';

    public $labelClass = '';

    public $id;

    // Método mount para inicializar propriedades
    public function mount(
        $name,
        $label = null,
        $type = 'text',
        $value = null,
        $placeholder = '',
        $required = false,
        $disabled = false,
        $readonly = false,
        $class = '',
        $inputClass = '',
        $labelClass = '',
        $id = null
    ) {
        $this->name = $name;
        $this->label = $label ?? ucfirst($name); // Se não tiver label, usa o nome
        $this->type = $type;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->required = $required;
        $this->disabled = $disabled;
        $this->readonly = $readonly;
        $this->class = $class;
        $this->inputClass = $inputClass;
        $this->labelClass = $labelClass;
        $this->id = $id ?? $name; // Se não tiver ID, usa o nome
    }

    // Método render
    public function render()
    {
        return view('livewire.form-input');
    }
}
