<div class="mx-auto bg-contrast border rounded-xl p-6">
    <div class="mb-6">
        <h1 class="title-lg">
            {{ $title }}
        </h1>

        @isset($description)
            <p class="sub-title">
                {{ $description }}
            </p>
        @endisset
    </div>

    {{ $slot }}
</div>
