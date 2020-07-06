<?php
    include("sessioncustomer.php");  
$myusername=$_SESSION['login_customer'];	
	$sql = "SELECT * FROM FavouriteGyms_vw WHERE customer_id='$myusername'";
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
    .card-img-top{border-style: groove; padding:1%; margin: 0%;}
                          .alert{
                            display: block;
                          }
</style>


                              <!---------------start JQuery----------------------->
                              <script>
                              // hide the message
                              $(document).ready(function(){//open the main function
                            setTimeout(function() { $("#msg").hide(); }, 3500);
                            });
                              </script>
</head>
<body>

<?php require("cheader.php");?>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
   <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  </nav>
<div class="container">
<br>

<div id="msg">
                  <?php
                  if (isset($_GET['message'])){//open the if statement
                       // Display sucessful message
                       echo $_GET['message'];
                  }//close the if statement
                  ?>
                  </div>
				  <div class="row" id="filterdata">
<?php while($row = mysqli_fetch_array($result)):;
?>
 <div class="card col-dm-6" style="width:1000px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%">
<img  class="card-img-top" src="<?php echo "uploads/".$row['image'];?>" alt="Gym Logo" style="width:210px; margin:2%;">
<div style ="position: relative; margin-left:28%; margin-top:-18%;" class="card-body">
<h3 class="card-title"><?php echo $row['gym_name']; ?></h3>

<p class="card-text"><?php echo $row['city'].", ".$row['country'];?></p>
<a href="cgymdetail.php?id=<?php echo $row['gym_id'];?>" style ="width :20%;" class="btn btn-primary" > View
                                                                    <img src="img/view.png" width="19"/>
                                                                    </a>
<button type="submit" style ="width :20%;" class="btn btn-dark" id="Delete">
     <a href="DeleteFavouriteList.php?id=<?php echo $row['fav_id'];?>" style="color:white;">Delete</a>
                                                                    <img src="img/deleteIcon.png" width="15"/>
                                                                  </button>

</div>
</div>
<?php endwhile;?>
</div>
	</div>			  
<br><br>
<?php require("footer.php");?>

</body>
</html>
