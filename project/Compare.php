<!--- update Comparim  ----->
<?php
include 'config.php';
session_start();// cok shukker yarbim
$searchby=  $_SESSION['bysearch'];
$qsearch=$_SESSION['qsearch'];
$id_clicked=$_REQUEST['id'];


//=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=
// Update Check Box ...! and continue Reham :) 3>

$sql_update = "UPDATE gyms SET checked_n=0  WHERE id='$id_clicked'";
$result=mysqli_query($db,$sql_update) or die();
$count = mysqli_affected_rows($db);
if ($count==0){
  //=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=
  $sql_update = "SELECT * FROM  gyms WHERE checked_n=1";
  $result=mysqli_query($db,$sql_update) or die();
  echo $count1 = mysqli_num_rows($result);
  // check the number of Check Boxes ...! and continue Reham :) 3>

if ($count1<4){//do something
$sql_update = "UPDATE gyms SET checked_n=1  WHERE id='$id_clicked'";
$result=mysqli_query($db,$sql_update);
}
}
//=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=

//header("location: csearch.php?qsearch='$qsearch' &searchby='$searchby'");
header('Location: ' . $_SERVER['HTTP_REFERER'].'?qsearch="$qsearch" &searchby="$searchby"')
?>

<!----------------------------->
