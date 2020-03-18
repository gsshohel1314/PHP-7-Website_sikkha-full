<?php
  require_once('functions/function.php');
  $id=$_GET['d'];
  $del="DELETE FROM adm_feature WHERE feat_id='$id'";
  mysqli_query($con,$del);
  header('Location: all-feature.php');
 ?>
