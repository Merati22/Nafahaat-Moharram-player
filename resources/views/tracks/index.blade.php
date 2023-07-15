@extends('tracks.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>Tracks</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tracks.create') }}">Create Track</a>
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
            <th>Artist</th>
            <th>Genre</th>
            <th>Album</th>
            <th>Path</th>
        </tr>
        @foreach ($tracks as $track)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $track->id }}</td>
                <td>{{ $track->name }}</td>
                <td>{{ $track->artist->name }}</td>
                <td>{{ $track->genre->name }}</td>
                <td>{{ $track->album->name }}</td>
                <td>
                    <a href= "{{ url("$track->path") }}"> {{$track->path}}</a>
                </td>
                <td><form action="{{ route('tracks.destroy',$track->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('tracks.show',$track->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('tracks.edit',$track->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Do you really want to delete track!')" class="btn btn-danger">Delete</button>
                    </form></td>
            </tr>
        @endforeach
    </table>
    {!! $tracks->links() !!}
@endsection
