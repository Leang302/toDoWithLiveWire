<div wire:key='{{ $todo->id }}' style="border:1px black;">
    <input type="checkbox" @checked($todo->completed)>
    <p>{{ $todo->name }}</p>
    <p>{{ $todo->created_at }}</p>
    <button>Edit</button>
    <button wire:click="delete({{ $todo->id }})">Delete</button>
    <hr>
</div>
