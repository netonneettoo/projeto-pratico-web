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
                                <button class="btn btn-xs btn-success" id="submit-add-copy">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar
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


            <div class="panel panel-default" id="panel-table-loan" style="display:none;">
                <div class="panel-body">
                    <div class="col-sm-12">
                        <table class="table table-responsive" id="table-loan-items">
                            <thead></thead>
                            <tbody></tbody>
                        </table>
                        <div class="text-right">
                            <button class="btn btn-xs btn-success" id="submit-do-loan">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Finalizar o Empréstimo
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>

        var apiLoan;

        $(document).ready(function() {

            //var apiLoan = {
            apiLoan = {
                selectLoan: '.loan-search-copies',
                submitAddCopy: $('#submit-add-copy'),
                submitDoLoan: $('#submit-do-loan'),
                tableLoanItems: '#table-loan-items',
                btnActionRemove: '.btn-action-remove',
                panelTableLoan: $('#panel-table-loan'),
                currentUser: parseInt('{{ $user->id }}'),
                currentCopy: null,
                loanItems: [],
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
                addLoanItem: function(id) {
                    if (apiLoan.loanItems.indexOf(id) == -1) {
                        apiLoan.loanItems.push(id);
                        return true;
                    }
                    return false;
                },
                removeLoanItem: function(id) {
                    apiLoan.loanItems = apiLoan.loanItems.filter(function(eachItemId) {
                        if (id != eachItemId) {
                            return true;
                        }
                        return false;
                    });
                },
                addRowTable: function(id, title, author, returnPrevision) {
                    var html = '';
                    html += '<tr>';
                    html += '   <td>';
                    html += '       Title: ' + title + '<br/>';
                    html += '       Author: ' + author;
                    html += '   </td>';
                    html += '   <td>';
                    html += '       ' + returnPrevision;
                    html += '   </td>';
                    html += '   <td class="td-actions">';
                    html += '       <button class="btn btn-xs btn-danger btn-action-remove" data-copy-id="' + id + '" data-toggle="tooltip" data-placement="top" title="" data-original-title="Devolver"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    html += '   </td>';
                    html += '</td>';
                    if (apiLoan.loanItems.length == 1) {
                        apiLoan.addHeadersTable();
                        apiLoan.panelTableLoan.slideDown('slow');
                    }
                    $(apiLoan.tableLoanItems + ' tbody').append(html);

                },
                removeRowTable: function(btn, dataCopyId) {
                    $(btn).parent().parent().remove();
                    apiLoan.removeLoanItem(dataCopyId);
                    if (apiLoan.loanItems.length == 0) {
                        apiLoan.panelTableLoan.slideUp('slow', function() {
                            apiLoan.removeHeadersTable();
                        });
                    }
                },
                addHeadersTable: function() {
                    var html = '';
                    html += '<tr>';
                    html += '   <th>';
                    html += '       Exemplar';
                    html += '   </th>';
                    html += '   <th>';
                    html += '       Previsão de devolução';
                    html += '   </th>';
                    html += '   <th></th>';
                    html += '</tr>';
                    $(apiLoan.tableLoanItems + ' thead').append(html);
                },
                removeHeadersTable: function() {
                    $(apiLoan.tableLoanItems + ' thead').html('');
                },
                init: function() {
                    $(apiLoan.selectLoan).select2(apiLoan.optionsSelectUsers);
                    apiLoan.submitAddCopy.click(function(evt) {
                        evt.preventDefault();
                        if (currentCopy != null) {
                            if (apiLoan.addLoanItem(currentCopy.id)) {
                                apiLoan.addRowTable(currentCopy.id, currentCopy.work.title, 'Author ' + currentCopy.work.id, '00/00/0000');
                                $(apiLoan.btnActionRemove).click(function(evt) {
                                    evt.preventDefault();
                                    apiLoan.removeRowTable(this, $(this).attr('data-copy-id'));
                                });
                            } else {
                                console.warn('O exemplar informado já faz parte da lista para empréstimo.');
                            }
                        }
                    });
                }
            };

            apiLoan.init();

        });
    </script>
@endsection