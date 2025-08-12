<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Retro Museum</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    @yield('script')
    <script src='{{ asset('js/apps.js') }}' defer></script>
    <link rel='stylesheet' href='{{ asset('css/app.css') }}'>

</head>

<body>
    <header>
        <nav>
            <div id="links">
                <div class="user-icon">
                    <div class="circle"></div>

                    @auth

                        <p>Bentornato</br> {{ Auth::user()->username }}!</p>
                        <form method="POST" action="/logout" class="text-xs font-semibold text-blue-500 ml-6">
                            @csrf
                            <button class=small style='background-color:yellow;' type="submit">Log Out</button>
                        </form>
                    @else
                        <p>Benvenuto</br>Ospite</p>
                        <a class=small style='background-color:yellow;' href=' {{ route('login') }}'>login</a>
                    @endauth


                </div>
                <a href="{{ route('home') }}">Vetrina</a>
                <a href="{{ route('cart') }}">Carrello</a>

                @auth
                    <a href="{{ route('shipping') }}">Spedizioni</a>
                @endauth


                <a href="{{ route('aboutus') }}">About Us</a>
            </div>
            <div id="menu">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </nav>

        <h1>
            <strong class="title">Retro Museum</strong><br />
            <p class="sub_title">Refurbished Retro Console</p><br />
        </h1>

        <div></div>
    </header>



    <section>

        <div class="input-group">
            <span>Cerca nel nostro store </span>
            <form method="GET" action="{{ route('search') }}" class="text-xs font-semibold text-blue-500 ml-6">

                <input id="search" required="" type="text" name="query" autocomplete="off" class="input"
                    value="">
                <label class="user-label">Eloquent ORM Powered! </label>
            </form>

        </div>

        @yield('content')

    </section>

    <footer>
        <p>Powered by Lorenzo Siena 1000015814</p>
    </footer>
</body>

</html>
