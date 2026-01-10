<div>
    <form wire:submit.prevent="login" class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Login do Usuário</h2>

        @if (session()->has('error'))
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-md">
                <p class="text-red-700 font-medium">{{ session('error') }}</p>
            </div>
        @endif

        <div>
            <x-input-field
                label="Email"
                name="email"
                type="email"
                placeholder="Ex: usuario@exemplo.com"
            />
        </div>
        <div>
            <x-input-field
                label="Senha"
                name="password"
                type="password"
                placeholder="Sua senha"
            />
        </div>
        <div class="flex justify-center mt-6">
            <x-button variant="primary" type="submit" text="Entrar" />
        </div>
    </form>
</div>
