<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'SEMED - Secretaria Municipal de Educação' }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])


        @livewireStyles
    </head>
    <body class="bg-gray-50">
        <header class="bg-primary text-white shadow-sm">
            <div class="container mx-auto px-6 py-4">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-2xl font-semibold">SEMED</h1>
                    </div>
                    <nav>
                        <ul class="flex gap-6">
                            <li><a href="#" class="hover:underline" wire:navigate>Dashboard</a></li>
                            <li><a href="#" class="hover:underline" wire:navigate>Students</a></li>
                            <li><a href="#" class="hover:underline" wire:navigate>Teachers</a></li>
                            <li><a href="#" class="hover:underline" wire:navigate>Classes</a></li>
                        </ul>
                    </nav>
                    <div class="flex items-center gap-4">
                        @guest
                            <div class="sm:flex sm:gap-4">
                            <a href={{ route('user.login') }} wire:navigate>
                                <livewire:components.button variant="secondary" type="button" text="Login" />
                            </a>
                        </div>
                        @else
                            <span>Olá, {{ Auth::user()->name }}</span>
                        @endguest
                    </div>
                </div>
            </div>
        </header>

        <main class="container mx-auto px-6 py-8">
            {{ $slot }}
        </main>
        @livewireScripts
    </body>
</html>
