<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Login extends Component
{
    public $message;
    public $status;
    public $email;
    public $password;

    protected $rules = [
      'email' => 'required|email',
      'password' => 'required|string'
    ];

    public function render()
    {
        return view('livewire.login')->layout('');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function login()
    {
        $data = $this->validate();

        $loginRequest = Request::create("api/login", "POST", $data);

        $login = call($loginRequest);

        $this->status = data_get($login, 'status');
        $this->message = data_get($login, 'message');

        if ($this->status == 'success') {
            sleep(3);

            return redirect(route('movies.create'));
        }
    }
}
