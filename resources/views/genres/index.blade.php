@extends('genres.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>Genres</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('genres.create') }}"> Create Genre</a>
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
            <th>Cover Path</th>
            <th>Action</th>
        </tr>
        @foreach ($genres as $genre)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $genre->id }}</td>
                <td>{{ $genre->name }}</td>
                <td>
                    <a href= "{{ url("$genre->cover_path") }}"> {{$genre->cover_path}}</a>
                </td>
                <td><form action="{{ route('genres.destroy',$genre->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('genres.show',$genre->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('genres.edit',$genre->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Do you really want to delete genre!')" class="btn btn-danger">Delete</button>
                    </form></td>
            </tr>
        @endforeach
    </table>
    {!! $genres->links() !!}
@endsection
