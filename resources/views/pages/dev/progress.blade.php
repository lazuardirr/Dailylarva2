@extends('adminlte')

@section('title')
    Development Progress
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <ul class="timeline">
                <li class="time-label">
                    <span class="bg-red">
                        10 Feb. 2014
                    </span>
                </li>

                <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                        <span class="time">
                            <i class="fa fa-clock-o"></i>
                            12.05
                        </span>

                        <h3 class="timeline-header">
                            <a href="#">Support Team</a>
                        </h3>

                        <div class="timeline-body">
                            Timeline Content
                        </div>
                        <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-xs">read more</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">New Progress</h3>
                </div>
                <div class="box-body">
                    <form action="{{ url('dev/progress') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label for="task" class="col-md-2 control-label">Progress</label>
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-cog"></i></span>
                                        <input name="progress_title" type="text" class="form-control"
                                               placeholder="New Progress">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="progress_title" class="col-md-2 control-label">Detail</label>

                                <div class="col-md-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input name="progress_title" type="text" class="form-control"
                                               placeholder="Detail">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection