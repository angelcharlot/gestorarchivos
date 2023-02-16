<div class="text-center">
    <img
      src="{{asset('imagenes/'.$avatar)}}"
      class="object-scale-down w-32 mx-auto mb-4 rounded-full"
      alt="Avatar"
    />
    <h5 class="mb-2 text-xl font-medium leading-tight">{{$slot}}</h5>
    <p class="text-gray-500">{{$cargo}}</p>
  </div>