@extends('layouts.home')
<link href="../../../public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="../../../public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../../public/bootstrap/js/jquery.js" type="text/javascript"></script>
@section('content')

<br/>
<br/>

<?php
$url = "https://btc-e.com/api/2/btc_usd/ticker";
$json = json_decode(file_get_contents($url), true);
$price = $json["ticker"]["last"];
?>


<script>
    function btcConvert(input) {
        if (isNaN(input.value)) {
            input.value = 0;
        }
        var price = "<?php echo $price; ?>";
        var output = input.value * price;
        var co = document.getElementById('ci');
        ci.value = output.toFixed(2);
    }
    function usdConvert(input) {
        if (isNaN(input.value)) {
            input.value = 0;
        }
        var price2 = "<?php echo $price; ?>";
        var output2 = input.value / price2;
        var co2 = document.getElementById('bi');
        bi.value = output2.toFixed(8);
    }


</script>
<center>
    <h2>BTC/USD Convertidor</h2>
    <input type="text" id="bi" placeholder="BTC" onchange="btcConvert(this);" onkeyup="btcConvert(this);"/>&nbsp;&nbsp;
    <input type="text" id="ci" placeholder="USD" onchange="usdConvert(this);" onkeyup="usdConvert(this);" />
    <br/>

    <a href="../../../public/bitcoin.php">ir a la Grafica que tiene los precios actuales</a>
    <br/>
    <a href="../../../public/base.php">Si da click va a insertar un saldo a un usuario</a>
    <br/>
    <a href="../../../public/select.php">Consulte su saldo</a>
</center>



<h1>Billetera Virtual BTC-USD</h1>

<div class="text-success" id='result'>
    @if(Session::has('message'))
    {{Session::get('message')}}
    @endif
</div>
<form method="post" action="{{url('home/validarmiformulario')}}" id='form'>

    <div class="form-group">

        <label for="nombre">Password: </label>

        <input type="text" name="nombre" class="form-control" value="{{Input::old('nombre')}}" />

        <div class="text-danger" id='error_nombre'>{{$errors->formulario->first('nombre')}}</div>

    </div>



    <div class="form-group">

        <label for="email">Email: </label>

        <input type="text" name="email" class="form-control" value="{{Input::old('email')}}" />

        <div class="text-danger" id='error_email'>{{$errors->formulario->first('email')}}</div>

    </div>

    <div class="form-group">

        <label for="email">Cantidad de Bitcoins: </label>

        <input type="text" name="email" class="form-control" value="{{Input::old('email')}}" />

        <div class="text-danger" id='error_email'>{{$errors->formulario->first('email')}}</div>

    </div>

    {{csrf_field()}}

    <button type="submit" class="btn btn-primary">Enviar</button>

</form>


<script>

    $(function () {

        $("#form").submit(function (e) {



            var fields = $(this).serialize();

            $.post("{{url('home/validarmiformulario')}}", fields, function (data) {



                if (data.valid !== undefined) {

                    $("#result").html("Enhorabuena formulario enviado correctamente");

                    $("#form")[0].reset();

                    $("#error_nombre").html('');

                    $("#error_email").html('');

                } else {

                    $("#error_nombre").html('');

                    $("#error_email").html('');

                    if (data.nombre !== undefined) {

                        $("#error_nombre").html(data.nombre);

                    }

                    if (data.email !== undefined) {
                        $("#error_email").html(data.email);

                    }

                }


            });



            return false;

        });

    });

</script>
@stop