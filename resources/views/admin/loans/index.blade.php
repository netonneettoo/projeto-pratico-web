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
                            apiUsers.addTableCopies(data);
                            apiUsers.setFields('#' + data.id + ' - ' + data.name, apiUsers.countLoanedCopies(data.id), apiUsers.hasDebt(data.id));
                            apiUsers.setHrefBtnNew(data.id);
                            return data.id + ' - ' + data.name;
                        }
                        apiUsers.resetFields();
                        return 'Digite o nome de um usuário';
                    }
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
                    $(apiUsers.userCopiesPanel).show("slow", function() {
                        $('#user-name').text(userName);
                        $('#loaned-copies').text(loanedCopies);
                        $('#has-debt').text(hasDebt);
                        apiUsers.btnNewLoan.show('slow', function() {
                            apiUsers.btnNewLoan.removeClass('hide');
                        });
                    });
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
                    var html = '';
                    html += '<table class="table table-condensed table-striped table-hover">';
                    html += '   <thead>';
                    html += '       <tr>';
                    html += '           <th>';
                    html += '               ';
                    html += '           </th>';
                    html += '       </tr>';
                    html += '   </thead>';
                    html += '   <tbody>';
                    html += '       <tr>';
                    html += '           <td>';
                    html += '               ';
                    html += '           </td>';
                    html += '       </tr>';
                    html += '   </tbody>';
                    html += '</table>';
                    $(apiUsers.userCopiesPanel + ' .panel-body').append(html);
                },
                removeTableCopies: function() {
                    //
                },
                init: function() {
                    $(apiUsers.selectLoan).select2(apiUsers.optionsSelectUsers);
                }
            };
            apiUsers.init();
        });
    </script>
@endsection