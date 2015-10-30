@extends('adminlte')

@section('title')
    {{$agent->email}} - Edit
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($agent, ['method' => 'PATCH', 'action' => ['AgentsController@update', $agent->id], 'role' => 'form']) !!}
            @include('pages.partials.form', ['pages' => 'agents', 'submitButtonText' => 'Edit Agent'])
            {!! Form::close() !!}
        </div>
    </div>
    @include('errors.list')
@stop