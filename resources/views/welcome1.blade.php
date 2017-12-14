<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PLAYER</title>
    </head>
    <body id="app">

    <a href="{{ url()->previous() }}">НАЗАД</a>
    <div>
        <button class="prev"><< prev--</button>
        <button class="next">--next >></button>
    </div>
    <div id="аplayer" class="aplayer"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aplayer/1.6.0/APlayer.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


    <script>


        var music = [];
        var song = {};
        var playlist_name = '';
        var playlist = {!! json_encode($tracks->results) !!};
        playlist.forEach(function (currentValue) {
            playlist_name = currentValue.name;
            currentValue.tracks.forEach(function (currentValue1) {
                song['album_image'] = currentValue1.album_image;
                song['author'] = currentValue1.artist_name;
                song['url'] = currentValue1.audio;
                song['audiodownload'] = currentValue1.audiodownload;
                song['duration'] = currentValue1.duration;
                song['pic'] = currentValue1.image;
                song['title'] = currentValue1.name;

                music.push(song);
                song = {};
            });
        });
        console.log(music)


        var ap = new APlayer({
            element: document.getElementById('аplayer'),                       // Optional, player element
            narrow: false,                                                     // Optional, narrow style
            autoplay: true,                                                    // Optional, autoplay song(s), not supported by mobile browsers
            showlrc: 0,                                                        // Optional, show lrc, can be 0, 1, 2, see: ###With lrc
            mutex: true,                                                       // Optional, pause other players when this player playing
            theme: '#1120e6',                                                  // Optional, theme color, default: #b7daff
            mode: 'circulation',                                               // Optional, play mode, can be `random` `single` `circulation`(loop) `order`(no loop), default: `circulation`
            preload: 'metadata',                                               // Optional, the way to load music, can be 'none' 'metadata' 'auto', default: 'auto'
            listmaxheight: '513px',                                            // Optional, max height of play list
            music: music
        });

        $('.prev').click(function () {
            if(ap.mode == 'random')
            {
                ap.setMusic(Math.floor(Math.random() * (music.length - 1)))
            } else if(ap.playIndex != 0)
            {
                ap.setMusic(ap.playIndex - 1)
            }
        });

        $('.next').click(function () {
            if(ap.mode == 'random')
            {
                ap.setMusic(Math.floor(Math.random() * (music.length - 1)))
            } else if(music.length > (ap.playIndex + 1))
            {
                ap.setMusic(ap.playIndex + 1)
            }
        })




    </script>
    </body>
</html>
