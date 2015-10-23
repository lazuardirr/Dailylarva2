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
                <div class="col-md-12">
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