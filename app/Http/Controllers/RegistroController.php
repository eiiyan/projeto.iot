<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\Registro;
use App\Models\Sensor;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
       public function index()
    {
        $registros = Registro::orderBy('id', 'desc')->get();
        return response()->json($registros, 200);
    }
    public function store(RegistroRequest $request)
    {
        $sensor = Sensor::where('codigo', $request->codigo)->first();

        if (!$sensor) {
            return response()->json(['error' => 'sensor não encontrado'], 404);
        }
        $registro = Registro::create([
            'sensor_id' => $sensor->id,
            'valor' => $request->valor,
            'unidade' => $request->unidade,
            'data_hora' => now()
        ]);

        return response()->json([
            'success' => 'registro salvo com sucesso',
            'data' => $registro
        ], 201);
    }
    

}
