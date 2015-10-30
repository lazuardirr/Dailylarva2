@extends('adminlte')

@section('title')
    {{ $agent->email }}
@endsection
@section('content')
    <table class="table table-striped table-bordered table-hover" id="sample_1">
        <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Email Password</th>
            <th>Dailymotion Password</th>
            <th>Created</th>
            <th>Last Modified</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$agent->id}}</td>
            <td>{{$agent->email}}</td>
            <td>{{$agent->email_password}}</td>
            <td>{{$agent->dailymotion_password}}</td>
            <td>{{$agent->created_at}}</td>
            <td>{{$agent->updated_at}}</td>
        </tr>
        </tbody>
    </table>
@stop