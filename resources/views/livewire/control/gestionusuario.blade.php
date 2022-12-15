<div>
    <div class=" flex justify-between w-full px-20 mb-5 h-10  ">
        <h1>Gestion de usuario</h1>
        @can('user.create')
        <x-jet-button type="button" class="" wire:click="btnagregar()" class="ml-4 text-xl">
            <i class="bi bi-person-plus"></i>
        </x-jet-button>
        @endcan


    </div>
    <div class=" grid grid-cols-6">

        <div id="formularios" class=" col-span-2">

            @switch($updateMode)
            @case(1)
            @include('livewire.control.usuario.create')
            @break

            @case(2)
            @include('livewire.control.usuario.update')
            @break

            @case(3)
            @include('livewire.control.usuario.roles')
            @break

            @case(4)
            @include('livewire.control.usuario.img')
            @break

            @default
            @endswitch
        </div>
        <div id="listado" class=" col-span-4">
            <div class="w-10/12  mx-auto  ">

                <x-jet-label for="name" value="{{ __('Search') }}" />
                <div class=" inline-flex">
                    <i class="bi bi-search pt-4 pr-1"></i>
                    <x-jet-input wire:model='searchUser' class=" mt-1 w-full" type="text" />
                </div>

            </div>

            <div class="grid grid-cols-4 mt-3  border mb-2 text-xs p-2 border-gray-200 rounded-md w-10/12 mx-auto">
                <div class=" py-2 font-bold text-md text-gray-800 text-left capitalize pl-2  ">nombre</div>
                <div class=" py-2 font-bold text-md text-gray-800 text-left capitalize pl-2  ">email</div>
                <div class=" py-2 font-bold text-md text-gray-800 text-left capitalize pl-2  ">roles</div>
                <div class=" py-2 font-bold text-md text-gray-800 text-left capitalize pl-2  ">acciones</div>


                @foreach ($users->whereNotIn('id','1') as $user)
                <div class=" py-2 font-normal text-xs text-gray-800 text-left capitalize pl-2 ">
                    {{ $user->name }}
                </div>
                <div class=" py-2 font-normal text-xs text-gray-800 text-left capitalize pl-2  ">
                    {{ $user->email }}
                </div>
                <div class=" py-2 font-normal text-xs text-gray-800 text-left capitalize pl-2  ">


                    @foreach ($user->roles()->pluck('name') as $item)
                    {{$item,}}
                    @endforeach

                </div>

                <div class=" py-2 grid grid-cols-3 font-normal text-xl text-gray-800 text-left capitalize pl-2  ">
                    <div>

                        @can('user.delete')
                        <i class="cursor-pointer text-red-500 bi bi-trash3"
                            wire:click="$emit('eliminar',{{ $user->id }})"></i>
                        @else
                        <i class="bi bi-database-lock"></i>
                        @endcan

                    </div>
                    <div>

                        @can('user.update')
                        <i class=" cursor-pointer text-green-500 bi bi-pencil" wire:click="edit('{{ $user->id }}')"></i>

                        @else
                        <i class="bi bi-database-lock"></i>
                        @endcan


                    </div>

                    <div>
                        @can('user.modfi.vista')
                        <i class=" cursor-pointer text-purple-800 bi bi-gear"
                            wire:click="vconfi('{{ $user->id }}')"></i>
                        @else
                        <i class="bi bi-database-lock"></i>
                        @endcan
                    </div>




                </div>
                @endforeach
            </div>

            @if ($users->hasPages())
            <div class="w-10/12  mx-auto ">
                {{ $users->links() }}
            </div>
            @endif

        </div>
    </div>
</div>