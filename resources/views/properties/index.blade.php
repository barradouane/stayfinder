@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($properties as $property)
        <x-property-card :property="$property" />
    @endforeach
</div>
@endsection