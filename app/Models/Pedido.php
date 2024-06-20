<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'estado', 'user_id'];

    /**
     * Relación con el modelo User.
     * Un pedido pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación con el modelo Producto.
     * Un pedido puede tener muchos productos y un producto puede estar en muchos pedidos.
     */
    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('cantidad', 'precio');
    }
}
