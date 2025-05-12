@props([
    'type'  => 'button',
    'color' => 'primary',
    'href'  => null,
])

@if ($href)
    <a
        href="{{ $href }}"
        {{ $attributes->merge([
            'class' => "inline-block px-4 py-2 rounded-lg font-medium bg-{$color} text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-{$color}"
        ]) }}
    >
        {{ $slot }}
    </a>
@else
    <button
        type="{{ $type }}"
        {{ $attributes->merge([
            'class' => "px-4 py-2 rounded-lg font-medium bg-{$color} text-white hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-{$color}"
        ]) }}
    >
        {{ $slot }}
    </button>
@endif
