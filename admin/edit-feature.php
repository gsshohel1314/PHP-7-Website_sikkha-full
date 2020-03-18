<?php
  require_once('functions/function.php');
  needlooged();
  get_header();
  get_sidebar();
?>
<?php
  $id=$_GET['e'];
  $sel="SELECT * FROM adm_feature WHERE feat_id='$id'";
  $q=mysqli_query($con,$sel);
  $info=mysqli_fetch_assoc($q);

  if(!empty($_POST)){
    $eid=$_POST['eid'];
    $title=$_POST['title'];
    $subtitle=$_POST['subtitle'];

    if(!empty($title)){
      $update="UPDATE adm_feature SET feat_title='$title',feat_subtitle='$subtitle'  WHERE feat_id='$id'";
      if(mysqli_query($con,$update)){
        header('Location: view-feature.php?v='.$id);
      }else{
        echo "Update failed.";
      }
    }else{
      echo "Please enter your title.";
    }
  }
?>

                <div class="col-md-12">
                	<form class="form-horizontal" action="" method="post">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                              Update Feature Information
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="all-feature.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Feature</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-8">
                              <input type="hidden" name="eid" value="<?= $info['feat_id'];?>">
                              <input type="text" class="form-control" name="title" value="<?= $info['feat_title'];?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Subtitle</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="subtitle" value="<?= $info['feat_subtitle'];?>">
                            </div>
                          </div>
                      </div>
                      <div class="panel-footer text-center">
                        <button class="btn btn-sm btn-primary">UPDATE</button>
                      </div>
                    </div>
                    </form>
                </div><!--col-md-12 end-->
<?php
  get_footer();
?>
