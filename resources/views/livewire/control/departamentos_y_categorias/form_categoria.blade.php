<h1>Agregar categoria a departamento {{$departamento_select->name}} </h1>
<div class="w-full my-5">
    <form wire:submit.prevent="store_categoria()">
        <x-jet-label for="name" value="{{ __('nombre de la categoria') }}" />
        <x-jet-input wire:model.defer='name_categoria' class="block mt-1 w-full" type="text" />
        <x-jet-button class="ml-4 my-2">
            {{ __('Agregar') }}
        </x-jet-button>
    </form>
</div>