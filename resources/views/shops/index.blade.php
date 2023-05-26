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
                    {{-- 古着屋が置いている商品のカテゴリーを表示する　--}}
                    <div class='shops'>
                        この古着屋が置いているアイテムカテゴリー
                        <h5 class='category'>
                        {{--　ある古着屋に関連するカテゴリーの数だけ繰り返す　--}}
                        @foreach($shop->categories as $category)
                            {{ $category->name }}
                        @endforeach
                        </h5>
                    </div>
                    <form action="/shops/{{ $shop->id }}" id="form_{{ $shop->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $shop->id }})">削除</button> 
                    </form>
                </div>
            @endforeach    
        </div>
        </x-app-layout>    
        <div class='paginate'>
            {{ $shops->links() }}
        </div>
        <script>
            function deletePost(id) {
                'use strict'

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>