<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear usuario administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@email.co',
            'password' => Hash::make('password123'),
            'rol' => 'admin',
            'address' => 'Dirección de Administrador',
        ]);
        

        // Crear 10 usuarios clientes
        User::factory(10)->create([
            'password' => Hash::make('12345'), 
        ]);
    }
}
