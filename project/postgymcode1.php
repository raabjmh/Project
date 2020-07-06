<?php
$message="";
$errormsg="";
$isok=1;
$j = 0; //Variable for indexing uploaded image 
include("config.php");
$myusername = mysqli_real_escape_string($db,$_POST['username']);
$mypassword = mysqli_real_escape_string($db,$_POST['password']); 
$myname= mysqli_real_escape_string($db,$_POST['name']); 
$myemail= mysqli_real_escape_string($db,$_POST['email']); 
$myphone= mysqli_real_escape_string($db,$_POST['phone']); 

$gname = mysqli_real_escape_string($db,$_POST['gname']);
$gemail = mysqli_real_escape_string($db,$_POST['gemail']);
$gphone= mysqli_real_escape_string($db,$_POST['gphone']); 

$country = mysqli_real_escape_string($db,$_POST['country']); 
$cities= mysqli_real_escape_string($db,$_POST['cities']); 
$district= mysqli_real_escape_string($db,$_POST['district']); 
$price= mysqli_real_escape_string($db,$_POST['price']);
$start_at = mysqli_real_escape_string($db,$_POST['start_at']);
$end_at = mysqli_real_escape_string($db,$_POST['end_at']); 
$lat= mysqli_real_escape_string($db,$_POST['lat']); 
$long= mysqli_real_escape_string($db,$_POST['long']); 
$description= mysqli_real_escape_string($db,$_POST['description']);  

$whours = mysqli_real_escape_string($db,$_POST['whours']);
$wstart_at = mysqli_real_escape_string($db,$_POST['start_at']);
$wend_at = mysqli_real_escape_string($db,$_POST['end_at']); 

$shours = mysqli_real_escape_string($db,$_POST['shours']);
$sstart_at = mysqli_real_escape_string($db,$_POST['sstart_at']);
$send_at = mysqli_real_escape_string($db,$_POST['send_at']); 

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


$sql = "SELECT * FROM users WHERE username = '$myusername'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

if($count==1){
   
   $errormsg = "The user name is exists!!!";
   
   
}else{
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
    $sql="INSERT INTO users(name,username,password,email,phone,type,isActive)
    VALUES('$myname', '$myusername', '$mypassword','$myemail','$myphone','Owner','1')";
     mysqli_query($db,$sql);
     $sql="INSERT INTO gyms(name,description,price,email,phone,country,city,district,gender,petfriendly,latitude,longitude,
     owner,swimsuit,changeroom,wifi,lockers,carparking,swimpool,basketball,saunapath,football,cardiomachine,weightmachine,
     classes,tabletenis,volleyball,working_days,wstart_at,wend_at,special_days,sstart_at,send_at,isActive,image,image2,image3,image4,image5)
     VALUES('$gname', '$description', '$price','$gemail','$gphone','$country','$cities','$district','$gender','$pet','$lat','$long',
     '$myusername','$sam','$croom','$wifi','$lockers','$parking','$pool','$basket','$sauna','$football','$cmachine','$wmachine',
     '$classes','$tenis','$volley','$whours','$wstart_at','$wend_at','$shours','$sstart_at',
     '$send_at','0','$image[0]','$image[1]','$image[2]','$image[3]','$image[4]')";
     mysqli_query($db,$sql);
     $message="Post Gym and account successful";
}
else{
    $errormsg="Error post gym";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login to GYM guider</title>
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

<?php require("vheader.php");?>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
<div class="container">
<br>
							<h5 style="color:green;"><?php echo $message; ?></h5>
                            <h5 style="color:green;"><?php echo $errormsg; ?></h5>

  <br>
  <br>
 
</div>
<br><br>
<?php require("footer.php");?>

</body>
</html>
