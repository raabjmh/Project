<?php
    include("sessioncustomer.php");   
    $message="";
    if($_SERVER["REQUEST_METHOD"] == "POST") {

      $c1=$_POST['c1'];
      $c2=$_POST['c2'];
      $c3=$_POST['c3'];
      $c4=$_POST['c4'];
      $c5=$_POST['c5'];
      $c6=$_POST['c6'];
      $c7=$_POST['c7'];
      $c8=$_POST['c8'];
      $description= mysqli_real_escape_string($db,$_POST['description']);  
      $gymtId= mysqli_real_escape_string($db,$_POST['gymtId']);  
      $myusername=$_SESSION['login_customer'];

      $sql = "SELECT * FROM gym_rate WHERE customer = '$myusername' and gym_id='$gymtId'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
      $count = mysqli_num_rows($result);
      if($count==1){
          $message="You can not rate same gym twice";
      }
      else{
        $allrate= round(($c1+$c2+$c3+$c4+$c5+$c6+$c7+$c8)/8);
        $sql = "SELECT * FROM gyms where id='$gymtId' ";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $newRateNumber=$row["no_rates"]+1;

        $newrateValue=round(($row["rate"]*$row["no_rates"]+$allrate)/($newRateNumber));
        $newc1=round(($row["c1"]*$row["no_rates"]+$c1)/($newRateNumber));
        $newc2=round(($row["c2"]*$row["no_rates"]+$c2)/($newRateNumber));
        $newc3=round(($row["c3"]*$row["no_rates"]+$c3)/($newRateNumber));
        $newc4=round(($row["c4"]*$row["no_rates"]+$c4)/($newRateNumber));
        $newc5=round(($row["c5"]*$row["no_rates"]+$c5)/($newRateNumber));
        $newc6=round(($row["c6"]*$row["no_rates"]+$c6)/($newRateNumber));
        $newc7=round(($row["c7"]*$row["no_rates"]+$c7)/($newRateNumber));
        $newc8=round(($row["c8"]*$row["no_rates"]+$c8)/($newRateNumber));

        $sql="INSERT INTO gym_rate(gym_id,customer,c1,c2,c3,c4,c5,c6,c7,c8,allrate,description)
        VALUES('$gymtId', '$myusername', '$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8',
        '$allrate','$description')";
          mysqli_query($db,$sql);

          $sqlupdate = "UPDATE gyms SET rate='$newrateValue', no_rates='$newRateNumber', c1='$newc1', c2='$newc2', c3='$newc3',
           c4='$newc4', c5='$newc5', c6='$newc6', c7='$newc7', c8='$newc8' WHERE id='$gymtId'";
        mysqli_query($db,$sqlupdate);
        $message="Thank you for your feedback";
      }

    }
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
<br>
<h3><?php echo $message; ?></h3>
  
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
