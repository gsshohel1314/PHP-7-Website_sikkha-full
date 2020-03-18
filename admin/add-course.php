<?php
  require_once('functions/function.php');
  needlooged();
  get_header();
  get_sidebar();
?>

  <div class="col-md-12">
  	<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
  	<div class="panel panel-primary">
          <div class="panel-heading">
              <div class="col-md-9 heading_title">
                  Add Course Information
               </div>
               <div class="col-md-3 text-right">
               	<a href="all-course.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Course</a>
              </div>
              <div class="clearfix"></div>
          </div>

          <?php
              //INSERT code
              if(!empty($_POST)){
                $title=$_POST['title'];
                $subtitle=$_POST['subtitle'];
                $cbtn=$_POST['cbtn'];
                $dbtn=$_POST['dbtn'];
                $cimage=$_FILES['cpic'];
                $cimageName='course_'.time().'_'.rand(1000,10000).'.'.pathinfo($cimage['name'],PATHINFO_EXTENSION);
                $aimage=$_FILES['apic'];
                $aimageName='author_'.time().'_'.rand(1000,10000).'.'.pathinfo($aimage['name'],PATHINFO_EXTENSION);

                if(!empty($title)){
                  if(!empty($cimage)){
                    $insert="INSERT INTO adm_course(course_title,course_subtitle,course_category,course_detail,course_pic,course_author_pic)
                    VALUES('$title','$subtitle','$cbtn','$dbtn','$cimageName','$aimageName')";

                    if(mysqli_query($con,$insert)){
                      move_uploaded_file($cimage['tmp_name'],'upload/'.$cimageName);
                      move_uploaded_file($aimage['tmp_name'],'upload/'.$aimageName);
                      echo "Information upload successful.";
                    }else{
                      echo "Information upload failed!";
                    }

                  }else{
                    echo "Please upload course image.";
                  }
                }else{
                  echo "Please enter your course title.";
                }
              }
           ?>

        <div class="panel-body">
            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Title</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="title">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Subtitle</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="subtitle">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Course Category</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="cbtn">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Details Button</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="dbtn">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Course Photo</label>
              <div class="col-sm-8">
                <input type="file" name="cpic">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Author Photo</label>
              <div class="col-sm-8">
                <input type="file" name="apic">
              </div>
            </div>
        </div>
        <div class="panel-footer text-center">
          <button class="btn btn-sm btn-primary">Uplode</button>
        </div>
      </div>
      </form>
  </div><!--col-md-12 end-->
<?php
  get_footer();
?>
