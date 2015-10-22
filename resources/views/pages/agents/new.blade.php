@extends('dashboard')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
                Input New Agent
                <small> please input new agent and more</small>
            </h3>
            <!-- END PAGE HEADER-->
            <!-- BEGIN PAGE CONTENT-->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box blue">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> Add New Agent
                            </div>
                        </div>
                        <div class="portlet-body form">
                            {!! Form::open(['url' => 'agents']) !!}
                            <div class="form-body">
                                <div class="form-group">
                                    {!! Form::label('email', 'Email:') !!}
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email_password', 'Email Password:') !!}
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        {!! Form::text('email_password', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('dailymotion_password', 'Dailymotion Password:') !!}
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                        {!! Form::text('dailymotion_password', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="form-actions">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT-->
        </div>
    </div>

@stop