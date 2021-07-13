<?php 
session_start();
if(!isset($_SESSION['authentication_admin']))
{
header("Location: login.php");
}

?>



<?php require('include/header.php');    ?>

<?php require('include/navbar_admin.php');    ?>

<?php require('include/topbar.php');    ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h2 mb-2 text-gray-800">Employee Reports</h1>


          <!-- Message Displaying when invalid date range is given -->
          <?php 
                
                if(isset($_SESSION['message'])): 
             ?>
             <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
                <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
               ?>
             </div>

              <!-- following tag redirects to update-region after 1s showing the alert -->
              <meta http-equiv="refresh" content="1;url=http://localhost/SHIFT/monthly_report.php">
            
            <?php endif ?>


          <!-- Individual Employee Monthly Report -->
          <div class="card shadow mb-4">

          
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Individual Employee Monthly Report </h6>
            </div>
            
            <div class="card-body">      
            
              <!-- Selecting employee call names -->
              <?php
              require('include/connection.php');
              $query_f="SELECT call_name FROM  employees ";
              $result_set_f=mysqli_query($connection,$query_f);
              ?>
                
              <!-- selecting data for monthly report -->

                                
                <form method="post" action="monthly_report.php"  >  
              <!-- A hidden variable is used to get the id of the row to that is being currently altered -->
                <input type="hidden" name="id" value="<?php// echo $up_id; ?>">
                
                  <div class="form-row justify-content-center">

                   <div class="col-md-4 mb-3">
                   <label>Select Employee :</label> 
                   <select class="form-control" name="employee_sel" id="employee_sel">
                   <option selected hidden></option>
                   <?php while($row=mysqli_fetch_assoc($result_set_f))  { ?> 
                   <option><?php echo $row["call_name"];  ?></option>
                   <?php } ?>
                   </select>
                   </div>

                   <div class="col-md-4 mb-3">
                   <label>Enter Month :</label> 
                   <input type="text" name="month_sel" class="form-control" 
                   value='' placeholder="Enter month of report" maxlength="10" required>
                   <?php echo '* Use YYYY-MM format only';  ?>
                   </div>
        
                  
                  </div>                         
                
                  
                  <!-- Button to submit selected employee and month -->
                  <div class="form-row justify-content-center">     
                  <div class="col-md-4 mb-3">
                     
                  <input type="submit" class="btn btn-primary btn-user btn-block" name="select_emp" value="Submit">
                  </div>
                  </div>
                                               
                </form>
                
                <!-- To update table heading depending on the selection -->
                <div class="card-header-center py-3">
                <h4 class="m-0 font-weight-bold text-primary">
                <?php 
                   if(isset($_POST['select_emp'])){
                       echo "{$_POST['month_sel']} Month Attendance of {$_POST['employee_sel']}"; } ?>
                </h4>
                </div>

              <!-- Table Content of datewise individual employee monthly report begins Here -->
              <div class="table-responsive">
                                     
                                     <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                     
                                   
                                       <thead>
                                         <tr>            
                                           <th>Date</th>
                                           <th>Shift</th>               
                                         </tr>
                                       </thead>
                                       <tfoot>
                                         <tr>
                                          <th>Date</th>
                                          <th>Shift</th>
                                         </tr>
                                       </tfoot>
                                      
                                       <tbody>

<!-- below php script is used to get individual monthly reports of employees -->  
<?php

//initializing count variables
$night_count = 0;
$day_count   = 0;
$morning_count=0;

//initializing variables for datewise individual employee monthly report
$day_em     = 0;
$night_em   = 0;
$morning_em = 0;


