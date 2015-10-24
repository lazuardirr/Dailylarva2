@extends('dashboard')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                Create New Movie
            </h3>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        {!! Form::text('movie_title', null, ['id' => 'movie_title', 'class' => 'form-control', 'placeholder' => 'Search for title...']) !!}
                        <span class="input-group-btn">
                            {!! Form::button('Go!', ['id' => 'search', 'class' => 'btn btn-default']) !!}
                        </span>
                    </div>
                    <!-- /input-group -->

                    <div class="panel panel-default hidden" id="result-panel" style="margin-top:5px;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Result</h3>
                        </div>
                        <div class="panel-body" id="result-container">
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> Add New Movie
                            </div>
                        </div>
                        <div class="portlet-body form">
                            {!! Form::open(['url' => 'movies']) !!}
                            @include('pages.partials.form', ['pages' => 'movies', 'submitButtonText' => 'Add Movies'])
                            {!! Form::close() !!}

                            @include('errors.list')

                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>

@stop