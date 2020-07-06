<?php
    include("config.php");
	$message="";
  session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
       
         $myusername = mysqli_real_escape_string($db,$_POST['username']);
         $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
         $myname= mysqli_real_escape_string($db,$_POST['name']); 
         $myemail= mysqli_real_escape_string($db,$_POST['email']); 
		 $myphone= mysqli_real_escape_string($db,$_POST['phone']); 

         $sql = "SELECT * FROM users WHERE username = '$myusername'";
         $result = mysqli_query($db,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
         $count = mysqli_num_rows($result);
	  
	     if($count==1){
                
                $message = "The user name is exists!!!";
				
                
            }else{
                $sql="INSERT INTO users(name,username,password,email,phone,type,isActive)
	            VALUES('$myname', '$myusername', '$mypassword','$myemail','$myphone','Customer','1')";
                mysqli_query($db,$sql);
                //$message = $sql;
                header("location: login.php");
            }
			
			 
    }
    
   
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register at GYM guider</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
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
  
  <h5> Register as a customer </h5>
							<h5 style="color:red;"><?php echo $message; ?></h5>
  <br>
  <br>
  <div class="col-sm-4">
  <form action="" method="post">
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
    <input type="password" class="form-control" pattern=".{5,}" name="password" id="pwd" required>
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
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
  </div>
  <br><br>
<?php require("footer.php");?>
</body>
</html>
