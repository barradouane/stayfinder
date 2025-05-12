<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
     protected $fillable = [
        'name',
        'description',
        'price_per_night',
        'image',            // si vous avez ajouté cette colonne
    ];

    // Optionnel : casts pour que price_per_night soit toujours un float
    protected $casts = [
        'price_per_night' => 'float',
    ];
}
