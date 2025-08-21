<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{

    public $temperatura;
    public $luminosidade;
    public $umiade;
    public $ultimoRegistro;

    public $labelsTemperatura = [];
    public $dadosTemperatura = [];

    public $labelsSensores = [];
    public $dadosSensores = [];

    public function mount(){
        $this->carregarDados();
    }

    public function carregarDados(){ //popula todas as variáveis de cima(fazer cálculos corretos)

    }
 
    public function render()
    {
        return view('livewire.dashboard');
    }
}
