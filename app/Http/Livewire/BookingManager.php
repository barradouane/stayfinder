<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class BookingManager extends Component
{
    public $property;
    public $start_date;
    public $end_date;

    protected $rules = [
        'start_date' => 'required|date|after_or_equal:today',
        'end_date'   => 'required|date|after:start_date',
    ];

    public function mount($property)
    {
        $this->property = is_object($property)
            ? $property->fresh()
            : \App\Models\Property::findOrFail($property);
    }

    public function submit()
    {
        $this->validate();

        Booking::create([
            'user_id'     => Auth::id(),
            'property_id' => $this->property->id,
            'start_date'  => $this->start_date,
            'end_date'    => $this->end_date,
        ]);

        session()->flash('success', 'Réservation effectuée !');

        return redirect()->route('bookings.index');
    }

    public function render()
    {
        return view('livewire.booking-manager');
    }
}
