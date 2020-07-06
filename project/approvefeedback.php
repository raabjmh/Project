<?php
    include("sessionadmin.php");  

    $q=$_REQUEST["id"];

    $sqlupdate = "UPDATE gym_rate SET isvalid='1' WHERE id='$q'";
    //echo  $sqlupdate;
    mysqli_query($db, $sqlupdate);
	    
    header("location: requestreview.php");
    
    ?>