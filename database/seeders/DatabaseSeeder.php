<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // \App\Models\User::factory(10)->create();
         $this->call(CategoriaSeeder::class);
         
        // Llama al UserSeeder para poblar la base de datos con los usuarios especificados
        $this->call(UserSeeder::class);
       
         
    }

    
}
