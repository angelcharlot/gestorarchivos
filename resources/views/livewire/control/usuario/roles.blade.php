<div class="w-5/6 mx-auto">

    <div class="w-full text-center font-bold text-lg">{{ $user->name }}({{ $user->email }})</div>
    <table class=" table w-full">
        <tr class=" bg-gray-50 border-b table-row border-gray-300">
            <td class="h-19 table-cell p-5 ">Rol</td>
            <td class="h-19 table-cell p-5">Asignar</td>

        </tr>
        @foreach ($rolesall->whereNotin('id', '1') as $key => $rol)
            <tr class="">
                <td class="py-2">
                    {{ $rol->name }}
                </td>
                <td class="py-2">
                    @can('user.asignar.roles')
                        <input wire:model.defer='select_rols' value="{{ $rol->id }}" type="checkbox">
                    @else
                        <input wire:model.defer='select_rols' value="{{ $rol->id }}" type="checkbox" disabled>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>
    <div class="w-full  flex-row items-end">
        @can('user.asignar.roles')
            <x-jet-button class="mt-5" wire:click='actualizarroles'>
                {{ __('Actualizar') }}
            </x-jet-button>
        @endcan

    </div>
    <div class="my-5 text-sm p-3 text-teal-900">
        <div class="w-full text-center text-lg font-extrabold"><i class="bi bi-list-check"></i> permisos via roles</div>
        <div class="ml-2 w-full py-2">
            
                @foreach ($user->getPermissionsViaRoles()->pluck('seccion')->unique() as $seccion)
                    <div class="text-left font-extrabold border-b border-gray-200   ">{{$seccion}}
                    </div>
                    @foreach ($user->getPermissionsViaRoles()->unique('id')->where('seccion', '=', $seccion) as $item)
                        <div class="py-2 pl-5"><i class="bi bi-person-check-fill"></i> {{ $item->descrip }}</div>
                        @endforeach
                        @endforeach
               

            

        </div>


    </div>
    <div class="my-5 text-sm p-3 text-teal-900">
        <div class="w-full text-center text-lg font-extrabold"><i class="bi bi-list-check"></i> permisos directos</div>
        <div class="ml-2 w-full py-2">
            

                @foreach ($permisosdirectos->pluck('seccion')->unique() as $seccion)
                    <div class="  text-left font-extrabold border-b border-gray-200   ">{{ $seccion }}
                    </div>
                    @foreach ($permisosdirectos->where('seccion', '=', $seccion) as $item)
                        <div class="py-2 pl-5"><i class="bi bi-person-check-fill"></i> {{ $item->descrip }}
                            @can('user.asifnar.permisos')
                                <input wire:model.defer='select_permisos' value="{{ $item->id }}" type="checkbox">
                            @else
                                <input wire:model.defer='select_permisos' value="{{ $item->id }}" type="checkbox"
                                    disabled>
                            @endcan
                        </div>
                    @endforeach
                @endforeach


            

        </div>


    </div>
    @can('user.asifnar.permisos')
        <x-jet-button class="mt-5" wire:click='actualizapermisos'>
            {{ __('Actualizar') }}
        </x-jet-button>
    @endcan


</div>
