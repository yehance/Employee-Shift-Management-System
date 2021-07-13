<?php 
session_start();
if(!isset($_SESSION['authentication_user']))
{
header("Location: login.php");
}

?>

<?php require('include/header.php');    ?>

<?php require('include/navbar_user.php');    ?>

<?php require('include/topbar.php');    ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h2 mb-2 text-gray-800">Dashboard</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Summary of Daily Shifts</h4>
            </div>
            <div class="card-body">
              
                                                       
              <?php
              //Table select query for database
              require('include/connection.php');
              date_default_timezone_set('Asia/Colombo');
              
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