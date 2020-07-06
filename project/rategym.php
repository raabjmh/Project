<?php
    include("sessioncustomer.php");   
    $q=$_REQUEST["id"];
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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">


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
 <a href="customer-main.php">
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
<p style="color:blue;"><?php echo "Welcome: ".$_SESSION['login_customer']; ?></p>

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
<div class="wrapper container">
<br><br>
<h5> Please fill survey below</h5>
<br><br>
<div class="row">
<div class="col-sm-2">
<br><br><br><br><br>
<h4>Criterion</h4>
<div class="row"><h5>1.The value of money</h5></div>
<div class="row"><h5>2.Cleanliness</h5></div>
<div class="row"><br></div>

<div class="row"><h5>3.Staff</h5></div>
<div class="row"></div>
<div class="row"><h5>4.Workout falicities</h5></div>
<div class="row"><h5>5.Services</h5></div>
<div class="row"><h5>6.Instructors</h5></div>
<div class="row"><br></div>
<div class="row"><h5>7.comfort and quality</h5></div>
<div class="row"><h5>8.Recomended to others</h5></div>

</div>
<div class="col-sm-10">

<div class="row">
<i class="far fa-grin-beam fa-5x col-sm-2"></i>
<i class="far fa-smile fa-5x col-sm-2"></i>
<i class="far fa-flushed fa-5x col-sm-2"></i>
<i class="far fa-frown fa-5x col-sm-2"></i>
<i class="far fa-grimace fa-5x col-sm-2"></i>
</div><br>
<div class="row">
<div class="col-sm-2"><p>Extremely satisfied</p></div>
<div class="col-sm-2"><p> Satisfied</p></div>
<div class="col-sm-2"><p>Neutral</p></div>
<div class="col-sm-2"><p>Unsatisfied</p></div>
<div class="col-sm-2"><p>Extremely unsatisfied</p></div>
</div>
<form method="post" action="ratecode.php">
<input type="hidden" id="custId" name="gymtId" value="<?php echo $q;?>">

<p>

<label class="radio-inline col-sm-2">
      <input type="radio" name="c1"  value="5" checked>
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c1" value="4">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c1" value="3">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c1" value="2">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c1" value="1">
    </label>
</p>
<p>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c2" value="5" checked>
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c2" value="4">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c2" value="3">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c2" value="2">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c2" value="1">
    </label>
    </p>
   <p>
    <label class="radio-inline col-sm-2">

      <input type="radio" name="c3" value="5" checked>
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c3" value="4">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c3" value="3">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c3" value="2">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c3" value="1">
    </label>
</p>
<p>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c4" value="5" checked>
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c4" value="4">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c4" value="3">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c4" value="2">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c4" value="1">
    </label>
</p>

<p>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c5" checked value="5">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c5" value="4">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c5" value="3">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c5" value="2">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c5" value="1">
    </label>
  </p>
  <p>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c6" checked value="5">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c6" value="4">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c6" value="3">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c6" value="2">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c6" value="1">
    </label>
 </p>

 <p>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c7" checked value="5">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c7" value="4">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c7" value="3">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c7" value="2">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c7" value="1">
    </label>
</p>

<p>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c8" checked value="5">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c8" value="4">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c8" value="3">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c8" value="2">
    </label>
    <label class="radio-inline col-sm-2">
      <input type="radio" name="c8" value="1">
    </label>
    </p>
    <div class="form-group">
  <label for="comment">Write you review (optional):</label>
  <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
</div>
    <button type="submit" class="btn btn-primary">Rate</button>

    </form>
</div>
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
