<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        @section('styles')
        <link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="{{asset('css/main.css')}}" media="screen" title="no title" charset="utf-8">
        <link rel="icon" type="image/png" href="{{asset('img/logo/32.png')}}">
        @show
    </head>
    <body>
        <nav class="navbar navbar-fixed-top kc3header">
          <div class="container">
            <div class="row">
                <div class="kc3logo">
                    <a href="{{url('/')}}">
                    <img src="{{asset('img/logo/64.png')}}" /></a>
                </div>
                <div class="kc3menu">
                    <ul>
                        <li><a @yield('active_docs') href="#">Documentation</a></li>
                        <li><a @yield('active_social') href="#">Social System</a></li>
                        <li><a @yield('active_data') href="{{url('data')}}">Data Collection</a></li>
                    </ul>
                </div>
                <div class="kc3profile">
                    <ul>
                        <li class="profile_img"><a href="#"><img src="//www.gravatar.com/avatar/59d622c95f3de6e3bf444186ae3adbac" /></a></li>
                        <li class="profile_name"><a href="#">dragonjet</a></li>
                        <li><a href="#">Friends</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </div>
            </div>
          </div>
        </nav>
        
        <div class="container kc3body">
            @yield('content')
        </div>
        
        @section('scripts')
        <script src="{{asset('js/main.js')}}" charset="utf-8"></script>
        @show
    </body>
</html>
