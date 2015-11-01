@extends('layouts.login')

@section('styles')
    <style>
        .demo-card-wide.mdl-card {
            width: 100%;
        }
        .demo-card-wide > .mdl-card__title {
            color: #fff;
            height: 200px;
            background: url('http://lorempixel.com/512/300') center / cover;
        }
        .demo-card-wide > .mdl-card__menu {
            color: #fff;
        }
        .padding-login {
            width: 400px;
        }
        .mdl-textfield__input {
            width: 100%;
        }
        .mdl-textfield {
            width: 350px;
        }
    </style>
@endsection

@section('content')

    <div class="mdl-grid padding-login">
        <div class="mdl-cell mdl-cell--12-col">
            <div class="demo-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title">
                    <h2 class="mdl-card__title-text">Login</h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <form id="form-login" method="POST" action="/auth/login">
                        {!! csrf_field() !!}
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input mdl-cell--12-col" type="email" id="email" name="email" />
                            <label class="mdl-textfield__label mdl-cell--12-col" for="email">Email</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" id="password" name="password" />
                            <label class="mdl-textfield__label" for="password">Password</label>
                        </div>
                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="remember">
                            <input type="checkbox" id="remember" name="remember" class="mdl-checkbox__input" checked />
                            <span class="mdl-checkbox__label">Remember-me</span>
                        </label>
                    </form>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a id="submit-form-login" class="mdl-button mdl-button--primary mdl-js-button mdl-js-ripple-effect" style="float:right;">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="application/javascript">
        $(document).ready(function() {
            $('#submit-form-login').click(function(evt) {
                evt.preventDefault();
                $('#form-login').submit();
            });
        });
    </script>
@endsection