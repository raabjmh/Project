<!--- DeleteAll Comparim  ----->

<?php
include 'config.php';
echo $id= $_GET["id"];
$sql_update = "UPDATE gyms SET checked_n=0 WHERE id = '$id'";
$result=mysqli_query($db,$sql_update) or die();
header("location: csearch.php?qsearch='$qsearch' &searchby='$searchby'");
 ?>
 <!--- DeleteAll Comparim  ----->
