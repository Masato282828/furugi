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
            <p align="center">{{ $shop->name }}</p>
        </h1>
        <div class="overview">
            <div class="overview__shop">
                <h3>本文</h3>
                <p>{{ $shop->overview }}</p>    
            </div>
        </div>
        <img src="{{ $shop->image }}">
        <div class="address">
            <h3>
                {{ $shop->address }}
            </h3>
        </div>
        <div class='shops'>
            この古着屋が置いているアイテムカテゴリー
                {{-- <h5 class='category'>
                        {{--　ある古着屋に関連するカテゴリーの数だけ繰り返す　--}}
                            {{-- @foreach($shop->categories as $category)
                            {{ $category->name }}
                        @endforeach
                        </h5> --}}
        </div> 
        <div id="map" style="width: 600px; height: 500px;" value="{{$shop->address}}"></div>
        
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
            <a href="/shops/{{ $shop->id }}/edit">編集</a>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </x-app-layout>
    </body>
</html>