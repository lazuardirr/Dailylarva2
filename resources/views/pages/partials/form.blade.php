@if($pages == 'agents')
<div class="form-body">
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-envelope"></i>
                {!! Form::label('email', 'Email:') !!}
            </span>
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
                {!! Form::label('email_password', 'Email Password:') !!}
            </span>
            {!! Form::text('email_password', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
                {!! Form::label('dailymotion_password', 'Dailymotion Password:') !!}
            </span>
            {!! Form::text('dailymotion_password', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-actions">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>
@endif
@if($pages == 'movies')
    <div class="form-body">
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-envelope"></i>
                {!! Form::label('id', 'ID:') !!}
            </span>
                {!! Form::text('id', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
                {!! Form::label('title', 'Title:') !!}
            </span>
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
                {!! Form::label('Tags', 'Tags:') !!}
            </span>
                {!! Form::text('tags', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
                {!! Form::label('genre', 'Genre:') !!}
            </span>
                {!! Form::text('genre', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
                {!! Form::label('channel', 'Channel:') !!}
            </span>
                {!! Form::text('channel', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
                {!! Form::label('country', 'Country:') !!}
            </span>
                {!! Form::text('country', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
                {!! Form::label('language', 'Language:') !!}
            </span>
                {!! Form::text('language', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="form-actions">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>

@endif