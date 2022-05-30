<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Login extends Component
{
    public $message;
    public $success;
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function login()
    {

    }
}
