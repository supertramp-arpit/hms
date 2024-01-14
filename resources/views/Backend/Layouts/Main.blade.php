<html>
    <head>
        @include('Backend.Layouts.Head')
    </head>
    <body>
        <div class="container-fluid sb2">
        <div class="row">
        @include('Backend.Layouts.Header')
        @include('Backend.Layouts.Sidebar')
        @yield('content')
        @include('Backend.Layouts.Footer')
        </div>
        </div>
    </body>
</html>