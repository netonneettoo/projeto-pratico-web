@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="col-md-12">
        <div class="container">

            <h3>Admin Users</h3>

            @if (@isset($success))
                <div class="alert alert-success">
                    <ul style="padding-left:20px;">
                        <li>{{ $success }}</li>
                    </ul>
                </div>
            @endif

            <a href="/admin/users/create" class="btn btn-primary btn-xs" aria-label="Left Align" style="float:right;">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo Usuário
            </a>

            <table class="table table-condensed table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th width="170px"></th>
                    </tr>
                </thead>
                <tbody>
                    @if($users)
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telephone }}</td>
                                <td class="text-right">
                                    <a href="/admin/users/{{ $user->id }}" class="btn btn-default btn-xs" aria-label="Left Align">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Visualizar
                                    </a>
                                    <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-primary btn-xs" aria-label="Left Align">
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
                {!! $users->render() !!}
            </div>

        </div>
    </div>

@endsection

@section('scripts')
@endsection