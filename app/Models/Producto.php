<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Los atributos que son asignables en masa
    protected $fillable = [
        'nombre', 
        'descripcion', 
        'precio', 
        'stock', 
        'categoria_id'
    ];

    /**
     * Relación con el modelo Categoria.
     * Un producto pertenece a una categoría.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    /**
     * Relación con el modelo Pedido.
     * Un producto puede pertenecer a muchos pedidos con un campo adicional 'cantidad'.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class)->withPivot('cantidad');
    }
}
