<div class="flex flex-col @if($hidden) hidden @endif">
    <label class="mb-1 font-semibold text-gray-700" for="{{ $name }}">
        {{ $label }}
    </label>

    <input
        class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"
        type="{{ $type ?? 'text' }}"
        name="{{ $name }}"
        id="{{ $name }}"
        placeholder="{{ $placeholder }}"
        @if($hidden) hidden @endif
    >

</div>
