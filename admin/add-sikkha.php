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
                  Add Sikkha About Information
               </div>
               <div class="col-md-3 text-right">
               	<a href="all-sikkha.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Sikkha</a>
              </div>
              <div class="clearfix"></div>
          </div>

          <?php
              //INSERT code
              if(!empty($_POST)){
                $title=$_POST['title'];
                $subtitle=$_POST['subtitle'];
                $button=$_POST['button'];
                $url=$_POST['url'];
                $image=$_FILES['pic'];
                $imageName='sikkha_'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

                if(!empty($title)){
                  if(!empty($image)){
                    $insert="INSERT INTO adm_sikkha(sik_title,sik_subtitle,sik_button,sik_url,sik_pic)
                    VALUES('$title','$subtitle','$button','$url','$imageName')";

                    if(mysqli_query($con,$insert)){
                      move_uploaded_file($image['tmp_name'],'upload/'.$imageName);
                      echo "Upload successful.";
                    }else{
                      echo "Upload failed!";
                    }

                  }else{
                    echo "Please enter your images.";
                  }
                }else{
                  echo "Please enter your title.";
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
              <label for="" class="col-sm-3 control-label">Button</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="button">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Sikkha URL</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="url">
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
          <button class="btn btn-sm btn-primary">Upload Sikkha Info</button>
        </div>
      </div>
      </form>
  </div><!--col-md-12 end-->
<?php
  get_footer();
?>
