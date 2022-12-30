<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>supera</title>
    @yield('css')
    <link rel="stylesheet" href="{{ asset('css/main.styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.styles.css') }}">
</head>
<body onload="info()">
    <header>
        <h1>Supera Veiculos</h1>

        <div class="profile">
            <div>
                <p>Bem vindo!</p>
                <p>
                    @if (session()->has('user'))
                        {{ session()->get('user.name') }}
                    @endif
                </p>
            </div>
            <img src="{{ asset('img/hatchback.png') }}" alt="">
        </div>
    </header>
    <main>
        <section>
            <nav>
                @yield('nav')
            </nav>
            <div class="content">
                <div class="title-btn">
                    @yield('header-content')
                </div>
                <div class="content__boxs">
                    @yield('content')
                </div>
            </div>
            <div class="info">
                @yield('info')
            </div>
        </section>
    </main>
</body>
<script src="{{ asset('js/global.js') }}"></script>
</html>
