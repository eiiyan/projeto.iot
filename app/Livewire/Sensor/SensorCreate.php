<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorCreate extends Component
{

    public $ambiente;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;

  protected $rules = [
        'codigo' => 'required',
        'tipo' => 'required|min:5|max:80',
        'status' => 'required'
       

    ];

    protected $messages = [
        'codigo.required'=> 'o campo é obrigatório',
        'tipo.required' => 'O campo é obrigatório',
        'tipo.min'=> 'o campo requer no máximo 80 caracteres',
        'tipo.max'=> 'o campo requer no máximo 80 caracteres',
        'status.required' => 'o campo é obrigatório',
       
    ];


    public function store()
    {

        $this->validate();

        Sensor::create([
            'ambiente_id' => $this->ambiente,
            'tipo' => $this->tipo,
            'codigo' => $this->codigo,
            'descricao' => $this->descricao,
            'status' => $this->status

        ]);


        session()->flash('success', 'Sensor cadastrado realizado com sucesso!');
        return redirect()->route('sensores.index');
    }

    public function render()
    {
        $ambientes = Ambiente::all();
        return view('livewire.sensor.sensor-create', compact('ambientes'));
    }
}
