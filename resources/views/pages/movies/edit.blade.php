@extends('adminlte')

@section('title')
    {{ $movie->title }} - Edit
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($movie, ['method' => 'PATCH', 'action' => ['MoviesController@update', $movie->id], 'role' => 'form']) !!}
            @include('pages.partials.form', ['pages' => 'movies', 'submitButtonText' => 'Add Movies'])
            {!! Form::close() !!}

            @include('errors.list')
        </div>
    </div>
@stop