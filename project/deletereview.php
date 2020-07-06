<?php
        include('config.php');
        
        $q=$_REQUEST["id"];
        $query="DELETE FROM gym_rate WHERE id='$q' ";
        mysqli_query($db, $query);
        // Go back to the pervious page
        $query="DELETE FROM reportreview WHERE rate_id='$q' ";
        mysqli_query($db, $query);
        header("location:reportreview.php");
        exit;

        ?>