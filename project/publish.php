<?php
    include("sessionadmin.php");  

    $q=$_REQUEST["id"];

    $sqlupdate = "UPDATE gyms SET isActive='1' WHERE id='$q'";
    //echo  $sqlupdate;
    mysqli_query($db, $sqlupdate);
	    
    header("location: newrequests.php");
    
    ?>