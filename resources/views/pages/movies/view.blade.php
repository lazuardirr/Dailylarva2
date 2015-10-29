@extends('adminlte')

@section('content')
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->
        <h3 class="page-title">Movies</h3>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box grey-cascade">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Movies
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{ url('dashboard/movie/create') }}">
                                            <button id="sample_editable_1_new" class="btn green">
                                                Add New <i class="fa fa-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($movies as $movie)
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <tr>
                                    <th class="col-md-2">Id</th>
                                    <td class="col-md-10">{{ $movie->id }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-2">Title</th>
                                    <td class="col-md-10">{{ $movie->title }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-2">Tags</th>
                                    <td class="col-md-10">{{ $movie->tags }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-2">Genre</th>
                                    <td class="col-md-10">{{ $movie->genre }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-2">Channel</th>
                                    <td class="col-md-10">{{ $movie->channel }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-2">Country</th>
                                    <td class="col-md-10">{{ $movie->country }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-2">Language</th>
                                    <td class="col-md-10">{{ $movie->language }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-2">Created</th>
                                    <td class="col-md-10">{{ $movie->created_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-2">Modified</th>
                                    <td class="col-md-10">{{ $movie->updated_at->diffForHumans() }}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-2">Thumbnail</th>
                                    <td class="col-md-10">{!!  Html::image($movie->thumbnail, null, ['class' => 'img-thumbnail col-md-6']) !!}</td>
                                </tr>
                                <tr>
                                    <th class="col-md-2">Description</th>
                                    <td class="col-md-10">{!! \Illuminate\Support\Facades\Crypt::decrypt($movie->description) !!}</td>
                                </tr>
                            </table>
                            <br/>
                        @endforeach
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->

@stop