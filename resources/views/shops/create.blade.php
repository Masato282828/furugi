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
                 {{ Auth::user()->name }}
            </x-slot>
        <form action="/shops" method="POST">
            @csrf
            <div class="name">
                <h2>Name</h2>
                <input type="text" name="shop[name]" placeholder="古着屋名"/>
            </div>
            <div class="overview">
                <h2>Overview</h2>
                <textarea name="shop[overview]" placeholder="この古着屋の詳細を教えてください"></textarea>
            </div>
            <div class="address">
                <h2>Address</h2>
                <textarea name="shop[address]" placeholder="この古着屋の住所を教えてください"></textarea>
            </div>
            <div class="category">
                <h2>Category</h2>
                    @foreach($categories as $category)
                        <input type="checkbox" name="category[]" value="{{ $category->id }}">{{ $category->name }}
                    @endforeach
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </x-app-layout>
    </body>
</html>