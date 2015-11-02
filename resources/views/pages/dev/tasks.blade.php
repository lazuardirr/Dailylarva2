@extends('adminlte')

@section('title')
    Development - Tasks
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">New Task</h3>
                </div>
                <div class="box-body">
                    <form action="{{ url('dev/task') }}" method="post" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label for="task" class="col-md-3 control-label">Task Name</label>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-cog"></i></span>
                                        <input name="task" type="text" class="form-control" placeholder="New Task">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status" class="col-md-3 control-label">Status</label>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-exclamation"></i></span>
                                        <input name="status" type="text" class="form-control" placeholder="Status">
                                    </div>
                                </div>
                            </div>
                            <div id="sub-task" class="form-group">
                                <label for="subTask" class="col-md-3 control-label">Sub Task</label>

                                <div class="col-md-9">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-exclamation"></i></span>
                                        <input name="subTask[]" type="text" class="form-control" placeholder="Subtask">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9 col-md-offset-3">
                                <div class="form-group">
                                    <button id="addSubTask" type="button" class="btn btn-default form-control">Add new
                                        Sub Task
                                    </button>
                                </div>
                            </div>
                            <div class="form-actions">
                                {!! Form::submit('Add New Task', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            @include('pages.partials.taskTable')
        </div>
    </div>
@endsection

@section('page-javascript')
    <script>
        function getItem() {
            var items = [""];
            items.push("<label for=\"subTask\" class=\"col-md-3 control-label\"></label>" +
                    "<div class=\"col-md-9\" style=\"margin-top:10px;\"'>" +
                    "<div class=\"input-group\">" +
                    "<span class=\"input-group-addon\"><i class=\"fa fa-exclamation\"></i></span>" +
                    "<input name=\"subTask[]\" type=\"text\" class=\"form-control\" placeholder=\"Subtask\">" +
                    "</div>" +
                    "</div>");
            return items;
        }

        jQuery(document).ready(function ($) {
            $("#addSubTask").click(function () {
                var items = getItem();
                $("<div/>", {
                    "class": "input-group",
                    html: items.join("")
                }).appendTo("#sub-task");
            });
        })
    </script>

    <script>
        jQuery(document).ready(function ($) {
            $(".clickable-row").click(function () {
                window.document.location = $(this).data("href");
            })
        })
    </script>
@stop