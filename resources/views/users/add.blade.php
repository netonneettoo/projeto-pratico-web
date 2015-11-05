@extends('layouts.biblioteca')

@section('styles')
@endsection

@section('content')

    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Cadastro de Usuário</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                </div>

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                    <form class="form-horizontal">
                        <fieldset>
                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="textinput">Nome</label>
                                <div class="controls">
                                    <input id="textinput" name="textinput" type="text" placeholder="Nome" class="input-xlarge"><br>
                                    <label class="control-label" for="textinput">Curso e Semestre</label>

                                    <div class="controls">
                                        <input id="textinput" name="textinput" type="text" placeholder="curso" class="input-xlarge">
                                        <input id="number" name="number" type="text" placeholder="Semestre" class="input-xlarge">
                                    </div>

                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="passwordinput">Senha</label>
                                <div class="controls">
                                    <input id="passwordinput" name="passwordinput" type="password" placeholder="entre com a senha" class="input-xlarge">
                                </div>
                            </div>


                            <div class="control-group">
                                <label class="control-label" for="textinput">Data de Nascimento</label>
                                <div class="controls">
                                    <input id="date" name="date" type="date" placeholder="Nome" class="input-xlarge"><br>

                                    <label class="control-label" for="textinput">Email</label>
                                    <div class="controls">
                                        <input id="textinput" name="textinput" type="email" placeholder="Email@mail.com.br" class="input-xlarge">
                                    </div>

                                </div>
                            </div>

                            <!-- Button Drop Down -->
                            <div class="control-group">
                                <label class="control-label" for="buttondropdown">Grupo de Usuário</label>
                                <div class="controls">
                                    <div class="input-append">
                                        <input id="buttondropdown" name="buttondropdown" class="input-xlarge" placeholder="Grupo de Usuário" type="text">
                                        <div class="btn-group">
                                            <button class="btn dropdown-toggle" data-toggle="dropdown">
                                                Action
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">ALuno</a></li>
                                                <li><a href="#">Bibliotecário</a></li>
                                                <li><a href="#">Professor</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Multiple Radios -->
                            <div class="control-group">
                                <label class="control-label" for="radios">Sexo</label>
                                <div class="controls">
                                    <label class="radio" for="radios-0">
                                        <input type="radio" name="radios" id="radios-0" value="Masculino" checked="checked">
                                        Masculino
                                    </label>
                                    <label class="radio" for="radios-1">
                                        <input type="radio" name="radios" id="radios-1" value="Femenino">
                                        Femenino
                                    </label>
                                </div>
                            </div>

                            <!-- Textarea -->
                            <div class="control-group">
                                <label class="control-label" for="textarea">Descrição</label>
                                <div class="controls">
                                    <textarea id="textarea" name="textarea">Entre com as descrições</textarea>
                                </div>
                            </div>

                            <!-- Button -->
                            <div class="control-group">
                                <label class="control-label" for="singlebutton"></label>
                                <div class="controls">
                                    <button id="singlebutton" name="singlebutton" class="btn btn-success">Cadastrar</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>

@endsection

@section('scripts')
@endsection