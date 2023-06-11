<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Fulog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('/css/shops.css') }}">
    </head>
    <body class="body">
        <x-app-layout>
            <x-slot name="header">
                <h1><font size="5">古着屋巡り用のブログ</font></h1>
                <p align="right">{{ Auth::user()->name }}</p>
                <a href='/shops/create'><c>投稿する</c></a>
            </x-slot>
            <div class='shops'>
                @foreach ($shops as $shop)
                    <c>
                        <div class='shop'>
                            <font size="6">
                                <a href="/shops/{{ $shop->id }}">
                                    <h2 class='name'>{{ $shop->name }}</h2>
                                </a>
                            </font>
                            <p class='overview'><d>{{ $shop->overview }}</d></p>
                            {{-- 古着屋が置いている商品のカテゴリーを表示する　--}}
                            <div class='shops'>
                                <h5>この古着屋が置いているアイテムカテゴリー</h5>
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
                                <button type="button" onclick="deletePost({{ $shop->id }})"><b><d>削除</d></b></button>
                            </form>
                        </div>
                    </c>
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