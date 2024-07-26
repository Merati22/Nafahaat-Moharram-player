<!-- resources/views/participants/index.blade.php -->

@extends('participant.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>Participants</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('participants.export') }}">Export 50 Random Participants</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <span>{{ $message }}</span>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <span>{{ $message }}</span>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Id</th>
            <th>Full Name</th>
            <th>Phone Number</th>
            <th>Province</th>
            <th>City</th>
            <th>Address</th>
            <th>Post Code</th>
        </tr>
        @foreach ($participants as $participant)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $participant->id }}</td>
                <td>{{ $participant->full_name }}</td>
                <td>{{ $participant->phone_number }}</td>
                <td>{{ $participant->province }}</td>
                <td>{{ $participant->city }}</td>
                <td>{{ $participant->address }}</td>
                <td>{{ $participant->post_code }}</td>
            </tr>
        @endforeach
    </table>

    {!! $participants->links() !!}
@endsection
