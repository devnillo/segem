<div class="container mx-auto">
    <x-form-component title="Registrar Secretaria Municipal">
        <form wire:submit.prevent="store" class="gap-2 grid grid-cols-2 max-lg:grid-cols-1">
            <x-input-field name="name" label="Nome" />
            <x-input-field name="email" label="Email" />
            <x-input-field name="inep_code" label="Código INEP" />

            <x-input-field name="acronym" label="Apelido" />
            <x-input-field name="cnpj" label="CNPJ" />
            <x-input-field name="phone" label="Telefone" />

            <x-input-field name="street" label="Rua" />
            <x-input-field name="number" label="Número" />
            <x-input-field name="district" label="Destrito" />
            <x-input-field name="neighborhood" label="Bairro" />

            <x-input-field name="city" label="Cidade" />
            <x-input-field name="state" label="Estado" :options="$states" type="select" value-option="id" text-option="name"/>
            <x-input-field name="zip_code" label="CEP" />
            <x-input-field type="select" :options="$secretary_users" value-option="id" text-option="name" name="secretary_id" label="Secretário Municipal" />
            <x-button type="submit" text="Registar" variant="primary"/>
        </form>
    </x-form-component>
</div>
