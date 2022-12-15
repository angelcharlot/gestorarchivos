@can('rolyper.crear.rol')
<form wire:submit.prevent="store()">
    <div class="w-5/6 mx-auto border border-gray-200 rounded-lg p-5">
            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input wire:model.defer='rol.name'  class="block mt-1 w-full" type="text"   />
                @error('rol.name')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
                @enderror
            </div>
    
        
            <div class="flex items-center justify-end mt-4">
                
    
                <x-jet-button class="ml-4">
                    {{ __('Agregar') }}
                </x-jet-button>
            </div>
       
    </div>
    </form>
    @else   
    <div class="w-5/6 mx-auto border border-gray-200 rounded-lg h-52 flex items-center p-5">

        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-fill-lock mx-auto" viewBox="0 0 16 16">
            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5v-1a1.9 1.9 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
          </svg>

    </div>

    @endcan