
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
   
 
   $query= "INSERT INTO shift (date_s,shift,team_leader,core,transmission,report,huawei_1,huawei_2,zte_1,zte_2,on_call1,on_call2,extra_work) VALUES ('$date_f','$shift_f','$team_leader_f','$core_f','$transmission_f','$report_f','$huawei1_f','$huawei2_f','$zte1_f','$zte2_f','$oncall1_f','$oncall2_f','$extra_work_f')";
   
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

  $query="DELETE FROM shift WHERE id=$del_id LIMIT 1";
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

        $query="SELECT* FROM shift WHERE id=$up_id";
        $result_set= mysqli_query($connection,$query);

     
        $row = mysqli_fetch_assoc($result_set);

        $date_sel         =$row["date_s"];
        $team_leader_sel  =$row["team_leader"]; 
        $shift_sel        =$row["shift"];
        $core_sel         =$row["core"];
        $transmission_sel =$row["transmission"];
        $report_sel       =$row["report"];
        $huawei1_sel      =$row["huawei_1"];
        $huawei2_sel      =$row["huawei_2"];
        $zte1_sel         =$row["zte_1"];
        $zte2_sel         =$row["zte_2"];
        $oncall1_sel      =$row["on_call1"];
        $oncall2_sel      =$row["on_call2"];
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
 
  
    $query= "UPDATE shift SET date_s='$date_f', shift='$shift_f', team_leader='$team_leader_f', core='$core_f', transmission='$transmission_f', report='$report_f', huawei_1='$huawei1_f', huawei_2='$huawei2_f', zte_1='$zte1_f', zte_2='$zte2_f', on_call1='$oncall1_f', on_call2='$oncall2_f',extra_work='$extra_work_f' WHERE id=$up_id";
    
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

