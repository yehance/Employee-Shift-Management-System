
<?php


//1.Follwing code relates to entering form information to the database
require('connection.php');

//default value of update  
  $update= false;

  $up_id =0 ;
   
//initializing the variables 
  
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

    //setting default time-zone and getting current date
    date_default_timezone_set('Asia/Colombo');
    $date = date('Y-m-d H:i:s');
    //Getting next day for morning entries
    $date_fn = date('Y-m-d', strtotime('now + 1day'));
    
  
   $date_f           =$date;
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

   //to automatically add morning entry when night shift is added
   if ($shift_f=="Night"){ 
    $shift_fn = "Morning";
    $query1= "INSERT INTO shift (date_s,shift,team_leader,core,transmission,report,huawei_1,huawei_2,zte_1,zte_2,on_call1,on_call2,extra_work) VALUES ('$date_fn','$shift_fn','$team_leader_f','$core_f','$transmission_f','$report_f','$huawei1_f','$huawei2_f','$zte1_f','$zte2_f','$oncall1_f','$oncall2_f','$extra_work_f')";
    mysqli_query($connection,$query1);
   }

       
    
}

 
   mysqli_close($connection);   

?>

