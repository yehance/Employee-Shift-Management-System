<?php require('include/header.php');    ?>

<?php require('include/navbar_admin.php');    ?>

<?php require('include/topbar.php');    ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h2 mb-2 text-gray-800">Test Page</h1>

          <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h4 class="m-0 font-weight-bold text-primary">Test Page</h4>
              </div>
              <div class="card-body">
                
                <!-- View Content begins Here -->
                <?php
               

               //    echo "<br><br><br>" ;               
               //    echo "<br>" ;
                   echo "<br>" ;
               //    echo "<br><br>" ;
               //   echo"<br><br>";   
              //    echo"<br><br>";                 
                  require('include/connection.php');

                             //initializing count variables
$night_count_f = 0;
$day_count_f   = 0;
$morning_count_f=0;


//if(isset($_POST['view']))  {
   
 //$date1_f=$_POST['date1_f'];
 //$date2_f=$_POST['date2_f'];

 //selecting call names of employees

 require('include/connection.php');
 $query_f="SELECT call_name FROM  employees ";
 $result_set_f=mysqli_query($connection,$query_f);

 while($row=mysqli_fetch_assoc($result_set_f))  {   //while loop1

  $emp_name= $row["call_name"];  
 
//initializing count after each employee
$night_count_f = 0;
$day_count_f   = 0;
$morning_count_f=0;

 //selecting entries in selected period

$query = "SELECT * FROM shift WHERE (`date_s` BETWEEN '2020-04-01' AND '2020-07-02') ";
$result = mysqli_query($connection, $query);

 
 //counting attendence per employee in the selected period
 while($row=mysqli_fetch_assoc($result))  {  //while loop2

  
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

    echo $shift;
    echo "<br>" ;

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

        echo $call_name."  ".$day."  ".$night."  ".$morning;
        echo"<br><br>";

 } //end of while loop 1
        
// } //end of isset








                ?>
                <!-- View Content Ends Here -->                       
                      </div>
                    </div> 

                </div>
               
                            

               <!-- Page Content Ends Here -->
              </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



     <?php require('include/footer.php'); ?>  