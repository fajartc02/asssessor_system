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

$fidku = $_GET["fid"];

$searchku = "";
$searchku = "select * from t_form_stw_qc where fid = '$fidku'";

//datatables bang sandy 
$no = 1;
$queryku = mysqli_query($con, $searchku);
while($queryku2=mysqli_fetch_array($queryku))
{

    $fitem = $queryku2["fitem"];
    $fdesc = $queryku2["fdesc"];
	$fscore = $queryku2["fscore"];
	$fpenj = $queryku2["fpenj"];
	$flevel = $queryku2["flevel"];
   
}           


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
  <center><legend>Edit Form STW Quality Control </legend><hr /></center>

<div class="container">
<div class="row">
<div class="col-md-12"> 
<form action="" method="post" >
<input type="hidden" name="fid" value="<?php echo $fidku; ?>">
<table width="100%" cellpadding="10">
<tr>
<td width="10%" valign="top">Item</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fitem"><?php echo $fitem; ?></textarea>
</td>
</tr>

<tr>
<td valign="top">Deskripsi</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fdesc"><?php echo $fdesc; ?></textarea>
</td>
</tr>

<tr>
<td>Score</td>
<td>:</td>
<td>
  <select name="fscore" class="js-example-basic-single form-control" id="fscore" >
<option value="">-pilih-</option>
<?php
for($x = 0; $x <= 10; $x++ )
  {
  $sele = "";
  if($x == $fscore){ $sele = "selected"; } 
  
?>
<option value="<?php echo $x; ?>" <?php echo $sele; ?>><?php echo $x; ?></option>

<?php
}
?>
</select>

</td>
</tr>

<tr>
<td>Level</td>
<td>:</td>
<td>
  <select name="flevel" class="js-example-basic-single form-control" id="fscore" >
<option value="">-pilih-</option>
<?php
$queryku = mysqli_query($con, 'select distinct flevel from t_form_stw_qc');
while($queryku2=mysqli_fetch_array($queryku))
{

    $flevelx = $queryku2["flevel"];
  $sele = "";
  if($flevelx == $flevel){ $sele = "selected"; } 
  
?>
<option value="<?php echo $flevelx; ?>" <?php echo $sele; ?>><?php echo $flevelx; ?></option>

<?php
}
?>
</select>

</td>
</tr>

<tr>
<td valign="top">Penjelasan</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fpenj"><?php echo $fpenj; ?></textarea>
</td>
</tr>

</table>

</div>


    
</div>

<br />
<center>
<button type="submit" name="submit" class="btn btn-success btn-lg">Update</button>
</center>
</form>
<br /><br />

</div>


<?php
if (isset($_POST['submit']))
{
	
	$fid = $_POST["fid"];
    $fitem = $_POST["fitem"];
    $fdesc = $_POST["fdesc"];
    $fscore = $_POST["fscore"];
	$fpenj = $_POST["fpenj"];
	$flevel = $_POST["flevel"];

       

    

    mysqli_query($con, "update t_form_stw_qc set fitem = '$fitem', fdesc = '$fdesc', fscore = '$fscore', fpenj = '$fpenj', flevel = '$flevel', fdate_modified = now() where fid = '$fid'");        

  echo "<script>window.location='edit_form_3pillars.php?id=7'</script>";    

}
?>


  

</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    

