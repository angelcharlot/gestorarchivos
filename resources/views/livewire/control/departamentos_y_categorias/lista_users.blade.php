<div class="w-full p-5">
    <div class="w-full text-lg text-gray-700 text-center">usuarios agrupados({{ $departamento_select->name }})</div>
    <div class="w-full py-1 text-md ml-5 text-gray-800">
    <input wire:model='todosUserDepartamento' value="todo" type="checkbox"> seleccionar Todos
    </div>
    @foreach ($userss as $usuario)
        <div class="w-full py-1 text-md ml-5 text-gray-800">

            <input wire:model.defer='array_user' value="{{ $usuario->id }}" type="checkbox"> {{ $usuario->email }}
        </div>
    @endforeach

    <x-jet-button wire:click='vincular_user_dep' class="ml-4 my-2">
        {{ __('Agregar') }}
    </x-jet-button>
</div>
{{$userss->links()}}

