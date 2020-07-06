<?php


 define('DB_SERVER', 'db774593238.hosting-data.io');
 define('DB_USERNAME', 'dbo774593238');
 define('DB_PASSWORD', 'gymguider2019');
 define('DB_DATABASE', 'db774593238');
 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 $db->query("SET NAMES utf8");
 $db->query("SET CHARACTER SET utf8");
 if(!$db)
{
    die("connection faill".mysqli_connect_error());
}

?>