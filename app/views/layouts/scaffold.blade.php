<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
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
                <li><a href="{{ URL::route('obslogs.index') }}"><i></i> Obslogs</a></li>
                <li><a href="{{ URL::route('objects.index') }}"><i></i> Objects</a></li>
                <li><a href="{{ URL::route('programs.index') }}"><i></i> Programs</a></li>
                <li><a href="{{ URL::route('telescopes.index') }}"><i></i> Telescopes</a></li>
                <li><a href="{{ URL::route('detectors.index') }}"><i></i> Detectors</a></li>
                <li><a href="{{ URL::route('filters.index') }}"><i></i> Filters</a></li>
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