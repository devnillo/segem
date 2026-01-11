<div>
    @if (session()->has('message'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
            <div class="flex items-center gap-3">
                <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <p class="text-green-800 font-medium">{{ session('message') }}</p>
            </div>
        </div>
    @endif
    <div class="container mx-auto rounded-lg border-2 border-gray-200 p-4 flex flex-col gap-5 bg-slate-100">
        <h2 class="text-2xl font-semibold">Registar Usuário</h2>
        <form wire:submit.prevent="register" class="flex flex-col gap-2">
            <x-input-field type="select" :options="$roles" name="role" label="Cargo"/>
            <div wire:model.live="name" class="flex flex-col gap-2">
                <x-input-field name="name" label="Nome" placeholder="Ex: Danilo Lopes"/>
            </div>
            <div wire:model.blur="email" class="flex flex-col gap-2">
                <x-input-field name="email" label="Email" placeholder="Ex: exemplo@gmail.com"/>
            </div>
            <div wire:model.blur="password" class="flex flex-col gap-2">
                <x-input-field type="password" name="password" label="Senha" placeholder="Ex: Senhasegura121@" />
            </div>
            <x-button type="submit" variant="primary" text="Registar"/>
        </form>
    </div>
</div>
