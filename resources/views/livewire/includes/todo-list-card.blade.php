<div wire:key='{{ $todo->id }}' style="border:1px black;">
    <p>{{ $todo->name }}</p>
    <p>{{ $todo->created_at }}</p>
    <button>Edit</button>
    <button>Delete</button>
</div>
