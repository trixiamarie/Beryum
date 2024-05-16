<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $userIds = User::pluck('id')->toArray(); 
        return [
            'user_id' => $this->faker->randomElement($userIds),  
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'instructions' => $this->faker->paragraphs($nb = 3, $asText = true),  // Restituisce le istruzioni come testo unico
            'image_url' => "https://www.ricettedalmondo.it/images/foto-ricette/t/32872-tacos-di-carne-ds.jpg" 
        ];
    }
}
