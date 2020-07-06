<?php

require_once 'vendor/autoload.php';
use Nahid\JsonQ\Jsonq;
$jsonText=array();
$q = new Jsonq('countries.json');
//$q1 = new Jsonq('countries.json');
$res = $q->from('Algeria')->get();
//var_dump ($res);
//echo '<br>';
//echo $res[0];

$jsonArray_size = count($res);
echo $jsonArray_size;
echo '<br>';
echo $res[10];
?>


 