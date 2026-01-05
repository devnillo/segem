<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg p-8">
        <!-- Header Section -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Criar Novo Usuário</h2>
            <p class="text-gray-600">Preencha os campos abaixo para registrar um novo usuário no sistema</p>
        </div>

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

        <form wire:submit.prevent="register" class="space-y-6">
            <div wire:model.live="name">
                <livewire:components.input-area 
                    label="Nome Completo" 
                    name="name"
                    placeholder="Ex: João da Silva" 
                />
                @error('name')
                    <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-md">
                        <p class="text-red-700 text-sm font-medium">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            
            <div wire:model.live="email">
                <livewire:components.input-area 
                    label="Email" 
                    name="email" 
                    type="email" 
                    wire:model.live="email" 
                    placeholder="Ex: joao@example.com" 
                />
                @error('email')
                    <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-md">
                        <p class="text-red-700 text-sm font-medium">{{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div wire:model.live="password">
                <livewire:components.input-area 
                    label="Senha" 
                    name="password" 
                    type="password" 
                    wire:model.live="password" 
                    placeholder="Mínimo 8 caracteres" 
                />
                @error('password')
                    <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-md">
                        <p class="text-red-700 text-sm font-medium">{{ $message }}</p>
                    </div>
                @enderror
            </div>

            <div class="flex gap-4 pt-6 border-t border-gray-200">
                <livewire:components.button variant="primary" type="submit" text="Registrar Usuário" />
                <livewire:components.button variant="secondary" type="button" text="Cancelar" />
            </div>
        </form>
    </div>
</div>
