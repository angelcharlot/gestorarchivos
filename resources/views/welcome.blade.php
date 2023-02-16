@extends('layouts/app')
@section('body')
    <div class="relative flex justify-center min-h-screen bg-gray-100 items-top dark:bg-gray-900 sm:items-center sm:pt-0">


        <div class="max-w-6xl p-5 mx-auto sm:px-6 lg:px-8">

            <div class="w-full text-3xl font-bold text-center">
                Software de gestión documental
            </div>
            <x-avatar>
                <x-slot name='avatar'>
                    angel.jpg
                </x-slot>
                <x-slot name='cargo'>
                    desarrollador web
                </x-slot>
                Angel Charlot
            </x-avatar>
            <x-titulo/>
            <x-cart>
                <x-slot name='titulo'>
                hola este es el titulo
                </x-slot>
                <x-slot name='footer'>
                    hola este es el footer
                    </x-slot>

                   hola mundo  

            </x-cart>
            <div class="mt-8 overflow-hidden bg-white shadow dark:bg-gray-800 sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">

                    <div class="p-5">
                        <div class="flex items-center flex-shrink-0">
                            <div class="w-1/5 mx-auto rounded-full ">
                                <img class="bg-cover rounded-full "  src="{{asset('imagenes/adel.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="p-2 text-justify" >Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita tempore ad perferendis nostrum natus porro quam repellat, aperiam laboriosam consequuntur omnis illum sit sint. Ex perspiciatis et voluptate aut sapiente?</div>
                    </div>
                    <div class="p-5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, dolore error repellat asperiores alias dolorem doloribus incidunt nesciunt corrupti, praesentium voluptatem sed consectetur consequatur numquam natus architecto commodi doloremque laudantium.
                        <div class="flex items-center flex-shrink-0">
                            <div class="w-1/5 mx-auto rounded-full ">
                                <img class="bg-cover rounded-full "  src="{{asset('imagenes/adel.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    
                   
                   

                </div>
            </div>


        </div>
    </div>
@endsection