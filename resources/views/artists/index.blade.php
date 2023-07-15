@extends('artists.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>Artist</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('artists.create') }}"> Create Artist</a>
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
            <th>Action</th>
        </tr>
        @foreach ($artists as $artist)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $artist->id }}</td>
                <td>{{ $artist->name }}</td>
                <td><form action="{{ route('artists.destroy',$artist->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('artists.show',$artist->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('artists.edit',$artist->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Do you really want to delete artist!')" class="btn btn-danger">Delete</button>
                    </form></td>
            </tr>
        @endforeach
    </table>
    {!! $artists->links() !!}
@endsection
