
<?php


//1.Follwing code relates to entering form information to the database
require('connection.php');

//default value of update  
  $update= false;

  $up_id =0 ;
   
//initializing the variables to prevent the error when edit is not pressed
  $employee_no  ='';
  $col_name  =''; 
  $ful_name ='';
  $desig ='';
  $serv ='';
  $lvl ='';
  $cate='';
  $j_date ='';
  $nic ='';
  $veh ='';
  $addr ='';
  $home_num ='';
  $clpolice ='';
  $tsize ='';
  $mobile ='';
  $mail ='';
  $stat ='';



if(isset($_POST['add_officer'])) {

  
   $emp_no       =$_POST['emp_no'];
   $call_name    =$_POST['call_name'];
   $full_name    =$_POST['full_name'];
   $designation  =$_POST['designation'];
   $service      =$_POST['sservice'];
   $level        =$_POST['llevel'];
   $category     =$_POST['category'];
   $join_date    =$_POST['join_date'];
   $nic_num      =$_POST['nic_num'];
   $vehicle_num  =$_POST['vehicle_num'];
   $address      =$_POST['aaddress'];
   $home_tpn     =$_POST['home_tpn'];
   $close_police =$_POST['close_police'];
   $t_size       =$_POST['t_size'];
   $mobile_num   =$_POST['mobile_num'];
   $email        =$_POST['email'];
   $status       =$_POST['sstatus'];

   //filter variables for security
   $emp_no      = strip_tags(mysqli_real_escape_string($connection,trim($emp_no)));
   $call_name   = strip_tags(mysqli_real_escape_string($connection,trim($call_name)));
   $full_name   = strip_tags(mysqli_real_escape_string($connection,trim($full_name)));
   $designation = strip_tags(mysqli_real_escape_string($connection,trim($designation)));
   $service     = strip_tags(mysqli_real_escape_string($connection,trim($service)));
   $level       = strip_tags(mysqli_real_escape_string($connection,trim($level)));
   $category    = strip_tags(mysqli_real_escape_string($connection,trim($category)));
   $join_date   = strip_tags(mysqli_real_escape_string($connection,trim($join_date)));
   $nic_num     = strip_tags(mysqli_real_escape_string($connection,trim($nic_num)));
   $vehicle_num = strip_tags(mysqli_real_escape_string($connection,trim($vehicle_num)));
   $address     = strip_tags(mysqli_real_escape_string($connection,trim($address)));
   $home_tpn    = strip_tags(mysqli_real_escape_string($connection,trim($home_tpn)));
   $close_police= strip_tags(mysqli_real_escape_string($connection,trim($close_police)));
   $mobile_num  = strip_tags(mysqli_real_escape_string($connection,trim($mobile_num)));
   $email       = strip_tags(mysqli_real_escape_string($connection,trim($email)));


 
   $query= "INSERT INTO employees (emp_no,call_name,full_name,designation,sservice,llevel,category,join_date,nic_num,vehicle_num,aaddress,home_tpn,close_police,t_size,mobile_num,email,sstatus) VALUES ('$emp_no','$call_name','$full_name','$designation','$service','$level','$category','$join_date','$nic_num','$vehicle_num','$address','$home_tpn','$close_police','$t_size','$mobile_num','$email','$status')";
   
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

  $query="DELETE FROM employees WHERE id=$del_id LIMIT 1";
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

        $query="SELECT* FROM employees WHERE id=$up_id";
        $result_set= mysqli_query($connection,$query);

     
        $row = mysqli_fetch_assoc($result_set);

        $employee_no  =$row["emp_no"];
        $col_name     =$row["call_name"]; 
        $ful_name     =$row["full_name"];
        $desig        =$row["designation"];
        $serv         =$row["sservice"];
        $lvl          =$row["llevel"];
        $cate         =$row["category"];
        $j_date       =$row["join_date"];
        $nic          =$row["nic_num"];
        $veh          =$row["vehicle_num"];
        $addr         =$row["aaddress"];
        $home_num     =$row["home_tpn"];
        $clpolice     =$row["close_police"];
        $tsize        =$row["t_size"];
        $mobile       =$row["mobile_num"];
        $mail         =$row["email"];
        $stat         =$row["sstatus"];

        //filter variables for security
        $employee_no    = strip_tags(mysqli_real_escape_string($connection,trim($employee_no)));
        $col_name       = strip_tags(mysqli_real_escape_string($connection,trim($col_name)));
        $ful_name       = strip_tags(mysqli_real_escape_string($connection,trim($ful_name)));
        $desig          = strip_tags(mysqli_real_escape_string($connection,trim($desig)));
        $serv           = strip_tags(mysqli_real_escape_string($connection,trim($serv)));
        $lvl            = strip_tags(mysqli_real_escape_string($connection,trim($lvl)));
        $cate           = strip_tags(mysqli_real_escape_string($connection,trim($cate)));
        $j_date         = strip_tags(mysqli_real_escape_string($connection,trim($j_date)));
        $nic            = strip_tags(mysqli_real_escape_string($connection,trim($nic)));
        $veh            = strip_tags(mysqli_real_escape_string($connection,trim($veh)));
        //$addr           = strip_tags(mysqli_real_escape_string($connection,trim($addr)));
        $home_num       = strip_tags(mysqli_real_escape_string($connection,trim($home_num)));
        $clpolice       = strip_tags(mysqli_real_escape_string($connection,trim($clpolice)));
        $mobile         = strip_tags(mysqli_real_escape_string($connection,trim($mobile)));
        $mail           = strip_tags(mysqli_real_escape_string($connection,trim($mail)));
    
      }
   
 //for updating database based on the updated details on the fields 

  if(isset($_POST['update_officer'])) {

      
   $up_id=$_POST['id'];
    
   $emp_no       =$_POST['emp_no'];
   $call_name    =$_POST['call_name'];
   $full_name    =$_POST['full_name'];
   $designation  =$_POST['designation'];
   $service      =$_POST['sservice'];
   $level        =$_POST['llevel'];
   $category     =$_POST['category'];
   $join_date    =$_POST['join_date'];
   $nic_num      =$_POST['nic_num'];
   $vehicle_num  =$_POST['vehicle_num'];
   $address      =$_POST['aaddress'];
   $home_tpn     =$_POST['home_tpn'];
   $close_police =$_POST['close_police'];
   $t_size       =$_POST['t_size'];
   $mobile_num   =$_POST['mobile_num'];
   $email        =$_POST['email'];
   $status       =$_POST['sstatus'];

   //filter variables for security
   $emp_no      = strip_tags(mysqli_real_escape_string($connection,trim($emp_no)));
   $call_name   = strip_tags(mysqli_real_escape_string($connection,trim($call_name)));
   $full_name   = strip_tags(mysqli_real_escape_string($connection,trim($full_name)));
   $designation = strip_tags(mysqli_real_escape_string($connection,trim($designation)));
   $service     = strip_tags(mysqli_real_escape_string($connection,trim($service)));
   $level       = strip_tags(mysqli_real_escape_string($connection,trim($level)));
   $category    = strip_tags(mysqli_real_escape_string($connection,trim($category)));
   $join_date   = strip_tags(mysqli_real_escape_string($connection,trim($join_date)));
   $nic_num     = strip_tags(mysqli_real_escape_string($connection,trim($nic_num)));
   $vehicle_num = strip_tags(mysqli_real_escape_string($connection,trim($vehicle_num)));
   $address     = strip_tags(mysqli_real_escape_string($connection,trim($address)));
   $home_tpn    = strip_tags(mysqli_real_escape_string($connection,trim($home_tpn)));
   $close_police= strip_tags(mysqli_real_escape_string($connection,trim($close_police)));
   $mobile_num  = strip_tags(mysqli_real_escape_string($connection,trim($mobile_num)));
   $email       = strip_tags(mysqli_real_escape_string($connection,trim($email)));
 
  
    $query= "UPDATE employees SET emp_no='$emp_no', call_name='$call_name', full_name='$full_name', designation='$designation', sservice='$service', llevel='$level', category='$category', join_date='$join_date', nic_num='$nic_num', vehicle_num='$vehicle_num', aaddress='$address', home_tpn='$home_tpn', close_police='$close_police', t_size='$t_size', mobile_num='$mobile_num', email='$email', sstatus='$status' WHERE id=$up_id";
    
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

