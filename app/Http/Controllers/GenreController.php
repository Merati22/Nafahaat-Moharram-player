<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Http\Resources\GenreResource;
use App\Models\Artist;
use App\Models\genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::latest()->paginate(10);
        return view('genres.index',compact('genres'))->with('i', (request()->input('page', 1) - 1) * 5);

//        return GenreResource::collection($genres);
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(GenreRequest $request)
    {
        Genre::create($request->validated());
        return redirect()->route('genres.index')->with('success','Genre created successfully.');

//        return new GenreResource($genre);
    }

    public function show(Genre $genre)
    {
        return view('genres.show', compact('genre'));

//        return new GenreResource($genre);
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit',compact('genre'));
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());
        return redirect()->route('genres.index')->with('success','Genre updated successfully');

//        return new GenreResource($genre);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genres.index')->with('success','Genre deleted successfully');

//        return response()->json(null, 204);
    }

}
