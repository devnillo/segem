
<div class="flex flex-col @if($hidden) hidden @endif">
    <label
        for="{{ $name }}"
        class="mb-1 font-semibold text-gray-700"
    >
        {{ $label }}
    </label>

    @if ($type === 'select')
        <select
            {{ $attributes->merge([
                'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300'
            ]) }}
            name="{{ $name }}"
            id="{{ $name }}"
            wire:model.live="{{ $name }}"
        >
            <option value="">Select</option>

            @foreach ($options as $value => $text)
                <option value="{{ $text->$valueOption ?? $text }}">
                    {{ $text->$textOption ?? $text }}
                </option>
            @endforeach
        </select>
    @else
        <input
            {{ $attributes->merge([
                'class' => 'border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300'
            ]) }}
            type="{{ $type }}"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            wire:model.live="{{ $name }}"
            @if($hidden) hidden @endif
        >
    @endif

    @error($name)
    <span class="mt-1 text-sm text-red-600">
            {{ $message }}
        </span>
    @enderror
</div>
