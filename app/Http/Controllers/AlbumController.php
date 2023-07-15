<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlbumRequest;
use App\Http\Resources\AlbumResource;
use App\Models\Album;
use App\Models\Artist;
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
}
