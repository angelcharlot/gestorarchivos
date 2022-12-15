@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/control.css') }}">
@endsection
@section('body')
    @livewire('panel')
@endsection
@section('js')
    <script src="{{ asset('js/sidebar.js') }}"></script>
@endsection
