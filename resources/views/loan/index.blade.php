@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="col-md-12">
        <div class="container">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{utf8_encode('Empréstimos')}}</h3>
                </div>
            </div>

            <form action="#">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-sm-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="id2" />
                                <label class="mdl-textfield__label" for="id2">{{utf8_encode('Identificação')}}</label>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            Detalhes: Fulano de tal<br/>
                            Possui dois livros alugados <br/>
                            Esta em debito com a biblioteca
                            </div>
                    </div>
                </div>
            </form>

            <form action="#">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-sm-12">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="id2" />
                                <label class="mdl-textfield__label" for="id2">{{utf8_encode('Pesquisar acervo pelo título')}}</label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            Detalhes: Titulo do acervo<br/>
                            Linha dois<br />
                            Linha tres

                            <div style="float:right;">
                                <button class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="left" title="Adicionar">
                                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <form action="#">
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
                                    @for($i=0;$i<10;$i++)
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
            </form>

        </div>
    </div>

@endsection

@section('scripts')
@endsection