if(isset($_POST['select_emp']))  {
   
 $month_sel=$_POST['month_sel'];
 $employee_sel=$_POST['employee_sel'];

 //filter variables for security
 require('include/connection.php');
 $month_sel  = strip_tags(mysqli_real_escape_string($connection,trim($month_sel)));

 //selecting entries in selected month
 $query_f="SELECT* FROM  shift WHERE date_s LIKE '{$month_sel}%' ";
 $result_set_f=mysqli_query($connection,$query_f);

 
 //counting attendence
 while($row=mysqli_fetch_assoc($result_set_f))  {

   $date_s        = $row["date_s"];
   $shift        = $row["shift"]; 
   $team_leader  = $row["team_leader"];  
   $core         = $row["core"];  
   $transmission = $row["transmission"];
   $report       = $row["report"]; 
   $huawei_1     = $row["huawei_1"];   
   $huawei_2     = $row["huawei_2"];  
   $zte_1        = $row["zte_1"];  
   $zte_2        = $row["zte_2"]; 
   $extra_work   = $row["extra_work"];   

   if($shift=="Day"){

          if     ($team_leader==$employee_sel){++$day_count;}
          elseif ($core==$employee_sel){++$day_count;}
          elseif ($transmission==$employee_sel){++$day_count;}
          elseif ($report==$employee_sel){++$day_count;}
          elseif ($huawei_1==$employee_sel){++$day_count;}
          elseif ($huawei_2==$employee_sel){++$day_count;}
          elseif ($zte_1==$employee_sel){++$day_count;}
          elseif ($zte_2==$employee_sel){++$day_count;}
          elseif ($extra_work==$employee_sel){++$day_count;}

   }

   if($shift=="Night"){

          if     ($team_leader==$employee_sel){++$night_count;}
          elseif ($core==$employee_sel){++$night_count;}
          elseif ($transmission==$employee_sel){++$night_count;}
          elseif ($report==$employee_sel){++$night_count;}
          elseif ($huawei_1==$employee_sel){++$night_count;}
          elseif ($huawei_2==$employee_sel){++$night_count;}
          elseif ($zte_1==$employee_sel){++$night_count;}
          elseif ($zte_2==$employee_sel){++$night_count;}
          elseif ($extra_work==$employee_sel){++$night_count;}

     
   }

   if($shift=="Morning"){

          if     ($team_leader==$employee_sel){++$morning_count;}
          elseif ($core==$employee_sel){++$morning_count;}
          elseif ($transmission==$employee_sel){++$morning_count;}
          elseif ($report==$employee_sel){++$morning_count;}
          elseif ($huawei_1==$employee_sel){++$morning_count;}
          elseif ($huawei_2==$employee_sel){++$morning_count;}
          elseif ($zte_1==$employee_sel){++$morning_count;}
          elseif ($zte_2==$employee_sel){++$morning_count;}
          elseif ($extra_work==$employee_sel){++$morning_count;}

     
   }
   
        $date_em = $date_s;
        $shift_em= '';

        if($day_count>$day_em){$shift_em="Day";}
        else if($night_count>$night_em){$shift_em="Night";}
        else if($morning_count>$morning_em){$shift_em="Morning";}

           if($shift_em != ''){  //to prevent empty entries
?>
                      <tr>
                        <td><?php echo $date_em;  ?></td>
                        <td><?php echo $shift_em;  ?></td>                       
                      </tr>   
                                          
                <?php
                              } //end of if 
                    $day_em     = $day_count;
                    $night_em   =$night_count;
                    $morning_em =$morning_count;


                  } //end of while loop 
        
                } //end of isset
                else {
                ?>
                  
                      <tr>
                        <td><?php echo " ";  ?></td>
                        <td><?php echo " ";  ?></td>                        
                      </tr>

                <?php       
                  } //end of else 
                ?>


					       </tbody>
                
                </table>
              </div>

              

              <!-- Table Content of individual employee monthly report begins Here -->
              <div class="table-responsive">
                                     
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                
              
                  <thead>
                    <tr>
                      
                      <th>Shift</th>
                      <th>Attendance</th>  
                                      
                    </tr>
                  </thead>
                  
                    
                  <tbody>
                                                      
                    <tr>
                      
                      <td>Day</td>
                      <td><?php echo $day_count; ?></td>
                                            
                    </tr>  

                    <tr>
                      
                      <td>Night</td>
                      <td><?php echo $night_count; ?></td>
                                            
                    </tr>

                    <tr>
                      
                      <td>Morning</td>
                      <td><?php echo $morning_count; ?></td>
                                            
                    </tr> 
                  
                    
                  
					       </tbody>
                
                </table>
              </div>
            </div>         
          </div>

     

      <!-- Total Employee Report -->
           
       <div class="card shadow mb-4">
         <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Date Range Total Employee Report </h6>
         </div>
         <div class="card-body">
           <form method="post" action="monthly_report.php">
        
             <div class="form-group row">
               <label class="col-sm-2 col-form-label" style="margin-right: -94px;">Date Range :</label>
               <div class="col-sm-3">
                 <input class="form-control" type="date" name="date1_f" maxlength="10" required>
               </div>
               <label class="col-sm-0 col-form-label"> to </label>
               <div class="col-sm-3">
                 <input class="form-control" type="date" name="date2_f" maxlength="10" required>
               </div>
          
               <div class="col-sm-2">
                 <input class="btn btn-success" type=submit value="View" name="view">
                 
               </div>
             </div>
           </form>
 
       
                 <!-- To update table heading depending on the selection -->
                <div class="card-header-center py-3">
                <h4 class="m-0 font-weight-bold text-primary">
                <?php 
                   if(isset($_POST['view'])){
                  
                    $date1_f=$_POST['date1_f'];
                    $date2_f=$_POST['date2_f'];
                     
                    echo "Total Employee Report from {$date1_f} to {$date2_f}"; } ?>
                </h4>
                </div>

                

              <!-- Table Content begins Here -->
              <div class="table-responsive">
                                     
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                
              
                  <thead>
                    <tr>            
                      <th>Employee Name</th>
                      <th>Day</th>
                      <th>Night</th>
                      <th>Morning</th>                
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Employee Name</th>
                      <th>Day</th>
                      <th>Night</th>
                      <th>Morning</th>
                    </tr>
                  </tfoot>
                 
                  <tbody>
                                                      
 <?php

 //initializing count variables
 $night_count_f  = 0;
 $day_count_f    = 0;
 $morning_count_f= 0;


