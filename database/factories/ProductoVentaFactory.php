<?php

namespace Database\Factories;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoVentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'producto_id' => Producto::factory(),
            'venta_id' => Venta::factory(),
            'cantidad' => $this->faker->numberBetween(1, 10),
            'precio' => $this->faker->randomFloat(2, 5, 100),
        ];
    }
}
