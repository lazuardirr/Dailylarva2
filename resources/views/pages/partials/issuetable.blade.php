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
                @foreach(\App\DevIssue::all() as $issue)
                    <tr class="warning">
                        <td>{{ $issue->id }}.</td>
                        <td>{{ $issue->issue }}</td>
                        <td>{{ $issue->detail }}</td>
                        <td>
                            <span class="badge bg-yellow">{{ $issue->level }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>