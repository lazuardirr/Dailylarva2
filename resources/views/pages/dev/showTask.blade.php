@extends('adminlte')

@section('title')
    Development - Task (id: {{$task->id}})
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">{{ $task->task }}</h3>
                </div>
                <div class="box-body">
                    {!! Form::model($task, ['method' => 'PATCH', 'action' => ['DevelopmentController@taskProgress', $task->id], 'role' => 'form']) !!}
                    @foreach($task->subTask as $subtask)
                        <div class="form-group">
                            <div class="input-group col-md-12">
                                <label for="subtask[{{ $subtask->id }}]" class="col-md-8">{{$subtask->sub_task}}</label>
                                    <span class="col-md-4">
                                        <input {{ $subtask->progress == 1 ? 'checked disabled' : '' }} name="subtask[{{ $subtask->id }}]"
                                               type="checkbox">Done
                                    </span>
                            </div>
                        </div>
                    @endforeach
                    <div class="form-actions">
                        {!! Form::submit('Submit Progress', ['class' => 'btn btn-primary form-control']) !!}
                    </div>
                    </form>
                </div>
                @include('errors.list')
            </div>
        </div>
    </div>
@stop