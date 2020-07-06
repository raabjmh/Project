<?php
    include("sessioncustomer.php");
    $q=$_REQUEST["id"];
	$nopositive=0;
	$nonegative=0;
  $noneutral=0;
  require __DIR__ . '/sentiment/autoload.php';
  function sentimentRate($str){
    $analyzer = SentimentAnalysis\Analyzer::withDefaultConfig();
    $sresult1 = $analyzer->analyze($str);
    return $sresult1->category();

  }

  $sqlRate = "SELECT * FROM gym_rate WHERE gym_id='$q' and isvalid=1";
  $resultRate = mysqli_query($db,$sqlRate);
   $countfeed = mysqli_num_rows($resultRate);
    $sql = "SELECT * FROM gyms WHERE isActive=1 and id='$q'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  $isRated=$row['no_rates'];
  if($isRated>0){
	  $sql1 = "SELECT * FROM gym_rate WHERE gym_id='$q' and isvalid=1";
  $result1 = mysqli_query($db,$sql1);

  $analyzer = SentimentAnalysis\Analyzer::withDefaultConfig();
   while($row1 = mysqli_fetch_array($result1)):;
    $sresult = $analyzer->analyze($row1['description']);
	if($sresult->category()=="positive"){
		$nopositive++;

	}
	else if($sresult->category()=="negative"){
		$nonegative++;

	}
	else{
		$noneutral++;

	}
   endwhile;
  $c1=($row['c1']/5)*100;
  $c2=($row['c2']/5)*100;
  $c3=($row['c3']/5)*100;
  $c4=($row['c4']/5)*100;
  $c5=($row['c5']/5)*100;
  $c6=($row['c6']/5)*100;
  $c7=($row['c7']/5)*100;
  $c8=($row['c8']/5)*100;
  $allrate=($row['rate']/5)*100;
  $ratestatus="";
  if($allrate<=50){
	  $ratestatus="Bad";
	  $colo="#e40d0dc4";
  }
  else if($allrate>50&& $allrate<80){
	  $ratestatus="Good";
	  $colo="#cfe419";
  }
  else{
	  $ratestatus="Excellent";
	  $colo="#0de45fc4";
  }
  }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer-Home page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>

  <script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>


	<link rel="stylesheet" href="simple-donut.css" type="text/css">

  <script type="text/javascript" src="simple-donut-jquery.js"></script>
	<script type="text/javascript">
		FusionCharts.ready(function(){
			var chartObj = new FusionCharts({
    type: 'doughnut2d',
    renderAt: 'chart-container',
    width: '500',
    height: '420',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Overall customers' review",

            "bgColor": "#ffffff",
            "startingAngle": "310",
            "showLegend": "1",
            "defaultCenterLabel": "Total review: ",
            "centerLabel": "Review from $label: $value",
            "centerLabelBold": "1",
            "showTooltip": "0",
            "decimals": "0",
            "theme": "fusion"
        },
        "data": [{
            "label": "Positive",
            "value": <?php echo $nopositive;?>
        }, {
            "label": "Negative",
            "value": <?php echo $nonegative;?>
        }, {
            "label": "Neutral",
            "value": <?php echo $noneutral;?>
        }]
    }
}
);
			chartObj.render();
		});
	</script>

  <style>
#footer{
        background-color: rgba(184,184,183,0.4);
        height:120;
    }

</style>
<script>

$("#update1").click(function() {
  updateDonutChart('#specificChart', 57, true);
});
</script>
</head>
<body>

<script>
  function addLike(str) {

        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            setTimeout(
                  function()
                  {
                     location.reload();
                  }, 0001);

        };
        xmlhttp.open("GET","addlike.php?f_id="+str,true);
        xmlhttp.send();

}
function addDisLike(str) {

   if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
       xmlhttp = new XMLHttpRequest();
   } else {
       // code for IE6, IE5
       xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange = function() {
       setTimeout(
             function()
             {
                location.reload();
             }, 0001);

   };
   xmlhttp.open("GET","adddislike.php?f_id="+str,true);
   xmlhttp.send();

}

