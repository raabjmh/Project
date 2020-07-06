<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
   include("sessionowner.php");   
   $myusername=$_SESSION['login_owner']; 
       $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
       $myname= mysqli_real_escape_string($db,$_POST['name']); 
       $myemail= mysqli_real_escape_string($db,$_POST['email']); 
       $myphone= mysqli_real_escape_string($db,$_POST['phone']); 
       $sqlupdate = "UPDATE users SET name='$myname', email='$myemail', 
       phone='$myphone', password='$mypassword'  WHERE username='$myusername'";
       //echo  $sqlupdate;
       mysqli_query($db, $sqlupdate);
      
          
          header("location: oaccount.php");
  }
  ?>