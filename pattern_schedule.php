<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname(__FILE__) . "/config/connection.php"; ?>

<?php

if (empty($_SESSION['fname'])) {
  echo "<script>window.location='login.php'</script>";
}
?>



<?php
$title = "Dashboard";


$active_pattern = "active";
$active_dashboard = "";
$active_4s = "";
$active_stw = "";
$active_pm = "";
$active_om = "";

$regnox = $_SESSION['fnoreg']; 

?>
<style>
  .card-menu {
    text-decoration: none;
    background-color: transparent !important;
    border: 0px none !important;
  }

  .card-menu:active {
    background-color: black;
    opacity: 0.8;
    color: black
  }

  .card-header {
    background-color: white !important;
    color: black
  }

  h6 {
    color: black
  }

  .nav-item a {
    color: black
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #12e598 !important;
    color: black !important
  }
</style>


<?php include('includes/header.php'); ?>


<!-- Begin Page Content -->
<div class="container-fluid p-1">

<div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btn btn-primary" href="add_pattern_schedule.php">Add</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
    <th>No</th>
    <th>Name</th>
    <th>Noreg</th>
    <th>Line</th>
    <th>Worsite</th>
    <th>Job Title</th>
    <th>Type Pilar</th>
    <th>Date Modified</th>
    <th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_pattern_schedule");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_pattern_schedule order by fid desc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
    <td><?php echo $queryku2['fname']; ?></td>
    <td><?php echo $queryku2['fnoreg']; ?></td>
    <td><?php echo $queryku2['fline']; ?></td>
    <td><?php echo $queryku2['fworsite']; ?></td>
    <td><?php echo $queryku2['fjobas']; ?></td>
    <td><?php echo $queryku2['ftype_pillar']; ?></td>
    <td><?php echo $queryku2['fdate_modified']; ?></td>
     <td><center><a href="edit_pattern_schedule.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i class="fa fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_pattern_schedule.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

  <?php
  $no++;
  }
}
  ?>

    </tbody>
    </table>

  </div>
  </div>
  </div>  

  

</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    