function addReport(str) {

   if (window.XMLHttpRequest) {
       // code for IE7+, Firefox, Chrome, Opera, Safari
       xmlhttp = new XMLHttpRequest();
   } else {
       // code for IE6, IE5
       xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
   }
   xmlhttp.onreadystatechange = function() {
       setTimeout(
             function()
             {
                location.reload();
             }, 0001);

   };
   xmlhttp.open("GET","addreport.php?f_id="+str,true);
   xmlhttp.send();

}
</script>
<?php require("cheader.php");?>
<!-------------------------------------------------------------------------------------------------------->


<!-- Navigation Bar-->
<nav aria-label="breadcrumb" role="navigation">
<nav aria-label="breadcrumb" role="navigation">
<ol style="background-color:#131355" class="breadcrumb">
<li class="breadcrumb-item">
<a href= "csearch.php?qsearch='<?php echo $qsearch;?>' &searchby='<?php echo $searchby;?>'" style="color: white;">Your Search Results</a></li>
<li class="breadcrumb-item active" style="color: rgba(184,184,183,0.4);"aria-current="page"> Gym Information </li>
</nav></nav>
<!-- End Navigation Bar-->
<!-------------------------------------------------------------------------------------------------------->

  <div class="wrapper container">
<br>
  <h5><?php echo $row['name'];?> </h5>
  <br>
  <div class="row">
  <div class="col-sm-6">
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 500px;
  }
  </style>
  <div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner">
  <div class="carousel-item active">
    <img src="<?php echo "uploads/".$row['image'];?>" alt="Los Angeles" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="<?php echo "uploads/".$row['image2'];?>" alt="Chicago" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="<?php echo "uploads/".$row['image3'];?>" alt="New York" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="<?php echo "uploads/".$row['image4'];?>" alt="New York" width="1100" height="500">
  </div>
  <div class="carousel-item">
    <img src="<?php echo "uploads/".$row['image5'];?>" alt="New York" width="1100" height="500">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>
</div>


  </div>
  <div class="col-sm-6">
    <?php
    if (isset($_GET['id']))
    {
      $qsearch = $_SESSION['qsearch'];
      $result="";
      $sql1="";
      $id=$_GET['id'];
      $sql1= "SELECT * FROM gyms WHERE id= '$id'";

      $result = mysqli_query($db,$sql1);



      while($row1 = mysqli_fetch_array($result)):;?>
  <a class="btn btn-outline-dark" href="rategym.php?id=<?php echo $row['id'];?>" role="button">RATE</a><br><br>
  <a class="btn btn-outline-dark" href="insertfavouritelist.php?id=<?php echo $row['id'];?>" role="button">AddGymToFavouriteList</a>
  <form method="post" action="Compare.php?id=<?php echo $row1['id'];?>">
    <input type="checkbox" name="compareReham" value="Compare";  onchange="this.form.submit()" <?php  if ($row1['checked_n']==1) echo "checked"; ?>/> Compare
  </form>
  <?php endwhile; }?>
  </div>

