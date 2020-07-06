<?php
    include("sessionowner.php");
    $q=$_REQUEST["id"];
    $sql = "SELECT * FROM gyms WHERE isActive=1 and id='$q'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result);
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
  <title>Owner -Update Gym</title>
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
  
  <form action="updategymcode.php" method="post">
  <h3>Gym information</h3>
  <input type="hidden" id="gymid" name="gymid" value="<?php echo $q; ?>">

  <div class="form-group col-sm-6">
    <label for="gname">GYM name:</label>
    <input type="text" class="form-control" name="gname" value="<?php echo $row['name']; ?>" id="gname" required>
  </div>
  <div class="form-group col-sm-4">
    <label for="gemail">Gym Email address:</label>
    <input type="email" class="form-control" name="gemail" id="gemail" value="<?php echo $row['email']; ?>"required>
  </div>
  <div class="form-group col-sm-4">
    <label for="gphone">Gym Phone number:</label>
    <input type="number" class="form-control" title="Ten digits" required pattern="[0-9]{10}" value="<?php echo $row['phone']; ?>" name ="gphone" id="gphone">
  </div>
  <div class="form-group form-inline">
  <div class="form-group col-sm-4">
    <label for="country">country:</label>

    <select class="form-control" id="country" name="country"  onchange="showCity(this.value)">
    <option value="<?php echo $row['country']; ?>"><?php echo $row['country']; ?></option>
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
      <option value="<?php echo $row['city']; ?>"><?php echo $row['city']; ?></option>
     </select>
    </div>
    <div class="form-group col-sm-4">
    <label for="district">district:</label>
    <input type="text"  value="<?php echo $row['district']; ?>" class="form-control" name="district" id="district" required>
    </div>
  </div>
  
  <div class="form-group form-inline">
  <div class="form-group col-sm-4">
    <label for="gender">Allow gender:</label>
    <select class="form-control" id="gender" name="gender">
    <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
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
    <input type="number" value="<?php echo $row['price']; ?>" class="form-control" step="0.1" required  name ="price" id="price">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-sm-6">
    <label for="whours">working days</label>
    <input type="text" class="form-control" value="<?php echo $row['working_days']; ?>" name="whours" id="whours" required>
  </div>
  <div class="form-inline">
  <div class="form-inline">
<label for="start_at">Start at:</label>
    <input type="time" class="form-control" value="<?php echo $row['wstart_at'];?>" name="start_at" id="start_at">
</div>
<div class="form-inline">
<label for="end_at">End at:</label>
    <input type="time" class="form-control" value="<?php echo $row['wend_at'];?>" name="end_at" id="end_at">
</div>
</div>
<div class="form-group col-sm-6">
    <label for="shours">Special days</label>
    <input type="text" class="form-control" value="<?php echo $row['special_days'];?>" name="shours" id="shours" required>
  </div>
  <div class="form-inline">
  <div class="form-inline">
<label for="sstart_at">Start at:</label>
    <input type="time" class="form-control" value="<?php echo $row['sstart_at'];?>" name="sstart_at" id="sstart_at">
</div>
<div class="form-inline">
<label for="end_at">End at:</label>
    <input type="time" class="form-control" value="<?php echo $row['send_at'];?>" name="send_at" id="send_at">
</div>
</div>
</div>
<br>
<div class="row">
    <div class="col-sm-4">
      <p>Available services:</p>
      <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="sam"
             value="" <?php if($row['swimsuit']==1){ echo ' checked';} ?>>Swimsuit drying machine
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="croom"
             value="" <?php if($row['changeroom']==1){ echo ' checked';} ?>>Changing room
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="wifi"
             value="" <?php if($row['wifi']==1){ echo ' checked';} ?>>Wi-Fi
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="lockers"
             value="" <?php if($row['lockers']==1){ echo ' checked';} ?>>Lockers
       </label>
</div>

<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="parking" 
            value="" <?php if($row['carparking']==1){ echo ' checked';} ?>>Car Parking
       </label>
</div>

    </div>
    <div class="col-sm-4">
      <p>Facilities:</p>
      <div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="pool" 
            value="" <?php if($row['swimpool']==1){ echo ' checked';} ?>>Swimming Pool
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="basket"
             value="" <?php if($row['basketball']==1){ echo ' checked';} ?>>Basket ball
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="sauna"
             value="" <?php if($row['saunapath']==1){ echo ' checked';} ?>>Sauna path
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="football" 
            value="" <?php if($row['football']==1){ echo ' checked';} ?>>Footbal
       </label>
</div>

<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="cmachine" 
            value="" <?php if($row['cardiomachine']==1){ echo ' checked';} ?>>Cardio machin
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="wmachine"
             value="" <?php if($row['weightmachine']==1){ echo ' checked';} ?>>Weight machine
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="classes"
             value="" <?php if($row['classes']==1){ echo ' checked';} ?>>Classes
       </label>
</div>
<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="tenis" 
            value="" <?php if($row['tabletenis']==1){ echo ' checked';} ?>>Table Tennis
       </label>
</div>

<div class="form-check">
          <label class="form-check-label">
            <input type="checkbox" class="form-check-input" name="volley"
             value="" <?php if($row['volleyball']==1){ echo ' checked';} ?> >Volley ball
       </label>
</div>
    </div>
    <div class="col-sm-4">
           
      <p>get location</p>
      <a class="btn btn-outline-dark"  onclick="getLocation()">Get location</a>

      <div class="form-group">
    <label for="price">Latitude & logitude</label>
    <input type="text" class="form-control"  value="<?php echo $row['latitude']; ?>" required  name ="lat" id="lat">
    <input type="text" class="form-control" value="<?php echo $row['longitude']; ?>" required  name ="long" id="long">
    
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
  <textarea class="form-control" rows="5" id="comment" name="description"><?php echo $row['description'];?></textarea>
</div>
<br>
<button type="submit" class="btn btn-primary">Update Gym</button>
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
