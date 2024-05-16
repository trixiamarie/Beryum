<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = [
            ['name' => 'Egg', 'calories' => 155, 'protein' => 13, 'fat' => 11, 'carbohydrates' => 1.1],
            ['name' => 'Chicken', 'calories' => 239, 'protein' => 27, 'fat' => 14, 'carbohydrates' => 0],
            ['name' => 'Beef', 'calories' => 250, 'protein' => 26, 'fat' => 15, 'carbohydrates' => 0],
            ['name' => 'Salmon', 'calories' => 208, 'protein' => 20, 'fat' => 13, 'carbohydrates' => 0],
            ['name' => 'Cod', 'calories' => 82, 'protein' => 18, 'fat' => 0.7, 'carbohydrates' => 0],
            ['name' => 'Whole wheat bread', 'calories' => 247, 'protein' => 13, 'fat' => 2, 'carbohydrates' => 49],
            ['name' => 'White rice', 'calories' => 130, 'protein' => 2.7, 'fat' => 0.3, 'carbohydrates' => 28],
            ['name' => 'Brown rice', 'calories' => 112, 'protein' => 2.6, 'fat' => 0.8, 'carbohydrates' => 24],
            ['name' => 'Quinoa', 'calories' => 120, 'protein' => 4, 'fat' => 1.9, 'carbohydrates' => 21],
            ['name' => 'Avocado', 'calories' => 160, 'protein' => 2, 'fat' => 15, 'carbohydrates' => 9],
            ['name' => 'Lentils', 'calories' => 116, 'protein' => 9, 'fat' => 0.4, 'carbohydrates' => 20],
            ['name' => 'Chickpeas', 'calories' => 164, 'protein' => 9, 'fat' => 2.6, 'carbohydrates' => 27],
            ['name' => 'Black beans', 'calories' => 341, 'protein' => 22, 'fat' => 0.9, 'carbohydrates' => 62],
            ['name' => 'Tofu', 'calories' => 76, 'protein' => 8, 'fat' => 4.8, 'carbohydrates' => 1.9],
            ['name' => 'Almond milk', 'calories' => 15, 'protein' => 0.6, 'fat' => 1.1, 'carbohydrates' => 0.6],
            ['name' => 'Potato', 'calories' => 77, 'protein' => 2, 'fat' => 0.1, 'carbohydrates' => 17],
            ['name' => 'Sweet potato', 'calories' => 86, 'protein' => 1.6, 'fat' => 0.1, 'carbohydrates' => 20],
            ['name' => 'Almonds', 'calories' => 579, 'protein' => 21, 'fat' => 50, 'carbohydrates' => 22],
            ['name' => 'Hazelnuts', 'calories' => 628, 'protein' => 15, 'fat' => 61, 'carbohydrates' => 17],
            ['name' => 'Pistachios', 'calories' => 562, 'protein' => 20, 'fat' => 45, 'carbohydrates' => 28],
        ];
        
        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
        
    }
}
