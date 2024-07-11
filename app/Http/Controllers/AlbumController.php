<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Http\Requests\TrackRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use App\Models\Artist;
use App\Models\genre;
use App\Models\Track;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::latest()->paginate(10);
        return view('albums.index',compact('albums'))->with('i', (request()->input('page', 1) - 1) * 5);

//        return AlbumResource::collection($albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(AlbumRequest $request)
    {
        Album::create($request->validated());
        return redirect()->route('albums.index')->with('success','Album created successfully.');

//        return new AlbumResource($album);
    }

    public function show(Album $album)
    {
        return view('albums.show', compact('album'));

//        return new AlbumResource($album);
    }

    public function edit(Album $album)
    {
        return view('albums.edit',compact('album'));
    }

    public function update(AlbumRequest $request, Album $album)
    {
        $album->update($request->validated());
        return redirect()->route('albums.index')->with('success','Album updated successfully');

//        return new AlbumResource($album);
    }

    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index')->with('success','Album deleted successfully');

//        return response()->noContent();
    }

    public function setToPlay(Album $album)
    {
        if ($lastPlayingAlbum = Album::where('is_playing', 1)->first() ) {

            $lastPlayingAlbum->is_playing = 0;
            $lastPlayingAlbum->save();

        }

        $album->is_playing = 1;
        $album->save();

        return redirect()->route('albums.index')->with('success','Album Playing updated successfully');


    }

    public function albumTrack(Album $album)
    {
        $tracks = $album->tracks()->orderBy('priority', 'asc')->with('artist', 'genre', 'album')->paginate(50);

        return view('albums.tracks.index',compact('tracks', 'album'))->with('i', (request()->input('page', 1) - 1) * 5);

    }


    public function albumTrackEdit(Album $album, Track $track)
    {
        $artists = Artist::all();
        $albums = Album::all();
        $genres = genre::all();

        return view('albums.tracks.edit', compact('track', 'artists', 'albums', 'album', 'genres'));

    }

    public function albumTrackUpdate(TrackRequest $request, Album $album, Track $track)
    {
        $track->update([
            'name' => $request->name,
            'path' => $request->path,
            'priority' => $request->priority,
        ]);

        $artist = Artist::find($request->artist_id);
        $album1 = Album::find($request->album_id);
        $genre = genre::find($request->genre_id);

        $track->artist()->associate($artist);
        $track->genre()->associate($genre);
        $track->album()->associate($album1);
        $track->save();

        return redirect()->route('albumTrack', $album->id)->with('success','Track updated successfully');

    }
}
