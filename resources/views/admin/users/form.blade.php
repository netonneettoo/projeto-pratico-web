
{!! Form::open(['url' => $formUrl, 'method' => $formMethod]) !!}

<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    {!! Form::text('name', $user->name, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
    {!! Form::email('email', $user->email, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('telephone', 'Telephone:', ['class' => 'control-label']) !!}
    {!! Form::text('telephone', $user->telephone, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cellphone', 'Cellphone:', ['class' => 'control-label']) !!}
    {!! Form::text('cellphone', $user->cellphone, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('city', 'City:', ['class' => 'control-label']) !!}
    {!! Form::text('city', $user->city, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('street', 'Street:', ['class' => 'control-label']) !!}
    {!! Form::text('street', $user->street, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cep', 'Cep:', ['class' => 'control-label']) !!}
    {!! Form::text('cep', $user->cep, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('uf', 'Uf:', ['class' => 'control-label']) !!}
    {!! Form::text('uf', $user->uf, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

@if(strtolower($formMethod) == 'put' || strtolower($formMethod) == 'post')
    <div class="form-group">
        {!! Form::label('password_confirmation', 'Password Confirmation:', ['class' => 'control-label']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>
@endif

{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}