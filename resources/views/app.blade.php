<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Ontdek het creatieve werk van Jirzy Kerklaan, met een diverse selectie van designprojecten, kunst en innovatieve concepten. Laat je inspireren door de unieke benadering van elk project.">

        <title inertia>Portfolio | Jirzy Kerklaan</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

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
