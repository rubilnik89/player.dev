<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function play(Request $request)
    {

        $client = new Client();
        $response = $client->get("https://api.jamendo.com/v3.0/playlists/?client_id=a0e1c37e&user_id=5276149&order=creationdate_desc&limit=100");
        $playlists = json_decode($response->getBody()->read(10240000));
//        dd($playlists);
        return view('welcome', compact('playlists'));
    }

    public function get_playlist(Request $request)
    {
        $client = new Client();
        $response = $client->get("https://api.jamendo.com/v3.0/albums/tracks/?client_id=a0e1c37e&limit=200");
        $tracks = json_decode($response->getBody()->read(10240000));
//        foreach ($tracks->results as $track)
//        {
//            dd($track);
//        }
//        dd($tracks);
        return view('welcome1', compact('tracks'));
    }
}
