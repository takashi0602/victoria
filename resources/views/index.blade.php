<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Victoria</title>
    </head>
    <body>
        <div id="app">
            @foreach($tweets as $tweet)
                {{ $tweet->tweet }}
            @endforeach
        </div>
    </body>
</html>