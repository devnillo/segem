<?php

declare(strict_types=1);

namespace App\Livewire\Admim\Secretary;

use App\Models\Secretary;
use App\Models\State;
use App\Models\User;
use Livewire\Component;

class SecretaryUpdate extends Component
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

    public $secretary = [];

    public $states = [];

    public $secretaryId;

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount($secretaryId): void
    {
        $this->secretary_users = User::where('role', 'secretary')->get();
        $this->states = State::all();
        $this->secretary = Secretary::find($secretaryId);

        $this->name = $this->secretary->name;
        $this->email = $this->secretary->email;
        $this->inep_code = $this->secretary->inep_code;
        $this->acronym = $this->secretary->acronym;
        $this->cnpj = $this->secretary->cnpj;
        $this->state = $this->secretary->state;
        $this->street = $this->secretary->street;
        $this->number = $this->secretary->number;
        $this->district = $this->secretary->district;
        $this->neighborhood = $this->secretary->neighborhood;
        $this->zip_code = $this->secretary->zip_code;
        $this->city = $this->secretary->city;
        $this->secretary_id = $this->secretary->secretary_id;
        $this->secretaryId = $secretaryId;
        $this->phone = $this->secretary->phone;
    }

    public function rules(): array
    {
        return [
            'inep_code' => 'required|numeric|unique:secretaries,inep_code,'.$this->secretaryId.',id',
            'acronym' => 'nullable',
            'cnpj' => 'nullable|unique:secretaries,cnpj,'.$this->secretaryId.',id',
            'state' => 'nullable',
            'secretary_id' => 'required|integer|exists:users,id',
            'name' => 'required|unique:secretaries,name,'.$this->secretaryId.',id',
            'email' => 'required|email|unique:secretaries,email,'.$this->secretaryId.',id',

            'phone' => 'required',
            'street' => 'required',
            'number' => 'required',
            'district' => 'required',
            'neighborhood' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
        ];
    }

    public function store()
    {
        $validated = $this->validate();
        $secretary = Secretary::findOrFail($this->secretaryId);
        $secretary->update($validated);

        session()->flash('message', 'Secretaria atualizada com sucesso!.');

        return $this->redirect(route('admin.secretary.all'));
    }

    public function render()
    {
        return view('livewire.admim.secretary.secretary-update')->layout('layouts.admin');
    }
}
