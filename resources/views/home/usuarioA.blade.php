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
    <a href="../../../public/select.php">Consulte su saldo</a>
</center>

<div class="text-success" id='result'>
    @if(Session::has('message'))
    {{Session::get('message')}}
    @endif
</div>

<center>
<a href="../../../public/formuUpdate.php">Convertir de USD a BTC..Actualice sus bitcoins!!!</a>
</center>


@stop