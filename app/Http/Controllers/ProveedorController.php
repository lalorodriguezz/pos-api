<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Proveedor::all());
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:proveedor,email',
            'telefono' => 'nullable|string|max:15',
            'contacto' => 'nullable|string|max:255',
        ]);

        $proveedor = Proveedor::create($request->all());

        return response()->json($proveedor, 201);
    }

    public function show(string $id): \Illuminate\Http\JsonResponse
    {
        $proveedor = Proveedor::find($id);

        if (!$proveedor) {
            return response()->json(['error' => 'Proveedor no encontrado'], 404);
        }

        return response()->json($proveedor);
    }

    public function update(Request $request, Proveedor $proveedor): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:proveedor,email,' . $proveedor->id,
            'telefono' => 'nullable|string|max:15',
            'contacto' => 'nullable|string|max:255',
        ]);

        $proveedor->update($request->all());

        return response()->json($proveedor, 200);
    }

    public function destroy(Proveedor $proveedor): \Illuminate\Http\JsonResponse
    {
        try {
            $proveedor->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json(['error' => 'No se pudo eliminar el proveedor'], 500);
        }
    }
}
