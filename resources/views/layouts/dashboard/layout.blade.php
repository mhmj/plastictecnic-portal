<!doctype html>
<html lang="en">
<head>
    @include('sources.dashboard.header')
</head>
<body>
    <div id="app">
        @include('menu.menu')
        @yield('content')
    </div>
    @include('sources.dashboard.footer')

</body>
</html>