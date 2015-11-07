@extends('adminlte')

@section('title')
    {{ $movie->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <img src="{{ $movie->thumbnail }}" alt="" class="img-responsive img-thumbnail">

                    <h3 class="text-center">{{ $movie->title }}</h3>

                    <p class="text-muted text-center">{{ $movie->id }}</p>
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Genre:</b>
                            <i class="pull-right">{{ $movie->genre }}</i>
                        </li>
                        <li class="list-group-item">
                            <b>Country:</b>
                            <i class="pull-right">{{ $movie->country }}</i>
                        </li>
                        <li class="list-group-item">
                            <b>Language:</b>
                            <i class="pull-right">{{ $movie->language }}</i>
                        </li>
                        <li class="list-group-item">
                            <b>Channel:</b>
                            <i class="pull-right">{{ $movie->channel }}</i>
                        </li>
                        <li class="list-group-item">
                            <b>Created:</b>
                            <i class="pull-right">{{ $movie->created_at->diffForHumans() }}</i>
                        </li>
                        <li class="list-group-item">
                            <b>Modified:</b>
                            <i class="pull-right">{{ $movie->updated_at->diffForHumans() }}</i>
                        </li>
                    </ul>
                    <a href="{{ route('movies.edit', $movie) }}" class="btn btn-primary btn-block">
                        <b>Edit</b>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <ht class="box-title">Description</ht>
                </div>
                <div class="box-body">
                    <p>{!! \Illuminate\Support\Facades\Crypt::decrypt($movie->description) !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-javascript')
    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
@stop