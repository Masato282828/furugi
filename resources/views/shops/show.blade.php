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
        この古着屋が置いているアイテムカテゴリー:
            <h5 class='category'>
                            
                {{--　ある古着屋に関連するカテゴリーの数だけ繰り返す　--}}
                @foreach($shop->categories as $category)
                    {{ $category->name }}
                @endforeach
                            
            </h5>
        <div class="footer">
            <a href="/shops/{{ $shop->id }}/edit">編集</a>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </x-app-layout>
    </body>
</html>