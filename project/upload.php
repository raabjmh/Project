<?php

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




$services="";

if(isset($_POST['sam'])){
    $services=$services."-Swimsuit drying Machine"; 

}
if(isset($_POST['croom'])){
    $services=$services."-Changing Room";

}
if(isset($_POST['wifi'])){
    $services=$services."-WiFi";

}
if(isset($_POST['lockers'])){
    $services=$services."-lockers";

}
if(isset($_POST['parking'])){
    $services=$services."-Car parking";


}

$facilities="";

if(isset($_POST['pool'])){
    $facilities=$facilities."-Swimming pool";

}
if(isset($_POST['basket'])){
    $facilities=$facilities."-Basket ball";

}
if(isset($_POST['sauna'])){
    $facilities=$facilities."-Sauna path";

}
if(isset($_POST['football'])){
    $facilities=$facilities."-Football";

}
if(isset($_POST['cmachine'])){
    $facilities=$facilities."-Cardio machine";

}

if(isset($_POST['wmachine'])){
    $facilities=$facilities."-Weight Machine";

}
if(isset($_POST['classes'])){
    $facilities=$facilities."-Classes";

}
if(isset($_POST['tenis'])){
    $facilities=$facilities."-Table tennis";

}
if(isset($_POST['volley'])){
    $facilities=$facilities."-Volley Ball";

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
        
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 10000000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
                echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
                $image[$i]=basename($_FILES['file']['name'][$i]);
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }

    $sql="INSERT INTO users(name,username,password,email,phone,type,isActive)
        VALUES('$myname', '$myusername', '$mypassword','$myemail','$myphone','Owner','1')";
         mysqli_query($db,$sql);
         $sql="INSERT INTO gym(name,description,price,email,phone,country,city,district,gender,petfriendly,latitude,logitude,
         owner,services,facilities,working_days,wstart_at,wend_at,special_days,sstart_at,send_at,image,image2,image3,image4,image5)
         VALUES('$gname', '$description', '$price','$gemail','$gphone','$country','$cities','$district','$gender','$pet','$lat','$long',
         '$myusername','$services','$facilities','$whours','$wstart_at','$wend_at','$shours','$sstart_at',
         '$send_at','$image[0]','$image[1]','$image[2]','$image[3]','$image[4]')";
         mysqli_query($db,$sql);
   }
	

?>