<div class="mx-auto w-10/12">

    <div class=" flex justify-between w-full px-20 mb-5 h-10  ">
        <h1>
            <i class="bi bi-person-lines-fill mr-2"></i> Gestion de roles y permisos
        </h1>
        {{--         <x-jet-button type="button" class=""  class="ml-4 text-md">
         nuevo rol 
        </x-jet-button> --}}
    </div>
    <div class=" grid grid-cols-6 ">
        <div class=" col-span-2">

            @include('livewire.control.roles.create_rol')

        </div>
        <div class=" col-span-4 ">
            <div class="grid grid-cols-2 gap-5">
                <div class=" min-h-56 p-5 border border-gray-200 rounded-xl">
                    @foreach ($allroles as $rol)
                        <div class="w-full h-8 p-2 rounded-2xl my-2 ">
                             @can('rolyper.eliminar.rol') 
                            <div wire:click="$emit('eliminar_rol','{{$rol->id}}')" class="cursor-pointer inline-block py-1 px-1 text-red-900 hover:bg-red-100 bg-red-200 rounded-md border border-red-200 ">
                                 <i class="bi bi-trash3"></i>
                            </div>
                            @else
                            <div  class=" inline-block py-1 px-1 rounded-md border border-gray-200 ">
                                <i class="bi bi-arrow-right"></i>
                           </div>
                            @endcan
                            
                            <div wire:click="edit('{{$rol->id}}')" 
                            class=" inline-block capitalize cursor-pointer ">{{ $rol->name }}</div>
                            <div class=" inline-block "><i class="bi bi-chevron-double-right"></i></div>


                        </div>
                    @endforeach
                </div>
                @if ($rol_select->name)
                <div class=" min-h-56 p-5 border border-gray-200 rounded-xl">
                    <div class="w-full text-2xl text-center text-gray-800" >
                        @if ($rol_select)
                        {{$rol_select->name}}
                       @endif
                    </div>
                   

                    @foreach ($allpermisos->pluck('seccion')->unique() as $key => $permisoss)
                   
                     <div class=" col-span-2 text-left font-extrabold border-b border-gray-200   ">{{$permisoss}}
                    </div>
                    @foreach ($allpermisos->where('seccion','=',$permisoss) as $permiso)
                        <div class="capitalize w-full h-8 p-2 rounded-2xl my-2 bg-blue-200 text-blue-900">
                            {{ $permiso->descrip }} 
                            @can('rolyper.asig.permiso')
                            <input wire:model='select_permisos' value="{{ $permiso->id }}" type="checkbox">
                            @else
                            <input wire:model='select_permisos' value="{{ $permiso->id }}" type="checkbox" disabled>
                            @endcan
                        </div>
                        @endforeach 
                   
                   
                    @endforeach     

                   

                    @can('rolyper.asig.permiso')
                    <x-jet-button class="mt-5 mx-auto" wire:click='actualizapermisos'>
                        {{ __('Actualizar') }}
                    </x-jet-button>
                    @endcan

                </div>
                @endif
            </div>

        </div>
    </div>



</div>
