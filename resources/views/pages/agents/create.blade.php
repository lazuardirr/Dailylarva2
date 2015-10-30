@extends('adminlte')

@section('title')
    Create a new Agent
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['url' => 'agents', 'role' => 'form']) !!}
            @include('pages.partials.form', ['pages'=> 'agents', 'submitButtonText' => 'Create Agent'])
            {!! Form::close() !!}
    </div>
    </div>
    @include('errors.list')
@stop