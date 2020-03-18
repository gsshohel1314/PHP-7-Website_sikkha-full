<?php
  require_once('functions/function.php');
  $id=$_GET['d'];
  $del="DELETE FROM adm_sikkha WHERE sik_id='$id'";
  mysqli_query($con,$del);
  header('Location: all-sikkha.php');
 ?>
