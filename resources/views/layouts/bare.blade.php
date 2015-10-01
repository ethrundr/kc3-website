<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        @section('styles')
        <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bare.css" media="screen" title="no title" charset="utf-8">
        <link rel="icon" type="image/png" href="{{asset('img/logo/32.png')}}">
        @show
    </head>
    <body>
        @yield('content')
		
        @section('scripts')
        <script src="js/main.js" charset="utf-8"></script>
        @show
    </body>
</html>
