<!doctype html>
<html>
<head>
    
    <link rel='stylesheet' href='{{ asset('css/guest.css') }}'>
 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('script')

    <title>Guest</title>
</head>


<body>
    <main class="magic">
    <strong id="title"><a href="{{ route('home') }}"">Retro Museum</a></strong>
    @yield('content')
    </main>
</body>

</html>