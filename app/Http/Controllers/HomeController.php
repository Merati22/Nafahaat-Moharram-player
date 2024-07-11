<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
//        $arrayOfArrays = [
//            ['name' => 'John', 'age' => 25],
//            ['name' => 'Jane', 'age' => 30],
//            ['name' => 'Mike', 'age' => 35],
//        ];
//
//        $arrayOfArrays = array_map(function ($array) {
//            $array['key'] = 'value';
//            return $array;
//        }, $arrayOfArrays);
//
//        return ($arrayOfArrays);

        $album = Album::where('is_playing', 1)->first();
        $tracks = $album->tracks()->with('artist', 'genre', 'album')->orderBy('priority', 'asc')->get();

        foreach ($tracks as $track) {
            $track->favorited = false;
        }
        //
////        $tracks = Track::with('artist', 'genre', 'album')->latest()->take(3)->get();
//
        return view('home', compact('tracks'));
    }
}
