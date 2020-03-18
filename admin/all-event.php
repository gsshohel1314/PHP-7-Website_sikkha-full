<?php
  require_once('functions/function.php');
  needlooged();

  if($_SESSION['role']==1){
  get_header();
  get_sidebar();
 ?>

                <div class="col-md-12">
                	<div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="col-md-9 heading_title">
                                All Event Information
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="add-event.php" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Add Event</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <table class="table table-responsive table-striped table-hover table_cus">
                          		<thead class="table_head">
                            		<tr>
                                  	<th>Title</th>
                                    <th>Subtitle</th>
                                    <th>Speaker Name</th>
                                    <th>event Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Event Photo</th>
                                    <th>Manage</th>
                                </tr>
                            	</thead>
                                <tbody>
                                  <?php
                                    $sel="SELECT * FROM adm_event ORDER BY evn_id DESC";
                                    $q=mysqli_query($con,$sel);
                                    while($edata=mysqli_fetch_assoc($q)){
                                  ?>
                                	<tr>
                                    	<td><?= substr($edata['evn_title'],0,10); ?></td>
                                      <td><?= substr($edata['evn_subtitle'],0,20); ?></td>
                                      <td><?= $edata['evn_speaker']; ?></td>
                                      <td><?= $edata['evn_date']; ?></td>
                                      <td><?= $edata['evn_start_time']; ?></td>
                                      <td><?= $edata['evn_end_time']; ?></td>
                                      <td>
                                          <img width="50" src="upload/<?= $edata['evn_pic'];?>" alt="image">
                                      </td>
                                      <td>
                                      	<a href="view-event.php?v=<?= $edata['evn_id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                                        <a href="edit-event.php?e=<?= $edata['evn_id'];?>"><i class="fa fa-pencil-square fa-lg"></i></a>
                                        <a href="delete-event.php?d=<?= $edata['evn_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
                                      </td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                          </table>
                      </div>
                      <div class="panel-footer">
                        <div class="col-md-4">
                        	<a href="#" class="btn btn-sm btn-warning">EXCEL</a>
                            <a href="#" class="btn btn-sm btn-primary">PDF</a>
                            <a href="#" class="btn btn-sm btn-danger">SVG</a>
                            <a href="#" class="btn btn-sm btn-success">PRINT</a>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4 text-right">
                        	<nav aria-label="Page navigation">
                              <ul class="pagination pagina_cus">
                                <li>
                                  <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li>
                                  <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    </div>
                </div><!--col-md-12 end-->
<?php
  get_footer();
}else{
  echo "Access denied! You have no permission access this page.";
}
?>
