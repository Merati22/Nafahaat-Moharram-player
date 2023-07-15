<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArtistRequest;
use App\Http\Resources\ArtistResource;
use App\Models\Artist;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::latest()->paginate(10);
        return view('artists.index',compact('artists'))->with('i', (request()->input('page', 1) - 1) * 5);
//        return ArtistResource::collection($artists);
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(ArtistRequest $request)
    {
        Artist::create($request->validated());
        return redirect()->route('artists.index')->with('success','Artist created successfully.');
//        return new ArtistResource($artist);
    }

    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
//        return new ArtistResource($artist);
    }


    public function edit(Artist $artist)
    {
        return view('artists.edit',compact('artist'));
    }


    public function update(ArtistRequest $request, Artist $artist)
    {
        $artist->update($request->validated());
        return redirect()->route('artists.index')->with('success','Artist updated successfully');
//        return new ArtistResource($artist);
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('artists.index')->with('success','Artist deleted successfully');
//        return response()->noContent();
    }

}
