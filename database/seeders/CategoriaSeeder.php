<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Televisores', 'descripcion' => 'Los mejores Televisores a tu alcance'],
            ['nombre' => 'Computadores', 'descripcion' => 'Los mejores computadores para tu trabajo'],
            ['nombre' => 'Telefonos', 'descripcion' => 'Los mejores celulares para tus aplicaciones'],
            ['nombre' => 'Consolas', 'descripcion' => 'Las mejores Consolas para tus ratos libres'],
        ];

        foreach ($categorias as $categoria) {
            Categoria::create($categoria);
        }
    }
}
