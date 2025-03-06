<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;


class RecipeController extends Controller
{

    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        Recipe::create([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
        ]);
        return redirect()->route('recipes.index');
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe)
    {
      
        $recipe->update([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'instructions' => $request->instructions,
        ]);

        return redirect()->route('recipes.index');
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe')); 
    }

    public function destroy(Recipe $recipe)
    {
        $recipe=Recipe::findorfail($recipe->id);
        $recipe->delete();

        return redirect()->route('recipes.index');
    }
}
