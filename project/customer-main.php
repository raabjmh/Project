<?php
    include("sessioncustomer.php");   
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
<div class="row">
    <div class="col-sm-4">
    <a href="ViewFavouriteList.php"><img src="img/Favorites list.png" width="350" height="200" alt="Gyms" ></a>
    </div>
    <div class="col-sm-4">
    <a href=""><img src="img/send feedback.png" width="350" height="200" alt="send feedback" ></a>
    </div>
    <div class="col-sm-4">
    <a href="searchhistory.php"><img src="img/search history.png" width="350" height="200" alt="search history" ></a>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-sm-6">
    <a href="cmanageaccount.php"><img src="img/user id.png" width="550" height="200" alt="search history" ></a>
    </div>
    <div class="col-sm-6">
    <a "#"><img src="img/help3.png" width="500" height="200" alt="search history" ></a>
    </div>
    
</div>
</div>
<br><br>
<?php require("footer.php");?>

</body>
</html>
