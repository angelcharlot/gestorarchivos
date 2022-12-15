@extends('layouts/app')
@section('body')
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center  sm:pt-0">


        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 p-5">

            <div class="w-full text-3xl text-center font-bold">
                Software de gestión documental
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">

                    <div class="p-5">
                        <div class="flex-shrink-0 flex items-center">
                            <div class="w-1/5 rounded-full mx-auto ">
                                <img class=" rounded-full bg-cover "  src="{{asset('imagenes/adel.jpg')}}" alt="">
                            </div>
                        </div>
                        <div class="p-2 text-justify" >Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita tempore ad perferendis nostrum natus porro quam repellat, aperiam laboriosam consequuntur omnis illum sit sint. Ex perspiciatis et voluptate aut sapiente?</div>
                    </div>
                    <div class="p-5">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, dolore error repellat asperiores alias dolorem doloribus incidunt nesciunt corrupti, praesentium voluptatem sed consectetur consequatur numquam natus architecto commodi doloremque laudantium.
                        <div class="flex-shrink-0 flex items-center">
                            <div class="w-1/5 rounded-full mx-auto ">
                                <img class=" rounded-full bg-cover "  src="{{asset('imagenes/adel.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    
                   
                   

                </div>
            </div>


        </div>
    </div>
@endsection