<?php

namespace App\Http\Controllers;

use App\Models\Comensal;
use Illuminate\Http\Request;

class ComensalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comensals = Comensal::all();
        return response()->json($comensals);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:comensals,correo',
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:255',
        ]);

        $comensal = Comensal::create($validatedData);
        return response()->json($comensal, 201);
    }

    public function show(string $id)
    {
        $comensal = Comensal::findOrFail($id);
        return response()->json($comensal);
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'correo' => 'sometimes|required|email|unique:comensals,correo,' . $id,
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:255',
        ]);

        $comensal = Comensal::findOrFail($id);
        $comensal->update($validatedData);
        return response()->json($comensal);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comensal = Comensal::findOrFail($id);
        $comensal->delete();
        return response()->json(['message' => 'Comensal eliminado correctamente']);
    }
}