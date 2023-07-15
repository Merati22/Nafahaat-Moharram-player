@extends('genres.layout')
@section('content')
    <br><br>
    <div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3> Track Detail </h3>
            </div>
        </div>
    </div><br>
    <div class="row text-center">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $track->name }}
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Artist:</strong>
                {{ $track->artist->name }}
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Genre:</strong>
                {{ $track->genre->name }}
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Album:</strong>
                {{ $track->album->name }}
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Path:</strong>
                <a href= "{{ url("$track->path") }}"> {{$track->path}}</a>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <a class="btn btn-primary" href="{{ route('tracks.index') }}"> Back</a>
        </div>
    </div>
@endsection
