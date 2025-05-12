@extends('layouts.app')

@section('content')
    <h1 class="text-3xl font-bold mb-6 text-primary">Mes Réservations</h1>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($bookings->isEmpty())
        <p class="text-gray-600">Vous n’avez encore fait aucune réservation.</p>
    @else
        <div class="space-y-8">
            @foreach($bookings as $booking)
                <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row">
                    {{-- Visuel du bien --}}
                    @php
                        $imgUrl = $booking->property->image
                            ? asset('storage/' . $booking->property->image)
                            : 'https://via.placeholder.com/400x300?text=Pas+d\'image';
                    @endphp
                    <img
                        src="{{ $imgUrl }}"
                        alt="{{ $booking->property->name }}"
                        class="w-full h-48 md:w-1/3 md:h-auto object-cover"
                    >

                    <div class="p-6 flex flex-col justify-between flex-1">
                        {{-- Titre et lien vers le bien --}}
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2 hover:text-secondary transition-colors">
                            <a >
                                {{ $booking->property->name }}
                            </a>
                        </h2>

                        {{-- Période --}}
                        <p class="text-gray-600 mb-4">
                            <span class="font-medium">Du</span>
                            {{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }}
                            <span class="font-medium">au</span>
                            {{ \Carbon\Carbon::parse($booking->end_date)->format('d/m/Y') }}
                        </p>

                        {{-- Actions --}}
                        <div class="mt-auto flex flex-wrap gap-4">

                            <form
                                method="POST"
                                action="{{ route('bookings.destroy', $booking) }}"
                                onsubmit="return confirm('Confirmez-vous l’annulation de cette réservation ?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="text-red-600 font-medium hover:underline"
                                >
                                    Annuler
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
