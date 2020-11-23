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
  <center><legend>Add Form PM Die Maintenance</legend><hr /></center>

<div class="container">
<div class="row">
<div class="col-md-12"> 
<form action="" method="post" >
<input type="hidden" name="fid" value="">
<table width="100%" cellpadding="10">
<tr>
<td width="10%" valign="top">Item</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fitem"></textarea>
</td>
</tr>

<tr>
<td valign="top">Silver</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fsilver"></textarea>
</td>
</tr>

<tr>
<td valign="top">Gold</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fgold"></textarea>
</td>
</tr>

<tr>
<td valign="top">Deskripsi</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fdesc"></textarea>
</td>
</tr>

<tr>
<td>Score</td>
<td>:</td>
<td>
  <select name="fskor" class="js-example-basic-single form-control" required="required" >
<option value="">-pilih-</option>
<?php
for($x = 0; $x <= 10; $x++ )
  {
?>
<option name="fskor" value="<?php echo $x; ?>"><?php echo $x; ?></option>

<?php
}
?>
</select>

</td>
</tr>

</table>

</div>


    
</div>

<br />
<center>
<button type="submit" name="submit" class="btn btn-success btn-lg">Save</button>
</center>
</form>
<br /><br />

</div>


<?php
if (isset($_POST['submit']))
{
	
	$fitem = $_POST["fitem"];
    $fsilver = $_POST["fsilver"];
	$fgold = $_POST["fgold"];
    $fskor = $_POST["fskor"];
    $fdesc = $_POST["fdesc"];
   
    mysqli_query($con, "insert into t_form_pm_die_maintenance (fitem, fsilver, fgold, fdesc, fskor, fdate_modified) values ('$fitem', '$fsilver', '$fgold', '$fdesc', '$fskor', now())");

	
  echo "<script>window.location='edit_form_3pillars.php?id=".$fidku."'</script>";    

}
?>


  

</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    

