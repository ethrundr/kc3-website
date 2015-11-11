<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        @section('styles')
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Josefin+Sans'>
        <link rel="stylesheet" type='text/css' href="{{asset('css/bare.css')}}">
        @show
        <link rel="icon" type="image/png" href="{{asset('img/logo/32.png')}}">
    </head>
    <body>
        @yield('content')
		
        @section('scripts')
        <script src="{{asset('js/main.js')}}" charset="utf-8"></script>
        @show
    </body>
</html>
