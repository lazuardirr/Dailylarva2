@extends('adminlte')

@section('title')
    Movies
@endsection

@section('content')
    <div class="row">
        @foreach($movies as $movie)
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header with-border ui-sortable-handle">
                        <div class="user-block">
                            {!!  Html::image($movie->thumbnail, null, ['class' => 'img-circle']) !!}
                            <span class="username"><a
                                        href="{{ url('movies/'.$movie->id) }}">{{ $movie->title }}</a></span>
                            <span class="description">{{ $movie->id }}</span>
                        </div>
                    </div>
                    <div class="box-body">
                        <dl class="dl-horizontal" style="margin-left: -100px;">
                            <dt>Genre:</dt>
                            <dd>{{ $movie->genre }}</dd>
                            <dt>Channel:</dt>
                            <dd>{{ $movie->channel }}</dd>
                            <dt>Country:</dt>
                            <dd>{{ $movie->country }}</dd>
                            <dt>Language:</dt>
                            <dd>{{ $movie->language }}</dd>
                            <dt>Tags:</dt>
                            <dd>{{ $movie->tags }}</dd>
                            <dt>Created:</dt>
                            <dd>{{ $movie->created_at->diffForHumans() }}</dd>
                            <dt>Modified:</dt>
                            <dd>{{ $movie->updated_at->diffForHumans() }}</dd>
                        </dl>
                        <div class="box box-default collapsed-box">
                            <div class="box-header with-border">
                                <h4>Description</h4>

                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" type="button" data-widget="collapse">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body">
                                {!! \Illuminate\Support\Facades\Crypt::decrypt($movie->description) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {!! $movies->render()!!}
    </div>
@endsection

@section('page-javascript')
    <script>
        $('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
@stop