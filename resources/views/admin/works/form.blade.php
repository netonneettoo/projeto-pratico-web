
{!! Form::open(['url' => $formUrl, 'method' => $formMethod]) !!}

<div class="form-group">
    {!! Form::label('title', 'Título:', ['class' => 'control-label']) !!}
    {!! Form::text('title', $work->title, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('edition', 'Edição:', ['class' => 'control-label']) !!}
    {!! Form::text('edition', $work->edition, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('publication_year', 'Ano de Publicação:', ['class' => 'control-label']) !!}
    {!! Form::text('publication_year', $work->publication_year, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('isbn', 'ISBN:', ['class' => 'control-label']) !!}
    {!! Form::text('isbn', $work->isbn, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Preço:', ['class' => 'control-label']) !!}
    {!! Form::text('price', $work->price, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('publisher_id', 'Publisher:', ['class' => 'control-label']) !!}
    {!! Form::select('publisher_id', $publishers, $work->publisher_id, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('work_type_id', 'Tipo da Obra:', ['class' => 'control-label']) !!}
    {!! Form::select('work_type_id', $workTypes, $work->work_type_id, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    {!! Form::select('status', array('active' => 'Ativo', 'inactive' => 'Inativo'), $work->status, ['class' => 'form-control']) !!}
</div>

{{--<div class="form-group">--}}
    {{--{!! Form::label('uf', 'Uf:', ['class' => 'control-label']) !!}--}}
    {{--{!! Form::text('uf', $user->uf, ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--<div class="form-group">--}}
    {{--{!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}--}}
    {{--{!! Form::password('password', ['class' => 'form-control']) !!}--}}
{{--</div>--}}

{{--@if(strtolower($formMethod) == 'put' || strtolower($formMethod) == 'post')--}}
    {{--<div class="form-group">--}}
        {{--{!! Form::label('password_confirmation', 'Password Confirmation:', ['class' => 'control-label']) !!}--}}
        {{--{!! Form::password('password_confirmation', ['class' => 'form-control']) !!}--}}
    {{--</div>--}}
{{--@endif--}}

{!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}