<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;

class TodoList extends Component
{
    #[Rule('required')]
    public $name;
    public $search;

    public function create(){
     $validated = $this->validateOnly('name');
        Todo::create($validated);
        $this->reset('name');
        session()->flash('success','saved');
    }
    public function render()
    {
        return view('livewire.todo-list',['todos'=>Todo::latest()->where('name','like',"%{$this->search}%")->get()]);
    }
}
