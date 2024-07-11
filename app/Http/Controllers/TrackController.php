<?php

namespace App\Http\Controllers;

use App\Http\Requests\TrackRequest;
use App\Http\Resources\TrackResource;
use App\Models\Album;
use App\Models\Artist;
use App\Models\genre;
use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function index()
    {
        $tracks = Track::latest()->paginate(100);
        return view('tracks.index',compact('tracks'))->with('i', (request()->input('page', 1) - 1) * 5);

//        return TrackResource::collection($tracks);
    }

    public function create()

    {
        $artists = Artist::all();
        $albums = Album::all();
        $genres = genre::all();

        return view('tracks.create', compact('artists', 'albums', 'genres'));

    }

    public function store(TrackRequest $request)
    {
//        $path = $request->file('track')->store('public/tracks');

        $track = Track::create([
            'name' => $request->name,
            'path' => $request->path,
            'priority' => $request->priority,

        ]);

        $artist = Artist::find($request->artist_id);
        $album = Album::find($request->album_id);
        $genre = genre::find($request->genre_id);

        $track->artist()->associate($artist);
        $track->genre()->associate($genre);
        $track->album()->associate($album);
        $track->save();

        return redirect()->route('tracks.index')->with('success','Track created successfully.');

//        return new TrackResource($track);
    }

    public function show(Track $track)
    {
        return view('tracks.show', compact('track'));

//        return new TrackResource($track);
    }

    public function edit(Track $track)
    {

        $artists = Artist::all();
        $albums = Album::all();
        $genres = genre::all();

        return view('tracks.edit', compact('track', 'artists', 'albums', 'genres'));

    }

    public function update(TrackRequest $request, Track $track)
    {
        $track->update([
            'name' => $request->name,
            'path' => $request->path,
            'priority' => $request->priority,
        ]);

        $artist = Artist::find($request->artist_id);
        $album = Album::find($request->album_id);
        $genre = genre::find($request->genre_id);

        $track->artist()->associate($artist);
        $track->genre()->associate($genre);
        $track->album()->associate($album);
        $track->save();

        return redirect()->route('tracks.index')->with('success','Track updated successfully');

//        return new TrackResource($track);
    }

    public function destroy(Track $track)
    {
        $track->delete();

        return redirect()->route('tracks.index')->with('success','Track deleted successfully');

//        return response()->noContent();
    }

    public function index1()
    {

        $tracks = Track::with('artist', 'genre', 'album')->latest()->take(3)->get();

        return view('welcome', compact('tracks'));
    }
}
