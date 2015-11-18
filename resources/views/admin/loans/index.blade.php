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

            <div class="panel panel-default" id="panel-user-copies">
                <div class="panel-body"></div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var apiUsers;
        $(document).ready(function() {
            apiUsers = {
                selectLoan: '.loan-search-user',
                userCopiesPanel: '#panel-user-copies',
                btnNewLoan: $('#btn-new-loan'),
                currentUser: null,
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
                        if (data.name && data.email) {
                            return data.name + ' (' + data.email + ')';
                        }
                        return '';
                    },
                    templateSelection: function(data) {
                        if (data.id && data.name && data.email) {
                            apiUsers.currentUser = data.id;
                            apiUsers.setFields(data.name, apiUsers.countLoanedCopies(data), apiUsers.hasDebt(data), data);
                            apiUsers.setHrefBtnNew(data.id);
                            return data.name + ' (' + data.email + ')';
                        }
                        apiUsers.resetFields();
                        return 'Digite o nome de um usuário';
                    }
                },
                dateToBR: function(date) {
                    return date.substr(0, 10).split('-').reverse().join('/');
                },
                setHrefBtnNew: function(id) {
                    var href = '/admin/loans/create';
                    if (id != null && id != undefined) {
                        href += '?u=' + id;
                    }
                    apiUsers.btnNewLoan.attr('href', href);
                },
                countLoanedCopies: function(data) {
                    var copiesCount = 0;
                    for (var l = 0; l < data.loans.length; l++) {
                        for (var i = 0; i < data.loans[l].loanItems.length; i++) {
                            copiesCount++;
                        }
                    }
                    if (copiesCount > 0) {
                        return 'Possui ' + copiesCount + ' exemplar(es) alugado(s).';
                    } else {
                        return 'Não possui exemplares alugados.';
                    }
                },
                hasDebt: function(data) {
                    return 'Verificar se o ucsuário possui débito com a biblioteca/faculdade.';
                },
                setFields: function(userName, loanedCopies, hasDebt, data) {
                    //$(apiUsers.userCopiesPanel).show("slow", function() {
                        $('#user-name').text(userName);
                        $('#loaned-copies').text(loanedCopies);
//                        $('#has-debt').text(hasDebt);
                        apiUsers.addTableCopies(data);
                        apiUsers.btnNewLoan.show('slow', function() {
                            apiUsers.btnNewLoan.removeClass('hide');
                        });
                    //});
                    $(apiUsers.userCopiesPanel).show("slow");
                },
                resetFields: function() {
                    $(apiUsers.userCopiesPanel).hide("slow", function() {
                        $('#user-name').text('');
                        $('#loaned-copies').text('');
                        $('#has-debt').text('');
                        apiUsers.removeTableCopies();
                        apiUsers.btnNewLoan.hide('slow');
                    });
                },
                addTableCopies: function(data) {
                    console.warn(data);
                    var html = '';
                    html += '<table class="table table-condensed table-hover">';
                    if (data.loans.length > 0) {
                        for (var l = 0; l < data.loans.length; l++) {
                            html += '<thead>';
                            html += '   <tr>';
                            html += '       <th colspan="3">';
                            html += '		    Empréstimo: #' + data.loans[l].id;
                            html += '	    </th>';
                            html += '   </tr>';
                            html += '	<tr>';
                            html += '		<th>';
                            html += '   		Descrição';
                            html += '		</th>';
                            html += '		<th>';
                            html += '			Previsão devolução';
                            html += '		</th>';
                            html += '		<th style="width:70px;"></th>';
                            html += '	</tr>';
                            html += '</thead>';
                            html += '<tbody>';
                            if (data.loans[l].loanItems.length > 0) {
                                for (var i = 0; i < data.loans[l].loanItems.length; i++) {
                                    html += '<tr>';
                                    html += '	<td>';
                                    html += '		<b>Título</b>: ' + data.loans[l].loanItems[i].copy.work.title + '<br/>';
                                    html += '		<b>Edição</b>: ' + data.loans[l].loanItems[i].copy.work.edition;
                                    html += '	</td>';
                                    html += '	<td>';
                                    html += '		' + apiUsers.dateToBR(data.loans[l].loanItems[i].return_prevision);
                                    html += '	</td>';
                                    html += '	<td>';
                                    html += '		<a class="btn btn-xs btn-success" href="#renew" data-loan-item-id="' + data.loans[l].loanItems[i].id + '"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span></a>';
                                    html += '		<a class="btn btn-xs btn-danger" href="#return" data-loam-item-id="' + data.loans[l].loanItems[i].id + '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
                                    html += '	</td>';
                                    html += '</tr>';
                                }
                            } else {
                                html += '<tr>';
                                html += '   <td colspan="3">';
                                html += '       Não há exemplares neste empréstimo.';
                                html += '   </td>';
                                html += '</tr>';
                            }
                        }
                        html += '</tbody>';
                    } else {
                        html += '<thead><tr><td>Este usuário não possui empréstimos.</td></tr></thead>';
                    }
                    html += '</table>';
                    $(apiUsers.userCopiesPanel + ' .panel-body').html('');
                    $(apiUsers.userCopiesPanel + ' .panel-body').append(html);
                },
                removeTableCopies: function() {
                    $(apiUsers.userCopiesPanel).hide("slow", function() {
                        $(apiUsers.userCopiesPanel + ' .panel-body').html('');
                    });
                },
                init: function() {
                    $(apiUsers.selectLoan).select2(apiUsers.optionsSelectUsers);
                }
            };
            apiUsers.init();
        });
    </script>
@endsection