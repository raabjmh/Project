<?php
    include("sessionadmin.php");  

    $q=$_REQUEST["id"];

    $sqlupdate = "DELETE from gym_rate  WHERE id='$q'";
    //echo  $sqlupdate;
    mysqli_query($db, $sqlupdate);
	    
    header("location: requestreview.php");
    
    ?>