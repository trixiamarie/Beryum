<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesSeeder::class);  
        $this->call(UsersSeeder::class);  
        $this->call(RecipesSeeder::class); 
        $this->call(PostsSeeder::class); 
        $this->call(IngredientsSeeder::class);
        $this->call(RecipesIngredientsSeeder::class);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
