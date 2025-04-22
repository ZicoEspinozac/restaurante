<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\Request;

class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesa = Mesa::all();
        return response()->json($mesa);
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'numero_mesa' => 'required|integer|unique:mesas,numero_mesa',
            'capacidad' => 'required|integer|min:1',
        ]);
        $mesa = Mesa::create($validatedData);
        return response()->json($mesa, 201);
    }

 
    public function show(string $id)
    {
        $mesa = Mesa::findOrFail($id);
        return response()->json($mesa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'numero_mesa' => 'sometimes|required|integer|unique:mesas,numero_mesa,' . $id,
            'capacidad' => 'sometimes|required|integer|min:1',
        ]);

        $mesa = Mesa::findOrFail($id);
        $mesa->update($validatedData);
        return response()->json($mesa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mesa = Mesa::findOrFail($id);
        $mesa->delete();
        return response()->json(['message' => 'Mesa Eliminada correctamente']);
    }
}
