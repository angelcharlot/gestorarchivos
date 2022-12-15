<form wire:submit.prevent="store()">
<div class="w-5/6 mx-auto">
        <div>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input wire:model.defer='user.name'  class="block mt-1 w-full" type="text"   />
            @error('user.name')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input wire:model.defer='user.email'  class="block mt-1 w-full" type="text"   />
            @error('user.email')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <x-jet-input wire:model.defer='password'  class="block mt-1 w-full" type="password"   />
            @error('password')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-jet-input wire:model.defer='password_confirmation'  class="block mt-1 w-full" type="password"   />
            @error('password_confirmation')
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