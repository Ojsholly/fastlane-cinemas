<?php

namespace App\Http\Livewire;


use Illuminate\Http\Request;
use Livewire\Component;

class Index extends Component
{
    public $branches;
    public $movies;

    public function mount()
    {
        $movieRequest = Request::create('api/movies');

        $this->movies = data_get(call($movieRequest), 'data');

        $branchRequest = Request::create('api/branches');

        $this->branches = data_get(call($branchRequest), 'data');
    }

    public function render()
    {
        return view('livewire.index');
    }
}
