<?php

$endpoint = 'latest';
$access_key = 'd76fb7a1f33d2a878825d74f58155aeb';

// Initialize CURL:
$ch = curl_init('https://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$exchangeRates = json_decode($json, true);

// Access the exchange rate values, e.g. GBP:
echo $exchangeRates['rates']['GBP'];
      ?>