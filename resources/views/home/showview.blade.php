<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Tutorial Laravel 5</h1>
        {{$msg}}
        
        @foreach ($array as $index => $val)
        <p>{{$index}} = {{$val}}</p>
        @endforeach
        
    </body>
</html>
