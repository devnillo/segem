<div class="container mx-auto p-2 bg-slate-100 rounded-md">
    <h2 class="title-lg">Nome: {{ $secretary->name }}</h2>
    <span>Data de criação: {{ date('d/m/y H:i', strtotime($secretary->created_at)) }}</span>
{{--    {{ $secretary->created_at }}--}}
</div>