if(isset($_POST['view']))  {
   
 $date1_f=$_POST['date1_f'];
 $date2_f=$_POST['date2_f'];

 //checking for a valid date range 
 $query = "SELECT * FROM shift WHERE (`date_s` BETWEEN '$date1_f' AND '$date2_f') ";
 $result = mysqli_query($connection, $query);
 if(mysqli_num_rows($result) == 0){
   
  $_SESSION['message']="Enter a valid Date Range !";
  $_SESSION['msg_type']="warning";

 }

 //selecting call names of employees

 require('include/connection.php');
 $query_f="SELECT call_name FROM  employees ";
 $result_set_f=mysqli_query($connection,$query_f);

 while($row=mysqli_fetch_assoc($result_set_f))  {

  $emp_name= $row["call_name"];   

  //initializing count after each employee
  $night_count_f = 0;
  $day_count_f   = 0;
  $morning_count_f=0;

 //selecting entries in selected period

$query = "SELECT * FROM shift WHERE (`date_s` BETWEEN '$date1_f' AND '$date2_f') ";
$result = mysqli_query($connection, $query);

 
 //counting attendence
 while($row=mysqli_fetch_assoc($result))  {

  
   $shift        = $row["shift"]; 
   $team_leader  = $row["team_leader"];  
   $core         = $row["core"];  
   $transmission = $row["transmission"];
   $report       = $row["report"]; 
   $huawei_1     = $row["huawei_1"];   
   $huawei_2     = $row["huawei_2"];  
   $zte_1        = $row["zte_1"];  
   $zte_2        = $row["zte_2"]; 
   $extra_work   = $row["extra_work"];   

   if($shift=="Day"){

          if     ($team_leader==$emp_name){++$day_count_f;}
          elseif ($core==$emp_name){++$day_count_f;}
          elseif ($transmission==$emp_name){++$day_count_f;}
          elseif ($report==$emp_name){++$day_count_f;}
          elseif ($huawei_1==$emp_name){++$day_count_f;}
          elseif ($huawei_2==$emp_name){++$day_count_f;}
          elseif ($zte_1==$emp_name){++$day_count_f;}
          elseif ($zte_2==$emp_name){++$day_count_f;}
          elseif ($extra_work==$emp_name){++$day_count_f;}

   }

   if($shift=="Night"){

          if     ($team_leader==$emp_name){++$night_count_f;}
          elseif ($core==$emp_name){++$night_count_f;}
          elseif ($transmission==$emp_name){++$night_count_f;}
          elseif ($report==$emp_name){++$night_count_f;}
          elseif ($huawei_1==$emp_name){++$night_count_f;}
          elseif ($huawei_2==$emp_name){++$night_count_f;}
          elseif ($zte_1==$emp_name){++$night_count_f;}
          elseif ($zte_2==$emp_name){++$night_count_f;}
          elseif ($extra_work==$emp_name){++$night_count_f;}

     
   }

   if($shift=="Morning"){

          if     ($team_leader==$emp_name){++$morning_count_f;}
          elseif ($core==$emp_name){++$morning_count_f;}
          elseif ($transmission==$emp_name){++$morning_count_f;}
          elseif ($report==$emp_name){++$morning_count_f;}
          elseif ($huawei_1==$emp_name){++$morning_count_f;}
          elseif ($huawei_2==$emp_name){++$morning_count_f;}
          elseif ($zte_1==$emp_name){++$morning_count_f;}
          elseif ($zte_2==$emp_name){++$morning_count_f;}
          elseif ($extra_work==$emp_name){++$morning_count_f;}

     
   }
   

 } //end of while loop 2

         $call_name = $emp_name;
         $day       = $day_count_f;
         $night     = $night_count_f;
         $morning   = $morning_count_f;
                   ?> 
                                                
                      <tr>
                        <td><?php echo $call_name;  ?></td>
                        <td><?php echo $day;  ?></td>
                        <td><?php echo $night; ?></td>
                        <td><?php echo $morning;   ?></td>                        
                      </tr>   
                                          
                <?php
                  } //end of while loop 1
        
                } //end of isset
                else {
                ?>
                  
                  <tr>
                        <td><?php echo " ";  ?></td>
                        <td><?php echo "#";  ?></td>
                        <td><?php echo "#"; ?></td>
                        <td><?php echo "#";   ?></td>                        
                      </tr>

                <?php       
                  } //end of else 
                ?>


					       </tbody>
                
                </table>
              </div>
     

             </div>
             </div>

              <!-- Total Employee Report Excel Exporter -->
     
         <div class="card shadow mb-4">
         <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-primary">Date Range Total Employee Report Excel Exporter</h6>
         </div>
         <div class="card-body">
           <form method="post" action="export_total_employee.php">
        
             <div class="form-group row">
               <label class="col-sm-2 col-form-label" style="margin-right: -94px;">Date Range :</label>
               <div class="col-sm-3">
                 <input class="form-control" type="date" name="date1_e" maxlength="10" required>
               </div>
               <label class="col-sm-0 col-form-label"> to </label>
               <div class="col-sm-3">
                 <input class="form-control" type="date" name="date2_e" maxlength="10" required>
               </div>
               <div class="col-sm-2">
                 <input class="btn btn-success" type=submit value="Export" name="export_e">
               </div>
             </div>
           </form>
          </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->




<?php require('include/footer.php'); ?>     