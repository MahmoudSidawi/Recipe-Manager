@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Recipe List</h2>
        <a href="{{ route('recipes.create') }}" class="btn btn-primary">Add Recipe</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td>{{ $recipe->name }}</td>
                    <td>{{ Str::limit($recipe->description, 50) }}</td>
                    <td>
                        <a href="{{ route('recipes.show', $recipe) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('recipes.edit', $recipe) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
