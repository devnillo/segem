<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? config('app.name') }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @livewireStyles
    </head>
    <body>
        <header class="bg-primary text-white flex justify-between p-5 mb-2">
            <div class="logo">
            </div>
            <nav>
                <ul class="flex gap-4">
                    <li>
                        <a wire:navigate href={{ route('admin.dashboard')}}>Dashboard</a>
                    </li>
                    <li>
                        <a wire:navigate href={{ route('admin.secretary') }}>Secretarias</a>
                    </li>
                    <li>
                        <a wire:navigate href={{ route('admin.users') }}>Usuários</a>
                    </li>
                    <li>
                        <a href="">Escolas</a>
                    </li>
                </ul>
            </nav>
        </header>
        {{ $slot }}

        @livewireScripts
    </body>
</html>
