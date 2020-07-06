<?php

$message="";
include("sessioncustomer.php");
$searchby=  $_SESSION['bysearch'];
$qsearch=$_SESSION['qsearch'];
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
<li class="breadcrumb-item active" style="color: rgba(184,184,183,0.4);"aria-current="page"> Compare List </li>
</nav></nav>
<!-- End Navigation Bar-->
<!-------------------------------------------------------------------------------------------------------->
<center> <h1 style ="color:#131355"> Compare Criterion</h1> </center>
<form method="post" action="CompareAllResult.php">
<div class="card col-dm-6" id="compareRehami" style="width:750px; margin-left:25%; margin-top: 3%; background-color: rgba(184,184,183,0.4); padding:1%">
<div class="card col-dm-6" id="compareRehami" style="width:250px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%; ">
<input type="checkbox" name="compareReham1" value="Overall Customers Ratings"; />
Overall Customers Ratings</div>
<div class="card col-dm-6" id="compareRehami" style="width:250px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%; ">
<input type="checkbox" name="compareReham2" value="Working Hours"; />
Working Hours</div>
<div class="card col-dm-6" id="compareRehami" style="width:250px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%; ">
<input type="checkbox" name="compareReham3" value="Survey Results"; />
Survey Results</div>
<div class="card col-dm-6" id="compareRehami" style="width:250px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%; ">
<input type="checkbox" name="compareReham4" value="Facilities"; />
Facilities  </div>
<div class="card col-dm-6" id="compareRehami" style="width:250px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%; ">
<input type="checkbox" name="compareReham5" value="Allowed Gender"; />
Allowed Gender</div>
<div class="card col-dm-6" id="compareRehami" style="width:250px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%; ">
<input type="checkbox" name="compareReham6" value="Survices"; />
Survices</div>
<div class="card col-dm-6" id="compareRehami" style="width:250px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%; ">
<input type="checkbox" name="compareReham7" value="Prices"; />
Prices  </div>
<div class="card col-dm-6" id="compareRehami" style="width:250px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%; ">
<input type="checkbox" name="compareReham8" value="Pet Friendly"; />
Pet Friendly  </div>
<div class="card col-dm-6" id="compareRehami" style="width:250px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%; ">
<input type="checkbox" name="compareReham9" value="Distrcits"; />
Distrcits  </div>
<span style ="margin-top:-85.7%;margin-left:58%;" >
<img src ="img/CompareChoose.png" width="150" />
</span>
<button type="submit" name="submit" style ="width :20%; margin-top:15.7%;margin-left:-49%" class="btn btn-dark" >
Compare
<img src="img/Compare.png" width="18" height="20"/>
</button>
</div>
</form>
<br/><br/>
<?php require("footer.php");?>

</body>
</html>
