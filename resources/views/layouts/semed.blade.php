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
            <div class="mx-auto flex h-16 max-w-7xl items-center gap-8 px-4 sm:px-6 lg:px-8">
                <div>
                    <a class="text-lg font-bold">
                        SEMED
                    </a>
                </div>
                <div class="flex flex-1 items-center justify-end md:justify-between">
                    <nav aria-label="Global" class="hidden md:block">
                        <ul class="flex items-center gap-6 text-sm">
                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#">
                                Services
                                </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#">
                                Projects
                                </a>
                            </li>

                            <li>
                                <a class="text-gray-500 transition hover:text-gray-500/75 dark:text-white dark:hover:text-white/75" href="#">
                                Blog
                                </a>
                            </li>
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
