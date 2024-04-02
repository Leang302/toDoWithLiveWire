<div wire:key='{{ $todo->id }}' style="border:1px black;">
    <input type="checkbox" @checked($todo->completed) wire:click="toggle({{ $todo->id }})">

    @if($editingId===$todo->id)
    <br>
       <input wire:model='editingName' type="text" value="{{ $todo->name }}">
    @else
    <p>{{ $todo->name }}</p>
    @endif
    <p>{{ $todo->created_at }}</p>

    @if($editingId===$todo->id)
    <button wire:click="update">Update</button>
    <button wire:click='cancel'>Cancel</button>
    @else
    <button wire:click="edit({{ $todo->id }})">Edit</button>
    <button wire:click="delete({{ $todo->id }})">Delete</button>
    @endif
    <hr>
</div>
