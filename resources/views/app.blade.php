<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Ontdek het portfolio van Jirzy Kerklaan, van een zelfgemaakt CMS tot een creatieve website voor een grote organisatie, van alle markten thuis.">

        <title inertia>Portfolio | Jirzy Kerklaan</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/43df3a711f.js" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead

        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3K805ZZWE4"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'G-3K805ZZWE4');
        </script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
