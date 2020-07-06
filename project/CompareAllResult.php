<?php

$message="";
include("sessioncustomer.php");
//-------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Compare All Items </title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.bg-dark,.btn-secondary,.table-dark {
background-color: #131355!important;
}
.btnsearch {
background-color: DodgerBlue;
border: none;
color: white;
padding: 10px 14px;
font-size: 14px;
cursor: pointer;
height: 38px;
}

/* Darker background on mouse-over */
.btn:hover {
background-color: RoyalBlue;
}
#footer{
background-color: rgba(184,184,183,0.4);
}
#compareRehami{
display:inline-block;
}
a:hover{
text-decoration: underline;
}
</style>
</head>
<!-------------------------------------------------------------------------------------------------------->

<body>
<?php require("cheader.php");?>
<!-- Navigation Bar-->
<nav aria-label="breadcrumb" role="navigation">
<nav aria-label="breadcrumb" role="navigation">
<ol style="background-color:#131355" class="breadcrumb">
<li class="breadcrumb-item">
<a href= "csearch.php?qsearch='<?php echo $qsearch;?>' &searchby='<?php echo $searchby;?>'" style="color: white;">Your Search Results</a></li>
<li class="breadcrumb-item">
<a href= "compareAll.php"  style="color: white;">Compare List</a></li>
<li class="breadcrumb-item active" style="color: rgba(184,184,183,0.4);"aria-current="page"> Compare Result </li>
</nav></nav>
<!-- End Navigation Bar-->
<!-------------------------------------------------------------------------------------------------------->
<?php
if (isset($_POST['submit'])) {
if (!isset($_POST["compareReham1"])&&
!isset($_POST["compareReham2"])&&
!isset($_POST["compareReham3"])&&
!isset($_POST["compareReham4"])&&
!isset($_POST["compareReham5"])&&
!isset($_POST["compareReham6"])&&
!isset($_POST["compareReham7"])&&
!isset($_POST["compareReham8"])&&
!isset($_POST["compareReham9"])){//open default set
$sql = "SELECT * FROM gyms WHERE isActive=1 AND checked_n=1";
$result=mysqli_query($db,$sql);
$sql_price ="SELECT MIN(price) AS Lowest_price
FROM gyms
WHERE isActive=1
AND checked_n=1";
$result_price= mysqli_query($db,$sql_price);
$row = mysqli_fetch_array($result_price);

?>
<div  id="compareRehami" style="width:1600px; margin-left:10%; background-color: white; padding:1%">

<?php while($row1 = mysqli_fetch_array($result)){?>

<div class="card col-dm-6" id="compareRehami" style="width:550px; margin-left:0.29%; background-color: rgba(184,184,183,0.4); padding:1%; ">

<img  class="card-img-top" src="<?php echo "uploads/".$row1['image'];?>" alt="Gym Logo" style="width:80px; margin:0%;">
<?php if ( $row ['Lowest_price']==$row1['price']){  ?>
<img  class="card-img-top" src="img/best.png" alt="best icon" style="width:110px; margin-top:-20%; margin-left:88%">

<?php }?>
<div style ="position: relative; margin-left:29%; margin-top:-10%;" class="card-body">
<h4 class="card-title"><?php echo $row1['name']; ?>
<?php echo "<br/><br/>";?>
</h4>
<h6 class="card-title" style="margin-left:-29%;"><?php echo "Price: ".$row1['price']."<br/>"; ?>

<?php $allrate=($row1['rate']/5)*100;
echo "Overall Customers' Reviews: ".$allrate."%"; ?>
</h6>
</div>

</div>
<?php
//echo $row1['price']."\n";}
}//close while
}//close default set
//--------------------------------------------------------------------------------------------------------

else{
$sql = "SELECT * FROM gyms WHERE isActive=1 AND checked_n=1";
$result=mysqli_query($db,$sql);
$sql_price ="SELECT MIN(price) AS Lowest_price
FROM gyms
WHERE isActive=1
AND checked_n=1";
$result_price= mysqli_query($db,$sql_price);
$row = mysqli_fetch_array($result_price);

?>
<div  id="compareRehami" style="width:1600px; margin-left:10%; background-color: white; padding:1%">

<?php while($row1 = mysqli_fetch_array($result)){?>

<div class="card col-dm-6" id="compareRehami" style="width:540px; margin-left:0.29%; background-color: rgba(184,184,183,0.4); padding:1%; ">

<img  class="card-img-top" src="<?php echo "uploads/".$row1['image'];?>" alt="Gym Logo" style="width:80px; margin:0%;">
<?php if ( $row ['Lowest_price']==$row1['price']){  ?>
<img  class="card-img-top" src="img/best.png" alt="best icon" style="width:100px; margin-top:-18%; margin-left:89%">

<?php }?>
<div style ="position: relative; margin-left:29%; margin-top:-10%;" class="card-body">
<h4 class="card-title"><?php echo $row1['name']; ?>
<?php echo "<br/><br/>";?>
</h4>
<h6 class="card-title" style="margin-left:-29%;">
<?php if (isset($_POST['compareReham1']) ){ $allrate=($row1['rate']/5)*100; echo "Overall Customers' Reviews: ".$allrate."% <br/>";} ?>
<?php if (isset($_POST['compareReham2']) ){echo "Working Hours: ".$row1['wstart_at']."-".$row1['wend_at']."<br/>";} ?>
<?php if (isset($_POST['compareReham3']) ){echo "The value of money: ".$row1['c1']."<br/>".
                                                "Cleanliness: ".$row1['c2']."<br/>".
                                                "Staff: ".$row1['c3']."<br/>".
                                                "Workout falicities: ".$row1['c4']."<br/>".
                                                "Services: ".$row1['c5']."<br/>".
                                                "Instructors: ".$row1['c6']."<br/>".
                                                "Comfort and quality: ".$row1['c7']."<br/>".
                                                "Recomended to others: ".$row1['c8']."<br/>";} ?>
<?php if (isset($_POST['compareReham4']) ){echo "Swimming Pool: ";if ($row1['swimpool']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Basket Ball: ";if ($row1['basketball']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Sauna Bath: ";if ($row1['saunapath']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Football: ";if ($row1['football']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Cardio machines: ";if ($row1['cardiomachine']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Weight machines: ";if ($row1['weightmachine']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Classes: ";if ($row1['classes']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Table Tennis: ";if ($row1['tabletenis']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Volley Ball: ";if ($row1['volleyball']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>"
                                                ;} ?>
<?php if (isset($_POST['compareReham5']) ){echo "Gender: ".$row1['gender']."<br/>";} ?>
<?php if (isset($_POST['compareReham6']) ){echo "Swimsuit Drying Machine: "; if ($row1['swimsuit']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Changing Room: "; if ($row1['changeroom']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "WI-FI: ";if ($row1['wifi']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Lockers: ";if ($row1['lockers']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>".
                                                "Car Parking: ";if ($row1['carparking']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>"
                                                ;} ?>
<?php if (isset($_POST['compareReham7']) ){echo "Price: ".$row1['price']."<br/>";} ?>
<?php if (isset($_POST['compareReham8']) ){echo "Pet Friendly: ";if ($row1['petfriendly']==1){echo "<img src='img/true.png' width='20'/>";}else {echo "<img src='img/deleteIcon.png' width='20'/>";} echo "<br/>";} ?>
<?php if (isset($_POST['compareReham9']) ){echo "Distrcit: ".$row1['district']."<br/>";} ?>


</h6>
</div>

</div>
<?php
//echo $row1['price']."\n";}
}//close while
}
//--------------------------------------------------------------------------------------------------------

} //close if
else {//open

echo "Something went wrong.....!";



}?>
</div>
</body></html>
