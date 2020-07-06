<?php
$message="";

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
  <title>Post A GYM</title>
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

<?php require("vheader.php");?>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
  <div class="container">
  
  <h5> Post A Gym </h5>
							<h5 style="color:red;"><?php echo $message; ?></h5>
  <br>
  <br>
  
  <form action="postgymcode1.php" method="post" enctype="multipart/form-data">
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
            <input type="checkbox" class="form-check-input" name="cmachine" value="">Cardio machine
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
<div class="col-sm-4>">
<h3>Owner information</h3>
<div class="form-group">
    <label for="name">Full name:</label>
    <input type="text" class="form-control" name="name" id="name" required>
  </div>
  <div class="form-group">
    <label for="username">User name:</label>
    <input type="text" class="form-control" name="username" id="username" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control"   pattern=".{5,}" name="password" id="pwd" required>
  </div>
  <div class="form-group">
    <label for="cpwd">Confirm Password:</label>
    <input type="password" class="form-control" pattern=".{5,}" id="cpwd" oninput="check(this)" required>
  </div>
  <script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('pwd').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name="email" id="email" required>
  </div>
  <div class="form-group">
    <label for="phone">Phone number:</label>
    <input type="number" class="form-control" title="Ten digits" required pattern="[0-9]{10}" name ="phone" id="phone">
  </div>
  </div>
  <button type="submit" class="btn btn-primary" >Register</button>
</form>
</div>
<br><br>
<?php require("footer.php");?>

</body>
</html>
