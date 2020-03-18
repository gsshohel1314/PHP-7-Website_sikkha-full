<?php
  require_once('functions/function.php');
  needlooged();
  get_header();
  get_sidebar();
?>
<?php
  $id=$_GET['e'];
  $sel="SELECT * FROM adm_course WHERE course_id='$id'";
  $q=mysqli_query($con,$sel);
  $info=mysqli_fetch_assoc($q);

  if(!empty($_POST)){
    $title=$_POST['title'];
    $subtitle=$_POST['subtitle'];
    $category=$_POST['category'];
    $cimage=$_FILES['cpic'];
    $cimageName='course_'.time().'_'.rand(1000,10000).'.'.pathinfo($cimage['name'],PATHINFO_EXTENSION);
    $aimage=$_FILES['apic'];
    $aimageName='author_'.time().'_'.rand(1000,10000).'.'.pathinfo($aimage['name'],PATHINFO_EXTENSION);

    if(!empty($title)){
      $update="UPDATE adm_course SET course_title='$title',course_subtitle='$subtitle',course_category='$category',course_pic='$cimageName',course_author_pic='$aimageName' WHERE course_id='$id'";
      if(mysqli_query($con,$update)){
        move_uploaded_file($cimage['tmp_name'],'upload/'.$cimageName);
        move_uploaded_file($aimage['tmp_name'],'upload/'.$aimageName);
        //echo "success";
        header('Location: view-course.php?v='.$id);
      }else{
        echo "Update failed.";
      }
    }else{
      echo "Please enter your course title.";
    }
  }
?>

                <div class="col-md-12">
                	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                              Update Course Information
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="all-course.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Course</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-8">
                              <input type="hidden" name="eid" value="<?= $info['course_id'];?>">
                              <input type="text" class="form-control" name="title" value="<?= $info['course_title'];?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Subtitle</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="subtitle" value="<?= $info['course_subtitle'];?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Course Category</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="category" value="<?= $info['course_category'];?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Details Button Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" placeholder="" value="<?= $info['course_detail'];?>"disabled>
                            </div>
                          </div>



                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Update Course Photo</label>
                            <div class="col-sm-8">
                              <input type="file" name="cpic">
                            </div>
                          </div>


                          <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Update Author Photo</label>
                            <div class="col-sm-8">
                              <input type="file" name="apic">
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
