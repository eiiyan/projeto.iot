<?php

namespace App\Livewire\Ambiente;

use App\Models\Ambiente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AmbienteCreate extends Component
{

    public $ambiente_id;
    public $nome;
    public $descricao;
    public $status;
   

     protected $rules = [
        'nome' => 'required|max:80',
        'descricao' => 'required|min:5|max:80',
        'status' => 'required'
       

    ];

    protected $messages = [
        'nome.required'=> 'o campo é obrigatório',
        'nome.max'=> 'o campo requer no máximo 80 caracteres',
        'descricao.required' => 'o campo é obrigatório',
        'descricao.min' => 'o campo requer no mínimo 5 caracteres',
        'descricao.max' =>'o campo requer no máximo 80 caracteres',
       
       
    ];



    public function store()
    {

        $this->validate();
      
        Ambiente::create([
            'ambiente_id' => $this->ambiente_id,
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'status' => $this->status
           
        ]);



        session()->flash('success', 'Cadastro realizado com sucesso!');
        return redirect()->route('ambientes.index');
    }

    public function render()
    {
        return view('livewire.ambiente.ambiente-create');
    }
}
