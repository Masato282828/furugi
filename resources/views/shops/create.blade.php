<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Flog</title>
    </head>
    <body>
        <h1>古着屋巡り用のブログ</h1>
        <form action="/shops" method="POST">
            @csrf
            <div class="name">
                <h2>Name</h2>
                <input type="text" name="post[name]" placeholder="古着屋名"/>
            </div>
            <div class="overview">
                <h2>Overview</h2>
                <textarea name="post[overview]" placeholder="この古着屋の詳細を教えてください"></textarea>
            </div>
            <div class="address">
                <h2>Address</h2>
                <textarea name="post[address]" placeholder="この古着屋の住所を教えてください"></textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>