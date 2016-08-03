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

        <link href="../../../public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="../../../public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../public/bootstrap/js/jquery.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
