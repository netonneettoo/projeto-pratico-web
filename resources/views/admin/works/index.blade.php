@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="col-md-12">
        <div class="container">

            <h3>Admin Works</h3>

            @if (@isset($success))
                <div class="alert alert-success">
                    <ul style="padding-left:20px;">
                        <li>{{ $success }}</li>
                    </ul>
                </div>
            @endif

            <a href="/admin/works/create" class="btn btn-primary btn-xs" aria-label="Left Align" style="float:right;">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Nova Obra
            </a>

            <table class="table table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Edição</th>
                        <th>Ano</th>
                        <th>ISBN</th>
                        <th>Editora</th>
                        <th>Tipo</th>
                        <th>Status</th>
                        <th>Autor(es)</th>
                        <th width="170px"></th>
                    </tr>
                </thead>
                <tbody>
                    @if($works)
                        @foreach($works as $work)
                            <tr>
                                <td>{{ $work->title }}</td>
                                <td>{{ $work->edition }}</td>
                                <td>{{ $work->publication_year }}</td>
                                <td>{{ $work->isbn }}</td>
                                <td>{{ $work->publisher_id }}</td>
                                <td>{{ $work->work_type_id }}</td>
                                <td>{{ $work->status }}</td>
                                <td>Local reservado para os Autor(es)</td>
                                <td class="text-right">
                                    <a href="/admin/works/{{ $work->id }}" class="btn btn-default btn-xs" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Visualizar
                                    </a>
                                    <a href="/admin/works/{{ $work->id }}/edit" class="btn btn-primary btn-xs" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Alterar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td>Não existem registros.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <div class="text-center">
                {!! $works->render() !!}
            </div>

        </div>
    </div>

@endsection

@section('scripts')
@endsection