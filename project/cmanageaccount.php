<?php
    include("sessioncustomer.php");  
    $myusername=$_SESSION['login_customer']; 
    $sql = "SELECT * FROM users where username='$myusername'";
    $result = mysqli_query($db,$sql); 
    $row = mysqli_fetch_array($result);
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
  <style>
#footer{
        background-color: rgba(184,184,183,0.4);
        height:120;
    }
	
	.btnsearch {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 10px 14px;
  font-size: 14px;
  cursor: pointer;
  height: 38px;
}
    
</style>
</head>
<body>

<?php require("cheader.php");?>
<div class="jumbotron jumbotron-fluid bg-dark">
  <div class="container">
    <h1 style="color:white">What GYMs are you looking for ?</h1>
    <form action="csearch.php" method="post" style="color:white">      
    <div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="searchby" value="byname" checked>Gym name
  </label>
</div>
<div class="form-check-inline">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="searchby" value="bycity">City name
  </label>
</div>
<br>
<br>
<div class="form-group form-inline">
<input type="text"  pattern=".{3,}"   required title="3 characters minimum" class="form-control col-sm-5" id="qsearch" name="qsearch">&nbsp;
    <button type="submit" class="btnsearch"> Search</button>
    </div>

</form>
</div>
</div>
  
<div class="container">
<br>
<div class="col-sm-4">
  <form action="caccountcode.php" method="post">
  <div class="form-group">
    <label for="name">Full name:</label>
    <input type="text" class="form-control" value="<?php echo $row['name']; ?>" name="name" id="name" required>
  </div>
  
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" value="<?php echo $row['password']; ?>" pattern=".{5,}" name="password" id="pwd" required>
  </div>
  <div class="form-group">
    <label for="cpwd">Confirm Password:</label>
    <input type="password" class="form-control" value="<?php echo $row['password']; ?>" pattern=".{5,}" id="cpwd" oninput="check(this)" required>
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
    <input type="email" class="form-control" value="<?php echo $row['email']; ?>" name="email" id="email" required>
  </div>
  <div class="form-group">
    <label for="phone">Phone number:</label>
    <input type="number" class="form-control" title="Ten digits" value="<?php echo $row['phone']; ?>" required pattern="[0-9]{10}" name ="phone" id="phone">
  </div>
  <button type="submit" class="btn btn-primary">Update account</button>
</form>
</div>
</div>
<br><br>
<?php require("footer.php");?>

</body>
</html>
