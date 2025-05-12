<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Affiche la liste des propriétés.
     */
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    /**
     * Affiche le détail d'une propriété.
     */
    public function show(Property $property)
    {
        return view('properties.show', compact('property'));
    }
}