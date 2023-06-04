<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Flog</title>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h1>古着屋巡り用のブログ</h1>
                <p align="right">{{ Auth::user()->name }}</p>
            </x-slot>
        <form action="/shops/{{ $shop->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="name">
                <h2>Name</h2>
                <input type="text" name="shop[name]" placeholder="古着屋名" value={{ $shop->name }}>
            </div>
            <div class="overview">
                <h2>Overview</h2>
                <textarea name="shop[overview]" placeholder="この古着屋の詳細を教えてください">{{ $shop->overview }}</textarea>
            </div>
            <div class="address">
                <h2>Address</h2>
                <textarea name="shop[address]" placeholder="この古着屋の住所を教えてください">{{ $shop->address }}</textarea>
            </div>
            <div class="category">
                <h2>Category</h2>
                    @foreach($categories as $category)
                        <input type="checkbox" name="category[]" value="{{ $category->id }}">{{ $category->name }}
                    @endforeach
            </div>            
            <input type="submit" value="update"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </x-app-layout>
    </body>
</html>