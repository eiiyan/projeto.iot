<?php

namespace App\Livewire\Registro;

use App\Models\Registro;
use Livewire\Component;
use Livewire\WithPagination;

class RegistroIndex extends Component
{


    public $registro;
    use WithPagination;


    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    public function render()
    {
        $registros = Registro::where('sensor_id', 'like', "%{$this->search}%")
            ->orWhere('valor', 'like', "%{$this->search}%")
            ->orWhere('unidade', 'like', "%{$this->search}%")
            ->orWhere('data_hora', 'like', "%{$this->search}%")
            ->orderByDesc('id', 'sensor_id', 'valor', 'unidade', 'data_hora')
            ->paginate($this->perPage);


        return view('livewire.registro.registro-index', compact('registros'));
    }

    public function delete($id)
    {
        $registro = Registro::find($id);
        $registro->delete();


        session()->flash('message', 'Registro deletado com sucesso!');
    }
}
