@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6 text-primary">Réserver : {{ $property->name }}</h1>

    {{-- Intégration du composant Livewire BookingManager --}}
    <livewire:booking-manager :property="$property" />
@endsection