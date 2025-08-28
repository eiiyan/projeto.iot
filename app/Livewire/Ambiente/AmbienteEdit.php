<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use Livewire\Component;

class AmbienteEdit extends Component
{

    public $ambiente_id;
    public $nome;
    public $descricao;
    public $status;
   

 public function mount($id)
    {

        $ambiente = Ambiente::find($id);
        if($ambiente == null){
            session()->flash('error', 'Ambiente não encontrado!');
            return redirect()->route('ambientes.index'); 
        }

        else{
        $ambiente = Ambiente::find($id);

        $this->ambiente_id = $ambiente->id;
        $this->nome = $ambiente->nome;
        $this->descricao = $ambiente->descricao;
        $this->status = $ambiente->status;
    }
}



   public function update()
    {



        $ambiente = Ambiente::find($this->ambiente_id);

        if ($ambiente) {

            $ambiente->nome = $this->nome;
            $ambiente->descricao = $this->descricao;
            $ambiente->status = $this->status;
            $ambiente->save();
          
            session()->flash('success', 'Ambiente atualizado com sucesso!');
            return redirect()->route('ambientes.index');
        }
        session()->flash('notUpdate', 'Ambiente não encontrado!');
    }



  //validacao protected messages

    public function render()
    {
        return view('livewire.ambiente.ambiente-edit');
    }
}
