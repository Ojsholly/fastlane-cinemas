<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title') | {{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Nunito, sans-serif;
        }
    </style>

    <script src="https://cdn.tailwindcss.com"></script>

    @livewireStyles

</head>

<body>

@yield('content')

@livewireScripts

@stack('scripts')
</body>

</html>
