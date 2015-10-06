<html>
    <head>
        @yield('css')
        <link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
    </head>

    <body>



        @yield('content')

                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        @yield('js')
    </body>
</html>