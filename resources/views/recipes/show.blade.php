@extends('layouts.app')

@section('content')
    <h2>{{ $recipe->name }}</h2>
    <p><strong>Description:</strong> {{ $recipe->description }}</p>
    <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
    <p><strong>Instructions:</strong> {{ $recipe->instructions }}</p>

    <a href="{{ route('recipes.index') }}" class="btn btn-primary">Back to List</a>
@endsection
