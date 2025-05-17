<?php

namespace App\Http\Controllers;

use App\Models\ProductoVenta;
use Illuminate\Http\Request;

class ProductoVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        $productoVentas = ProductoVenta::with(['producto', 'venta'])->get();
        return response()->json($productoVentas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'venta_id' => 'required|exists:ventas,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric|min:0',
        ]);

        $productoVenta = ProductoVenta::create($request->all());
        return response()->json($productoVenta, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): \Illuminate\Http\JsonResponse
    {
        $productoVenta = ProductoVenta::findOrFail($id);
        $productoVenta->delete();

        return response()->json(null, 204);
    }
}
