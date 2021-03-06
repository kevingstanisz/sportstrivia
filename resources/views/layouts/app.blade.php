<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sports Trivia</title>
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>

    

    <!-- Scripts -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="{{asset('CreativeButtons/js/modernizr.custom.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spellbinders.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('CreativeButtons/css/default.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('CreativeButtons/css/component.css')}}" />

    <link rel="icon" href="{{ URL::asset('sports.png') }}" type="image/x-icon"/>

</head>
<body>
    <div id="app">
        <br>
        {{-- @include('inc.navbar') --}}
        <div class='container'>
            @include('inc.messages')
            @yield('content')

</body>
</html>