<?php

//fetch_data.php
session_start();
include('config.php');

               function printValue($price){
                   $localprice=$price*$_SESSION['local_currency']/$_SESSION['currency']['rates']['USD'];
                   $localprice=number_format((float)$localprice, 2, '.', '');
                   return $localprice." ". $_SESSION['currency_name'];

              }
if(isset($_POST["action"]))
{
  $query = "
  SELECT * FROM gyms
 ";
 $searchby=$_POST["searchby"];
 $qsearch=$_POST["qsearch"];

  if($searchby=='byname'){
    $query .= "
    WHERE name LIKE '%$qsearch%' AND isActive=1 
  ";
  }
  else if($searchby=='bycity'){
    $query .= "
    WHERE city LIKE '%$qsearch%' AND isActive=1 
  ";
  }
 
 if(isset($_POST["sam"]))
 {
 
  $query .= "
   and swimsuit =1 
  ";
 }

 if(isset($_POST["wifi"]))
 {
 
  $query .= "
   and wifi =1 
  ";
 }

 if(isset($_POST["croom"]))
 {
 
  $query .= "
   and changeroom =1 
  ";
 }
 if(isset($_POST["lockers"]))
 {
 
  $query .= "
   and lockers =1 
  ";
 }

 if(isset($_POST["parking"]))
 {
 
  $query .= "
   and carparking =1 
  ";
 }

 /////////////////////////////
 if(isset($_POST["pool"]))
 {
 
  $query .= "
   and swimpool =1 
  ";
 }
 if(isset($_POST["basket"]))
 {
 
  $query .= "
   and basketball =1 
  ";
 }
 if(isset($_POST["sauna"]))
 {
 
  $query .= "
   and saunapath =1 
  ";
 }
 if(isset($_POST["football"]))
 {
 
  $query .= "
   and football =1 
  ";
 }
 if(isset($_POST["cmachine"]))
 {
 
  $query .= "
   and cardiomachine =1 
  ";
 }
 if(isset($_POST["wmachine"]))
 {
 
  $query .= "
   and weightmachine =1 
  ";
 }
 if(isset($_POST["classes"]))
 {
 
  $query .= "
   and classes =1 
  ";
 }
 if(isset($_POST["tenis"]))
 {
 
  $query .= "
   and tabletenis =1 
  ";
 }
 if(isset($_POST["volley"]))
 {
 
  $query .= "
   and volleyball =1 
  ";
 }

 if(isset($_POST["gender"]))
 {
  $gender=$_POST["gender"];
  if($gender!=""){$query .= "
    and gender ='$gender' 
   ";}
  
  
 }

 if(isset($_POST["price"]))
 {
  $price=$_POST["price"];
  if($price=="r1")
  {$query .= "
    and price > 0 and price<=50  
   ";}
   else if($price=="r2")
  {$query .= "
    and price > 50 and price<=250  
   ";}
   else if($price=="r3")
   {$query .= "
     and price > 250   
    ";}
  
 }

 if(isset($_POST["pet"]))
 {
  $pet=$_POST["pet"];
  if($pet!="")
  {$query .= "
    and petfriendly ='$pet' 
   ";}
  
  
 }
 
 if(isset($_POST["whours"]))
 {
  $whours=$_POST["whours"];
  if($whours=="p1")
  {$query .= "
    and wstart_at >= '07:00:00' and wend_at<='17:00:00'  
   ";}
   else if($whours=="p2")
  {$query .= "
    and wstart_at >= '17:00:00' and wend_at<='24:00:00' 
   ";}
  
 }

 if(isset($_POST["sortOption"]))
 {
  $sortOption=$_POST["sortOption"];
  if($sortOption=="sort1")
  {$query .= "
    ORDER BY price DESC  
   ";}
   else if($sortOption=="sort2")
  {$query .= "
    ORDER BY price ASC 
   ";}
   else if($sortOption=="sort3")
  {$query .= "
    ORDER BY rate ASC 
   ";}
   else if($sortOption=="sort4")
  {$query .= "
    ORDER BY rate DESC 
   ";}
   else if($sortOption=="sort5")
  {$query .= "
    ORDER BY no_rates DESC 
   ";}
   else if($sortOption=="sort6")
  {$query .= "
    ORDER BY no_rates ASC 
   ";}
  
 }
 $result = mysqli_query($db,$query);
    
 $count = mysqli_num_rows($result);
   if($count<1){
    $output="Sorry, there is no result(s) try another keyword !";?>
   
    <div class="row" id="filterdata">
   <h5><?php echo $output;?></h5>
   </div>
   <?php 

 }
 
 
 if($count>0)
 {?>
  <div class="row" id="filterdata">
		<?php while($row1 = mysqli_fetch_array($result)):;
				
					
        ?>
<div class="card col-dm-6" style="width:1000px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%">
<img  class="card-img-top" src="<?php echo "uploads/".$row1['image'];?>" alt="Gym Logo" style="width:210px; margin:2%;">
<div style ="position: relative; margin-left:28%; margin-top:-18%;" class="card-body">
<h3 class="card-title"><?php echo $row1['name']; ?> <button type="submit" style ="width :20%;" class="btn btn-dark" id="Delete">
     <a href="cgymdetail.php?id=<?php echo $row1['id'];?>" style="color:white;">View details</a>
                                                                   
                                                                  </button>
</h3>

<p class="card-text"><?php echo printValue($row1['price'])." per month";?></p>
<p class="card-text"><?php echo $row1['no_rates']." Rates";?></p>

                                                                  
</div>
</div>
<?php endwhile;?>
</div>
 <?php }
}


?>