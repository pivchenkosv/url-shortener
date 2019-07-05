<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Not Found</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/404.css') }}" rel="stylesheet">

</head>
<body>
<div id="header">
    @include('header')
</div>
<div class="flex-center position-ref full-height">
    <div class="code">
        404
    </div>

    <div class="message">
        Not Found
    </div>
</div>
</body>
</html>
