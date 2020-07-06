<?php
    include("sessionowner.php");   
  
     $message="";
     $errormsg="";
$isok=1;


$gname = mysqli_real_escape_string($db,$_POST['gname']);
$gemail = mysqli_real_escape_string($db,$_POST['gemail']);
$gphone= mysqli_real_escape_string($db,$_POST['gphone']); 

$country = mysqli_real_escape_string($db,$_POST['country']); 
$cities= mysqli_real_escape_string($db,$_POST['cities']); 
$district= mysqli_real_escape_string($db,$_POST['district']); 
$price= mysqli_real_escape_string($db,$_POST['price']);
$whours = mysqli_real_escape_string($db,$_POST['whours']);
$wstart_at = mysqli_real_escape_string($db,$_POST['start_at']);
$wend_at = mysqli_real_escape_string($db,$_POST['end_at']); 

$shours = mysqli_real_escape_string($db,$_POST['shours']);
$sstart_at = mysqli_real_escape_string($db,$_POST['sstart_at']);
$send_at = mysqli_real_escape_string($db,$_POST['send_at']); 

$lat= mysqli_real_escape_string($db,$_POST['lat']); 
$long= mysqli_real_escape_string($db,$_POST['long']); 
$description= mysqli_real_escape_string($db,$_POST['description']);  

$gender=$_POST['gender'];
$pet=$_POST['pet'];

$sam=0;
$croom=0;
$wifi=0;
$lockers=0;
$parking=0;

if(isset($_POST['sam'])){
    $sam=1; 

}
if(isset($_POST['croom'])){
    $croom=1; 

}
if(isset($_POST['wifi'])){
    $wifi=1; 

}
if(isset($_POST['lockers'])){
    $lockers=1; 

}
if(isset($_POST['parking'])){
    $parking=1; 

}

$pool=0;
$basket=0;
$sauna=0;
$football=0;
$cmachine=0;
$wmachine=0;
$classes=0;
$tenis=0;
$volley=0;

if(isset($_POST['pool'])){
    $pool=1; 

}
if(isset($_POST['basket'])){
    $basket=1; 

}
if(isset($_POST['sauna'])){
    $sauna=1; 

}
if(isset($_POST['football'])){
    $football=1; 

}
if(isset($_POST['cmachine'])){
    $cmachine=1; 

}

if(isset($_POST['wmachine'])){
    $wmachine=1; 

}
if(isset($_POST['classes'])){
    $classes=1; 

}
if(isset($_POST['tenis'])){
    $tenis=1; 

}
if(isset($_POST['volley'])){
    $volley=1; 

}


$target_path = "uploads/"; //Declaring Path for uploaded images
for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

    $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
    $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
    $file_extension = end($ext); //store extensions in the variable
    $target_path= $target_path . basename($_FILES["file"]["name"][$i]);
    //$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
    $j = $j + 1;//increment the number of uploaded images according to the files in array       
  
  if (($_FILES["file"]["size"][$i] < 10000000) //Approx. 100kb files can be uploaded.
            && in_array($file_extension, $validextensions)) {
        if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
           // echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            $image[$i]=basename($_FILES['file']['name'][$i]);
        } else {//if file was not moved.
            //echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            $isok=0;
        }
    } else {//if file size and file type was incorrect.
        //echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        $isok=0;
    }
    $target_path = "uploads/";
}
if($isok==1){
    $myusername=$_SESSION['login_owner'];
     $sql="INSERT INTO gyms(name,description,price,email,phone,country,city,district,gender,petfriendly,latitude,longitude,
     owner,swimsuit,changeroom,wifi,lockers,carparking,swimpool,basketball,saunapath,football,cardiomachine,weightmachine,
     classes,tabletenis,volleyball,working_days,wstart_at,wend_at,special_days,sstart_at,send_at,isActive,image,image2,image3,image4,image5)
     VALUES('$gname', '$description', '$price','$gemail','$gphone','$country','$cities','$district','$gender','$pet','$lat','$long',
     '$myusername','$sam','$croom','$wifi','$lockers','$parking','$pool','$basket','$sauna','$football','$cmachine','$wmachine',
     '$classes','$tenis','$volley','$whours','$wstart_at','$wend_at','$shours','$sstart_at',
     '$send_at','0','$image[0]','$image[1]','$image[2]','$image[3]','$image[4]')";
     mysqli_query($db,$sql);
     $message="Post Gym  successful";
}
else{
    $errormsg="Error post gym";
}
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Owner -Add GYM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <style>
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

 <div class="col-sm-3 d-flex align-items-right"> 
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
<<br>
							<h5 style="color:green;"><?php echo $message; ?></h5>
                            <h5 style="color:green;"><?php echo $errormsg; ?></h5>

  <br>
  <br>

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
