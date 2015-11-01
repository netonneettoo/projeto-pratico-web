<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="/mld/material.min.css">
        <style>
            .img-logo {
                width: 125px;
                height: 39px;
                background: url('/img/logo.png') #FFFFFF;
            }
        </style>
        @yield('styles')
    </head>
    <body>

        <!-- Uses a header that scrolls with the text, rather than staying locked at the top -->
        <div class="mdl-layout mdl-js-layout">
            <header class="mdl-layout__header mdl-layout__header--scroll">
                <div class="mdl-layout__header-row">
                    <!-- Title -->
                    <span class="mdl-layout-title img-logo"></span>
                    <!-- Add spacer, to align navigation to the right -->
                    <div class="mdl-layout-spacer"></div>
                    <!-- Navigation -->
                    <nav class="mdl-navigation">
                        {{--<a class="mdl-navigation__link" href="">Link</a>--}}
                    </nav>

                    {{--<!-- Right aligned menu below button -->--}}
                    {{--<button id="demo-menu-lower-right" class="mdl-button mdl-js-button mdl-button--icon">--}}
                        {{--<i class="material-icons">more_vert</i>--}}
                    {{--</button>--}}
                    {{--<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">--}}
                        {{--<li disabled class="mdl-menu__item">Username</li>--}}
                        {{--<li class="mdl-menu__item">Action</li>--}}
                        {{--<li class="mdl-menu__item">Some Action</li>--}}
                        {{--<li class="mdl-menu__item">Another Action</li>--}}
                    {{--</ul>--}}
                </div>
            </header>
            {{--<div class="mdl-layout__drawer">--}}
                {{--<span class="mdl-layout-title">Title</span>--}}
                {{--<nav class="mdl-navigation">--}}
                    {{--<a class="mdl-navigation__link" href="">Link</a>--}}
                    {{--<a class="mdl-navigation__link" href="">Link</a>--}}
                    {{--<a class="mdl-navigation__link" href="">Link</a>--}}
                    {{--<a class="mdl-navigation__link" href="">Link</a>--}}
                {{--</nav>--}}
            {{--</div>--}}
            <main class="mdl-layout__content">
                <div class="page-content">
                    @yield('content')
                </div>
            </main>
        </div>

        <script type="application/javascript" src="/mld/material.js"></script>
        @yield('scripts')

    </body>
</html>