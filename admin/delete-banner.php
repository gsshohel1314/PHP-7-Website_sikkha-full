<?php
  require_once('functions/function.php');
  $id=$_GET['d'];
  $del="DELETE FROM adm_banner WHERE ban_id='$id'";
  mysqli_query($con,$del);
  header('Location: all-banner.php');
 ?>
