@extends('layouts.app')

@section('content')
    <h2>Edit Recipe</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recipes.update', $recipe) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Recipe Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $recipe->name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description', $recipe->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Ingredients</label>
            <textarea name="ingredients" class="form-control" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Instructions</label>
            <textarea name="instructions" class="form-control" required>{{ old('instructions', $recipe->instructions) }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update Recipe</button>
    </form>
@endsection
