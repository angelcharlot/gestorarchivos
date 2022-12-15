<div class="mb-10">
    <div class="mx-auto w-10/12">
        <div class=" text-3xl text-center text-gray-800 w-full font-extrabold">Departamentos y categorias</div>
        <div class=" w-full flex justify-between mb-7 mt-5 ">

        </div>
        @switch($formulario)
            @case(1)
                @include('livewire.control.departamentos_y_categorias.form_departamento')
            @break

            @case(2)
                @include('livewire.control.departamentos_y_categorias.form_categoria')
            @break

            @default
        @endswitch
        <div class=" grid grid-cols-2 gap-3">
            <div class=" w-full border border-gray-200">
                <div class="w-full text-center text-3xl text-gray-900">departamentos</div>
                <table class="mt-5 border-collapse table-auto w-full text-sm">
                    <tr>
                        <td
                            class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                            nro</td>
                        <td
                            class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                            nombre</td>
                        <td
                            class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                            nro categorias</td>
                        <td
                            class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                            Acciones</td>
                    </tr>
                    @foreach ($departamentos as $key => $departamento)
                        <tr>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                {{ $key + 1 }}</td>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                {{ $departamento->name }}</td>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                {{ $departamento->categorias->count() }}</td>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                <div class="w-full grid grid-cols-4">
                                    <div><i wire:click="montar_formulario_categoria({{ $departamento->id }})"
                                            class="bi bi-clipboard-plus"></i></div>
                                    <div><i wire:click="mostrar_lista_de_usuarios({{ $departamento->id }})" class="bi bi-person-add"></i></div>
                                    <div><i wire:click="delete_departamento({{ $departamento->id }})"
                                            class="bi bi-trash3"></i></div>
                                    <div><i wire:click="mostrar_categorias({{ $departamento->id }})"
                                            class="bi bi-eye"></i>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="w-full  border border-gray-200">
                @switch($area_booton)
                    @case(3)
                    @include('livewire.control.departamentos_y_categorias.lista_de_users_para_categoria')
                    @break
                    lista_de_users_para_categoria
                    @case(2)
                    @include('livewire.control.departamentos_y_categorias.lista_users')
                    @break

                    @default
                @endswitch
            </div>
            <div  class="w-full  border border-gray-200">
                @switch($area_booton)
                @case(1)
                @include('livewire.control.departamentos_y_categorias.lista_de_categorias')
                @break

                

                @default
            @endswitch

            </div>
        </div>
    </div>
</div>
