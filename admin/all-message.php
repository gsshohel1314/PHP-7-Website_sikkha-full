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
                                All Contact Message
                             </div>
                             <div class="col-md-3 text-right">
                             	<a href="#" class="btn btn-sm btn btn-primary"><i class="fa fa-plus-circle"></i> Demo </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                      <div class="panel-body">
                          <table class="table table-responsive table-striped table-hover table_cus">
                          		<thead class="table_head">
                            		<tr>
                                	<th>Name</th>
                                  <th>Phone</th>
                                  <th>Email</th>
                                  <th>Subject</th>
                                  <th>Message</th>
                                  <th>Manage</th>
                                </tr>
                            	</thead>
                                <tbody>

                                  <?php
                                    $sel="SELECT * FROM adm_contact ORDER BY con_id DESC";
                                    $q=mysqli_query($con,$sel);
                                    while($data=mysqli_fetch_assoc($q)){
                                   ?>
                                	<tr>
                                    	<td><?= $data['con_name']; ?></td>
                                      <td><?= $data['con_phone']; ?></td>
                                      <td><?= $data['con_email']; ?></td>
                                      <td><?= substr($data['con_subject'],0,15); ?>...</td>
                                      <td><?= substr($data['con_message'],0,20); ?>...</td>
                                      <td>
                                      	<a href="view-message.php?v=<?php echo $data['con_id']; ?>"><i class="fa fa-plus-square fa-lg"></i></a>
                                        <a href="delete-message.php?d=<?php echo $data['con_id']; ?>"><i class="fa fa-trash fa-lg"></i></a>
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