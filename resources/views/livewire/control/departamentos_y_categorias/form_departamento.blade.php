<h1>Agregar Departamentos</h1>
<div class="w-full my-5">
            <form wire:submit.prevent="store_departamento()">
                <x-jet-label for="name" value="{{ __('Nombre del Departamento') }}" />
                <x-jet-input wire:model.defer='name_departamento' class="block mt-1 w-full" type="text" />
                <x-jet-button class="ml-4 my-2">
                    {{ __('Agregar') }}
                </x-jet-button>
            </form>
</div>