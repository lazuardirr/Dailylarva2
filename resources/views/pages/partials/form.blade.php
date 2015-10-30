@if($pages == 'agents')
<div class="form-body">
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-envelope"></i>
            </span>
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-user"></i>
            </span>
            {!! Form::text('email_password', null, ['class' => 'form-control', 'placeholder' => 'Email Password']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-lock"></i>
            </span>
            {!! Form::text('dailymotion_password', null, ['class' => 'form-control', 'placeholder' => 'Dailymotion Password']) !!}
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
                @
            </span>
                {!! Form::text('id', null, ['class' => 'form-control', isset($movie) ? 'disabled' : '', 'placeholder' => 'ID']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-font"></i>
            </span>
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-tag"></i>
            </span>
                {!! Form::text('tags', null, ['class' => 'form-control', 'placeholder' => 'Tags']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-tags"></i>
            </span>
                {!! Form::text('genre', null, ['class' => 'form-control', 'placeholder' => 'Genre']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-music"></i>
            </span>
                {!! Form::text('channel', null, ['class' => 'form-control', 'placeholder' => 'Channel']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-flag"></i>
            </span>
                {!! Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'Country']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
            <span class="input-group-addon">
                <i class="fa fa-language"></i>
            </span>
                {!! Form::text('language', null, ['class' => 'form-control', 'placeholder' => 'Language']) !!}
            </div>
        </div>
        <div class="form-actions">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>

@endif