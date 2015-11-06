@extends('adminlte')

@section('title')
    Development - Fix Issues
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Issue: {{ $issue->id }}</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($issue, ['method' => 'PATCH', 'action' => ['DevelopmentController@postFixIssue', $issue->id], 'role' => 'form']) !!}
                    <div class="form-body">
                        <div class="form-group">
                            <label for="issue" class="control-label">Issue</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-warning"></i></span>
                                {!! Form::text('issue', null, ['class' => 'form-control', 'placeholder' => 'New Issue', 'disabled']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="detail" class="control-label">Detail</label>
                            {!! Form::textarea('detail', null, ['class' => 'form-control', 'placeholder' => 'Issue detail', 'disabled']) !!}

                        </div>
                        <div class="form-group">
                            <label for="level">Level</label>

                            <div class="input-group">
                                {!! Form::select('level', [
                                'fixed' => 'Fixed',
                                'low' => 'Low',
                                'medium' => 'Medium',
                                'high' => 'High',
                                'severe' => 'Severe'
                                ],
                                $issue->level,
                                ['class' => 'form-control', 'disabled']
                                ) !!}
                            </div>
                        </div>
                        <div class="form-actions">
                            {!! Form::submit('Fix Issue', ['class' => 'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop