<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Secretary;

use App\Http\Requests\DepartmentRegisterRequest;
use App\Models\Department;
use App\Models\State;
use App\Models\User;
use Livewire\Component;

class SecretaryRegister extends Component
{
    public $name = '';

    public $email = '';

    public $inep_code = '';

    public $acronym = '';

    public $cnpj = '';

    public $state = '';

    public $secretary_id = '';

    public $phone = '';

    public $street = '';

    public $number = '';

    public $district = '';

    public $neighborhood = '';

    public $zip_code = '';

    public $city = '';

    public $secretary_users = [];

    public $states = [];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    protected function rules(): array
    {
        return (new DepartmentRegisterRequest)->rules();
    }

    public function mount(): void
    {
        $this->secretary_users = User::where('role', 'secretary')->get();
        $this->states = State::all();
    }

    public function store()
    {
        $validated = $this->validate();
        Department::create($validated);

        session()->flash('message', 'Secretaria criada com sucesso!.');

        return $this->redirect(route('admin.secretary'));

    }

    public function render()
    {
        return view('livewire.admin.secretary.secretary-register')->layout('layouts.admin');
    }
}
