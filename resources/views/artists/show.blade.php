@extends('artists.layout')
@section('content')
    <br><br>
    <div class="row text-center">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3> Artist Detail </h3>
            </div>
        </div>
    </div><br>
    <div class="row text-center">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $artist->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a class="btn btn-primary" href="{{ route('artists.index') }}"> Back</a>
        </div>
    </div>
@endsection