</div>
<br>
<?php if($isRated>0){?>
<div style="background-color: rgba(184,184,183,0.4);padding:20px">
This percentage is based on # customers ratings
</div>
<div class="row">


<div id="allrate" class="donut-size col-sm-6 text-center" >


      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle" style="border: 0.1em solid <?php echo $colo;?> !important;"></div>
          <div class="right-side half-circle" style="border: 0.1em solid <?php echo $colo;?> !important;"></div>

        </div>

        <div class="shadow"></div>
      </div>
	  <h6 style="color:red;"><?php echo $ratestatus;?></h6>
	  <h6>Overall Customers' ratings</h6>
    </div>
	<div id="chart-container" class="col-sm-6">FusionCharts XT will load here!</div>
</div>

<div class="row text-center">
 <div id="criteria1" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>

    <div id="criteria2" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>

    <div id="criteria3" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>

    <div id="criteria4" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>
   <div class="col-sm-3">
    The value of money
	</div>
	<div class="col-sm-3">
    cleanliness
	</div>
	<div class="col-sm-3">
    Staff
	</div>
	<div class="col-sm-3">
    Workout falicities
	</div>

    <div id="criteria5" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>

    <div id="criteria6" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>

    <div id="criteria7" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>

    <div id="criteria8" class="donut-size col-sm-3">
      <div class="pie-wrapper">
        <span class="label">
          <span class="num">40</span><span class="smaller">%</span>
        </span>
        <div class="pie">
          <div class="left-side half-circle"></div>
          <div class="right-side half-circle"></div>
        </div>
        <div class="shadow"></div>
      </div>
    </div>

	<div class="col-sm-3">
    Services
	</div>
	<div class="col-sm-3">
   Instructors
	</div>
	<div class="col-sm-3">
    Comfort and quality
	</div>
	<div class="col-sm-3">
    Recomended to others
	</div>
    </div>
    <?php echo "<script>updateDonutChart('#criteria1', $c1, true);</script>"?>

      <?php echo "<script>updateDonutChart('#criteria2', $c2, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria3', $c3, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria4', $c4, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria5', $c5, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria6', $c6, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria7', $c7, true);</script>"?>
    <?php echo "<script>updateDonutChart('#criteria8', $c8, true);</script>"?>
<?php echo "<script>updateDonutChart('#allrate', $allrate, true);</script>" ?>
<br><br>

<div style="background-color: rgba(184,184,183,0.4);padding:20px">
<h6><?php echo printValue($row['price'])." per month";?></h6><br>
  <h6>The email: <?php echo $row['email']; ?></h6><br>
  <h6>The Phone: <?php echo $row['phone']; ?></h6><br>
  <h6>The Country: <?php echo $row['country']; ?></h6><br>
  <h6>The City: <?php echo $row['city']; ?></h6><br>
  <h6>The District: <?php echo $row['district']; ?></h6><br>
  <h6>The Working hours: <?php echo $row['wstart_at']."-".$row['wend_at']; ?></h6>

</div>
<br><br>

<div style="background-color: rgba(184,184,183,0.4);padding:20px">
<p><?php echo $countfeed;?> Reviews</p>
</div>
<br><br>
<?php while($rowRate = mysqli_fetch_array($resultRate)):;


        ?>
<div class="card col-dm-6" style="width:1000px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%">
<img  class="card-img-top" src="av1.jpg" alt="Gym Logo" style="width:210px; margin:2%;">
<div style ="position: relative; margin-left:28%; margin-top:-18%;" class="card-body">
<h3 class="card-title"><?php echo $rowRate['description']; ?></h3>

<p class="card-text"><?php echo "The feedback is: ".sentimentRate($rowRate['description']);?></p>
<a onclick='addLike(<?php echo $rowRate['id'];?>)' style ="width :20%;" class="btn btn-primary" > Like (<?php echo $rowRate['no_like'];?>)
                                                                    <img src="like.png" width="19"/>
                                                                    </a>
<button type="submit" style ="width :20%;" class="btn btn-dark" id="Delete">
     <a onclick='addDisLike(<?php echo $rowRate['id'];?>)' style="color:white;">Dislike (<?php echo $rowRate['no_dislike'];?>)</a>
                                                                    <img src="dislike.png" width="15"/>
                                                                  </button>

                                                                  <button type="submit" style ="width :20%;" class="btn btn-dark" id="Delete">
     <a onclick='addReport(<?php echo $rowRate['id'];?>)' style="color:white;">Report</a>
                                                                    <img src="img/report reviwe.PNG" width="15"/>
                                                                  </button>

</div>
</div>
<?php endwhile;?>
<?php }


else{

	echo "<h3> No rates for this gym</h3>";
}
?>
  </div>



<br><br>
<?php require("footer.php");?>

</body>
</html>
