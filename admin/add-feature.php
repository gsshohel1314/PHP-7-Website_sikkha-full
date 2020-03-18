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
                  Add Feature Information
               </div>
               <div class="col-md-3 text-right">
               	<a href="all-feature.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Feature</a>
              </div>
              <div class="clearfix"></div>
          </div>

          <?php
              //INSERT code
              if(!empty($_POST)){
                $title=$_POST['title'];
                $subtitle=$_POST['subtitle'];

                if(!empty($title)){
                  if(!empty($subtitle)){
                    $insert="INSERT INTO adm_feature(feat_title,feat_subtitle)
                    VALUES('$title','$subtitle')";

                    if(mysqli_query($con,$insert)){
                      echo "Feature upload successful.";
                    }else{
                      echo "Feature upload failed!";
                    }

                  }else{
                    echo "Please enter your feature subtitle.";
                  }
                }else{
                  echo "Please enter your feature title.";
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
        </div>
        <div class="panel-footer text-center">
          <button class="btn btn-sm btn-primary">Upload Feature</button>
        </div>
      </div>
      </form>
  </div><!--col-md-12 end-->
<?php
  get_footer();
?>
