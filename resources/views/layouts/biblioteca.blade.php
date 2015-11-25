<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/mld/material.min.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
    <link href="/pnotify/pnotify.custom.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/css/biblioteca.css">
    @yield('styles')
</head>
<body>

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand link-logo" href="/">
                    <img src="/img/logo.png" alt="logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    {{--<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>--}}
                    @if(! Auth::check())
                        {{--<li class="dropdown"><a href="/auth/login">Login</a></li>--}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Usuários <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/users/create">Novo</a></li>
                                <li><a href="/admin/users">Listar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Empréstimos <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/loans/create">Novo</a></li>
                                <li><a href="/admin/loans">Listar</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Obras <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/admin/works/create">Nova</a></li>
                                <li><a href="/admin/works">Listar</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if(! Auth::check())
                        <li class="dropdown"><a href="/auth/login">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                {{--<li><a href="#">Link 1</a></li>--}}
                                <li role="separator" class="divider"></li>
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    @yield('content')

    <script type="application/javascript" src="/jquery/1.11.3/jquery.min.js"></script>
    <script type="application/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <script type="application/javascript" src="/mld/material.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script src="/pnotify/pnotify.custom.min.js"></script>
    <script type="application/javascript" src="/js/biblioteca.js"></script>
    @yield('scripts')

</body>
</html>