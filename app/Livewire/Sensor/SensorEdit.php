<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use Livewire\Component;

class SensorEdit extends Component
{

    public $sensor;
    public $codigo;
    public $tipo;
    public $descricao;
    public $status;
   

     public function mount($id)
    {

        $sensor = Sensor::find($id);
        if($sensor == null){
            session()->flash('error', 'Sensor não encontrado!');
            return redirect()->route('sensores.index'); 
        }

        else{
        $sensor = Sensor::find($id);

        
        $this->codigo = $sensor->codigo;
         $this->tipo = $sensor->tipo;
        $this->descricao = $sensor->descricao;
        $this->status = $sensor->status;
    }
}


   public function update()
    {

        $sensor = Sensor::findOrFail($this->sensor->id);

        if ($sensor) {

            $sensor->codigo = $this->codigo;
            $sensor->tipo = $this->tipo;
            $sensor->descricao = $this->descricao;
            $sensor->status = $this->status;
            $sensor->save();
          
            session()->flash('success', 'Sensor atualizado com sucesso!');
            return redirect()->route('sensores.index');
        }
        session()->flash('notUpdate', 'Sensor não encontrado!');
    }


    public function render()
    {
        
        $ambientes = Ambiente::all();
         return view('livewire.sensor.sensor-edit', compact('ambientes'));
        
    }
}
