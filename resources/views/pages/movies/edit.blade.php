@extends('adminlte')

@section('content')

    <div class="box">
        <div class="box-body">
            <div class="col-md-8">
                {!! Form::model($movie, ['method' => 'PATCH', 'action' => 'MoviesController@update', $movie->id]) !!}
                @include('pages.partials.form', ['pages' => 'movies', 'submitButtonText' => 'Add Movies'])
                {!! Form::close() !!}

                @include('errors.list')
            </div>
        </div>
    </div>
@stop