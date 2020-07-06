<?php
 define('DB_SERVER', 'localhost');
 define('DB_USERNAME', 'root');
 define('DB_PASSWORD', '');
 define('DB_DATABASE', 'gymguider');
 $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
 $db->query("SET NAMES utf8");
 $db->query("SET CHARACTER SET utf8");
 if(!$db)
{
    die("connection faill".mysqli_connect_error());
}

?>
