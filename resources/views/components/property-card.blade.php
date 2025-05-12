@props(['property'])

@php
    $imageUrl = $property->image
        ? asset('storage/' . $property->image)
        : 'https://via.placeholder.com/400x250?text=No+Image';
@endphp

<div class="group bg-white rounded-2xl shadow-lg p-6 flex flex-col transition-transform transform hover:-translate-y-2 hover:shadow-2xl">
    <img
        src="{{ $imageUrl }}"
        alt="{{ $property->name }}"
        class="rounded-2xl mb-4 object-cover h-48 w-full transition-transform transform group-hover:scale-105"
    >
    <h2 class="text-xl font-semibold mb-2 text-primary group-hover:text-secondary transition-colors">
        {{ $property->name }}
    </h2>
    <p class="text-gray-600 flex-grow mb-4">
        {{ Str::limit(strip_tags($property->description), 100) }}
    </p>
    <div class="mt-auto flex items-center justify-between">
        <span class="text-lg font-bold text-secondary">
            €{{ number_format($property->price_per_night, 2, ',', ' ') }}/nuit
        </span>

        <x-button
            href="{{ route('bookings.create', $property) }}"
            color="secondary"
        >
            Réserver
        </x-button>
    </div>
</div>
