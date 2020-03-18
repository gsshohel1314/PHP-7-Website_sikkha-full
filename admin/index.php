<?php
require_once('functions/function.php');
needlooged();
get_header();
get_sidebar();
?>

  <div class="col-md-12">
    <h2>Welcome Mr.<?= $_SESSION['name'];?>.</h2>
  </div><!--col-md-12 end-->

<?php
  get_footer();
?>
