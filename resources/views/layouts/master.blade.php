<!DOCTYPE html>

<html lang="{{ config('app.locale')}}">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{config('app.name','ServiceAPP')}}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <script src="https://kit.fontawesome.com/cccf08786c.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @livewireStyles

</head>

<body>
    
    @include('sections.navbar')  
            <br>
        <div class="container">
            <br>
            @include('sections.messages')
            <br>
            @yield('content')
        </div>
        <br>
    @include('sections.footer')
    
    @livewireScripts

</body>

</html>