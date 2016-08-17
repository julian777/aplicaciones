<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="keywords" content="@yield('keywords')" />
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" 
                data-toggle="collapse" data-target="#navbar" aria-expanded="false" 
                aria-controls="navbar">
                        <span class="sr-only">Bitcoin Local Bank</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{url()}}">Bitcoin Local Bank</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="{{url()}}">Inicio</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if(Auth::check())
                        <li><a href="{{url()}}">{{Auth::user()->name}}</a></li>
                        <li><a href="{{url('index.php/auth/logout')}}">Salir</a></li>
                        @else
                        <li><a href="{{url('index.php/auth/login')}}">Iniciar sesión</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" style="margin-top: 50px">
            @yield('content')
        </div>
    </body>
</html>
