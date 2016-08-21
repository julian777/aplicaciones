<?php

function getPrice($url) {
    $decode = file_get_contents($url);
    return json_decode($decode, true);
}

$btcUSD = getPrice('https://btc-e.com/api/2/btc_usd/ticker');
$btcPrice = $btcUSD["ticker"]["last"];
$btcSell = $btcUSD["ticker"]["sell"];
$btcBuy = $btcUSD["ticker"]["buy"];

$btcDisplay = round($btcPrice, 2);
$btcDisplay2 = round($btcSell, 3);
$btcDisplay3 = round($btcBuy, 4);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')" />
        <meta name="keywords" content="@yield('keywords')" />
        <link href="{{url()}}/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="{{url()}}/public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{url()}}/public/bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
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


                    <script src="bootstrap/js/jquery.js" type="text/javascript"></script>
                    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

                    <a class="navbar-brand" href="{{url("../")}}">Bitcoin Local Bank</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">

                    <!--
                    <ul class="nav navbar-nav">
                        <li><a href="{{url("../")}}">Inicio</a></li>
                    </ul>
                    -->
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="{{url('index.php')}}">Inicio</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <script>
var chart;
/**
 * Request data from the server, add it to the graph and set a timeout 
 * to request again
 */
function requestData() {
    $.ajax({
        url: 'servgrafico.php',
        success: function (point) {
            var series = chart.series[0],
                    shift = series.data.length > 100; // shift if the series is 
            // longer than 20

            // add the point
            chart.series[0].addPoint(point, true, shift);

            // call it again after one second
            setTimeout(requestData, 5000);
        },
        cache: false
    });
}

//,,,,,,,,,,,,,,,,
$(document).ready(function () {
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'container',
            defaultSeriesType: 'spline',
            events: {
                load: requestData
            }
        },
        title: {
            text: 'Live BTC-e 5 segundos Chart'
        },
        xAxis: {
            type: 'datetime',
            tickPixelInterval: 150,
            maxZoom: 20 * 1000
        },
        yAxis: {
            minPadding: 0.2,
            maxPadding: 0.2,
            title: {
                text: 'USD',
                margin: 80
            }
        },
        series: [{
                name: 'BTC USD Precio',
                data: []
            }]
    });
});
        </script>
        </br>
        </br>        

    <center>
        <h1>Tipo de Cambio del Bitcoin respecto al dolar americano Promedio USD <?php echo $btcDisplay; ?></h1>
        <p></p> 
        <h2>Venta</h2>
        <?php echo $btcDisplay2; ?>
        <h2>Compra</h2>
        <?php echo $btcDisplay3; ?>
        <div id="container" style="width:100%; height:400px;"></div>
    </center>
</body>
</html>
