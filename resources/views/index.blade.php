<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>

        <div id="app">
{{--            <example-component> </example-component>--}}
            <posts></posts>

        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
