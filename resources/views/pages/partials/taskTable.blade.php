<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tasks</h3>
    </div>
    <div class="box-body no-padding">
        <table class="table table-condensed">
            <thead>
            <tr>
                <th style="width: 10%;">#</th>
                <th>Task</th>
                <th>Progress</th>
                <th style="width: 40px;">Label</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr class="clickable-row {{$task->status}}" data-href="{{ url('dev/task/'.$task->id) }}"
                    style="cursor: pointer;">
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->task }}</td>
                    <td>
                        <div class="progress progress-xs">
                            <div id="task_{{ $task->id }}" class="progress-bar progress-bar-danger"
                                 style="width: <?php $width = 0; foreach ($task->subTask as $subtask) {
                                     $width += $subtask->progress;
                                 } $progressLabel = round($width / count($task->subTask) * 100, 2); echo $progressLabel; ?>%;"></div>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-red">{{ $progressLabel }}%</span>
                    </td>
                </tr>
                @foreach($task->subTask as $subtask)
                    <tr class="text-sm {{ $task->status }}">
                        <td>{{$subtask->task_id . '.' . $subtask->id}}.</td>
                        <td>{{ $subtask->sub_task }}</td>
                        <td>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger"
                                     style="width: {{ $subtask->progress == 0 ? '0' : '100' }}%;"></div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-red">{{ $subtask->progress * 100 }}%</span>
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div>