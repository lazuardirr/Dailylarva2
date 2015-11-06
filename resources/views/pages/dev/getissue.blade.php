@extends('adminlte')

@section('title')
    Development - Issues
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">New Issue</h3>
                </div>
                <div class="box-body">
                    <form action="{{ url('dev/issue') }}" method="post" class="form">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label for="issue" class="control-label">Issue</label>

                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-warning"></i></span>
                                    <input name="issue" type="text" class="form-control" placeholder="New Issue">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="detail" class="control-label">Detail</label>
                                <textarea name="detail" class="form-control" rows="3"
                                          placeholder="Issue detail.."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>

                                <div class="input-group">
                                    <select name="level" class="form-control">
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                        <option value="severe">Severe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions">
                                {!! Form::submit('Add New Issue', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                        </div>
                    </form>
                </div>
                @include('errors.list')
            </div>
        </div>
        @include('pages.partials.issuetable')
    </div>
@stop