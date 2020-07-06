<?php
  include("config.php");
  $message="";
  session_start();
  if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 1;
$offset = ($pageno-1) * $no_of_records_per_page;
$total_pages_sql = "SELECT COUNT(*) FROM gyms WHERE isActive=1";
$result = mysqli_query($db,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
  $sql = "SELECT * FROM gyms WHERE isActive=1 LIMIT $offset, $no_of_records_per_page";
  $result = mysqli_query($db,$sql);

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>GYM guider home page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
.btnsearch {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 10px 14px;
  font-size: 14px;
  cursor: pointer;
  height: 38px;
}
.bg-dark,.btn-secondary {
    background-color: #131355!important;
}
/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
#footer{
        background-color: rgba(184,184,183,0.4);
        height:120;
    }
</style>
</head>
<body>
<?php require("vheader.php");?>

<div class="jumbotron bg-dark">
  <div class="wrapper container">
    <h1 style="color:white">What GYMs are you looking for ?</h1>
    <form action="vsearch.php" method="post" style="color:white">      
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
<input type="text"   pattern=".{3,}"   required title="3 characters minimum" class="form-control col-sm-5" id="qsearch" name="qsearch">&nbsp;
    <button type="submit" class="btnsearch"> Search</button>
    </div>

</form>
  </div>
</div>
  
<div class="wrapper container">
<br>
  <h5> Home page </h5>
							<h5 style="color:red;"><?php echo $message; ?></h5>
  <br>
  <div class="row">
  <?php while($row1 = mysqli_fetch_array($result)):;
				
					
        ?>
		
<div class="card col-dm-6" style="width:1000px; margin-top:3%; background-color: rgba(184,184,183,0.4); padding:1%">
<img  class="card-img-top" src="<?php echo "uploads/".$row1['image'];?>" alt="Gym Logo" style="width:210px; margin:2%;">
<div style ="position: relative; margin-left:28%; margin-top:-18%;" class="card-body">
<h3 class="card-title"><?php echo $row1['name']; ?> <button type="submit" style ="width :20%;" class="btn btn-dark" id="Delete">
     <a href="gymdetail.php?id=<?php echo $row1['id'];?>" style="color:white;">View details</a>
                                                                   
                                                                  </button>
</h3>

<p class="card-text"><?php echo printValue($row1['price'])." per month";?></p>
<p class="card-text"><?php echo $row1['no_rates']." Rates";?></p>

                                                                  
</div>
</div>
<?php endwhile;
?>
<br><br>
<div class="row">
<ul class="pagination" style="margin-top:20px;">
        <li class="page-item"><a class="page-link" href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="page-item"><a class="page-link" href="#"><?php echo $pageno; ?></a></li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li class="page-item"><a class="page-link" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
    </div>
 </div> 
 
</div>
<br><br>
<?php require("footer.php");?>
</body>
</html>
