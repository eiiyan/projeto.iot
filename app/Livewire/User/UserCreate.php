<?php

namespace App\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserCreate extends Component
{

    public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|max:80',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:5',


    ];

    protected $messages = [
        'name.required' => 'O campo nome é obrigatório',
        'name.max' => 'O limite maxímo de caracteres foi atingido',
        'email.required' => 'O campo email é obrigatório',
        'email.unique' => 'Este endereço de email já está cadastrado',
        'password.required' => 'O campo senha é obrigatório',
        'password.min' => 'O campo senha requer no mínimo 5 caracteres',
    ];


    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Usuário cadastrado com sucesso!');
        return redirect()->route('usuarios.index');
    }
    public function render()
    {
        return view('livewire.user.user-create');
    }
}
