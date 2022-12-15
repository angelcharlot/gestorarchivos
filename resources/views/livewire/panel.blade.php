<div class="">
    <nav wire:ignore class="sidebar-navigation fixed top-16 left-0 ">
        <ul>
            @can('panel.user')
                <li wire:click="$set('vista',1)" >
                    <i class="bi bi-person-circle"></i>
                    <span class="tooltip">Usuarios</span>
                </li>
            @endcan
            @can('panel.rolyper')
                <li wire:click="$set('vista',2)">
                    <i class="bi bi-list-check"></i>
                    <span class="tooltip">roles y permisos</span>
                </li>
            @endcan
            <li wire:click="$set('vista',3)">
                <i class="bi bi-tags"></i>
                <span class="tooltip">Departamentos y categorias</span>
            </li>
            {{--   <li wire:click="$set('vista',4)">
                <i class="bi bi-printer"></i>
                <span class="tooltip">Fax</span>
            </li>
            <li wire:click="$set('vista',5)">
                <i class="bi bi-sliders"></i>
                <span class="tooltip">Settings</span>
            </li> --}}
        </ul>
    </nav>
    <div class="w-full pl-20  pb-5">
        <div class=" pt-10 h-full">
            @switch($vista)
                @case(1)
                    @livewire('control.gestionusuario')
                @break

                @case(2)
                    @livewire('control.gestionrolpermisos')
                @break

                @case(3)
                @livewire('control.gestionperycat')
                @break

                @case(4)
                    caso 4
                @break

                @case(5)
                    caso 5
                @break

                @default
                    
                        <div class="w-10/12  mx-auto sm:px-6 lg:px-8 p-5">

                            <div class="w-full text-3xl text-center font-bold">
                                Software de gestión documental
                            </div>

                            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                                <div class="grid grid-cols-1 md:grid-cols-2">

                                    <div class="p-5">
                                        <div class="flex-shrink-0 flex items-center">
                                            <div class="w-1/5 rounded-full mx-auto ">
                                                <img class=" rounded-full bg-cover " src="{{ asset('imagenes/adel.jpg') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <div class="p-2 text-justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                            Expedita tempore ad perferendis nostrum natus porro quam repellat, aperiam
                                            laboriosam consequuntur omnis illum sit sint. Ex perspiciatis et voluptate aut
                                            sapiente?</div>
                                    </div>
                                    <div class="p-5">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, dolore error repellat
                                        asperiores alias dolorem doloribus incidunt nesciunt corrupti, praesentium voluptatem
                                        sed consectetur consequatur numquam natus architecto commodi doloremque laudantium.
                                        <div class="flex-shrink-0 flex items-center">
                                            <div class="w-1/5 rounded-full mx-auto ">
                                                <img class=" rounded-full bg-cover " src="{{ asset('imagenes/adel.jpg') }}"
                                                    alt="">
                                            </div>
                                        </div>
                                    </div>




                                </div>
                            </div>


                        </div>
                    
            @endswitch



        </div>


    </div>
</div>
