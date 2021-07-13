<?php 
  require('include/connection.php');
  
  $output = "";

  //initializing count variables
  $night_count_f = 0;
  $day_count_f   = 0;
  $morning_count_f=0;

if(isset($_POST['export_e'])){ 
    $date1_e=$_POST['date1_e'];
    $date2_e=$_POST['date2_e'];
    
   //checking for a valid date range 
   $query = "SELECT * FROM shift WHERE (`date_s` BETWEEN '$date1_e' AND '$date2_e') ";
   $result = mysqli_query($connection, $query);
   if(mysqli_num_rows($result) > 0)
   {
    $output .= "
     <table class='table' bordered='1'>  
     <tr> 
     <th>Employee Name</th>
     <th>Day</th>
     <th>Night</th>
     <th>Morning</th>
    </tr>
    ";

 $query_f="SELECT call_name FROM  employees ";
 $result_set_f=mysqli_query($connection,$query_f);

 while($row=mysqli_fetch_assoc($result_set_f))  {

  $emp_name= $row["call_name"];   

  //initializing count after each employee
  $night_count_f = 0;
  $day_count_f   = 0;
  $morning_count_f=0;

 //selecting entries in selected period

$query = "SELECT * FROM shift WHERE (`date_s` BETWEEN '$date1_e' AND '$date2_e') ";
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

    
                  $output .= "<tr> 
                                <td>".$call_name."</td> 
                                <td>".$day."</td> 
                                <td>".$night."</td> 
                                <td>".$morning."</td> 
                              </tr>";
    } //end of while loop 1


    $output .= "</table>";
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=INOC Employee Report.xls');
    echo $output;
   }else{
     
    session_start();
    $_SESSION['message']="Enter a valid Date Range !";
    $_SESSION['msg_type']="warning";
    header("Location: monthly_report.php");
    
   }
  }
  ?>