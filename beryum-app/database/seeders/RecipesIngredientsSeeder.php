<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
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
       
        $recipeIngredients = [
            ['recipe_id' => 1, 'ingredient_id' => 4],
            ['recipe_id' => 1, 'ingredient_id' => 2],
            ['recipe_id' => 1, 'ingredient_id' => 3],
            ['recipe_id' => 1, 'ingredient_id' => 10],
            ['recipe_id' => 1, 'ingredient_id' => 11],
            ['recipe_id' => 1, 'ingredient_id' => 12],
            ['recipe_id' => 1, 'ingredient_id' => 14],
            ['recipe_id' => 2, 'ingredient_id' => 3],
            ['recipe_id' => 2, 'ingredient_id' => 2],
            ['recipe_id' => 2, 'ingredient_id' => 4],
            ['recipe_id' => 2, 'ingredient_id' => 5],
            ['recipe_id' => 2, 'ingredient_id' => 10],
            ['recipe_id' => 2, 'ingredient_id' => 11],
            ['recipe_id' => 2, 'ingredient_id' => 12],
            ['recipe_id' => 2, 'ingredient_id' => 13],
            ['recipe_id' => 2, 'ingredient_id' => 14],
            ['recipe_id' => 2, 'ingredient_id' => 19],
            ['recipe_id' => 2, 'ingredient_id' => 20],
            ['recipe_id' => 3, 'ingredient_id' => 1],
            ['recipe_id' => 3, 'ingredient_id' => 2],
            ['recipe_id' => 3, 'ingredient_id' => 3],
            ['recipe_id' => 3, 'ingredient_id' => 4],
            ['recipe_id' => 3, 'ingredient_id' => 5],
            ['recipe_id' => 3, 'ingredient_id' => 10],
            ['recipe_id' => 3, 'ingredient_id' => 11],
            ['recipe_id' => 3, 'ingredient_id' => 12],
            ['recipe_id' => 3, 'ingredient_id' => 14],
            ['recipe_id' => 3, 'ingredient_id' => 15],
            ['recipe_id' => 3, 'ingredient_id' => 17],
            ['recipe_id' => 3, 'ingredient_id' => 19],
            ['recipe_id' => 3, 'ingredient_id' => 20],
            ['recipe_id' => 4, 'ingredient_id' => 2],
            ['recipe_id' => 4, 'ingredient_id' => 3],
            ['recipe_id' => 4, 'ingredient_id' => 5],
            ['recipe_id' => 4, 'ingredient_id' => 16],
            ['recipe_id' => 4, 'ingredient_id' => 18],
            ['recipe_id' => 4, 'ingredient_id' => 11],
            ['recipe_id' => 4, 'ingredient_id' => 12],
            ['recipe_id' => 5, 'ingredient_id' => 6],
            ['recipe_id' => 5, 'ingredient_id' => 2],
            ['recipe_id' => 5, 'ingredient_id' => 3],
            ['recipe_id' => 5, 'ingredient_id' => 5],
            ['recipe_id' => 5, 'ingredient_id' => 7],
            ['recipe_id' => 5, 'ingredient_id' => 9],
            ['recipe_id' => 5, 'ingredient_id' => 18],
            ['recipe_id' => 5, 'ingredient_id' => 10],
            ['recipe_id' => 5, 'ingredient_id' => 11],
            ['recipe_id' => 5, 'ingredient_id' => 19],
            ['recipe_id' => 5, 'ingredient_id' => 12],
            ['recipe_id' => 5, 'ingredient_id' => 20],
        ];
        
        foreach ($recipeIngredients as $ingredient) {
            RecipeIngredient::create([
                'recipe_id' => $ingredient['recipe_id'],
                'ingredient_id' => $ingredient['ingredient_id'],
                'quantity' => 1,
            ]);
        }
        

    }
}
