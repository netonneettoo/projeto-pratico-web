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

                    <form action="#">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input mdl-cell--12-col" type="text" id="sample3" />
                            <label class="mdl-textfield__label mdl-cell--12-col" for="sample3">Email</label>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="password" id="sample4" />
                            <label class="mdl-textfield__label" for="sample3">Password</label>
                        </div>

                        <label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
                            <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked />
                            <span class="mdl-checkbox__label">Remember-me</span>
                        </label>
                    </form>

                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--primary mdl-js-button mdl-js-ripple-effect" style="float:right;">
                        Login
                    </a>
                </div>
            </div>


        {{--<form method="POST" action="/auth/login">--}}
            {{--{!! csrf_field() !!}--}}

            {{--<div>--}}
                {{--Email--}}
                {{--<input type="email" name="email" value="{{ old('email') }}">--}}
            {{--</div>--}}

            {{--<div>--}}
                {{--Password--}}
                {{--<input type="password" name="password" id="password">--}}
            {{--</div>--}}

            {{--<div>--}}
                {{--<input type="checkbox" name="remember"> Remember Me--}}
            {{--</div>--}}

            {{--<div>--}}
                {{--<button type="submit">Login</button>--}}
            {{--</div>--}}
        {{--</form>--}}


        </div>
    </div>

@endsection