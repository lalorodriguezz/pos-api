<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Definimos los campos que se pueden asignar masivamente
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'costo',
        'stock',
    ];

    /**
     * Relación muchos a muchos con el modelo Venta a través de la tabla pivote producto_venta.
     */
    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'producto_venta')
                    ->withPivot('cantidad', 'precio_unitario') // Campos adicionales de la tabla pivote
                    ->withTimestamps(); // Agrega created_at y updated_at
    }
}
