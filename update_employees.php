<?php 
session_start();
if(!isset($_SESSION['authentication_admin']))
{
header("Location: login.php");
}

?>

<!-- NOTE:ADD SERVER IP INSTEAD OF localhost IN LINE 46  -->
<!-- NOTE:ADD SERVER IP INSTEAD OF localhost IN LINE 46  -->


<?php require('include/header.php');    ?>

<?php require('include/navbar_admin.php');    ?>

<?php require('include/topbar.php');    ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h2 mb-2 text-gray-800">Update Employee Information</h1>

                   
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <div class="card-body">

              <!-- Message Displaying changes to the region information -->
              <?php 
                 require('include/employee_form.php');  //this require is used for the form as well
                 if(isset($_SESSION['message'])): 
              ?>
              <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
                 <?php
                   echo $_SESSION['message'];
                   unset($_SESSION['message']);
                ?>
              </div>

               <!-- following tag redirects to update-region after 1s showing the alert -->
               <meta http-equiv="refresh" content="1;url=http://localhost/SHIFT/update_employees.php">
             
             <?php endif ?>
            
             
              <!-- Form Content begins Here--> 
              <h1 class="h4 text-gray-900 mb-4 text-center">Enter Employee Details</h1>
                
              <!-- Add New/Update Officer -->

                                
                <form method="post" action="update_employees.php"  >  
              <!-- A hidden variable is used to get the id of the row to that is being currently altered -->
                <input type="hidden" name="id" value="<?php echo $up_id; ?>">
                
                  <div class="form-row justify-content-center">

                   <div class="col-md-4 mb-3">
                   <label>Employee Number :</label> 
                   <input type="text" name="emp_no" class="form-control" 
                   value="<?php echo $employee_no;  ?>" placeholder="Enter employee number" maxlength="5" >
                   </div>
        
                   <div class="col-md-4 mb-3">
                   <label>Call Name :</label>
                   <input type="text" name="call_name" id="call_name" class="form-control" 
                   value="<?php echo $col_name;  ?>"  placeholder="Enter call name" maxlength="15" required>
                   </div>

                   <div class="col-md-4 mb-3">
                   <label>Full Name :</label>
                   <input type="text" name="full_name" id="full_name" class="form-control" 
                   value="<?php echo $ful_name;  ?>"  placeholder="Enter full name" maxlength="80" >
                   </div>

                   <div class="col-md-4 mb-3">
                   <label>Designation :</label>
                   <input type="text" name="designation" id="designation" class="form-control" 
                   value="<?php echo $desig;  ?>"  placeholder="Enter designation" maxlength="30" required>
                   </div>

                   <div class="col-md-4 mb-3">
                   <label>Service :</label> 
                   <input type="text" name="sservice" class="form-control" 
                   value="<?php echo $serv;  ?>" placeholder="Enter service type" maxlength="20" >
                   </div>
        
                   <div class="col-md-4 mb-3">
                   <label>Level :</label>
                   <input type="text" name="llevel" id="llevel" class="form-control" 
                   value="<?php echo $lvl;  ?>"  placeholder="Enter level" maxlength="15" >
                   </div>

                   <div class="col-md-4 mb-3">
                   <label>Category :</label>
                   <input type="text" name="category" id="category" class="form-control" 
                   value="<?php echo $cate;  ?>"  placeholder="Enter category" maxlength="15" >
                   </div>

                   <div class="col-md-4 mb-3">
                   <label>Join Date :</label>
                   <input type="text" name="join_date" id="join_date" class="form-control" 
                   value="<?php echo $j_date;  ?>"  placeholder="Enter join date" maxlength="15" >
                   </div>

                   <div class="col-md-4 mb-3">
                   <label>NIC Number :</label>
                   <input type="text" name="nic_num" id="nic_num" class="form-control" 
                   value="<?php echo $nic;  ?>"  placeholder="Enter NIC number" maxlength="20" >
                   </div>

                
                   <div class="col-md-4 mb-3">
                   <label>Vehicle Number :</label>
                   <input type="text" name="vehicle_num" id="vehicle_num" class="form-control" 
                   value="<?php echo $veh;  ?>" placeholder="Enter vehicle number" maxlength="10" >
                   </div>
        
                   <div class="col-md-4 mb-3">
                   <label>Address :</label>
                   <input type="text" name="aaddress" id="aaddress" class="form-control" 
                   value="<?php echo "$addr";  ?>" placeholder="Enter address" maxlength="80" >
                    * Do not use " " within addresses
                   </div>

                   
                   <div class="col-md-4 mb-3">
                   <label>Home Telephone Number :</label> 
                   <input type="text" name="home_tpn" class="form-control" 
                   value="<?php echo $home_num;  ?>" placeholder="Enter home telephone number" maxlength="12" >
                   </div>
        
                   <div class="col-md-4 mb-3">
                   <label>Close Police :</label>
                   <input type="text" name="close_police" id="close_police" class="form-control" 
                   value="<?php echo $clpolice;  ?>"  placeholder="Enter close police" maxlength="15" >
                   </div>

                   <div class="col-md-4 mb-3">
                   <label>T-Shirt Size :</label>
                   <select class="form-control" name="t_size" id="t_size">
                   <option selected hidden><?php echo $tsize; ?></option>
                   <option>XXS</option>
                   <option>XS</option>
                   <option>S</option>
                   <option>M</option>
                   <option>L</option>
                   <option>XL</option>
                   <option>XXL</option>
                   <option>XXXL</option>
                   </select>
                   </div>

                   <div class="col-md-4 mb-3">
                   <label>Mobile Number :</label>
                   <input type="text" name="mobile_num" id="mobile_num" class="form-control" 
                   value="<?php echo $mobile;  ?>"  placeholder="Enter mobile number" maxlength="12" >
                   </div>

                   <div class="col-md-4 mb-3">
                   <label>E-mail :</label> 
                   <input type="text" name="email" class="form-control" 
                   value="<?php echo $mail;  ?>" placeholder="Enter E-mail address" maxlength="30" >
                   </div>

                                     
        
                   <div class="col-md-4 mb-3">
                   <label>Status :</label>
                   <select class="form-control" name="sstatus" id="sstatus" required>
                   <option selected hidden><?php echo $stat; ?></option>
                   <option>Active</option>
                   <option>Suspend</option>
                   </select>
                   </div>

                  </div>

                  <!-- Button changes depending on the add user or update user -->
                  <div class="form-row justify-content-center">     
                  <div class="col-md-4 mb-3">
                     
                 <?php if($update == true):  ?>
                      <input type="submit" class="btn btn-success btn-user btn-block" name="update_officer" value="Update Employee">
                 <?php else: ?>
                      <input type="submit" class="btn btn-primary btn-user btn-block" name="add_officer" value="Add Employee">
                 <?php endif; ?> 

                  </div>
                  </div>
                                               
                </form>
                
                
              <!-- Table select query for database -->                             
              <?php
              require('include/connection.php');
              $query="SELECT* FROM  employees ORDER BY id DESC";
              $result_set=mysqli_query($connection,$query);
              ?>

              <!-- Table Content begins Here -->
              <div class="table-responsive">
                                     
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
              
                  <thead>
                    <tr>
                      <th>Update</th>
                      <th>Employee Number</th>
                      <th>Call Name</th>
                      <th>Full Name</th>
                      <th>Designation</th>
                      <th>Service</th>
                      <th>Level</th>
                      <th>Category</th>
                      <th>Join Date</th>
                      <th>NIC Number</th>
                      <th>Vehicle Number</th>
                      <th>Address</th>
                      <th>Home Telephone Number</th>
                      <th>Close Police</th>
                      <th>T-Shirt Size</th>
                      <th>Mobile Number</th>
                      <th>E-mail</th>
                      <th>Status</th>
                                             
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Update</th>
                      <th>Employee Number</th>
                      <th>Call Name</th>
                      <th>Full Name</th>
                      <th>Designation</th>
                      <th>Service</th>
                      <th>Level</th>
                      <th>Category</th>
                      <th>Join Date</th>
                      <th>NIC Number</th>
                      <th>Vehicle Number</th>
                      <th>Address</th>
                      <th>Home Telephone Number</th>
                      <th>Close Police</th>
                      <th>T-Shirt Size</th>
                      <th>Mobile Number</th>
                      <th>E-mail</th>
                      <th>Status</th>
                                                          
                    </tr>
                  </tfoot> 
                    
                  <tbody>
                  <?php
                     
                   while($row=mysqli_fetch_assoc($result_set))  {
                  
                   ?> 

                                
                                    
                      <tr>
                      <td>
                         <a href="update_employees.php?edit=<?php echo $row['id']; ?>" 
                           class="btn btn-info">Edit</a>   <!-- here link is passed to same page as the same form is used to 
                                                            edit entries as well -->
                         <a href="update_employees.php?delete=<?php echo $row['id']; ?>" 
                           class="btn btn-danger">Delete</a> <!-- Delete part is handled in region-form file -->                                    
                      </td>
                      <td><?php echo $row["emp_no"];  ?></td>
                      <td><?php echo $row["call_name"];  ?></td>
                      <td><?php echo $row["full_name"]; ?></td>
                      <td><?php echo $row["designation"];   ?></td>
                      <td><?php echo $row["sservice"];  ?></td>
                      <td><?php echo $row["llevel"];  ?></td>
                      <td><?php echo $row["category"];  ?></td>
                      <td><?php echo $row["join_date"]; ?></td>
                      <td><?php echo $row["nic_num"];   ?></td>
                      <td><?php echo $row["vehicle_num"];  ?></td>
                      <td><?php echo $row["aaddress"];  ?></td>
                      <td><?php echo $row["home_tpn"]; ?></td>
                      <td><?php echo $row["close_police"];   ?></td>
                      <td><?php echo $row["t_size"];  ?></td>
                      <td><?php echo $row["mobile_num"];  ?></td>
                      <td><?php echo $row["email"]; ?></td>
                      <td><?php echo $row["sstatus"];   ?></td>
                      
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