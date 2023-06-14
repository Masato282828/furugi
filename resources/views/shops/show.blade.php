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
                <h1 class="textcolor">古着屋巡り用のブログ</h1>
                    {{ Auth::user()->name }}
            </x-slot>
        <h1 class="name">
            <p align="center"><font size="6">{{ $shop->name }}</font></p>
        </h1>
        <div class="overview">
            <div class="overview__shop">
                <p><c><d>{{ $shop->overview }}</d></c></p>    
            </div>
        </div>
        <d>
            @foreach ( $shop->images as $image)
                <img src="{{ $image->image_url }}" class='w-1/2'>
            @endforeach
        </d>
        <div class="address">
            <h3>
                {{ $shop->address }}
            </h3>
        </div>
        <div class='shops'>
            <h5>この古着屋が置いているアイテムカテゴリー</h5>
            
                <h5 class='category'>
                        {{--　ある古着屋に関連するカテゴリーの数だけ繰り返す　--}}
                        @foreach($shop->categories as $category)
                            {{ $category->name }}
                        @endforeach
                        </h5>
        </div> 
        <d>
            <div id="map" style="width: 600px; height: 500px;" value="{{$shop->address}}"></div>
        </d>
        
        <script type="text/javascript">
            var address =  '<?php echo $shop->address; ?>';
        </script>
            
        <script type="text/javascript" src="{{ asset('/js/map.js') }}"></script>
        
        <script defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDcflsClK8v1fzIPEyAyRt70okAGigfzRw&callback=initMap">
        </script>
        
        {{--<div class="bookmark">
            @if (Auth::check())
                @if ($bookmark)
                <form action="{{action('BookMarksController@destroy',$book->id)}}" method="POST" class="shops" >
                <input type="hidden" name="book_id" value="{{$book->id}}">
                @csrf
                @method('DELETE')
                    <button type="submit">
                      ブックマーク解除
                    </button>
                </form>
                @else
                <form action="{{action('BookMarksController@store')}}" method="POST" class="shops" >
                @csrf
                <input type="hidden" name="book_id" value="{{$book->id}}">
                    <button type="submit">
                     ブックマーク
                    </button>
                </form>
            
                @endif
            @endif
        </div>--}}
        
        <div class="footer">
            <a href="/shops/{{ $shop->id }}/edit"><b>編集</b></a>
        </div>
        <div class="footer">
            <a href="/"><c>戻る</c></a>
        </div>
        </x-app-layout>
    </body>
</html>