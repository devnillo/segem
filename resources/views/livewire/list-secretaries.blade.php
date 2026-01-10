<div class="container mx-auto">
    <h2 class="title-lg">Listar Secretarias Municipais</h2>
    <div class="list flex flex-col gap-2">
        @foreach($secretaries as $secretary)
            <div class="bg-slate-100 p-4 rounded-md border-2 border-gray-300 flex justify-between items-center">
                <span class="text-xl font-medium">{{ $secretary->name }}</span>

                <div class="actions space-x-2">
                    <a href="{{ $secretary->id }}" class="bg-primary text-white p-2 rounded">VER</a>
                    <a href="{{route('admin.secretary.update', $secretary->id)}}" class="bg-primary text-white p-2 rounded">ATUALIZAR</a>
                    <a href="" class="bg-red-500 text-white p-2 rounded">EXCLUIR</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
