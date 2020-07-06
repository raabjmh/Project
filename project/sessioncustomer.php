<?php
   include('config.php');
   session_start();
   
   if(!isset($_SESSION['login_customer'])){
     header("location:login.php");
   }
?>