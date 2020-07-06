<!-------------------------------------------------------------------------------------------------------->


<!------------Insert gyms to the favourite list query----------->
<?php
    include("sessioncustomer.php");
    $f_id=$_REQUEST["f_id"];
    $sql = "SELECT * FROM gym_rate where id='$f_id'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  $description=$row['description'];
  $myusername= $_SESSION['login_customer'];
    $sql="INSERT INTO reportreview(rate_id,customer,feedback)
	            VALUES('$f_id', '$myusername','$description')";
                mysqli_query($db,$sql);

  

    ?>
<!------------Insert gyms to the favourite list query----------->

<!-------------------------------------------------------------------------------------------------------->
