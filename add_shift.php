<?php 
session_start();
if(!isset($_SESSION['authentication_user']))
{
header("Location: login.php");
}

?>

<!-- NOTE:ADD SERVER IP INSTEAD OF localhost IN LINE 46  -->
<!-- NOTE:ADD SERVER IP INSTEAD OF localhost IN LINE 46  -->


<?php require('include/header.php');    ?>

<?php require('include/navbar_user.php');    ?>

<?php require('include/topbar.php');    ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h2 mb-2 text-gray-800">Add Shift Entries</h1>

                   
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">

              <!-- Message Displaying changes to the region information -->
              <?php 
                 require('include/shift_form_add.php');  //this require is used for the form as well
                 if(isset($_SESSION['message'])): 
              ?>
              <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
                 <?php
                   echo $_SESSION['message'];
                   unset($_SESSION['message']);
                ?>
              </div>

               <!-- following tag redirects to update-region after 1s showing the alert -->
               <meta http-equiv="refresh" content="1;url=http://localhost/SHIFT/add_shift.php">
             
             <?php endif ?>
            
             
              <!-- Form Content begins Here--> 
              <h1 class="h4 text-gray-900 mb-4 text-center">Enter Shift Details</h1>

              <!-- Selecting employee call names -->
              <?php
              require('include/connection.php');
              $query_f="SELECT call_name FROM  employees WHERE sstatus='Active' ";
              $result_set_f=mysqli_query($connection,$query_f);
              ?>

                
              <!-- Add New/Update Officer -->

                               
            <form method="post" action="add_shift.php"  >  
              <!-- A hidden variable is used to get the id of the row to that is being currently altered -->
                <input type="hidden" name="id" value="<?php echo $up_id; ?>">
                
                  <div class="form-row justify-content-center">

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
                   <option>Day</option>
                   <option>Night</option>
                   </select>
                   </div>

                  </div> 

                  <div class="text-center">                        
                  <h5>Select employees for particular sections below</h5>
                  </div>
                  
                  <div class="form-row justify-content-center">
                  
                   <?php $result_set_f=mysqli_query($connection,$query_f); ?>
                   <div class="col-md-4 mb-3">
                   <label>Core :</label>
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
                   <label>Transmission :</label>
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
                   <label>Report :</label>
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
                   <label>HUAWEI 1 :</label>
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
                   <label>HUAWEI 2 :</label>
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
                   <label>ZTE 1 :</label>
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
                   <label>ZTE 2 :</label>
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
                   <label>On Call 1 :</label>
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
                   <label>On Call 2 :</label>
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
                  

                  <!-- Button to add user -->
                  <div class="form-row justify-content-center">     
                  <div class="col-md-4 mb-3">           
                  <input type="submit" class="btn btn-primary btn-user btn-block" name="add_shift" value="Add Shift">
                  </div>
                  </div>
                                               
                </form>

                               
                
              <!-- Table select query for database -->                             
              <?php
              require('include/connection.php');
              $query="SELECT* FROM shift ORDER BY ID DESC LIMIT 1";
              $result_set= mysqli_query($connection,$query);
              
                $row=mysqli_fetch_assoc($result_set);  
                $id_today  = $row['id'];

                $id_lastmonth= $id_today - 30;
                if($id_lastmonth<0){$id_lastmonth=1;}
                
                
                //selecting only 30 entries from today's ones
                $query = "SELECT * FROM shift WHERE (`id` BETWEEN '$id_lastmonth' AND '$id_today') ORDER BY id DESC ";
                $result_set = mysqli_query($connection, $query);
              ?>

              <!-- Table Content begins Here -->
              <div class="table-responsive">
                                     
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
              
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Shift</th>
                      <th>Team Leader</th>
                      <th>Core</th>
                      <th>Transmission</th>
                      <th>Report</th>
                      <th>HW 1</th>
                      <th>HW 2</th>
                      <th>ZTE 1</th>
                      <th>ZTE 2</th>
                      <th>On Call 1</th>
                      <th>On Call 2</th>
                      <th>Extra Work</th>   
                                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Date</th>
                      <th>Shift</th>
                      <th>Team Leader</th>
                      <th>Core</th>
                      <th>Transmission</th>
                      <th>Report</th>
                      <th>HW 1</th>
                      <th>HW 2</th>
                      <th>ZTE 1</th>
                      <th>ZTE 2</th>
                      <th>On Call 1</th>
                      <th>On Call 2</th>
                      <th>Extra Work</th>
                                      
                    </tr>
                  </tfoot> 
                 
                  <tbody>           
                  <?php
                     
                   while($row=mysqli_fetch_assoc($result_set))  {
                  
                   ?> 

                                    
                    <tr>
                      <td><?php echo $row["id"];  ?></td>
                      <td><?php echo $row["date_s"];  ?></td>
                      <td><?php echo $row["shift"]; ?></td> 
                      <td><?php echo $row["team_leader"];   ?></td>
                      <td><?php echo $row["core"];  ?></td>
                      <td><?php echo $row["transmission"];  ?></td>
                      <td><?php echo $row["report"]; ?></td>
                      <td><?php echo $row["huawei_1"];   ?></td>
                      <td><?php echo $row["huawei_2"];  ?></td>
                      <td><?php echo $row["zte_1"];  ?></td>
                      <td><?php echo $row["zte_2"]; ?></td>
                      <td><?php echo $row["on_call1"];  ?></td>
                      <td><?php echo $row["on_call2"]; ?></td>
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