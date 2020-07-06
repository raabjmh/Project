<?php
 session_start();
 if(isset($_GET["currency"])){
    $endpoint = 'latest';
    $access_key = '636292779de8139d75c8519419de23af';

    // Initialize CURL:
    $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key='.$access_key.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Store the data:
    $json = curl_exec($ch);
    curl_close($ch);

    // Decode JSON response:
       $exchangeRates = json_decode($json, true);
       $value=$_GET["currency"];
       echo $_SESSION['local_currency']= $exchangeRates['rates'][$value];
       $_SESSION['currency_name']=$value;
       $_SESSION['currency']=$exchangeRates;
   }
?>
