@extends('layouts.biblioteca')

@section('styles')
    <style>
        #user-name {
            font-weight: bold;
            text-transform: uppercase;
        }
        #loaned-copies, #has-debt {
            font-style: italic;
        }
    </style>
@endsection

@section('content')

    <div class="col-md-12">
        <div class="container">

            <div class="panel panel-default">
                <a href="/admin/loans/create" class="btn btn-xs btn-success hide" id="btn-new-loan" style="float:right;margin-top:20px;margin-right:20px;">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Novo
                </a>
                <div class="panel-heading">
                    <h3 class="panel-title">Empréstimos</h3>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <select class="form-control loan-search-user">
                                <option value="" selected="selected"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <span id="user-name"></span><br/>
                        <span id="loaned-copies"></span><br/>
                        <span id="has-debt"></span>
                    </div>
                </div>
            </div>

            <div class="panel panel-default hide" id="user-copies">
                <div class="panel-body">
                    <div class="col-sm-12">
                        <table class="table table-responsive" id="user-table-copies">
                            <thead>
                            {{--<tr>--}}
                                {{--<td>Exemplar</td>--}}
                                {{--<td>Previsão de Devolução</td>--}}
                                {{--<td></td>--}}
                            {{--</tr>--}}
                            </thead>
                            <tbody>
                            {{--@for($i=0;$i<3;$i++)--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--Titulo: Introducao a informatica {{$i}} <br/>--}}
                                        {{--Autor: Alberto Einstein--}}
                                    {{--</td>--}}
                                    {{--<td>--}}
                                        {{--0{{$i}}/0{{$i}}/200{{$i}}--}}
                                    {{--</td>--}}
                                    {{--<td class="td-actions">--}}
                                        {{--<button class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Renovar">--}}
                                            {{--<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>--}}
                                        {{--</button>--}}
                                        {{--<button class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Devolver">--}}
                                            {{--<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>--}}
                                        {{--</button>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endfor--}}
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
        $(document).ready(function() {

            var apiUsers = {
                selectLoan: '.loan-search-user',
                userCopies: $('#user-copies'),
                userCopiesTable: $('#user-table-copies'),
                btnNewLoan: $('#btn-new-loan'),
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
                        if (data.id && data.name) {
                            return data.id + ' - ' + data.name;
                        }
                        return '';
                    },
                    templateSelection: function(data) {
                        if (data.id && data.name) {
                            apiUsers.setTableCopies(data.id);
                            apiUsers.setFields('#' + data.id + ' - ' + data.name, apiUsers.countLoanedCopies(data.id), apiUsers.hasDebt(data.id));
                            apiUsers.setHrefBtnNew(data.id);
                            return data.id + ' - ' + data.name;
                        }
                        apiUsers.resetFields();
                        return 'Digite o nome de um usuário';
                    }
                },
                init: function() {
                    $(apiUsers.selectLoan).select2(apiUsers.optionsSelectUsers);
                },
                setHrefBtnNew: function(id) {
                    var href = '/admin/loans/create';
                    if (id != null && id != undefined) {
                        href += '?u=' + id;
                    }
                    apiUsers.btnNewLoan.attr('href', href);
                },
                countLoanedCopies: function(id) {
                    return 'Possui ' + id + ' exemplar(es) alugado(s).';
                },
                hasDebt: function(id) {
                    return 'Possui débito com a faculdade.';
                },
                setFields: function(userName, loanedCopies, hasDebt) {
                    apiUsers.userCopies.slideDown("slow", function() {
                        apiUsers.userCopies.removeClass('hide');
                        $('#user-name').text(userName);
                        $('#loaned-copies').text(loanedCopies);
                        $('#has-debt').text(hasDebt);
                        apiUsers.btnNewLoan.slideDown('slow', function() {
                            apiUsers.btnNewLoan.removeClass('hide');
                        });
                    });
                },
                resetFields: function() {
                    apiUsers.userCopies.slideUp("slow", function() {
                        $('#user-name').text('');
                        $('#loaned-copies').text('');
                        $('#has-debt').text('');
                        apiUsers.resetTableCopies();
                        apiUsers.btnNewLoan.slideUp('slow', function() {
                            apiUsers.btnNewLoan.removeClass('hide');
                        });
                    });
                },
                setTableCopies: function(userId) {
                    //
                },
                resetTableCopies: function() {
                    //
                },
            };

            apiUsers.init();

        });
    </script>
@endsection