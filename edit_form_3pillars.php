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

$id = $_GET['id'];

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
<?php if($id == '1'){ ?>

<div class="card shadow mb-4">
<hr/><center><legend>FORM 4S</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_4s.php?fid=1">&nbsp;&nbsp;<i  style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="example" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
    <th>No</th>
    <th>Judul</th>
    <th>Point</th>
    <th>Score</th>
    <th>Very Bad</th>
    <th>Bad</th>
    <th>Normal</th>
    <th>Good</th>
	<th>Very Good</th>

	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_4s");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_4s order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
    <td><?php echo $queryku2['fjudul']; ?></td>
    <td><?php echo $queryku2['fpoint']; ?></td>
	<td><?php echo $queryku2['fscore']; ?></td>
    <td><?php echo $queryku2['fverybad']; ?></td>
    <td><?php echo $queryku2['fbad']; ?></td>
    <td><?php echo $queryku2['fnormal']; ?></td>
    <td><?php echo $queryku2['fgood']; ?></td>
	<td><?php echo $queryku2['fverygood']; ?></td>

     <td><center><a href="edit_form_4s.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm"><i  style="color:white !important;" class="fas fa-times"></i></a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_4s.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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

<?php } else if($id == '2'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM 4S MAINTENANCE</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_4s_maintenance.php?fid=2">&nbsp;&nbsp;<i  style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="example" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
    <th>No</th>
    <th>Judul</th>
    <th>Point</th>
    <th>Score</th>
    <th>Very Bad</th>
    <th>Bad</th>
    <th>Normal</th>
    <th>Good</th>
	<th>Very Good</th>

	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_4s_maintenance");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_4s_maintenance order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
    <td><?php echo $queryku2['fjudul']; ?></td>
    <td><?php echo $queryku2['fpoint']; ?></td>
	<td><?php echo $queryku2['fscore']; ?></td>
    <td><?php echo $queryku2['fverybad']; ?></td>
    <td><?php echo $queryku2['fbad']; ?></td>
    <td><?php echo $queryku2['fnormal']; ?></td>
    <td><?php echo $queryku2['fgood']; ?></td>
	<td><?php echo $queryku2['fverygood']; ?></td>

     <td><center><a href="edit_form_4s_maintenance.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_4s_maintenance.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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


<?php } else if($id == '3'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM 4S QUALITY CONTROL</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_4s_qc.php?fid=3">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
    <th>No</th>
    <th colspan="2">Tempat yang di cek</th>
    <th>Item Evaluasi</th>
    <th>no</th>
    <th>Konten Evaluasi</th>
    <th>Hasil Evaluasi</th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_4s_qc");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_4s_qc order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
    <td><?php echo $queryku2['fjudul1']; ?></td>
    <td><?php echo $queryku2['fjudul2']; ?></td>
	<td><?php echo $queryku2['fitem']; ?></td>
    <td><?php echo $queryku2['fno']; ?></td>
    <td><?php echo $queryku2['fkonten']; ?></td>
    <td><?php echo $queryku2['fhasil']; ?></td>

     <td><center><a href="edit_form_4s_qc.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_4s_qc.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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



<?php } else if($id == '4'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM OM</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_om.php?fid=4">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
   <th><center>No</center></th>
	<th><center></center></th>
	<th><center>Kriteria Evaluasi<br>Level Silver</center></th>
	<th><center>Kriteria Evaluasi<br>Level Gold</center></th>
	<th><center>Penjelasan</center></th>
	<th><center>Score</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_4s_qc");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_om order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
    <td><?php echo $queryku2['fjudul']; ?></td>
	<td><?php echo $queryku2['fsilver']; ?></td>
    <td><?php echo $queryku2['fgold']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fscore']; ?></td>

     <td><center><a href="edit_form_om.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_om.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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


<?php } else if($id == '5'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM OM QUALITY CONTROL</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_om_qc.php?fid=5">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
   <th><center>No</center></th>
      <th><center>Level</center></th>
	<th width="20%"><center>Item</center></th>
	<th width="30%"><center>Standard evaluasi<br>Level bronze (sistemnya jadi)</center></th>
	<th width="40%"><center>Penjelasan</center></th>
	<th width="5%"><center>Score</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_om_qc");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_om_qc order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
	<td><?php echo $queryku2['flevel']; ?></td>
    <td><?php echo $queryku2['fitem']; ?></td>
	<td><?php echo $queryku2['fevaluasi']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fscore']; ?></td>

     <td><center><a href="edit_form_om_qc.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_om_qc.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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



<?php } else if($id == '6'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM STW</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_stw.php?fid=6">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
   <th><center>No</center></th>
	<th><center></center></th>
	<th><center>Kriteria Evaluasi<br>Level Silver</center></th>
	<th><center>Kriteria Evaluasi<br>Level Gold</center></th>
	<th><center>Penjelasan</center></th>
	<th><center>Score</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_stw");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_stw order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
    <td><?php echo $queryku2['fjudul']; ?></td>
	<td><?php echo $queryku2['fsilver']; ?></td>
    <td><?php echo $queryku2['fgold']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fscore']; ?></td>

     <td><center><a href="edit_form_stw.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_stw.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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


<?php } else if($id == '7'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM STW QUALITY CONTROL</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_stw_qc.php?fid=7">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
	<th>No</th>
	<th>Level</th>
   <th width="20%"><center>Item</center></th>
	<th width="30%"><center>Deskripsi</center></th>
	<th width="30%"><center>Penjelasan</center></th>
	<th width="5%"><center>Score</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_stw_qc");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_stw_qc order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
	<td><?php echo $queryku2['flevel']; ?></td>
    <td><?php echo $queryku2['fitem']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
	<td><?php echo $queryku2['fpenj']; ?></td>
    <td><?php echo $queryku2['fscore']; ?></td>

     <td><center><a href="edit_form_stw_qc.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_stw_qc.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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

<?php } else if($id == '8'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM PM</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_pm.php?fid=8">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
  <th><center>No</center></th>
	<th colspan="2"><center></center></th>
	<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
	<th><center>Assessment criteria<br>＜Gold level＞</center></th>
	<th><center>Description</center></th>
	<th><center>Skor</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_pm");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_pm order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
    <td><?php echo $queryku2['fitem1']; ?></td>
	<td><?php echo $queryku2['fitem2']; ?></td>
	<td><?php echo $queryku2['fsilver']; ?></td>
    <td><?php echo $queryku2['fgold']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fskor']; ?></td>

     <td><center><a href="edit_form_pm.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_pm.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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

<?php } else if($id == '9'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM PM ASSY</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_pm_assy.php?fid=9">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
	<th><center>No</center></th>
	<th colspan="2"><center>Item</center></th>
	<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
	<th><center>Assessment criteria<br>＜Gold level＞</center></th>
	<th><center>Description</center></th>
	<th><center>Skor</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_pm_assy");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_pm_assy order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
    <td><?php echo $queryku2['fitem1']; ?></td>
	<td><?php echo $queryku2['fitem2']; ?></td>
	<td><?php echo $queryku2['fsilver']; ?></td>
    <td><?php echo $queryku2['fgold']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fskor']; ?></td>

     <td><center><a href="edit_form_pm_assy.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_pm_assy.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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


<?php } else if($id == '10'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM PM CASTING</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_pm_casting.php?fid=10">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
	<th><center>No</center></th>
	<th><center>Item</center></th>
	<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
	<th><center>Assessment criteria<br>＜Gold level＞</center></th>
	<th><center>Description</center></th>
	<th><center>Skor</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_pm_casting");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_pm_casting order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
	<td><?php echo $queryku2['fitem']; ?></td>
	<td><?php echo $queryku2['fsilver']; ?></td>
    <td><?php echo $queryku2['fgold']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fskor']; ?></td>

     <td><center><a href="edit_form_pm_casting.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_pm_casting.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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

<?php } else if($id == '11'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM PM DIE MAINTENANCE</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_pm_die_maintenance.php?fid=11">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
	<th><center>No</center></th>
	<th><center>Item</center></th>
	<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
	<th><center>Assessment criteria<br>＜Gold level＞</center></th>
	<th><center>Description</center></th>
	<th><center>Skor</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_pm_die_maintenance");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_pm_die_maintenance order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
	<td><?php echo $queryku2['fitem']; ?></td>
	<td><?php echo $queryku2['fsilver']; ?></td>
    <td><?php echo $queryku2['fgold']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fskor']; ?></td>

     <td><center><a href="edit_form_pm_die_maintenance.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_pm_die_maintenance.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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


<?php } else if($id == '12'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM PM LOG</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_pm_log.php?fid=12">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
	<th><center>No</center></th>
	<th><center>Item</center></th>
	<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
	<th><center>Assessment criteria<br>＜Gold level＞</center></th>
	<th><center>Description</center></th>
	<th><center>Skor</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_pm_log");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_pm_log order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
	<td><?php echo $queryku2['fitem']; ?></td>
	<td><?php echo $queryku2['fsilver']; ?></td>
    <td><?php echo $queryku2['fgold']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fskor']; ?></td>

     <td><center><a href="edit_form_pm_log.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_pm_log.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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


<?php } else if($id == '13'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM PM MAINTENANCE</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_pm_maintenance.php?fid=13">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
	<th><center>No</center></th>
	<th colspan="2"><center>Item</center></th>
	<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
	<th><center>Assessment criteria<br>＜Gold level＞</center></th>
	<th><center>Description</center></th>
	<th><center>Skor</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_pm_maintenance");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_pm_maintenance order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
	<td><?php echo $queryku2['fitem1']; ?></td>
	<td><?php echo $queryku2['fitem2']; ?></td>
	<td><?php echo $queryku2['fsilver']; ?></td>
    <td><?php echo $queryku2['fgold']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fskor']; ?></td>

     <td><center><a href="edit_form_pm_maintenance.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_pm_maintenance.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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


<?php } else if($id == '14'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM PM QUALITY CONTROL</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_pm_qc.php?fid=14">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
	<th><center>No</center></th>
	<th><center>Level</center></th>
	<th colspan="2"><center>Item</center></th>
	<th width="20%"><center>Evaluasi</center></th>
	<th><center>Description</center></th>
	<th><center>Skor</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_pm_qc");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_pm_qc order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
	<td><?php echo $queryku2['flevel']; ?></td>
	<td><?php echo $queryku2['fitem1']; ?></td>
	<td><?php echo $queryku2['fitem2']; ?></td>
	<td><?php echo $queryku2['feva']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fskor']; ?></td>

     <td><center><a href="edit_form_pm_qc.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_pm_qc.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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

<?php } else if($id == '15'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM PM TEST</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_pm_test.php?fid=15">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
	<th><center>No</center></th>
	<th colspan="2"><center>Item</center></th>
	<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
	<th><center>Assessment criteria<br>＜Gold level＞</center></th>
	<th><center>Description</center></th>
	<th><center>Skor</center></th>
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_pm_test");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_pm_test order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
	<td><?php echo $queryku2['fitem1']; ?></td>
	<td><?php echo $queryku2['fitem2']; ?></td>
	<td><?php echo $queryku2['fsilver']; ?></td>
    <td><?php echo $queryku2['fgold']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
    <td><?php echo $queryku2['fskor']; ?></td>

     <td><center><a href="edit_form_pm_test.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_pm_test.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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


<?php } else if($id == '16'){ ?>



<div class="card shadow mb-4">
<hr/><center><legend>FORM PM TOOL</legend><hr /></center>
            <div class="card-header py-3">
              <a class="btn btn-success" href="add_form_pm_tool.php?fid=16">&nbsp;&nbsp;<i style="color:white !important;" class="fas fa-plus">&nbsp;&nbsp;</i></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
  <div id="dataTable_wrapper"> 
  <table class="table table-bordered dataTable" id="dataTable1" style="font-size:12px" width="100%" border="0" cellspacing="0">
    <thead>
    <tr class="data">
	<th><center>No</center></th>
	<th colspan="3"><center>Item</center></th>
	<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
	<th><center>Assessment criteria<br>＜Gold level＞</center></th>
	<th><center>Description</center></th>
	<th width="30%"><center>Evidence yg hrs di siapkan</center></th>
	<th><center>Skor</center></th>	
	<th></th>
    </tr>
    </thead>
    <tbody>

  <?php
  
  $queryku = mysqli_query($con, "select count(fid) as jml from t_form_pm_tool");
  while($queryku2=mysqli_fetch_array($queryku))
  {
  $jml = $queryku2['jml'];
  }
  
  if($jml > 0)
  {  
  $no = 1;
  $queryku = mysqli_query($con, "select * from t_form_pm_tool order by fid asc");
  while($queryku2=mysqli_fetch_array($queryku))
  {

  $fid = $queryku2['fid'];
  
  
  
  ?>
             
    <tr class="data">
   
    <td><?php echo $no; ?></td>
	<td><?php echo $queryku2['fitem1']; ?></td>
	<td><?php echo $queryku2['fitem2']; ?></td>
	<td><?php echo $queryku2['fitem3']; ?></td>
	<td><?php echo $queryku2['fsilver']; ?></td>
    <td><?php echo $queryku2['fgold']; ?></td>
    <td><?php echo $queryku2['fdesc']; ?></td>
	<td><?php echo $queryku2['fevi']; ?></td>
    <td><?php echo $queryku2['fskor']; ?></td>

     <td><center><a href="edit_form_pm_tool.php?fid=<?php echo $fid; ?>" class="btn btn-primary btn-sm"><i  style="color:white !important;" class="fas fa-edit"></i></a><br><br><a href="#" onclick="delfunct<?php echo $fid; ?>()" class="btn btn-danger btn-sm">&nbsp;<i  style="color:white !important;" class="fas fa-times"></i>&nbsp;</a></center></td>
    </tr>
    
    <script>function delfunct<?php echo $fid; ?>() {if (confirm("Are you sure to delete this data ?") == true) { window.open("delete_form_pm_tool.php?fid=<?php echo $fid; ?>", "_self"); } else {} }</script>

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


<?php } ?>
 
<?php include('includes/footer.php'); ?>    










