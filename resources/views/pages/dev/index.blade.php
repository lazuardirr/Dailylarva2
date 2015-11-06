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
                    <span class="info-box-number">{{ $subTasks['total'] + $issues['total'] }}</span>

                    <div class="progress">
                        <div class="progress-bar"
                             style="width: {{ $subTasks['progress'] - $issues['regress'] }}%;"></div>
                    </div>
                    <span class="progress-description">
                        {{ $subTasks['progress'] - $issues['regress'] }}% completed
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
                    <span class="info-box-number">{{ $issues['total'] }}</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{ $issues['regress'] }}%;"></div>
                    </div>
                    <span class="progress-description">
                        {{ $issues['total'] }} issue unresolved
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @include('pages.partials.issuetable')
    </div>

@endsection

@section('page-javascript')
@stop
