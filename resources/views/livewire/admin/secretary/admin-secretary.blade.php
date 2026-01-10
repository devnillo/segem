<div class="container mx-auto space-y-4">
    <h2 class="title-lg">Gerenciar Secretarias Municipais</h2>
    <div class="cards flex gap-2">
        <x-card classes="text-center">
            <p class="sub-title">QTD. Secretrarias:</p>
            <span class="text-2xl font-bold">{{ count($secrearies) }}</span>
        </x-card>
    </div>
    <div class="actions">
        <h2 class="title-lg">Ações</h2>
        <div class="container mx-auto grid grid-cols-3 gap-4">
            <div class="action">
                <a wire:navigate href="{{ route('admin.secretary.register') }}" class="bg-primary flex text-white p-4 rounded-md text-xl hover:brightness-110 transition">Criar Secretaria Municipal</a>
            </div>
            <div class="action">
                <a wire:navigate href="{{ route('admin.secretary.all') }}" class="bg-primary flex text-white p-4 rounded-md text-xl hover:brightness-110 transition">Listar Secretarias</a>
            </div>
            <div class="action">
                <a wire:navigate href="{{ route('admin.secretary.register') }}" class="bg-primary flex text-white p-4 rounded-md text-xl hover:brightness-110 transition">Criar Secretaria Municipal</a>
            </div>
        </div>
    </div>
</div>
