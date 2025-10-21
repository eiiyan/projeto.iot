<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function visualizar(Request $request)
    {
        $sensor = Sensor::where('codigo', $request->codigo)->first();

        if (!$sensor) {
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }

        return $sensor->status;
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

    public function listar(Request $request)
    {
        $sensor = Sensor::all('codigo', 'tipo', 'status');

        return response()->json([
            'message' => "sensores encontrados!",
            'data' => $sensor
        ]);
    }

}
