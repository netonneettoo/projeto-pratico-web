@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="col-md-12">
        <div class="container">

            Pesquisa usuarios via ajax...<br/>

            <div class="form-group">
                <select class="form-control select2-users">
                    <option value="" selected="selected"></option>
                </select>
            </div>

            {{--<form action="#">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<h3 class="panel-title">Pesquisar acervo</h3>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}

                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
                                    {{--<input class="mdl-textfield__input" type="text" id="id1" />--}}
                                    {{--<label class="mdl-textfield__label" for="id1">{{utf8_encode('Título')}}</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
                                    {{--<input class="mdl-textfield__input" type="text" id="id2" />--}}
                                    {{--<label class="mdl-textfield__label" for="id2">Autor</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
                                    {{--<input class="mdl-textfield__input" type="text" id="id3" />--}}
                                    {{--<label class="mdl-textfield__label" for="id3">Editora</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
                                    {{--<input class="mdl-textfield__input" type="text" id="id4" />--}}
                                    {{--<label class="mdl-textfield__label" for="id4">{{utf8_encode('Gênero')}}</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
                                    {{--<input class="mdl-textfield__input" type="text" id="id5" />--}}
                                    {{--<label class="mdl-textfield__label" for="id5">ISBN</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-12">--}}
                                {{--<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">--}}
                                    {{--<input class="mdl-textfield__input" type="text" id="id6" />--}}
                                    {{--<label class="mdl-textfield__label" for="id6">Palavra Chave</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="panel-footer">--}}
                        {{--<div class="text-right">--}}
                            {{--<button class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

            var apiUsers = {
                selectLoan: '.select2-users',
                optionsSelectUsers: {
                    ajax: {
                        url: '/api/users',
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                name: params.term,
                                page: params.page
                            };
                        },
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        },
                        cache: true
                    },
                    escapeMarkup: function (markup) { return markup; },
                    minimumInputLength: 3,
                    templateResult: function(data) {
                        return data.id + ' - ' + data.name;
                    },
                    templateSelection: function(data) {
                        if (data.id != undefined && data.name != undefined)
                            return data.id + ' - ' + data.name;
                        return 'Digite o nome de um usuário';
                    }
                },
                init: function() {
                    $(apiUsers.selectLoan).select2(apiUsers.optionsSelectUsers);
                }
            };

            apiUsers.init();
        });
    </script>
@endsection