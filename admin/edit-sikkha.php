<?php
  require_once('functions/function.php');
  needlooged();
  get_header();
  get_sidebar();
?>
<?php
  $id=$_GET['e'];
  $sel="SELECT * FROM adm_sikkha WHERE sik_id='$id'";
  $q=mysqli_query($con,$sel);
  $info=mysqli_fetch_assoc($q);

  if(!empty($_POST)){
    $eid=$_POST['eid'];
    $title=$_POST['title'];
    $subtitle=$_POST['subtitle'];
    $button=$_POST['button'];
    $url=$_POST['url'];
    $image=$_FILES['pic'];
    $imageName='banner_'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

    if(!empty($title)){
      $update="UPDATE adm_sikkha SET sik_title='$title',sik_subtitle='$subtitle',sik_button='$button',sik_url='$url',sik_pic='$imageName'  WHERE sik_id='$id'";
      if(mysqli_query($con,$update)){
        move_uploaded_file($image['tmp_name'],'upload/'.$imageName);
        header('Location: view-sikkha.php?v='.$id);
      }else{
        echo "Update failed.";
      }
    }else{
      echo "Please enter your title.";
    }
  }
?>

                <div class="col-md-12">
                	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                              Update Sikkha Information
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="all-sikkha.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Sikkha</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-8">
                              <input type="hidden" name="eid" value="<?= $info['sik_id'];?>">
                              <input type="text" class="form-control" name="title" value="<?= $info['sik_title'];?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Subtitle</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="subtitle" value="<?= $info['sik_subtitle'];?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Button</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="button" value="<?= $info['sik_button'];?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Button URL</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="url" value="<?= $info['sik_url'];?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Uplode Photo</label>
                            <div class="col-sm-8">
                              <input type="file" name="pic">
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
