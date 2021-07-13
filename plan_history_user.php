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
          <h1 class="h2 mb-2 text-gray-800">Shift Plan Update History</h1>
         
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Summary of Shift Plan Updates</h4>
            </div>
            <div class="card-body">
              
              
                                          
              <?php
              //Table select query for database
              require('include/connection.php');
              date_default_timezone_set('Asia/Colombo');

              $query="SELECT* FROM  history ORDER BY id DESC";
              $result_set=mysqli_query($connection,$query);

              

              ?>

              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    
                      <th>Update Date|Time</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Shift</th>
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
                    
                      <th>Update Date|Time</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Shift</th>
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
                       
                        <td><?php echo $row["up_date_time"];  ?></td>
                        <td><?php echo $row["user"];  ?></td>
                        <td><?php echo $row["date_p"];  ?></td>
                        <td><?php echo $row["shift"]; ?></td>
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