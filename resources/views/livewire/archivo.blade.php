<div>

    <div class="mt-10 w-1/2 mx-auto p-5 text-center text-gra-900 text-2xl rounded-lg border border-gray-500" >
        {{$archivo->name}}
    </div>
    <div class="mt-2 w-1/2 mx-auto p-5 text-center text-gra-900 text-2xl rounded-lg border border-gray-500" >
       @foreach ($page as $pagina)
            <img src="{{asset('storage/'.$pagina)}}" alt="">
       @endforeach
    </div>
     
</div>
