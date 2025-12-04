<?php

namespace App\Livewire\Auth;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required' => 'O campo e-mail é necessário',
        'email.email' => 'Este email não está no formato correto',
        'password.required' => 'O campo senha é necessário'
    ];

    public function login()
    {

        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
             return redirect('dashboard');
        }
         session()->flash('error', 'Credenciais incorretas');

       
    }

    


    public function render()
    {
        return view('livewire.auth.login');
    }
}
