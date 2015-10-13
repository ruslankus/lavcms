<!DOCTYPE html>
<html lang="en">
    <head>
        @yield('meta')
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">

        @yield('css')
        <title></title>
    </head>

    <body>


        @yield('content')

        @yield('modal')

                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="/js/bootstrap.min.js"></script>

        @yield('js')
    </body>
</html>