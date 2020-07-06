<?php
   include('config.php');
   session_start();
   
   if(!isset($_SESSION['login_owner'])){
      header("location:login.php");
   }
?>