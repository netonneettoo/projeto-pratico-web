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
                        <div class="col-md-6">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="id2" />
                                <label class="mdl-textfield__label" for="id2">{{utf8_encode('Identificação')}}</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            Nome: Fulano de tal<br/>
                            Consta debito 1? <br/>
                            Consta debito 2?
                            </div>
                    </div>
                </div>
            </form>

            <form action="#">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                <input class="mdl-textfield__input" type="text" id="id2" />
                                <label class="mdl-textfield__label" for="id2">{{utf8_encode('Pesquisar acervo pelo título')}}</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            Nome: Fulano de tal
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('scripts')
@endsection