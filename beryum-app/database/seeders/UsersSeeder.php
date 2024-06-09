<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'lastname' => 'Admin',
            'city' => 'Texas',
            'dateofbirth' => Carbon::createFromFormat('d/m/Y', '28/12/2000')->format('Y-m-d'),
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), 
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Trixia Marie',
            'username' => 'trixialorenzana',
            'lastname' => 'Lorenzana',
            'city' => 'Milano',
            'dateofbirth' => Carbon::createFromFormat('d/m/Y', '05/01/1998')->format('Y-m-d'),
            'email' => 'trixialorenzana@gmail.com',
            'password' => Hash::make('password'), 
            'role_id' => 1,
            'avatar'=> 'images/trixiadeveloper.png',
            'cover' => 'images/cover.jpg'
        ]);
        
        // Creazione dell'utente User
        User::create([
            'name' => 'User',
            'username' => 'useradmin',
            'lastname' => 'Admin',
            'city' => 'Texas',
            'dateofbirth' => Carbon::createFromFormat('d/m/Y', '28/12/2000')->format('Y-m-d'),
            'email' => 'user@example.com',
            'password' => Hash::make('password'), 
            'role_id' => 2,
        ]);

        //Mama Eden
        User::create([
            'name' => 'Eden',
            'username' => 'mamaeden',
            'lastname' => 'Garcia',
            'city' => 'Milano',
            'dateofbirth' => Carbon::createFromFormat('d/m/Y', '28/12/1969')->format('Y-m-d'),
            'email' => 'mamaeden@example.com',
            'password' => Hash::make('password'), 
            'role_id' => 2,
            'avatar'=> 'images/mamaeden.jpg',
        ]);

        //Grandma Pina
        User::create([
            'name' => 'Josephina',
            'username' => 'lolapina',
            'lastname' => 'Garcia',
            'city' => 'Milano',
            'dateofbirth' => Carbon::createFromFormat('d/m/Y', '21/04/1934')->format('Y-m-d'),
            'email' => 'lolapina@example.com',
            'password' => Hash::make('password'), 
            'role_id' => 2,
            'avatar'=> 'images/lolapina.jpg',
        ]);

       
    }
}
