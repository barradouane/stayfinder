<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // Autorise le mass‐assignment pour ces champs
    protected $fillable = [
        'user_id',
        'property_id',
        'start_date',
        'end_date',
    ];

    // Casts pour que les dates soient des objets Carbon
    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    /**
     * Relation vers l'utilisateur qui a réservé.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation vers la propriété réservée.
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
