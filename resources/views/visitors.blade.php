@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center">
                <h3>Visitors Per Day and Hour</h3>
            </div>

        </div>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Date</th>
            <th>Hour</th>
            <th>Number of Visitors</th>
        </tr>
        </thead>
        <tbody>
        @foreach($visitorLogs as $log)
            <tr>
                <td>{{ $log->date }}</td>
                <td>{{ $log->hour }}</td>
                <td>{{ $log->count }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
