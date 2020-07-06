<?php
    include("config.php");
	$message="";
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST") {
       
         $myusername = mysqli_real_escape_string($db,$_POST['username']);
         $mypassword = mysqli_real_escape_string($db,$_POST['password']); 

         $sql = "SELECT * FROM users WHERE username = '$myusername' AND password='$mypassword' AND isActive=1";
         $result = mysqli_query($db,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
         $count = mysqli_num_rows($result);
	  
	     if($count==1){
                
        if($row['type']=='Admin'){
          $_SESSION['login_admin'] = $myusername;
          header("location: admin-main.php");
        }
        else if($row['type']=='Customer'){
          $_SESSION['login_customer'] = $myusername;
          header("location: customer-main.php");
        }
        else{
          $_SESSION['login_owner'] = $myusername;
          header("location: owner-main.php");
        }
            }
            else{
                
                $message = "Credential error (username or password)";
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

<div class="header">
<div class="row">
 <div class="col-sm-3">
 <img id ="logo"
     src="img/gym.png"
     width="220"
     height="120"
     alt="GymsGuider Logo"
/>
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
 </div>
 <div class="col-sm-2 d-flex align-items-center">
 <a class="btn btn-outline-dark btn-sm" href="postgym.php" role="button">Post a GYM</a>

 </div>
 <div class="col-sm-2 d-flex align-items-center">
 <a class="btn btn-secondary btn-sm" href="register.php" role="button">Register as customer</a>

 </div>
 <div class="col-sm-2 d-flex align-items-center">
 <a class="btn btn-secondary btn-sm" href="login.php" role="button">Login</a>

 </div>
</div>
</div>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
  <div class="container">
<br>
  <h5> Login </h5>
							<h5 style="color:red;"><?php echo $message; ?></h5>
  <br>
  <br>
  <div class="col-sm-4">
  <form action="" method="post">
  
  <div class="form-group">
    <label for="username">User name:</label>
    <input type="text" class="form-control" name="username" id="username" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="password" id="pwd" required>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
</div>
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
