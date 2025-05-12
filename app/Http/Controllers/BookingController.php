<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Affiche la liste des réservations de l'utilisateur connecté.
     */
    public function index()
    {
        $bookings = Auth::user()
            ->bookings()
            ->with('property')
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    /**
     * Affiche le formulaire de réservation pour une propriété.
     */
    public function create(Property $property)
    {
        return view('bookings.create', compact('property'));
    }

    /**
     * Valide et enregistre une nouvelle réservation.
     */
    public function store(Request $request, Property $property)
    {
        $data = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
        ]);

        Booking::create([
            'user_id'     => Auth::id(),
            'property_id' => $property->id,
            'start_date'  => $data['start_date'],
            'end_date'    => $data['end_date'],
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Réservation effectuée avec succès !');
    }

    /**
     * Supprime une réservation.
     */
    public function destroy(Booking $booking)
    {
        // Autorisation manuelle : seul le propriétaire de la réservation peut la supprimer
        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Action non autorisée.');
        }

        $booking->delete();

        return back()->with('success', 'Réservation annulée.');
    }
}
