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
                  Add Event Information
               </div>
               <div class="col-md-3 text-right">
               	<a href="all-event.php" class="btn btn-sm btn btn-primary"><i class="fa fa-th"></i> All Event</a>
              </div>
              <div class="clearfix"></div>
          </div>

          <?php
            if(!empty($_POST)){
              $title=$_POST['title'];
              $subtitle=$_POST['subtitle'];
              $speaker=$_POST['speaker'];
              $edate=date("Y/m/d");
              $stime=$_POST['stime'];
              $etime=$_POST['etime'];
              $image=$_FILES['epic'];
              $imageName='event_'.time().'_'.rand(1000,10000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);

              if(!empty($title)){
                $insert="INSERT INTO adm_event(evn_title,evn_subtitle,evn_speaker,evn_date,evn_start_time,evn_end_time,evn_pic)
                VALUES('$title','$subtitle','$speaker','$edate','$stime','$etime','$imageName')";
                if(mysqli_query($con,$insert)){
                  move_uploaded_file($image['tmp_name'],'upload/'.$imageName);
                  echo "Information upload successful.";
                }else{
                  echo "Information upload filed.";
                }
              }else{
                echo "Please enter event title.";
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
              <label for="" class="col-sm-3 control-label">Speaker Name</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="speaker">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Event Date</label>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="edate">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Event Start Time</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="stime">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Event End Time</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="etime">
              </div>
            </div>

            <div class="form-group">
              <label for="" class="col-sm-3 control-label">Uplode Event Photo</label>
              <div class="col-sm-8">
                <input type="file" name="epic">
              </div>
            </div>
        </div>
        <div class="panel-footer text-center">
          <button class="btn btn-sm btn-primary">ADD EVENT</button>
        </div>
      </div>
      </form>
  </div><!--col-md-12 end-->
<?php
  get_footer();
?>
