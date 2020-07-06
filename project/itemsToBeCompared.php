<!--=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=-->

<!------- Reham's code ------>

<?php
if (isset($_GET['qsearch'])&& isset($_GET['searchby']))
{
  $qsearch = $_SESSION['qsearch'];
  $sql="";
  $result="";
  $sql1="";
  if($_SESSION['bysearch']=='byname')
  $sql1 = "SELECT * FROM gyms WHERE name LIKE '%$qsearch%' AND isActive=1 AND checked_n=1";

  else if($_SESSION['bysearch']=='bycity')
  $sql1= "SELECT * FROM gyms WHERE city LIKE '%$qsearch%' AND isActive=1 AND checked_n=1";

  $result = mysqli_query($db,$sql1);
  if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
  }
  if (mysqli_num_rows($result)>0){
    ?>

    <div class="card col-dm-6" id="compareRehami" style="width:750px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%"><?php }?>

      <?php  while($row1 = mysqli_fetch_array($result)):;

      ?>
      <div class="card col-dm-6" id="compareRehami" style="width:250px; margin-left:5%; background-color: rgba(184,184,183,0.4); padding:1%; ">
        <img  class="card-img-top" src="<?php echo "uploads/".$row1['image'];?>" alt="Gym Logo" style="width:110px; margin:2%;">
        <div style ="position: relative; margin-left:58%; margin-top:-28%;" class="card-body">
          <h6 class="card-title"><?php echo $row1['name']; ?></h6>
        </div>
        <a href="deleteItem.php?id=<?php echo $row1['id'];?>" style="color:white;">
        <span style ="width :17.5%; margin-top:-63.7%;margin-left:86%; background-color:rgba(184,184,183,0.4); border-color:rgba(184,184,183,0.4);" class="btn btn-dark" >
        <h5> X</h5>
        </span>

      </a>
      </div>


    <?php endwhile;  ?>
    <?php  if (mysqli_num_rows($result)>0){?>
      <button type="submit" style ="width :20%; margin-top:5.7%;margin-left:50%" class="btn btn-dark" >
        <a href="CompareAll.php" style="color:white;"> Compare All</a>
        <img src="img/Compare.png" width="18" height="20"/>
      </button><br/>
      <button type="submit" style ="width :20%; margin-top:-8.7%;margin-left:72%" class="btn btn-dark" >
        <a href="DeleteAll.php" style="color:white;">Delete All</a>
        <img src="img/deleteIcon.png" width="18" height="20"/>
      </button>
    </div>
  <?php }} ?>

  <!------------------------------>

  <!--=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=_=-->

</div><br/>  <br/>
