<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha' => now(),
            'estado' => 'pendiente', // Puedes definir otros valores por defecto
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            }
        ];
    }
}
