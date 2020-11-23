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
  <center><legend>Add Form PM Quality Control</legend><hr /></center>

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
  <textarea class="form-control" name="fitem1"></textarea>
</td>
</tr>

<tr>
<td width="10%" valign="top">Item</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fitem2"></textarea>
</td>
</tr>

<tr>
<td valign="top">Evaluasi</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="feva"></textarea>
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




<tr>
<td>Level</td>
<td>:</td>
<td>
  <select name="flevel" class="js-example-basic-single form-control" required="required" >
<option value="">-pilih-</option>
<?php
$searchku = "select distinct flevel from t_form_pm_qc";

//datatables bang sandy 
$queryku = mysqli_query($con, $searchku);
while($queryku2=mysqli_fetch_array($queryku))
{

    $flevel = $queryku2["flevel"];
   
  
?>
<option name="flevel" value="<?php echo $flevel; ?>"><?php echo $flevel; ?></option>

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
	
    $fitem1 = $_POST["fitem1"];
	$fitem2 = $_POST["fitem2"];
    $feva = $_POST["feva"];
    $fskor = $_POST["fskor"];
    $fdesc = $_POST["fdesc"];
	$flevel = $_POST["flevel"];
   
      

    

    mysqli_query($con, "insert into t_form_pm_qc (fitem1, fitem2, feva, fdesc, fskor, flevel, fdate_modified) values ('$fitem1', '$fitem2', '$feva', '$fdesc', '$fskor', '$flevel',now())");

	
  echo "<script>window.location='edit_form_3pillars.php?id=".$fidku."'</script>";    

}
?>


  

</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    

