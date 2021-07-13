<?php 
  require_once ('include/connection.php');
  
  $output = "";

if(isset($_POST['export'])){ 
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];
    
   $query = "SELECT * FROM shift WHERE (`date_s` BETWEEN '$date1' AND '$date2') ORDER BY id DESC";
   $result = mysqli_query($connection, $query);
   if(mysqli_num_rows($result) > 0)
   {
    $output .= "
     <table class='table' bordered='1'>  
     <tr> 
     <th>ID</th>
     <th>Date</th>
     <th>Shift</th>
     <th>Team Leader</th>
     <th>Core</th>
     <th>Transmission</th>
     <th>Report</th>
     <th>Huawei 1</th>
     <th>Huawei 2</th>
     <th>ZTE 1</th>
     <th>ZTE 2</th>
     <th>On Call 1</th>
     <th>On Call 2</th>
     <th>Extra Work</th>
    </tr>
    ";

     while($row = mysqli_fetch_array($result))
    {
                  $output .= "<tr> 
                                <td>".$row["id"]."</td> 
                                <td>".$row["date_s"]."</td> 
                                <td>".$row["shift"]."</td> 
                                <td>".$row["team_leader"]."</td> 
                                <td>".$row["core"]."</td> 
                                <td>".$row["transmission"]."</td>
                                <td>".$row["report"]."</td> 
                                <td>".$row["huawei_1"]."</td> 
                                <td>".$row["huawei_2"]."</td> 
                                <td>".$row["zte_1"]."</td> 
                                <td>".$row["zte_2"]."</td>
                                <td>".$row["on_call1"]."</td> 
                                <td>".$row["on_call2"]."</td> 
                                <td>".$row["extra_work"]."</td>
                              </tr>";
    }
    $output .= "</table>";
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=INOC Shift Report.xls');
    echo $output;
   }else{
     
    session_start();
    $_SESSION['message']="Enter a valid Date Range !";
    $_SESSION['msg_type']="warning";
    header("Location: Excel_Exporter.php");
    
   }
  }
  ?>