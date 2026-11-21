
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Jelajah Rupiah AR')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Castoro&family=Lato:wght@400;700;900&family=Spline+Sans+Mono:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    <header class="navbar">
        <div class="nav-container">

            <a href="{{ route('home') }}" class="brand">
                <span class="brand-icon">₰</span>
                <span>
                    <strong>JELAJAH RUPIAH</strong>
                    <small>AR EDUCATION</small>
                </span>
            </a>

            <button class="menu-toggle" id="menuToggle">
                ☰
            </button>

            <nav class="nav-menu" id="navMenu">
                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'active' : '' }}">
                    Beranda
                </a>

                <a href="{{ route('scan') }}"
                   class="{{ request()->routeIs('scan') ? 'active' : '' }}">
                    Scan AR
                </a>

                <a href="{{ route('learning') }}"
                   class="{{ request()->routeIs('learning') ? 'active' : '' }}">
                    Modul Belajar
                </a>

                <a href="{{ route('quiz') }}"
                   class="{{ request()->routeIs('quiz') ? 'active' : '' }}">
                    Kuis
                </a>
            </nav>

        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-inner">
            <h3>JELAJAH RUPIAH AR</h3>
            <p>
                Cinta, Bangga, dan Paham Rupiah.
                Belajar mengenal Rupiah dengan cara yang menyenangkan.
            </p>
            <small>© {{ date('Y') }} Jelajah Rupiah AR</small>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
