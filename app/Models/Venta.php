<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'total',
        'fecha_venta',
        'metodo_pago',
        'estado',
        'observaciones',
    ];

    /**
     * Relación muchos a uno con el modelo Cliente.
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    /**
     * Relación muchos a muchos con el modelo Producto a través de la tabla pivote producto_venta.
     */
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_venta')
                    ->withPivot('cantidad', 'precio_unitario') // Campos adicionales de la tabla pivote
                    ->withTimestamps(); // Agrega created_at y updated_at
    }
}
