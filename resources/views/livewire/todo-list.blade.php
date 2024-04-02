<div>
    @include('livewire.includes.add-todo-form')

    <p>Search</p>
    <input wire:model.live.debounce.500ms='search' type="text">
    <hr>
    @foreach ($todos as $todo)
        @include('livewire.includes.todo-list-card')
    @endforeach
</div>
