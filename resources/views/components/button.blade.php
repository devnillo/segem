@php
    $baseClasses = 'px-4 py-2 rounded-md font-semibold transition-colors duration-200 focus:outline-none btn-focus-ring cursor-pointer';

    $variantClasses = [
        'primary' => 'bg-primary text-white hover:brightness-110',
        'secondary' => 'bg-gray-200 text-gray-800 hover:bg-gray-300',
    ];

    $classes = trim($baseClasses . ' ' . ($variantClasses[$variant] ?? $variantClasses['primary']));
@endphp

<button type="{{ $type }}" class="{{ $classes }}">
    {{ $text }}
</button>

