@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <div class="panel-heading">
                        <div class="panel-title">Cadastro de Usuário</div>
                    </div>
                    <form class="form-horizontal">
                        <fieldset>

                            <!-- id-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ativo">Matricula</label>
                                <div class="col-md-4">
                                    <input id="nome" name="id" type="text" placeholder="2011200045" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Text Nome-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="nome">Nome</label>
                                <div class="col-md-5">
                                    <input id="nome" name="nome" type="text" placeholder="Nome Usúario" class="form-control input-md" required="">

                                </div>
                            </div>
                            <!-- Text Email-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email">E-mail</label>
                                <div class="col-md-5">
                                    <input id="email" name="email" type="text" placeholder="email@mail.com" class="form-control input-md" required="">
                                    <span class="help-block">teste@seudominio.com</span>
                                </div>
                            </div>
                            <!-- telefone fixo (inline) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ativo">Telefone fixo</label>
                                <div class="col-md-4">
                                    <input id="nome" name="telephone" type="text" placeholder="(85)3301-1000" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- fone cel (inline) -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ativo">Nº de Celular</label>
                                <div class="col-md-4">
                                    <input id="nome" name="cellphone" type="text" placeholder="(85) 98888.8888" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="senha">Senha</label>
                                <div class="col-md-2">
                                    <input id="senha" name="senha" type="password" placeholder="******" class="form-control input-md" required="">
                                    <span class="help-block">No mínimo 6 caracteres</span>
                                </div>
                            </div>

                            <!-- Cidade -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="empresa">Cidade</label>
                                <div class="col-md-4">
                                    <input id="nome" name="cidade" type="text" placeholder="Cidade" class="form-control input-md">
                                </div>
                            </div>

                            <!-- UF-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="usuario">UF</label>
                                <div class="col-md-4">
                                    <input id="usuario" name="uf" type="text" placeholder="UF" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Logradouro-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="usuario">Logradouro</label>
                                <div class="col-md-4">
                                    <input id="usuario" name="Street" type="text" placeholder="Bairro" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- Cep-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="usuario">Cep</label>
                                <div class="col-md-4">
                                    <input id="usuario" name="cep" type="text" placeholder="60000-800" class="form-control input-md" required="">
                                </div>
                            </div>

                            <!-- status Financeiro-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="usuario">Status Financeiro</label>
                                <div class="col-md-4">
                                    <input id="usuario" name="status" type="text" placeholder="Dívida?" class="form-control input-md">
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="enviar"></label>
                                <div class="col-md-4">
                                    <button id="enviar" name="enviar" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection