@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="col-md-12">
        <div class="container">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Novo Empréstimo</h3>
                </div>
            </div>

            <form action="#">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <span id="user-name">
                                #{{ $user->id }} - {{ $user->name }}
                            </span><br/>
                            <span id="loaned-copies">
                                {{ $user->email }}
                            </span><br/>
                            <span id="has-debt"></span>
                        </div>
                    </div>
                </div>
            </form>

            <form>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <select class="form-control loan-search-copies">
                                <option value="" selected="selected"></option>
                            </select>
                            <div style="margin-top:20px;float:right;">
                                <button class="btn btn-xs btn-success" id="submit-do-loan">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Realizar o Empréstimo
                                </button>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <span id="work-title"></span><br/>
                            <span id="work-title-2"></span>
                        </div>
                    </div>
                </div>
            </form>


            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm-12">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <td>Exemplar</td>
                                    <td>Previsao de Devolucao</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i=0;$i<3;$i++)
                                    <tr>
                                        <td>
                                            Titulo: Introducao a informatica {{$i}} <br/>
                                            Autor: Alberto Einstein
                                        </td>
                                        <td>
                                            0{{$i}}/0{{$i}}/200{{$i}}
                                        </td>
                                        <td class="td-actions">
                                            <button class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Renovar">
                                                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                            </button>
                                            <button class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Devolver">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>

        var currentCopy = null;
        var copies = [];

        $(document).ready(function() {

            var apiLoan = {
                selectLoan: '.loan-search-copies',
                submitDoLoan: $('#submit-do-loan'),
                optionsSelectUsers: {
                    ajax: {
                        url: '/api/copies',
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                id: params.term,
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
                    minimumInputLength: 1,
                    templateResult: function(data) {
                        if (data.id && data.work.title && data.work.publication_year && data.work.edition && data.work.publisher_id) {
                            currentCopy = data;
                            return 'id:' + data.id + ' - title:' + data.work.title + ' - publication_year:' + data.work.publication_year + ' - edition:' + data.work.edition + ' - ' + data.work.publisher_id;
                        }
                        return '';
                    },
                    templateSelection: function(data) {
                        if (data.id && data.work.title && data.work.publication_year && data.work.edition && data.work.publisher_id) {
                            return data.id + ' - ' + data.work.title + ' - ' + data.work.publication_year + ' - ' + data.work.edition + ' - ' + data.work.publisher_id;
                        }
                        return 'Digite o código de um exemplar';
                    }
                },
                doLoan: function(data) {
                    copies.push(data);
                },
                init: function() {
                    $(apiLoan.selectLoan).select2(apiLoan.optionsSelectUsers);
                    apiLoan.submitDoLoan.click(function(evt) {
                        evt.preventDefault();
                        if (currentCopy != null)
                            apiLoan.doLoan(currentCopy);
                    });
                }
            };

            apiLoan.init();

        });
    </script>
@endsection