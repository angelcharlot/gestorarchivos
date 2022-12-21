@extends('layouts/app')
@section('body')

@livewire('control.gestionarchivos')

@endsection
@section('js')
    {{-- <script src="{{ asset('js/archivos.js') }}"></script> --}}
@endsection
@section('css')
   <link rel="stylesheet" href="{{asset('archivos.css')}}">
@endsection