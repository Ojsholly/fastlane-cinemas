<?php

namespace App\Http\Livewire\Movie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $branches;
    public $branch_ids = [];
    public $title;
    public $description;
    public $poster;
    public $date;
    public $time;
    public $success;

    public $rules = [
        'title' => 'required|min:5|unique:movies,title',
        'description' => 'required|min:10',
        'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'date' => 'required|date|after:yesterday',
        'branch_ids' => 'required|array|min:1',
        'time' => 'required|date_format:H:i',
    ];

    public function mount()
    {
        $branchRequest = Request::create('api/branches',);

        $response = call($branchRequest);

        $this->branches = (data_get($response, 'data'));
    }

    public function render()
    {
        return view('livewire.movie.create')->layout('');
    }

    public function updated($field)
    {
        $this->validateOnly($field, $this->rules);
    }

    public function create()
    {
        $data = $this->validate();

        $poster = $this->poster->storeAs('posters', $this->poster->getClientOriginalName(), 'public');

        $data = array_merge($data, ['poster' => config('app.url') . Storage::url($poster)]);

        $movieRequest = Request::create('api/movies', 'POST', $data);

        $response = call($movieRequest);

        $this->status = data_get($response, 'status');
        $this->message = data_get($response, 'message');

        if ($this->status == 'success') {
            $this->dispatchBrowserEvent('created');
        }
    }
}
