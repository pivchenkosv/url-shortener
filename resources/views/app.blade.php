<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>urlShortener</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{--    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">--}}
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
<div id="header">
    @include('header')
</div>
<div id="content">
    @yield('content')
</div>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
