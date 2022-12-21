@extends('layouts/app')
@section('body')

 @livewire('archivo', ['id' => $id]) 

@endsection
@section('js')
    <script src="{{ asset('js/archivos.js') }}"></script>
@endsection