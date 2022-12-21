<div class=" p-2   gap-3 grid grid-cols-8 ">

    @foreach ($archivoss as $iten)
        <div class="p-2 border border-gray-300 rounded-md pt-2">
            @if ($iten->extencion == 'jpg' or $iten->extencion == 'png')
                <img class="h-16 mx-auto  object-scale-down" src="{{ asset($iten->url) }}" alt="">
            @else
                <div class="block text-4xl relative text-center">
                    <i class="bi bi-filetype-{{ $iten->extencion }}"></i>
                </div>
                <div class="text-center text-xs truncate">
                    {{ $iten->name }}
                </div>
            @endif
            <div class="gap-3 grid grid-cols-3 ">
                @can($iten->p_share)
                    <div class=" text-white "><i wire:click='dar_permiso({{ $iten->id }})'
                            class="bi bi-share rounded-md px-1 m-1 bg-blue-600 border border-blue-700 hover:bg-blue-500 "></i>
                    </div>
                @endcan
                <div class=" text-white  "><i wire:click='info({{ $iten->id }})'
                        class="bi bi-info-circle   rounded-md px-1 m-1 bg-blue-600 border border-blue-700 hover:bg-blue-500 "></i>
                        
                </div>
                <div class=" text-white  "> <a href="{{route('archivo',$iten->id)}}"> <i 
                    class="bi bi-eye   rounded-md px-1 m-1 bg-blue-600 border border-blue-700 hover:bg-blue-500 "></i>
                </a>
            </div>
              
            </div>
        </div>
    @endforeach

    

</div>
