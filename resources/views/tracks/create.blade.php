@extends('tracks.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Create Track</h2>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> something we are problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tracks.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Artist:</strong>
                    <select class="form-control" id="artist_id" name="artist_id" required>
                        <option value="">Select an Artist</option>
                        @foreach ($artists as $artist)
                            <option value="{{ $artist->id }}">{{ $artist->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Genre:</strong>
                    <select class="form-control" id="genre_id" name="genre_id" required>
                        <option value="">Select an Genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Album:</strong>
                    <select class="form-control" id="album_id" name="album_id" required>
                        <option value="">Select an Album</option>
                        @foreach ($albums as $album)
                            <option value="{{ $album->id }}">{{ $album->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Track Path:</strong>
                    <input type="text" name="path" class="form-control" placeholder="Track Path">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a class="btn btn-primary" href="{{ route('tracks.index') }}"> Back</a>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
    </form>
@endsection
