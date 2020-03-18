<?php
  require_once('functions/function.php');
  needlooged();
  get_header();
  get_sidebar();
?>

<?php
  $id=$_GET['v'];
  $sel="SELECT * FROM adm_user WHERE user_id='$id'";
  $q=mysqli_query($con,$sel);
  $info=mysqli_fetch_assoc($q);
?>

                <div class="col-md-12">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                Show User Information
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="all-user.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> All user</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <div class="col-md-1">
                          </div>
                          <div class="col-md-9">
                          	<table class="table table-hover table-striped table-responsive view_table_cus">
                            	<tr>
                                	<td>Name</td>
                                    <td>:</td>
                                    <td><?php echo $info['user_name'];?></td>
                                </tr>
                                <tr>
                                	<td>Email</td>
                                    <td>:</td>
                                    <td><?php echo $info['user_email'];?></td>
                                </tr>
                                <tr>
                                	<td>Phone</td>
                                    <td>:</td>
                                    <td><?php echo $info['user_phone'];?></td>
                                </tr>
                                <tr>
                                	<td>Username</td>
                                    <td>:</td>
                                    <td><?php echo $info['user_username'];?></td>
                                </tr>
                                <tr>
                                	<td>Registration Time</td>
                                    <td>:</td>
                                    <td>29.04.2017 10:40:15</td>
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
