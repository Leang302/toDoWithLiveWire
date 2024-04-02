<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
class TodoList extends Component
{
    use WithPagination;
    #[Rule('required')]
    public $name;
    public $search;

    #[Rule('required')]
    public $editingName;
    public $editingId;

    public function delete($todoId){
      try{
        Todo::findOrFail($todoId)->delete();
      }catch(Exception $e){
        session()->flash('error','Failed');
        return;
      }
    }
    public function create(){
     $validated = $this->validateOnly('name');
        Todo::create($validated);
        $this->reset('name');
        session()->flash('success','saved');
        $this->resetPage();
    }
    public function toggle($todoId){
        $todo = Todo::find($todoId);
        $todo->completed = !$todo->completed;
        $todo->save();
    }
    public function edit($todoId){
        // $this->validateOnly(['name']);
    $this->editingId= Todo::find($todoId)->id;
        $this->editingName= Todo::find($todoId)->name;
    }
    public function update(){
        $this->validateOnly('editingName');
        Todo::find($this->editingId)->update([
            'name'=>$this->editingName
        ]);

        $this->cancel();
        session()->flash('success','The task has been updated successfully');
    }
    public function cancel(){
        $this->reset(['editingName','editingId']);
    }
    public function render()
    {
        return view('livewire.todo-list',['todos'=>Todo::latest()->where('name','like',"%{$this->search}%")->paginate(5)]);
    }
}
