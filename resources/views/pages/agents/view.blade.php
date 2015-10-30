@extends('adminlte')

@section('title')
    Agents
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
        @foreach($agents as $agent)
            <tr class="clickable-row flat" data-href="{{url('agents/'.$agent->id)}}" style="cursor:pointer;">
                <td>{{ $agent->id }}</td>
                <td>{{ $agent->email }}</td>
                <td>{{ $agent->email_password }}</td>
                <td>{{ $agent->dailymotion_password }}</td>
                <td>{{ $agent->created_at->diffForHumans() }}</td>
                <td>{{ $agent->updated_at->diffForHumans() }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $agents->render()!!}
@endsection

@section('page-javascript')
    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
    <script>
        jQuery(document).ready(function ($) {
            $(".clickable-row").click(function () {
                window.document.location = $(this).data("href");
            })
        })
    </script>
@stop