<?php
function getPrice($url){
$decode = file_get_contents($url);
return json_decode($decode, true);
}

$btcUSD = getPrice('https://btc-e.com/api/2/btc_usd/ticker');
$btcPrice = $btcUSD["ticker"]["last"];
$btcSell = $btcUSD["ticker"]["sell"];
$btcBuy = $btcUSD["ticker"]["buy"];

$btcDisplay = round($btcPrice,2);
$btcDisplay2 = round($btcSell,3);
$btcDisplay3 = round($btcBuy,4);

?>

<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>

<style>
h1 {
     font-family: "Calibri", Arial,sans
}
</style>
</head>
<body>
<script>
var chart;
/**
 * Request data from the server, add it to the graph and set a timeout 
 * to request again
 */
function requestData() {
    $.ajax({
        url: 'servgrafico.php',
        success: function(point) {
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
$(document).ready(function() {
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
<center>
<h1>Genial bitcoin! </h1>
<?php echo $btcDisplay; ?>
<h2>Venta</h2>
<?php echo $btcDisplay2; ?>
<h2>Compra</h2>
<?php echo $btcDisplay3; ?>
<div id="container" style="width:100%; height:400px;"></div>
</body>
</html>
