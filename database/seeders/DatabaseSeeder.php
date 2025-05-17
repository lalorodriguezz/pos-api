<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductoVenta;
use App\Models\CompraProducto;
use App\Models\Compra;
use App\Models\Producto;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear registros para ProductoVenta
        ProductoVenta::factory()->count(10)->create();

        // Crear registros para CompraProducto
        Compra::factory()
            ->count(10) // Crear 10 compras
            ->hasAttached(
                Producto::factory()->count(3), // Cada compra tendrá 3 productos
                [
                    'cantidad' => fn () => fake()->numberBetween(1, 10),
                    'precio' => fn () => fake()->randomFloat(2, 10, 1000),
                ]
            )
            ->create();
    }
}
