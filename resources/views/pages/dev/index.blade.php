@extends('adminlte')

@section('title')
    Development
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="info-box bg-blue">
                <span class="info-box-icon">
                    <i class="fa fa-refresh fa-spin"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Progress</span>
                    <span class="info-box-number">{{ $subTasks['total'] }}</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{ $subTasks['progress'] }}%;"></div>
                    </div>
                    <span class="progress-description">
                        {{ $subTasks['progress'] }}% completed
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box bg-yellow">
                <span class="info-box-icon">
                    <i class="fa fa-cog fa-spin"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Task</span>
                    <span class="info-box-number">{{ $subTasks['total'] }}</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{ $subTasks['progress'] }}%;"></div>
                    </div>
                    <span class="progress-description">
                        {{ $subTasks['progress'] }}% completed
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <ul class="timeline">
                @foreach(App\DevLog::latest()->get() as $devlog)
                    @if(!isset($currentDate) || $devlog->created_at->setTimezone('Asia/Jakarta')->toFormattedDateString() != $currentDate)
                        <li class="time-label">
                            <span class="bg-red">{{ $devlog->created_at->setTimezone('Asia/Jakarta')->toFormattedDateString() }}</span>
                        </li>
                        <?php $currentDate = $devlog->created_at->setTimezone('Asia/Jakarta')->toFormattedDateString();?>
                    @endif
                    <li>
                        <i class="fa fa-cog bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time">
                                <i class="fa fa-clock-o"></i>
                                {{ $devlog->created_at->setTimezone('Asia/Jakarta')->toTimeString() }}
                            </span>

                            <h3 class="timeline-header">
                                <a href="">{{ $devlog->title }}</a>
                                <small>by {{ $devlog->user->name }}</small>
                            </h3>
                            <div class="timeline-body">
                                {!! $devlog->content !!}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            @include('pages.partials.taskTable')
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="info-box bg-red">
                <span class="info-box-icon">
                    <i class="fa fa-warning faa-pulse animated"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">Issue</span>
                    <span class="info-box-number">85412</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: 60%;"></div>
                    </div>
                    <span class="progress-description">
                        60% issue fixed
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Issues</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th style="width: 10%;">#</th>
                            <th>Issue</th>
                            <th>Detail</th>
                            <th style="width: 40px;">Level</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="warning">
                            <td>1.</td>
                            <td>Movies autofill not working</td>
                            <td>JSON error, no cross-site error</td>
                            <td>
                                <span class="badge bg-yellow">medium</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-javascript')
@stop
