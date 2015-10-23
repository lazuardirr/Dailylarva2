<div class="form-body">
    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('email_password', 'Email Password:') !!}
        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
            {!! Form::text('email_password', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('dailymotion_password', 'Dailymotion Password:') !!}
        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="fa fa-user"></i>
                                            </span>
            {!! Form::text('dailymotion_password', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-actions">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>
</div>