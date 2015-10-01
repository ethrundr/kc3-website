<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        @section('styles')
        <!-- <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'> -->
        <link rel="stylesheet" href="css/main.css" media="screen" title="no title" charset="utf-8">
        <link rel="icon" type="image/png" href="{{asset('img/logo/32.png')}}">
        @show
    </head>
    <body>
        <nav class="navbar navbar-fixed-top kc3header">
          <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{action('Decode\MainController@getIndex')}}">
                    <img alt="Brand" src="{{asset('img/logo/header.png')}}">
                </a>
            </div>
            <div class="collapse kc3menu" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">News</a></li>
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Social System</a></li>
                    <li><a href="#">Game Decodes</a></li>
                </ul>
            </div>
          </div>
        </nav>
        
        <div class="container kc3body">
            @yield('content')
        </div>
        
        @section('scripts')
        <script src="js/main.js" charset="utf-8"></script>
        @show
    </body>
</html>
