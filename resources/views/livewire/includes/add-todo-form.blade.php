<div>
    <h2>Todo list</h2>
    <h4>+Todo</h4>

    <form action="">
        <input type="text" wire:model='name'>
        @error('name')
            {{ $message }}
        @enderror
        <button type="submit" wire:click.prevent='create'>Add</button>
        @session('success')
            {{ session('success') }}
        @endsession
    </form>

</div>
