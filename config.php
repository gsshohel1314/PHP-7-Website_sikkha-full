<?php
  //error_reporting(0);
  $db_host='localhost';
  $db_user='root';
  $db_pass='';
  $db_name='website1901';
  $con=mysqli_connect($db_host,$db_user,$db_pass,$db_name);
  if(!$con){
    echo "Database connection error!";
  }else{
    echo "Database is successfully connect.";
  }
?>
