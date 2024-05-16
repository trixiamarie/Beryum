<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'content' => $this->faker->paragraphs(3, true), 
            'recipe_id' => Recipe::inRandomOrder()->first()->id,
            'image_url' => $this->faker->optional()->imageUrl(640, 480, 'food'), 
            'parent_post_id' => $this->faker->optional()->randomElement(Post::pluck('id')->toArray()), 
        ];
    }
}
