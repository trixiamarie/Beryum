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
            ['name' => 'React', 'calories' => 155, 'protein' => 13, 'fat' => 11, 'carbohydrates' => 1.1], //1
            ['name' => 'HTML', 'calories' => 239, 'protein' => 27, 'fat' => 14, 'carbohydrates' => 0], //2
            ['name' => 'CSS', 'calories' => 250, 'protein' => 26, 'fat' => 15, 'carbohydrates' => 0], //3
            ['name' => 'Javascript', 'calories' => 208, 'protein' => 20, 'fat' => 13, 'carbohydrates' => 0],//4
            ['name' => 'Bootstrap', 'calories' => 82, 'protein' => 18, 'fat' => 0.7, 'carbohydrates' => 0],//5
            ['name' => 'Laravel', 'calories' => 247, 'protein' => 13, 'fat' => 2, 'carbohydrates' => 49],//6
            ['name' => 'MySQL', 'calories' => 130, 'protein' => 2.7, 'fat' => 0.3, 'carbohydrates' => 28],//7
            ['name' => 'SASS', 'calories' => 112, 'protein' => 2.6, 'fat' => 0.8, 'carbohydrates' => 24],//8
            ['name' => 'Tailwind', 'calories' => 120, 'protein' => 4, 'fat' => 1.9, 'carbohydrates' => 21],//9
            ['name' => 'Patience', 'calories' => 160, 'protein' => 2, 'fat' => 15, 'carbohydrates' => 9],//10
            ['name' => 'Team Work', 'calories' => 116, 'protein' => 9, 'fat' => 0.4, 'carbohydrates' => 20],//11
            ['name' => 'Love', 'calories' => 164, 'protein' => 9, 'fat' => 2.6, 'carbohydrates' => 27],//12
            ['name' => 'Sleep Deprivation', 'calories' => 341, 'protein' => 22, 'fat' => 0.9, 'carbohydrates' => 62],//13
            ['name' => 'Fun', 'calories' => 76, 'protein' => 8, 'fat' => 4.8, 'carbohydrates' => 1.9],//14
            ['name' => 'Proactiveness', 'calories' => 15, 'protein' => 0.6, 'fat' => 1.1, 'carbohydrates' => 0.6],//15
            ['name' => 'Wordpress', 'calories' => 77, 'protein' => 2, 'fat' => 0.1, 'carbohydrates' => 17],//16
            ['name' => 'Redux', 'calories' => 86, 'protein' => 1.6, 'fat' => 0.1, 'carbohydrates' => 20],//17
            ['name' => 'PHP', 'calories' => 579, 'protein' => 21, 'fat' => 50, 'carbohydrates' => 22],//18
            ['name' => 'Attention to detail', 'calories' => 628, 'protein' => 15, 'fat' => 61, 'carbohydrates' => 17],//19
            ['name' => 'Pistachios', 'calories' => 562, 'protein' => 20, 'fat' => 45, 'carbohydrates' => 28],//20
        ];
        
        foreach ($ingredients as $ingredient) {
            Ingredient::create($ingredient);
        }
        
    }
}
