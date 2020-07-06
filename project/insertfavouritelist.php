<!-------------------------------------------------------------------------------------------------------->


<!------------Insert gyms to the favourite list query----------->
<?php
        include("sessioncustomer.php");   

    $gym_id=$_REQUEST["id"];
    $myusername= $_SESSION['login_customer'];
    echo $myusername;
    $sql="INSERT INTO favouritegyms(gym_id,customer)
	            VALUES('$gym_id', '$myusername')";
                mysqli_query($db,$sql);
echo $sql;
    // Go back to the pervious page
    header("location: ViewFavouriteList.php");

    ?>
<!------------Insert gyms to the favourite list query----------->

<!-------------------------------------------------------------------------------------------------------->
