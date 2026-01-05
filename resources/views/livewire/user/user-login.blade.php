<div>
    <form wire:submit.prevent="login" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login do Usuário</h2>

        @if (session()->has('error'))
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-md">
                <p class="text-red-700 font-medium">{{ session('error') }}</p>
            </div>
        @endif

        <div wire:model.live="email">
            <livewire:components.input-area 
                label="Email" 
                name="email" 
                type="email" 
                placeholder="Ex: usuario@exemplo.com"
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
                placeholder="Sua senha"
            />
            @error('password')
                <div class="mt-2 p-3 bg-red-50 border border-red-200 rounded-md">
                    <p class="text-red-700 text-sm font-medium">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="flex justify-center mt-6">
            <livewire:components.button variant="primary" type="submit" text="Entrar" />
        </div>
    </form>
</div>
