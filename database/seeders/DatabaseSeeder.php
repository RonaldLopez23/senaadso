<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear un usuario administrador
        User::factory()->create([
            'name' => 'Administrador del sistema',
            'email' => 'admin@email.co',
            'rol' => 'admin'
        ]);

        // Crear 10 usuarios clientes
        User::factory(10)->create();
    }
}
