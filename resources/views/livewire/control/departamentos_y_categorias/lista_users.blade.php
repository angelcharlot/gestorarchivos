<div class="w-full p-5">
    <div class="w-full text-lg text-gray-700 text-center">usuarios agrupados({{ $departamento_select->name }})</div>
    @foreach ($users as $usuario)
        <div class="w-full py-1 text-md ml-5 text-gray-800">

            <input wire:model.defer='array_user' value="{{ $usuario->id }}" type="checkbox"> {{ $usuario->email }}
        </div>
    @endforeach

    <x-jet-button wire:click='vincular_user_dep' class="ml-4 my-2">
        {{ __('Agregar') }}
    </x-jet-button>
</div>
{{-- pruebas************************************************************************ --}}
<div class="w-full p-5">
    <div class="w-full text-lg text-gray-700 text-center">usuarios agrupados({{ $departamento_select->name }})</div>
    <table class="w-full table-auto">
                   <tr>
                <td>usuario</td>
                @foreach ($departamento_select->categorias as $categoria)
                    <td>{{ $categoria->name }}</td>
                @endforeach
            </tr>
        @foreach ($users as $usuario)
            <tr class="">
                <td class="w-full py-1 text-md ml-5 text-gray-800">
                    <input wire:model.defer='array_user' value="{{ $usuario->id }}" type="checkbox">
                    {{ $usuario->email }}
                </td>
                @foreach ($departamento_select->categorias as $categoria)
                    <td><input value="{{ $usuario->id }}" type="checkbox"> </td>
                @endforeach
            </tr>
        @endforeach
    </table>
    <x-jet-button wire:click='vincular_user_dep' class="ml-4 my-2">
        {{ __('Agregar') }}
    </x-jet-button>
</div>
