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


$active_form = "active";
$active_dashboard = "";
$active_4s = "";
$active_stw = "";
$active_pm = "";
$active_om = "";

$regnox = $_SESSION['fnoreg']; 

$form = $_GET['form'];


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

<?php if($form == '4s'){ ?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
			
			
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr>
    <th width="5%"><center>No</center></th>
    <th><center>Deskripsi</center></th>
    <th width="10%"><center>Aksi</center></th>
    </tr>
    </thead>
    <tbody>
             
    <tr>
   
    <td><center>1</center></td>
    <td><strong>FORM 4S</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=1" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	 <tr>
	 <td><center>2</center></td>
    <td><strong>FORM 4S MAINTENANCE</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=2" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	 <tr>
	 <td><center>3</center></td>
    <td><strong>FORM 4S QUALITY CONTROL</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=3" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	
	
    </tr>
    



    </tbody>
    </table>

  </div>
  </div>
  </div>  

  

</div>

<?php } ?>

<?php if($form == 'om'){ ?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
			
			
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr>
    <th width="5%"><center>No</center></th>
    <th><center>Deskripsi</center></th>
    <th width="10%"><center>Aksi</center></th>
    </tr>
    </thead>
    <tbody>
             
    <tr>
   
    <td><center>1</center></td>
    <td><strong>FORM OM</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=4" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	 <tr>
	 <td><center>2</center></td>
    <td><strong>FORM OM QUALITY CONTROL</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=5" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	 

    </tbody>
    </table>

  </div>
  </div>
  </div>  

  

</div>

<?php } ?>

<?php if($form == 'stw'){ ?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
			
			
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr>
    <th width="5%"><center>No</center></th>
    <th><center>Deskripsi</center></th>
    <th width="10%"><center>Aksi</center></th>
    </tr>
    </thead>
    <tbody>
             
    <tr>
   
    <td><center>1</center></td>
    <td><strong>FORM STW</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=6" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	 <tr>
	 <td><center>2</center></td>
    <td><strong>FORM STW QUALITY CONTROL</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=7" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	 

    </tbody>
    </table>

  </div>
  </div>
  </div>  

  

</div>

<?php } ?>

<?php if($form == 'pm'){ ?>

<div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
			
			
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr>
    <th width="5%"><center>No</center></th>
    <th><center>Deskripsi</center></th>
    <th width="10%"><center>Aksi</center></th>
    </tr>
    </thead>
    <tbody>
             
    <tr>
   
    <td><center>1</center></td>
    <td><strong>FORM PM</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=8" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	 <tr>
	 <td><center>2</center></td>
    <td><strong>FORM PM ASSY</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=9" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	   <tr>
	 <td><center>3</center></td>
    <td><strong>FORM PM CASTING</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=10" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	  <tr>
	 <td><center>4</center></td>
    <td><strong>FORM PM DIE MAINTENANCE</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=11" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	  <tr>
	 <td><center>5</center></td>
    <td><strong>FORM PM LOGISTIC</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=12" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	  <tr>
	 <td><center>6</center></td>
    <td><strong>FORM PM MAINTENANCE</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=13" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	  <tr>
	 <td><center>7</center></td>
    <td><strong>FORM PM QUALITY CONTROL</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=14" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	  <tr>
	 <td><center>8</center></td>
    <td><strong>FORM PM TEST</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=15" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
	  <tr>
	 <td><center>9</center></td>
    <td><strong>FORM PM TOOL</strong></td>
    <td><center><a href="edit_form_3pillars.php?id=16" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>&nbsp;</a></center></td>
	 </tr>
	 
    </tbody>
    </table>

  </div>
  </div>
  </div>  

  

</div>

<?php } ?>


<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    










