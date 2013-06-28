<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Logs</title>
        <!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet"> -->
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
        <link href="{{ URL::asset('assets/css/main.css') }}" rel="stylesheet">
     
        <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>        
        <style>
            table form { margin-bottom: 0; }
            form ul { margin-left: 0; list-style: none; }
            .error { color: red; font-style: italic; }
            body { padding-top: 20px; }
        </style>
    </head>

    <body>

        <div class="container">
        
            <ul class="nav nav-pills">
                <li><a href="{{ URL::route('obslogs.index') }}"><i></i>Obslogs</a></li>
                <li><a href="{{ URL::route('techlogs.index') }}"><i></i>Techlogs</a></li>
                <li class="dropdown">    
                    <a class="dropdown-toggle"
                       data-toggle="dropdown"
                       href="#">
                       Obslogs properties
                       <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('objects.index') }}"><i></i>Objects</a></li>
                        <li><a href="{{ URL::route('programs.index') }}"><i></i>Programs</a></li>
                        <li><a href="{{ URL::route('telescopes.index') }}"><i></i>Telescopes</a></li>
                        <li><a href="{{ URL::route('detectors.index') }}"><i></i>Detectors</a></li>
                        <li><a href="{{ URL::route('filters.index') }}"><i></i>Filters</a></li>
                    </ul>
                </li>
                <li class="dropdown">    
                    <a class="dropdown-toggle"
                       data-toggle="dropdown"
                       href="#">
                       Techlogs properties
                       <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ URL::route('devices.index') }}"><i></i>Devices</a></li>
                        <li><a href="{{ URL::route('types.index') }}"><i></i>Types</a></li>
                    </ul>
                </li>
                <li><a href="{{ URL::route('users.index') }}"><i></i>Users</a></li>
                <li><a href="{{ URL::route('messages.index') }}"><i></i>Messages</a></li>
                @if (Auth::check())
                <li><a href="/logout"><i></i> Logout</a></li>
                @else
                <li><a href="/login"><i></i> Login</a></li>
                @endif
            </ul>
        </div>
        <div class="container">
            @if (Session::has('message'))
                <div class="flash alert">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif

            @yield('main')
        </div>

    </body>

</html>