<?php

namespace App\Livewire\Sensor;

use App\Models\Ambiente;
use App\Models\Sensor;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SensorStatus extends Component
{

    public $sensor;
    use WithPagination;


    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    public function render()
    {
        $sensores = Sensor::where('codigo', 'like', "%{$this->search}%")
            ->orWhere('tipo', 'like', "%{$this->search}%")
            ->orWhere('status', 'like', "%{$this->search}%")
            ->paginate($this->perPage);
            $ambiente = Ambiente::all();

        return view('livewire.sensor.sensor-status', compact('sensores'));
    }

    public function delete($id)
    {

        
        $sensor = Sensor::find($id); 
        $user = User::find($sensor->user_id); 
        $sensor->delete(); 
        
        
        session()->flash('message', 'Sensor deletado com sucesso!');
        
    }
    
   
    public function toggleStatus($sensorId)
    {
        
        $sensor = Sensor::findOrFail($sensorId); 
        $sensor->status = $sensor->status ? 0 : 1; 
        $sensor->save();

        
    }
   
 
}