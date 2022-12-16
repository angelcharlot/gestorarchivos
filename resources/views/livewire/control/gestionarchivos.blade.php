<div class="w-10/12 mx-auto">
    <div class="w-full text-3xl text-center font-bold">Documentos</div>
    <div class=" w-full flex justify-between mb-7 ">
        <h1>Gerstion de archivos y carpetas</h1>
        <div class="grid grid-cols-2 gap-5 text-2xl text-blue-500 ">
            <div><i wire:click="$set('accion','1')"
                    class="bi bi-folder-plus hover:text-white cursor-pointer bg-blue-200 rounded-md px-1 hover:bg-blue-500 border border-blue-400 "></i>
            </div>
            <div><i wire:click="$set('accion','2')"
                    class="bi bi-journal-plus hover:text-white cursor-pointer bg-blue-200 rounded-md px-1 hover:bg-blue-500 border border-blue-400"></i>
            </div>
        </div>
    </div>

   
    <div class="w-full gap-3 grid grid-cols-12 ">
        <div class=" col-span-4  border rounded-md border-gray-200">
            <div class="my-5  h-56 p-5 ">
                @switch($accion)
                    @case(1)
                        @include('livewire.control.archivo.create-archivo')
                    @break

                    @case(2)
                        @include('livewire.control.archivo.create-archivo')
                    @break

                    @default
                        formilarios
                @endswitch

            </div>
        </div>
        <div class=" col-span-8  border rounded-md border-gray-200 ">
            <div class="h-68">
            @if ($vista == 0)
                @include('livewire.control.archivo.vista-cuadro')
            @else
                @include('livewire.control.archivo.vista-lista')
            @endif
            </div>
            <div class=" relative top-0">
                {{$archivoss->links()}}
            </div>
        </div>
        <div class="col-span-6 border rounded-md border-gray-200">
            @if ($vista_permisos==1)
            @include('livewire.control.archivo.vista_permiso_archivo')
            @endif
        </div>

    </div>








</div>
