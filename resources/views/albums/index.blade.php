@extends('albums.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>Albums</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('albums.create') }}"> Create Album</a>
            </div><br>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Name</th>
            <th>Playing?</th>
            <th>Action</th>
        </tr>
        @foreach ($albums as $album)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $album->id }}</td>
                <td>{{ $album->name }}</td>
                <td>{{ $album->is_playing }}</td>
                <td>
                    <form action="{{ route('albums.destroy',$album->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('albumTrack',$album->id) }}">Show Tracks</a>
                        <a class="btn btn-primary" href="{{ route('albums.edit',$album->id) }}">Edit</a>
                        <a class="btn btn-warning" href="{{ route('setToPlay',$album->id) }}">Set To Play</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Do you really want to delete album!')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $albums->links() !!}
@endsection
