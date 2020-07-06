<?php
    include("sessionowner.php");
    $q1=file_get_contents('countries.json');
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($q1, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);
$countries=array();
$ii=0;
foreach ($jsonIterator as $key => $val) {
	
    if(is_array($val)) {
        //echo "$key,";
		$countries[$ii]=$key;
		$ii++;
		
    } 
	//else {
        //echo "$val,";
    //}
	//echo '<br>';
	
}
//echo 	$countries[19];
$countries_size = count($countries);   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Owner -Add Gym</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script>
  function showCity(str) {
    if (str == "") {
        document.getElementById("subdiv").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("subdiv").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getcities.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
  <style>
  .bg-dark,.btn-secondary {
    background-color: #131355!important;
}
#footer{
        background-color: rgba(184,184,183,0.4);
        height:120;
    }
    
</style>
</head>
<body>

<div class="header">
<div class="row">
 <div class="col-sm-3">
 <a href="owner-main.php">
 <img id ="logo"
     src="img/gym.png"
     width="220"
     height="120"
     alt="GymsGuider Logo"
/></a>
</div>
<div class="col-sm-3 d-flex align-items-right"> 
</div>
 <div class="col-sm-3 d-flex align-items-center"> 
 
 <div class="btn-group">
      <button type="button" class="btn btn-outline-secondary">

          <img src="img/ChangeCurrency.jpg"
               width="15"
               height="15"
               alt ="change currency"/>
          Change currency</button>
      <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Dollars</a>
        <a class="dropdown-item" href="#">Riyal</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
	<a class="btn btn-outline-dark" href="addgym.php" role="button">Add a GYM</a>

 </div>
 
 <div class="col-sm-3 d-flex align-items-center"> 
 <li class="dropdown">
    <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown">
        <img src="img/user1.png"  height="80" width="80" class="img-circle special-img"> </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-cog"></i> Account</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign-out</a></li>
                </ul>
</li>
<p style="color:blue;"><?php echo "Welcome: ".$_SESSION['login_owner']; ?></p>

</div>
 <div class="col-sm-2 d-flex align-items-center">
 
 </div>
 <div class="col-sm-2 d-flex align-items-center">

 </div>
 <div class="col-sm-2 d-flex align-items-center">

 </div>
</div>
</div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
<div class="container">
<br>
<h5> Add A Gym </h5>
						
  <br>
  <br>
  
  <form action="addgymcode.php" method="post" enctype="multipart/form-data">
  <h3>Gym information</h3>
  <div class="form-group col-sm-6">
    <label for="gname">GYM name:</label>
    <input type="text" class="form-control" name="gname" id="gname" required>
  </div>
  <div class="form-group col-sm-4">
    <label for="gemail">Gym Email address:</label>
    <input type="email" class="form-control" name="gemail" id="gemail" required>
  </div>
  <div class="form-group col-sm-4">
    <label for="gphone">Gym Phone number:</label>
    <input type="number" class="form-control" title="Ten digits" required pattern="[0-9]{10}" name ="gphone" id="gphone">
  </div>
  <div class="form-group form-inline">
  <div class="form-group col-sm-4">
    <label for="country">country:</label>
    <select class="form-control" id="country" name="country"  onchange="showCity(this.value)">

     <?php for ($x = 0; $x < $countries_size; $x++)
{
?>
  <option value="<?php echo $countries[$x]; ?>"><?php echo $countries[$x]; ?></option>
 

<?php } ?>
</select>
    </div>
    <div class="form-group col-sm-4" id="subdiv">
    <label for="cities">city:</label>
   
      <select name="cities"  class="form-control" id="cities">
     <option>Select city</option>
     </select>
    </div>
    <div class="form-group col-sm-4">
    <label for="district">district:</label>
    <input type="text" class="form-control" name="district" id="district" required>
    </div>
  </div>
  
  <div class="form-group form-inline">
  <div class="form-group col-sm-4">
    <label for="gender">Allow gender:</label>
    <select class="form-control" id="gender" name="gender">
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="both">Both</option>
  </select>
  </div>
  <div class="form-group col-sm-4">
  <label for="pet">Pet friendly:</label>
    <select class="form-control" id="pet" name="pet">
    <option value='1'>Yes</option>
    <option value='0'>No</option>
  </select>
  </div>
  <div class="form-group col-sm-4">
    <label for="price">Price per month:</label>
    <input type="number" class="form-control" step="0.1" required  name ="price" id="price">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-sm-6">
    <label for="whours">working days</label>
    <input type="text" class="form-control" name="whours" id="whours" required>
  </div>
  <div class="form-inline">
  <div class="form-inline">
<label for="start_at">Start at:</label>
    <input type="time" class="form-control" name="start_at" id="start_at">
</div>
<div class="form-inline">
<label for="end_at">End at:</label>
    <input type="time" class="form-control" name="end_at" id="end_at">
</div>
</div>
<div class="form-group col-sm-6">
    <label for="shours">Special days</label>
    <input type="text" class="form-control" name="shours" id="shours" required>
  </div>
  <div class="form-inline">
  <div class="form-inline">
<label for="sstart_at">Start at:</label>
    <input type="time" class="form-control" name="sstart_at" id="sstart_at">
</div>
<div class="form-inline">
<label for="end_at">End at:</label>
    <input type="time" class="form-control" name="send_at" id="send_at">
</div>
</div>
</div>
<br>
<div class="row">
    <div class="col-sm-4">
      <p>Available services:</p>
      <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="sam" value="">Swimsuit drying machine
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="croom" value="">Changing room
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="wifi" value="">Wi-Fi
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="lockers" value="">Lockers
       </label>
</div>

<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="parking" value="">Car Parking
       </label>
</div>

    </div>
    <div class="col-sm-4">
      <p>Facilities:</p>
      <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="pool" value="">Swimming Pool
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="basket" value="">Basket ball
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="sauna" value="">Sauna path
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="football" value="">Footbal
       </label>
</div>

<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="cmachine" value="">Cardio machin
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="wmachine" value="">Weight machine
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="classes" value="">Classes
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="tenis" value="">Table Tennis
       </label>
</div>

<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="volley" value="">Volley ball
       </label>
</div>
    </div>
    <div class="col-sm-4">
           
      <p>get location</p>
      <a class="btn btn-outline-dark"  onclick="getLocation()">Get location</a>

      <div class="form-group">
    <label for="price">Latitude & logitude</label>
    <input type="text" class="form-control"  required  name ="lat" id="lat">
    <input type="text" class="form-control"  required  name ="long" id="long">
    <script src="script.js"></script>
		
		<!-------Including CSS File------>
        <link rel="stylesheet" type="text/css" href="style.css">
        <div id="maindiv">

            <div id="formdiv">
                
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="upload" value="Add More Files"/>
               
                <br/>
                <br/>
				<!-------Including PHP Script here------>
               
            </div>
           
		   <!-- Right side div -->

        </div>

  </div>
      <script>
 var x = document.getElementById("lat");
  var y = document.getElementById("long");

function getLocation() {
 

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.value = "Geolocation is not supported by this browser.";

  }
}


function showPosition(position) {
  x.value = position.coords.latitude;
  y.value = position.coords.longitude;
}
</script>
    </div>
  </div>
  <div class="form-group">
  <label for="comment">Description:</label>
  <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
</div>
<br>
<button type="submit" class="btn btn-primary">Add Gym</button>
</form>
</div>
<br><br>
<footer id="footer" class="page-footer">
    <br/>
    <div class="row">

</span>

    <span style=" position: relative; left: 37%; color:#131355 ; font-size: 13px"> <b> Copyright &copy 2019 GymsGuider. All rights reserved.</b></span>
    <p style=" position: relative; left: 44%; font-size: 13px;"> <a href="#"> About us</a> | <a href="#">Contact us</a> </p>
    <br/>

</div>


</footer>
</body>
</html>
