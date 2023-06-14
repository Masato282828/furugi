<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Fulog</title>
        <link rel="stylesheet" href="{{ asset('/css/shops.css') }}">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h1>
                    <font size="5">
                        古着屋巡り用のブログ
                    </font>
                </h1>
                <p align="right">{{ Auth::user()->name }}</p>
            </x-slot>
            <form action="/shops/{{ $shop->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="name">
                    <h2>古着屋名</h2>
                    <d>
                        <input type="text" name="shop[name]" placeholder="古着屋名" value={{ $shop->name }}>
                    </d>
                </div>
                <div class="overview">
                    <h2>このお店の詳細</h2>
                    <d>
                        <textarea name="shop[overview]" placeholder="この古着屋の詳細を教えてください">{{ $shop->overview }}</textarea>
                    </d>
                </div>
                <div class="address">
                    <h2>住所</h2>
                    <d>
                        <textarea name="shop[address]" placeholder="この古着屋の住所を教えてください">{{ $shop->address }}</textarea>
                    </d>
                </div>
                <div class="category">
                    <h2>このお店が置いている古着のジャンル</h2>
                        <d>
                            @foreach($categories as $category)
                                <input type="checkbox" name="category[]" value="{{ $category->id }}">{{ $category->name }}</input>
                            @endforeach
                        </d>
                </div>
                <div class="image">
                    <h2>店内の写真</h2>
                    <d>
                        <input type="file" name="image[]" multiple>
                    </d>
                </div>
                <d>
                    <c>
                        <input type="submit" value="再投稿"/>
                    </c>
                </d>
            </form>
        <div class="footer">
            <a href="/"><h2>戻る</h2></a>
        </div>
        </x-app-layout>
    </body>
</html>