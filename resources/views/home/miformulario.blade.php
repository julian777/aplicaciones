@extends('layouts.home')
@section('title','Mi formulario')
@section('description','Validar Mi formulario')
@section('keywords,validar, mi, formulario')

@section('content')

<h1>Mi Formulario</h1>
<form method="post" action="{{url('home/validarmiformulario')}}">
    <div class="form-group">
        <label for="nombre"> Nombre: </label>
        <input type="text" name="nombre" class="form-control" value="{{Input::old('nombre')}}" />
        <div class="text-danger">{{$errors->formulario->first('nombre')}}</div>
        
    </div>
  {{csrf_field()}} 
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>

@stop