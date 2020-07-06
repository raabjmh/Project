<!-------------------------------------------------------------------------------------------------------->


<!------------Insert gyms to the favourite list query----------->
<?php
    include("sessioncustomer.php");
    $f_id=$_REQUEST["f_id"];
    $sql = "SELECT no_dislike FROM gym_rate where id='$f_id'";
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result);
  $dislike_no=$row['no_dislike']+1;
  $sqlupdate = "UPDATE gym_rate SET no_dislike='$dislike_no' WHERE id='$f_id'";
        mysqli_query($db,$sqlupdate);
    // Go back to the pervious page
    //header("location: ViewFavouriteList.php");

    ?>
<!------------Insert gyms to the favourite list query----------->

<!-------------------------------------------------------------------------------------------------------->
