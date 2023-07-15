<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tracks = Track::with('artist', 'genre', 'album')->latest()->take(3)->get();

        return view('welcome', compact('tracks'));
    }
}
