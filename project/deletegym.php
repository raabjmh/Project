<?php
    include('config.php');

    $q=$_REQUEST["id"];

    $query="DELETE FROM gyms  WHERE id='$q' ";    
    mysqli_query($db, $query);
	    
    header("location: mygyms.php");
    
    ?>