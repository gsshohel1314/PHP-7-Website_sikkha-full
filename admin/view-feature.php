<?php
  require_once('functions/function.php');
  needlooged();
  get_header();
  get_sidebar();
?>

<?php
  $id=$_GET['v'];
  $sel="SELECT * FROM adm_feature WHERE feat_id='$id'";
  $q=mysqli_query($con,$sel);
  $info=mysqli_fetch_assoc($q);
?>

                <div class="col-md-12">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                Show Feature Information
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="all-feature.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> All Feature</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-9">
                          	<table class="table table-hover table-striped table-responsive view_table_cus">
                            	<tr>
                                	<td>Title</td>
                                    <td>:</td>
                                    <td><?= $info['feat_title'];?></td>
                                </tr>
                                <tr>
                                	<td>Subtitle</td>
                                    <td>:</td>
                                    <td><?= $info['feat_subtitle'];?></td>
                                </tr>
                            </table>
                          </div>
                          <div class="col-md-2">
                          </div>
                      </div>
                      <div class="panel-footer">
                        <div class="col-md-4">
                            <a href="#" class="btn btn-sm btn-primary">PDF</a>
                            <a href="#" class="btn btn-sm btn-success">PRINT</a>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4 text-right">

                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                </div><!--col-md-12 end-->
<?php
  get_footer();
?>
