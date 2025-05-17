<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cliente;

class VentaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::factory(),
            'total' => $this->faker->randomFloat(2, 10, 1000),
            'fecha_venta' => $this->faker->date(),
            'metodo_pago' => $this->faker->randomElement(['efectivo', 'tarjeta', 'transferencia']),
            'estado' => $this->faker->randomElement(['pendiente', 'completada', 'cancelada']),
            'observaciones' => $this->faker->optional()->sentence(),
        ];
    }
}
