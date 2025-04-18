<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        @livewireStyles
        @fluxAppearance
    </head>
    <body class="">
        <main>
            @if (!empty($slot))
                {{ $slot }}
            @else
                @yield('content')
            @endif
        </main>
        @livewireScripts
        @fluxScripts
    </body>
</html>