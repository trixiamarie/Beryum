<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesIngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
       DB::table('recipesingredients')->delete();

       
       $recipes = Recipe::all();
       $ingredients = Ingredient::all();

       
       if ($recipes->isEmpty() || $ingredients->isEmpty()) {
           return;
       }

       foreach ($recipes as $recipe) {
           
           $ingredientsToAttach = $ingredients->random(rand(3, 5));
           foreach ($ingredientsToAttach as $ingredient) {
               DB::table('recipesingredients')->insert([
                   'recipe_id' => $recipe->id,
                   'ingredient_id' => $ingredient->id,
                   'quantity' => rand(1, 10) . ' units', 
                   'created_at' => now(),
                   'updated_at' => now()
               ]);
           }
       }

    }
}
