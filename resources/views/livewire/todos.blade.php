<div wire:key="{{ $todo->id }}" class="block w-full-sm border mt-2 p-6 bg-white border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:bg-gray-700">

    @if ( $editID === $todo->id)

    <input class="w-full block p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="text" wire:model="editName">
    @error('editName')
    <p class="mb-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>{{ $message }}</p>
    @enderror
    <div class="flex items-center space-x-2 mt-2">
        <button class="block" wire:click="update({{ $todo->id }})"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
          </svg>
          </button>
        <button class="block" wire:click="cancel({{ $todo->id }})"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/>
          </svg>
          </button>
    </div>

    @else

    <div class="">
        @if ($todo->status)
        <div class="flex items-center space-x-2">
            <input type="checkbox" wire:click="toggle({{ $todo->id }})" checked>
            <p class="text-sm font-medium text-gray-900 line-through dark:text-white">{{ $todo->name }}</p>
        </div>
        @else
        <div class="flex items-center space-x-2">
            <input type="checkbox" wire:click="toggle({{ $todo->id }})">
            <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $todo->name }}</p>
        </div>
        @endif

        <button wire:click="edit({{ $todo->id }})"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
          </svg>
          </button>
        <button wire:click="delete({{ $todo->id }})"><svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
          </svg>
          </button>
    </div>
    @endif


</div>

