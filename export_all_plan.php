<?php 
  require_once ('include/connection.php');
  $output = "";

if(isset($_POST['export1'])){ 
   $query = "SELECT * FROM shift_plan ORDER BY id DESC";
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
    ";
    while($row = mysqli_fetch_array($result))
    {
      $output .= "<tr> 
      <td>".$row["id"]."</td> 
      <td>".$row["date_p"]."</td> 
      <td>".$row["shift"]."</td> 
      <td>".$row["team_leader"]."</td> 
      <td>".$row["station_1"]."</td> 
      <td>".$row["station_2"]."</td>
      <td>".$row["station_3"]."</td> 
      <td>".$row["station_4"]."</td> 
      <td>".$row["station_5"]."</td> 
      <td>".$row["station_6"]."</td> 
      <td>".$row["station_7"]."</td>
      <td>".$row["station_8"]."</td> 
      <td>".$row["station_9"]."</td> 
      <td>".$row["extra_work"]."</td>
    </tr>";
    }
    $output .= "</table>";
    header('Content-Type: application/xls');
    header('Content-Disposition: attachment; filename=INOC Shift Plan(full).xls');
    echo $output;
   }else{
    session_start();
    $_SESSION['message']="No data to Download !";
    $_SESSION['msg_type']="warning";
    header("Location: Excel_Exporter_plan.php");    
   }
  }
  ?>