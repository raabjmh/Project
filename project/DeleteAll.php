<!--- DeleteAll Comparim  ----->

<?php
include 'config.php';
$sql_update = "UPDATE gyms SET checked_n=0";
$result=mysqli_query($db,$sql_update) or die();
header("location: csearch.php?qsearch='$qsearch' &searchby='$searchby'");
 ?>
 <!--- DeleteAll Comparim  ----->
