<!-------------------------------------------------------------------------------------------------------->
      <!------------Delete gyms from the favourite list query----------->
    <?php
        include('config.php');
        
        $q=$_REQUEST["id"];
        $query="DELETE FROM FavouriteGyms WHERE id='$q' ";
        mysqli_query($db, $query);
        // Go back to the pervious page

        header("location:ViewFavouriteList.php?message=<div class='alert alert-success' role='alert'>The gym is deleted sucessfully from your favourite list</div>");
        exit;

        ?>
        <!------------Delete gyms from the favourite list query----------->

<!-------------------------------------------------------------------------------------------------------->
