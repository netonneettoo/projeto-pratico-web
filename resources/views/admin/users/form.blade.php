
{!! Form::open(['url' => $formUrl, 'method' => $formMethod]) !!}

<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

@if($formMethod == 'put')
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Password:', ['class' => 'control-label']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
@endif

{!! Form::submit('Create New User', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}