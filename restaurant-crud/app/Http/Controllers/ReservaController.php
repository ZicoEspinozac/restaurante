<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::with(['comensal', 'mesa'])->get();

        return response()->json($reservas);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'comensal_id'         => 'required|exists:comensals,id',
            'mesa_id'             => 'required|exists:mesas,id',
            'fecha_hora_reserva'  => 'required|date',
            'numero_personas'     => 'required|integer|min:1',
        ]);

        $reserva = Reserva::create($validated);

        return response()->json([
            'success' => true,
            'data'    => $reserva,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $reserva = Reserva::findOrFail($id);
        return response()->json($reserva);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'comensal_id'        => 'sometimes|required|exists:comensals,id',
            'mesa_id'            => 'sometimes|required|exists:mesas,id',
            'fecha_hora_reserva' => 'sometimes|required|date',
            'numero_personas'    => 'sometimes|required|integer|min:1',
        ]);

        $reserva = Reserva::findOrFail($id);
        $reserva->update($validatedData);

        return response()->json($reserva);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        return response()->json(['message' => 'Reserva eliminada correctamente']);
    }
}
