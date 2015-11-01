@extends('layouts.biblioteca')

@section('content')
<!-- Square card -->
<style>
    .demo-card-square.mdl-card {
        width: 320px;
        height: 320px;
    }
    .demo-card-square > .mdl-card__title {
        color: #fff;
        background:
        url('http://lorempixel.com/420/320') bottom right 15% no-repeat #46B6AC;
    }
</style>

<div class="demo-card-square mdl-card mdl-shadow--2dp">
    <div class="mdl-card__title mdl-card--expand">
        <h2 class="mdl-card__title-text">Login</h2>
    </div>
    <div class="mdl-card__supporting-text">

        <form method="POST" action="/auth/register">
            {!! csrf_field() !!}

            <div>
                Name
                <input type="text" name="name" value="{{ old('name') }}">
            </div>

            <div>
                Email
                <input type="email" name="email" value="{{ old('email') }}">
            </div>

            <div>
                Password
                <input type="password" name="password">
            </div>

            <div>
                Confirm Password
                <input type="password" name="password_confirmation">
            </div>

            <div>
                <button type="submit">Register</button>
            </div>
        </form>

    </div>
    <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            View Updates
        </a>
    </div>
</div>

@endsection