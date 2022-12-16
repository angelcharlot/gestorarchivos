
<div class="rounded-md border-gray-200 ">
<div class="w-full text-center text-3xl text-gray-900">Categorias del departamento {{$departamento_select->name}}</div>
<table class="mt-5 border-collapse table-auto w-full text-sm">
    <tr>
        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
            nro</td>
        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
            nombre</td>
        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
            nro archivos</td>
        <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
            Acciones</td>
    </tr>
    @foreach ($categoriass as $item)
        <tr>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                {{ $key + 1 }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                {{ $item->name }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                {{ $item->archivos->count() }}</td>
            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                <div class="w-full grid grid-cols-2">
                    
                    <div><i wire:click='mostrar_lista_de_usuarios_categorias({{$item->id}})' class="bi bi-person-add"></i></div>
                    <div><i wire:click="delete_categorias({{ $item->id }})" class="bi bi-trash3"></i></div>
                    
                </div>

            </td>
        </tr>
    @endforeach
   
</table> {{$categoriass->links()}}
</div>