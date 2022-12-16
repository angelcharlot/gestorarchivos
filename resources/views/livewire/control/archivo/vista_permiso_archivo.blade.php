<div class="w-full p-5">
    <div class="w-full text-lg text-gray-800 text-center">compartir {{ $archivo_select->name }} con:</div>
    <select wire:change='cargar_usuario' wire:model='tipo_de_permiso' class="form-select w-full my-2 ">
        <option value="usuarios" selected>Usuario directo</option>
        <option value="departamentos">Departamento</option>
        <option value="categorias">Categoria</option>

    </select>

    <div class="">
        @if ($usuarios_para_compartir->count() > 0)
        
            <table class=" table-auto w-full">
                
                <tr>
                    <td>#</td>
                    <td><i class="bi bi-people-fill"></i></td>
                    <td><i class="bi bi-trash3"></i></td>
                    <td><i class="bi bi-pencil"></i></td>
                </tr>
              
                @foreach ($usuarios_para_compartirr as $key => $usuario)
                
                    <tr>
                        <td><input type="checkbox" wire:model='lista_de_usuario.{{ $key }}.user'
                                value="{{$usuario->id}}"></td>
                        <td> {{ $usuario->email }}{{ $usuario->id }}</td>
                        <td><input type="checkbox" wire:model='lista_de_usuario.{{ $key }}.p_delete'
                                value="{{ $archivo_select->p_delete }}"></td>
                        <td><input type="checkbox" wire:model='lista_de_usuario.{{ $key }}.p_update'
                                value="{{ $archivo_select->p_update }}"></td>
                    </tr>
                @endforeach
            </table>
            {{ $usuarios_para_compartirr->links() }}
        @else
            <x-jet-input type="text" class="w-full " wire:model='usuario_unico' />
            <div>
                <div><input type="checkbox" wire:model='permisos_de_archivo' value="{{ $archivo_select->p_update }}">
                    Actualizar</div>
                <div><input type="checkbox" wire:model='permisos_de_archivo' value="{{ $archivo_select->p_delete }}">
                    Eliminar</div>
            </div>
        @endif

    </div>

    <x-jet-button wire:click='btn_compartir' class="mt-5">
        compartir
    </x-jet-button>
</div>
