<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AmbienteIndex extends Component
{
    public $ambiente;
    use WithPagination;


    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    public function render()
    {
        $ambientes = Ambiente::where('nome', 'like', "%{$this->search}%")
            ->orWhere('descricao', 'like', "%{$this->search}%")
            ->orWhere('status', 'like', "%{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.ambiente.ambiente-index', compact('ambientes'));
    }

    public function delete($id)
    {

        
        $ambiente = Ambiente::find($id); 
        $user = User::find($ambiente->user_id); 
        $ambiente->delete(); 
        
        
        session()->flash('message', 'Ambiente deletado com sucesso!');
        
    }

}

}

