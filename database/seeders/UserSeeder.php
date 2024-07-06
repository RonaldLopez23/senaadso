<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Crear un administrador
        User::factory()->create([
            'name' => 'Ronald Lopez',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345678'),
            'address' => '123 Admin St, Admin City',
            'rol' => 'admin'
        ]);

        // Crear 10 usuarios
        $users = [
            ['name' => 'Adriana Aranda', 'email' => 'adrianaranda@example.com', 'password' => '12345', 'address' => '456 Maple St, Springfield'],
            ['name' => 'John Bocanegra', 'email' => 'johnbocanegra@example.com', 'password' => '12345', 'address' => '789 Oak St, Springfield'],
            ['name' => 'Carlos Diaz', 'email' => 'carlosdiaz@example.com', 'password' => '12345', 'address' => '123 Pine St, Springfield'],
            ['name' => 'David Mendez', 'email' => 'davidmendez@example.com', 'password' => '12345', 'address' => '456 Cedar St, Springfield'],
            ['name' => 'Eva Perez', 'email' => 'evaperez@example.com', 'password' => '12345', 'address' => '789 Birch St, Springfield'],
            ['name' => 'Francisco Rodriguez', 'email' => 'franciscorodriguez@example.com', 'password' => '12345', 'address' => '123 Elm St, Springfield'],
            ['name' => 'Gloria Marin', 'email' => 'gloriamarin@example.com', 'password' => '12345', 'address' => '456 Walnut St, Springfield'],
            ['name' => 'Hernando Lopez', 'email' => 'hernandolopez@example.com', 'password' => '12345', 'address' => '789 Chestnut St, Springfield'],
            ['name' => 'Ian Joel', 'email' => 'ianjoel@example.com', 'password' => '12345', 'address' => '123 Hickory St, Springfield'],
            ['name' => 'Mariana Morales', 'email' => 'marianamorales@example.com', 'password' => '12345', 'address' => '456 Ash St, Springfield'],
        ];

        foreach ($users as $userData) {
            User::factory()->create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => bcrypt($userData['password']),
                'address' => $userData['address'],
                'rol' => 'user'
            ]);
        }
    }
}
