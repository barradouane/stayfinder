<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use App\Http\Livewire\BookingManager; // Ajustez si besoin en fonction de votre namespace

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Définit la permission viewFilament pour Filament
        Gate::define('viewFilament', fn(User $user): bool => (bool) $user->is_admin);

        // Enregistrement manuel du composant Livewire
        Livewire::component('booking-manager', BookingManager::class);
    }
}
