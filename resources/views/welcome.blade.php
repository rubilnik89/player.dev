<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="verify-paysera" content="cf7a3468f82d38cd583726fcda8c1d32">
        <title>PLAYER</title>
    </head>
    <body>
        <div>
            @foreach($playlists->results as $playlist)
                <div>
                    <a style="text-decoration: none; color: #761c19" href="{{ route('get_playlist', $playlist->id) }}">{{ $playlist->name }}</a><hr>
                </div>
            @endforeach
        </div>
    <script>

    </script>
    </body>
</html>
