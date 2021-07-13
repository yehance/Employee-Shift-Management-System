
<?php


//1.Follwing code relates to entering form information to the database
require('connection.php');

//default value of update  
  $update= false;

  $up_id =0 ;
   
//initializing the variables to prevent the error when edit is not pressed
  $date_sel  ='';
  $team_leader_sel  ="None"; 
  $shift_sel ='';
  $core_sel ="None";
  $transmission_sel ="None";
  $report_sel ="None";
  $huawei1_sel="None";
  $huawei2_sel ="None";
  $zte1_sel ="None";
  $zte2_sel ="None";
  $oncall1_sel ="None";
  $oncall2_sel ="None";
  $extra_work_sel ="None";
  

if(isset($_POST['add_shift'])) {

   
  
   $date_f           =$_POST['date_f'];
   $team_leader_f    =$_POST['team_leader_f'];
   $shift_f          =$_POST['shift_f'];
   $core_f           =$_POST['core_f'];
   $transmission_f   =$_POST['transmission_f'];
   $report_f         =$_POST['report_f'];
   $huawei1_f        =$_POST['huawei1_f'];
   $huawei2_f        =$_POST['huawei2_f'];
   $zte1_f           =$_POST['zte1_f'];
   $zte2_f           =$_POST['zte2_f'];
   $oncall1_f        =$_POST['oncall1_f'];
   $oncall2_f        =$_POST['oncall2_f'];
   $extra_work_f     =$_POST['extra_work_f'];

   //filter variables for security
   $date_f= strip_tags(mysqli_real_escape_string($connection,trim($date_f))); 
   
 
   $query= "INSERT INTO shift_plan (date_p,shift,team_leader,station_1,station_2,station_3,station_4,station_5,station_6,station_7,station_8,station_9,extra_work) VALUES ('$date_f','$shift_f','$team_leader_f','$core_f','$transmission_f','$report_f','$huawei1_f','$huawei2_f','$zte1_f','$zte2_f','$oncall1_f','$oncall2_f','$extra_work_f')";
   
    if(mysqli_query($connection,$query))   {
      
    
      $_SESSION['message']="Record has been saved successfully!";
      $_SESSION['msg_type']="success";
          
    }  
    else  {
       echo "Record Entry Failed !";
    }
    
 }

 //2.Following code relates to deleting data from the database

  if(isset($_GET['delete']))  {
   
  $del_id= $_GET['delete'];

  $query="DELETE FROM shift_plan WHERE id=$del_id LIMIT 1";
  $result_set=mysqli_query($connection,$query);
  
    if($result_set)    {
              
     $_SESSION['message']="Record has been deleted successfully!";
     $_SESSION['msg_type']="danger";
                              
                                   
    }  
   else  {
     echo "Record Delete Failed !";
      }

 }

//3.Following code relates to editing data from the database

//for displaying the selected one on the fields

  if(isset($_GET['edit']))   {
       
        $up_id =$_GET['edit'];
              
        $update= true;

        $query="SELECT* FROM shift_plan WHERE id=$up_id";
        $result_set= mysqli_query($connection,$query);

     
        $row = mysqli_fetch_assoc($result_set);

        $date_sel         =$row["date_p"];
        $team_leader_sel  =$row["team_leader"]; 
        $shift_sel        =$row["shift"];
        $core_sel         =$row["station_1"];
        $transmission_sel =$row["station_2"];
        $report_sel       =$row["station_3"];
        $huawei1_sel      =$row["station_4"];
        $huawei2_sel      =$row["station_5"];
        $zte1_sel         =$row["station_6"];
        $zte2_sel         =$row["station_7"];
        $oncall1_sel      =$row["station_8"];
        $oncall2_sel      =$row["station_9"];
        $extra_work_sel   =$row["extra_work"];
    
      }
   
 //for updating database based on the updated details on the fields 

  if(isset($_POST['update_shift'])) {

      
   $up_id=$_POST['id'];
    
   $date_f           =$_POST['date_f'];
   $team_leader_f    =$_POST['team_leader_f'];
   $shift_f          =$_POST['shift_f'];
   $core_f           =$_POST['core_f'];
   $transmission_f   =$_POST['transmission_f'];
   $report_f         =$_POST['report_f'];
   $huawei1_f        =$_POST['huawei1_f'];
   $huawei2_f        =$_POST['huawei2_f'];
   $zte1_f           =$_POST['zte1_f'];
   $zte2_f           =$_POST['zte2_f'];
   $oncall1_f        =$_POST['oncall1_f'];
   $oncall2_f        =$_POST['oncall2_f'];
   $extra_work_f     =$_POST['extra_work_f'];

   //filter variables for security
   $date_f= strip_tags(mysqli_real_escape_string($connection,trim($date_f)));
 
  
    $query= "UPDATE shift_plan SET date_p='$date_f', shift='$shift_f', team_leader='$team_leader_f', station_1='$core_f', station_2='$transmission_f', station_3='$report_f', station_4='$huawei1_f', station_5='$huawei2_f', station_6='$zte1_f', station_7='$zte2_f', station_8='$oncall1_f', station_9='$oncall2_f',extra_work='$extra_work_f' WHERE id=$up_id";
    
     if(mysqli_query($connection,$query))   {
       
    $_SESSION['message']="Record has been updated successfully!";
    $_SESSION['msg_type']="warning";
                  
     }  
     else  {
        echo "Record Update Failed !";
     }
     
  }  

 
   mysqli_close($connection);   

?>

