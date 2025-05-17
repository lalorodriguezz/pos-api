<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    protected $model = \App\Models\Proveedor::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->company(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->phoneNumber(),
            'contacto' => $this->faker->name(),
        ];
    }
}
