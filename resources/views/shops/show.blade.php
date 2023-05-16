<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Flug</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="name">
            {{ $shop->name }}
        </h1>
        <div class="overview">
            <div class="overview__shop">
                <h3>本文</h3>
                <p>{{ $shop->overview }}</p>    
            </div>
        </div>
        <div class="address">
        <h3>
            {{ $shop->address }}
        </h3>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>