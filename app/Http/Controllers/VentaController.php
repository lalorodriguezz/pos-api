<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('cliente')->get();
        return response()->json($ventas, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'total' => 'required|numeric|min:0',
            'fecha_venta' => 'required|date',
            'metodo_pago' => 'nullable|string|in:efectivo,tarjeta,transferencia',
            'estado' => 'nullable|string|in:pendiente,completada,cancelada',
            'observaciones' => 'nullable|string|max:255',
        ]);

        $venta = Venta::create($request->all());
        return response()->json($venta, 201);
    }

    public function show(string $id)
    {
        $venta = Venta::with('cliente')->find($id);

        if (!$venta) {
            return response()->json(['error' => 'Venta no encontrada'], 404);
        }

        return response()->json($venta, 200);
    }

    public function update(Request $request, string $id)
    {
        $venta = Venta::find($id);

        if (!$venta) {
            return response()->json(['error' => 'Venta no encontrada'], 404);
        }

        $request->validate([
            'cliente_id' => 'sometimes|exists:clientes,id',
            'total' => 'sometimes|numeric|min:0',
            'fecha_venta' => 'sometimes|date',
            'metodo_pago' => 'nullable|string|in:efectivo,tarjeta,transferencia',
            'estado' => 'nullable|string|in:pendiente,completada,cancelada',
            'observaciones' => 'nullable|string|max:255',
        ]);

        $venta->update($request->all());
        return response()->json($venta, 200);
    }

    public function destroy(string $id)
    {
        $venta = Venta::find($id);

        if (!$venta) {
            return response()->json(['error' => 'Venta no encontrada'], 404);
        }

        $venta->delete();
        return response()->json(null, 204);
    }
}
