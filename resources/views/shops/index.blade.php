<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Flug</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h1>古着屋巡り用のブログ</h1>
                {{ Auth::user()->name }}
            </x-slot>
        <a href='/shops/create'>投稿する</a>
        <div class='shops'>
            @foreach ($shops as $shop)
                <div class='shop'>
                    <a href="/shops/{{ $shop->id }}"><h2 class='name'>{{ $shop->name }}</h2></a>
                    <p class='overview'>{{ $shop->overview }}</p>
                </div>
            @endforeach    
        </div>
        </x-app-layout>    
        <div class='paginate'>
            {{ $shops->links() }}
        </div>
    </body>
</html>