<?php
    include("sessioncustomer.php");  
    $myusername=$_SESSION['login_customer']; 
    $sql = "SELECT * FROM searchhistory where username='$myusername'";
    $result = mysqli_query($db,$sql); 
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
<table class="table table-striped">
    <thead>
      <tr>
        <th>Keywords</th>
        <th>Search by</th>
        <th>datetime</th>
        <th># results</th>

      </tr>
    </thead>
    <tbody>
    <?php while($row1 = mysqli_fetch_array($result)):; ?>
      <tr>
        <td><?php echo $row1['query']; ?> </td>
        <td><?php echo $row1['search_by']; ?></td>
        <td><?php echo $row1['datetime']; ?> </td>
        <td><?php echo $row1['no_results']; ?></td>
      </tr>
      <?php endwhile;?>
				
					
    </tbody>
  </table>
</div>
</div>
<br><br>
<?php require("footer.php");?>

</body>
</html>
