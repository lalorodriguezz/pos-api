<?php


use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoVentaController;


use Illuminate\Support\Facades\Route;






/* solo operaciones de obtener, crear y eliminar relaciones
Route::get('/compra-producto', [CompraProductoController::class, 'index']); // Obtener todas las relaciones
Route::post('/compra-producto', [CompraProductoController::class, 'store']); // Crear una nueva relación
Route::delete('/compra-producto/{id}', [CompraProductoController::class, 'destroy']); // Eliminar una relación */



// definir las rutas para la autenticación
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);


//Cerrar sesión
    Route::post('/logout', [AuthController::class, 'logout']);


// definir las rutas para  productos


// otras rutas 


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/producto-venta', [ProductoVentaController::class, 'index']); // Obtener todas las relaciones
    Route::post('/producto-venta', [ProductoVentaController::class, 'store']); // Crear una nueva relación
    Route::delete('/producto-venta/{id}', [ProductoVentaController::class, 'destroy']); // Eliminar una relación
    Route::apiResource(name: '/proveedor', controller: ProveedorController::class);
    Route::apiResource(name: '/productos', controller: ProductoController::class);

    Route::apiResource(name: '/cliente', controller: ClienteController::class);
    Route::apiResource(name: '/venta', controller: VentaController::class);
    Route::apiResource(name: '/compra', controller: CompraController::class);
});