<div class="p-5">
    <table>
        <tr>
            <td>nombre:</td>
            <td>{{$archivo_select->name}}</td>
        </tr>
        <tr>
            <td>extencion</td>
            <td>{{$archivo_select->extencion}}</td>
        </tr>
        <tr>
            <td>fecha subida</td>
            <td>{{$archivo_select->created_at->format('d-m-Y')}}</td>
        </tr>
        <tr>
            <td class="">departamento</td>
            <td>{{$archivo_select->categoria->departamento->name}}</td>
        </tr>
        <tr>
            <td>categoria</td>
            <td>{{$archivo_select->categoria->name}}</td>
        </tr>
      
        <tr>
            <td>subido por</td>
            <td>{{$archivo_select->user->email}}</td>
        </tr>
        <tr>
            <td>compartido con</td>
            <td>
            
                @forelse ($archivo_select->users->where('id','!=',Auth::user()->id) as $usuarios)
                      {{$usuarios->email}} 
                @empty
                    nadie
                @endforelse
                
            </td>
        </tr>


    </table>
</div>