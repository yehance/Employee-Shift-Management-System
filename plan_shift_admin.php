<?php 
session_start();
if(!isset($_SESSION['authentication_admin']))
{
header("Location: login.php");
}

?>
<!-- NOTE:ADD SERVER IP INSTEAD OF localhost IN LINE 45  -->
<!-- NOTE:ADD SERVER IP INSTEAD OF localhost IN LINE 45  -->


<?php require('include/header.php');    ?>

<?php require('include/navbar_admin.php');    ?>

<?php require('include/topbar.php');    ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h2 mb-2 text-gray-800">Shift Planner</h1>

                   
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">

              <!-- Message Displaying changes to the region information -->
              <?php 
                 require('include/plan_form_up_admin.php');  //this require is used for the form as well
                 if(isset($_SESSION['message'])): 
              ?>
              <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
                 <?php
                   echo $_SESSION['message'];
                   unset($_SESSION['message']);
                ?>
              </div>

               <!-- following tag redirects to update-region after 1s showing the alert -->
               <meta http-equiv="refresh" content="1;url=http://localhost/SHIFT/plan_shift_admin.php">
             
             <?php endif ?>
            
             
              <!-- Form Content begins Here--> 
              <h1 class="h4 text-gray-900 mb-4 text-center">Enter Shift Details</h1>

              <!-- Selecting employee call names to display on dropdown -->
              <?php
              require('include/connection.php');
              $query_f="SELECT call_name FROM  employees WHERE sstatus='Active' ";
              $result_set_f=mysqli_query($connection,$query_f);
              ?>

                
              <!-- Add New/Update shifts -->

                               
            <form method="post" action="plan_shift_admin.php"  >  
              <!-- A hidden variable is used to get the id of the row to that is being currently altered -->
                <input type="hidden" name="id" value="<?php echo $up_id; ?>">
                
                  <div class="form-row justify-content-center">
                  
                  <div class="col-md-4 mb-3">
                   <label>Date :</label>
                   <input type="date" name="date_f" id="date_f" class="form-control" 
                   value="<?php echo $date_sel;  ?>"  placeholder="Enter date" maxlength="15" required>
                   
                   </div>
                  
                   <div class="col-md-4 mb-3">
                   <label>Team Leader :</label> 
                   <select class="form-control" name="team_leader_f" id="team_leader_f">
                   <option selected hidden><?php echo $team_leader_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>
        
                   <div class="col-md-4 mb-3">
                   <label>Shift :</label>
                   <select class="form-control" name="shift_f" id="shift_f" required>
                   <option selected hidden><?php echo $shift_sel; ?></option>
                   <option>D</option>
                   <option>N/M</option>
                   </select>
                   </div>

                  </div> 

                  <div class="text-center">                        
                  <h5>Select employees for particular sections below</h5>
                  </div>
                  
                  <div class="form-row justify-content-center">
                  
                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Station 1 :</label>
                   <select class="form-control" name="core_f" id="core_f">
                   <option selected hidden><?php echo $core_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>
        
                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Station 2 :</label>
                   <select class="form-control" name="transmission_f" id="transmission_f">
                   <option selected hidden><?php echo $transmission_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>

                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Station 3 :</label>
                   <select class="form-control" name="report_f" id="report_f">
                   <option selected hidden><?php echo $report_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>

                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Station 4 :</label>
                   <select class="form-control" name="huawei1_f" id="huawei1_f">
                   <option selected hidden><?php echo $huawei1_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>

                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Station 5 :</label>
                   <select class="form-control" name="huawei2_f" id="huawei2_f">
                   <option selected hidden><?php echo $huawei2_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>

                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Station 6 :</label>
                   <select class="form-control" name="zte1_f" id="zte1_f">
                   <option selected hidden><?php echo $zte1_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>

                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Station 7 :</label>
                   <select class="form-control" name="zte2_f" id="zte2_f">
                   <option selected hidden><?php echo $zte2_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>

                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Station 8 :</label>
                   <select class="form-control" name="oncall1_f" id="oncall1_f">
                   <option selected hidden><?php echo $oncall1_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>

                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Station 9 :</label>
                   <select class="form-control" name="oncall2_f" id="oncall2_f">
                   <option selected hidden><?php echo $oncall2_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>

                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Extra Work :</label>
                   <select class="form-control" name="extra_work_f" id="extra_work_f">
                   <option selected hidden><?php echo $extra_work_sel; ?></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   <option>None</option>
                   </select>
                   </div>

                  </div>
                  

                  <!-- Button changes depending on the add user or update user -->
                  <div class="form-row justify-content-center">     
                  <div class="col-md-4 mb-3">
                     
                 <?php if($update == true):  ?>
                      <input type="submit" class="btn btn-success btn-user btn-block" name="update_shift" value="Update Shift">
                 <?php else: ?>
                      <input type="submit" class="btn btn-primary btn-user btn-block" name="add_shift" value="Add Shift">
                 <?php endif; ?> 

                  </div>
                  </div>
                                               
                </form>

                               
                
              <!-- Table select query for database -->                             
              <?php
              require('include/connection.php');
              $query="SELECT* FROM  shift_plan ORDER BY id DESC";
              $result_set=mysqli_query($connection,$query);
              ?>

              <!-- Table Content begins Here -->
              <div class="table-responsive">
                                     
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
              
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Shift</th>
                      <th>Update</th>
                      <th>Team Leader</th>
                      <th>Station 1</th>
                      <th>Station 2</th>
                      <th>Station 3</th>
                      <th>Station 4</th>
                      <th>Station 5</th>
                      <th>Station 6</th>
                      <th>Station 7</th>
                      <th>Station 8</th>
                      <th>Station 9</th>
                      <th>Extra Work</th>   
                                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Shift</th>
                      <th>Update</th>
                      <th>Team Leader</th>
                      <th>Station 1</th>
                      <th>Station 2</th>
                      <th>Station 3</th>
                      <th>Station 4</th>
                      <th>Station 5</th>
                      <th>Station 6</th>
                      <th>Station 7</th>
                      <th>Station 8</th>
                      <th>Station 9</th>
                      <th>Extra Work</th>
                                      
                    </tr>
                  </tfoot> 
                 
                  <tbody>           
                  <?php
                     
                   while($row=mysqli_fetch_assoc($result_set))  {
                  
                   ?> 

                                    
                    <tr>
                      <td><?php echo $row["id"];  ?></td>
                      <td><?php echo $row["date_p"];  ?></td>
                      <td><?php echo $row["shift"]; ?></td>
                      <td>
                         <a href="plan_shift_admin.php?edit=<?php echo $row['id']; ?>" 
                           class="btn btn-info">Edit</a>   <!-- here link is passed to same page as the same form is used to 
                                                            edit entries as well -->
                         <a href="plan_shift_admin.php?delete=<?php echo $row['id']; ?>" 
                           class="btn btn-danger">Delete</a> <!-- Delete part is handled in region-form file -->                                    
                      </td>  
                      <td><?php echo $row["team_leader"];   ?></td>
                      <td><?php echo $row["station_1"];  ?></td>
                      <td><?php echo $row["station_2"];  ?></td>
                      <td><?php echo $row["station_3"]; ?></td>
                      <td><?php echo $row["station_4"];   ?></td>
                      <td><?php echo $row["station_5"];  ?></td>
                      <td><?php echo $row["station_6"];  ?></td>
                      <td><?php echo $row["station_7"]; ?></td>
                      <td><?php echo $row["station_8"];  ?></td>
                      <td><?php echo $row["station_9"]; ?></td>
                      <td><?php echo $row["extra_work"];   ?></td>
                      
                    </tr>   
                  

                   <?php
                    }

                    ?>
					</tbody>
                
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->




<?php require('include/footer.php'); ?>     