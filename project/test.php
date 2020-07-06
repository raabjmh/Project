<?php
 
 include("config.php");
 $sql="INSERT INTO gyms(name,description,price,email,phone,country,city,district,gender,petfriendly,latitude,longitude, 
 owner,swimsuit,changeroom,wifi,lockers,carparking,swimpool,basketball,saunapath,football,cardiomachine,weightmachine, 
 classes,tabletenis,volleyball,satarday,sunday,monday,tuesday,wednesday,thursday,friday,start_at,end_at,isActive,image) 
 VALUES('bnxbasmds ddnsd ', 'akcljcadslcaskclsaklfsal;fkd', '120.2','kana@gg.com','1234567890','Bolivia','Anillo',
 'jsdjskajdksja','both','0','31.5138048','34.462924799999996', 'test1','1','1','0','0','0','1','1','1','0','0','0',
  '0','0','0','0','0','1','1','1','1','0','13:00','20:00','0','hsgdsg.jpg')";
 if (!mysqli_query($db, $sql)) {
    printf("Errormessage: %s\n", mysqli_error($db));
}
?>
