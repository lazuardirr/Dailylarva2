@extends('adminlte')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                Edit: {{ $agent->email }}
                <small> please input new agent and more</small>
            </h3>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-8">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> Add New Agent
                            </div>
                        </div>
                        <div class="portlet-body form">
                            {!! Form::model($agent, ['method' => 'PATCH', 'action' => ['AgentsController@update', $agent->id]]) !!}
                            @include('pages.partials.form', ['pages' => 'agents', 'submitButtonText' => 'Edit Agent'])
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