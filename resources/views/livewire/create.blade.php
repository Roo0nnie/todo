<div>

    @if (session()->has('success'))
    <p class="mb-2 text-sm text-green-600 dark:text-green-500"><span class="font-medium"></span>{{ session('success') }}</p>
    @endif

    <form action="">
        <div class="flex gap-2 mb-2">
            <input type="text" wire:model="name" placeholder="Todo" class="block w-full p-4 w-75 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>{{ $message }}</p>
            @enderror
            <button type="submit" wire:click.prevent="create" class="items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create +</button>
        </div>

        @include('livewire.search')
    </form>

        @foreach ($todos as $todo)
            @include('livewire.todos')
        @endforeach
    </form>

   <div class="mt-2">
    {{ $todos->links() }}
   </div>

</div>
