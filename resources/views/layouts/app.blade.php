<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    @livewireStyles
    <!-- Scripts -->

</head>

<body class="font-sans antialiased h-screen ">
    <header>
       @livewire('navigation-dropdown') 
    </header>
    <!-- contenido de la pag -->
    <main class="  pt-16">
        @yield('body')
    </main>
    <footer>
        @yield('footer')
    </footer>
    @stack('modals')
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.0.943/pdf.min.js"></script>
    @livewireScripts
    @yield('js')
</body>

</html>
