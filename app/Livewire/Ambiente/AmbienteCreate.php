<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteCreate extends Component
{
 
    public $ambiente_id;
    public $nome;
    public $descricao;
    public $status;
   

    
    public function render()
    {
        
        return view('livewire.ambiente.ambiente-create');
    }

    public function store()
    {
        $this->validate();
        


        Ambiente::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status,
            
        ]);

        session()->flash('success', 'Cadastro realizado com sucesso!');
        return redirect()->route('ambientes.index');

        
    }
   
}
