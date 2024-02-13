<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Comics center</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/main.js" defer></script>
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <body class="antialiased">
        <div id="search" class="search">
            <form action="" method="GET">
                <div class="search-wraper">
                    <input type="search" placeholder="Search...">
                </div>
                <input type="submit" value="Search">
            </form>
        </div>
        <header>
            @include('components.header')
        </header>
        <main>
            @yield("main")
        </main>
        <footer>
            <div class="footer footer-items">
                <p class="footer-item">&copy; 2024 Comics Village. All rights reserved.</p>
                <p class="footer-item">
                    <a href="#">Support Project</a>
                </p>
            </div>
                
        </footer>
    </body>
