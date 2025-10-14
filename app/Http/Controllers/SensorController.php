<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function show(Request $request)
    {
        $sensor = Sensor::where('codigo', $request->codigo)->first();

        if (!$sensor) {
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }

        return response()->json([
            'success' => 'sensor encontrado!',
            'status' => $sensor->status
        ], 201);
    }

    public function update(Request $request)
    {
        $sensor = Sensor::where('codigo', $request->codigo)->first();

        if (!$sensor) {
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }

        $sensor->update([
            'status' => $request->status,

        ]);


        return response()->json([
            'success' => 'sensor atualizado!',
            'status' => $sensor->status,
            'message' => 'Novo status: ' . $sensor->status
        ], 201);
    }




}
