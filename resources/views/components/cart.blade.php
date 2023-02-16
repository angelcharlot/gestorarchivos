<div class="flex justify-center">
    <div class="flex flex-col bg-white rounded-lg shadow-lg md:flex-row md:max-w-xl">
      <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://mdbootstrap.com/wp-content/uploads/2020/06/vertical.jpg" alt="" />
      <div class="flex flex-col justify-start p-6">
        <h5 class="mb-2 text-xl font-medium text-gray-900">{{$titulo}}</h5>
        <p class="mb-4 text-base text-gray-700">
         {{$slot}}
        </p>
        <p class="text-xs text-gray-600">{{$footer}}</p>
      </div>
    </div>
  </div>