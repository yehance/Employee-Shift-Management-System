<?php 
session_start();
if(!isset($_SESSION['authentication_admin']))
{
header("Location: login.php");
}

?>

<!-- NOTE:ADD SERVER IP INSTEAD OF localhost IN LINE 39  -->
<!-- NOTE:ADD SERVER IP INSTEAD OF localhost IN LINE 39  -->
  
<?php require('include/header.php');    ?>

<?php require('include/navbar_admin.php');    ?>

<?php require('include/topbar.php');    ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h2 mb-2 text-gray-800">Shift Excel Exporter</h1>

          <!-- Message Displaying when invalid date range is given -->
          <?php 
                
                 if(isset($_SESSION['message'])): 
              ?>
              <div class="alert alert-<?=$_SESSION['msg_type'] ?>">
                 <?php
                   echo $_SESSION['message'];
                   unset($_SESSION['message']);
                ?>
              </div>

               <!-- following tag redirects to update-region after 1s showing the alert -->
               <meta http-equiv="refresh" content="1;url=http://localhost/SHIFT/Excel_Exporter.php">
             
             <?php endif ?>
          
                   
          <!-- Content Row -->
         <div class="row">



<!-- export  -->
<div class="col-xl-12 col-md-6 mb-4">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Date Range Shift Table Excel Exporter</h6>
    </div>
    <div class="card-body">
      <form method="post" action="export.php">
        
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" style="margin-right: -94px;">Date Range :</label>
          <div class="col-sm-3">
            <input class="form-control" type="date" name="date1" maxlength="10" required>
          </div>
          <label class="col-sm-0 col-form-label"> to </label>
          <div class="col-sm-3">
            <input class="form-control" type="date" name="date2" maxlength="10" required>
          </div>
          <div class="col-sm-2">
            <input class="btn btn-success" type=submit value="Export" name="export">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- export all -->
<div class="col-xl-12 col-md-6 mb-4">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Full Shift Table Excel Exporter</h6>
    </div>
    <div class="card-body">
      <form method="post" action="export_all.php">
        <div class="form-row">
          <div class="col-md-8 mb-3">
            <label>Export Full File : </label>
            <input class="btn btn-success" type="submit" name="export1" value="Export">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<?php require('include/footer.php'); ?>     