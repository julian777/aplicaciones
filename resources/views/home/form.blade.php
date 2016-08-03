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
<h1>USANDO POST</h1>

   <h2>Llena el formulario</h2>
  <form id="form1" name="form1" method="post" action="<?=URL::to('home/form')?>">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">


    Nombre de Usuario:<br />
      <input name="name" value="{{$name}}"  type="text" id="name" size="40" />
    <br /><br />
   <br />
   <br />
   <br />

   <button type="submit">Send</button>

  </form>
   <p>Valor del campo name: {{$name}}</p>
   
 <!--
<form method="post" action="{{url('home/form')}}">
    
    <label>Name: </label>
    <input type="text" name="name" value="{{$name}}" />
     {{ csrf_field()}}
    <button type="submit">Send</button>
  
</form>


-->



    </body>
</html>

