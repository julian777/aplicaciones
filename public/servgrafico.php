<?php
// Set the JSON header
header("Content-type: text/json");
function getPrice($url){
$decode = file_get_contents($url);
return json_decode($decode, true);
}


// The x value is the current JavaScript time, which is the Unix time multiplied 
// by 1000.
$x = time() * 1000;
// The y value is a random number
$y =  getPrice('https://btc-e.com/api/2/btc_usd/ticker');
$btcPrice = $y["ticker"]["last"];

// Create a PHP array and echo it as JSON
$ret = array($x, $btcPrice);
echo json_encode($ret);
?>
