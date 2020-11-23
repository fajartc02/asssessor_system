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
$searchku = "select * from t_form_pm_assy where fid = '$fidku'";

//datatables bang sandy 
$no = 1;
$queryku = mysqli_query($con, $searchku);
while($queryku2=mysqli_fetch_array($queryku))
{

    $fitem1 = $queryku2["fitem1"];
	$fitem2 = $queryku2["fitem2"];
    $fsilver = $queryku2["fsilver"];
    $fgold = $queryku2["fgold"];
    $fdesc = $queryku2["fdesc"];
	$fskor = $queryku2["fskor"];
   
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
  <center><legend>Edit Form PM Assy</legend><hr /></center>

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
  <textarea class="form-control" name="fitem1"><?php echo $fitem1; ?></textarea>
</td>
</tr>

<tr>
<td width="10%" valign="top">Item</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fitem2"><?php echo $fitem2; ?></textarea>
</td>
</tr>

<tr>
<td valign="top">Silver</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fsilver"><?php echo $fsilver; ?></textarea>
</td>
</tr>

<tr>
<td valign="top">Gold</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fgold"><?php echo $fgold; ?></textarea>
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
  <select name="fskor" class="js-example-basic-single form-control" id="fskor" >
<option value="">-pilih-</option>
<?php
for($x = 0; $x <= 10; $x++ )
  {
  $sele = "";
  if($x == $fskor){ $sele = "selected"; } 
  
?>
<option value="<?php echo $x; ?>" <?php echo $sele; ?>><?php echo $x; ?></option>

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
<button type="submit" name="submit" class="btn btn-success btn-lg">Update</button>
</center>
</form>
<br /><br />

</div>


<?php
if (isset($_POST['submit']))
{
	
	$fid = $_POST["fid"];
    $fitem1 = $_POST["fitem1"];
	$fitem2 = $_POST["fitem2"];
    $fsilver = $_POST["fsilver"];
	$fgold = $_POST["fgold"];
    $fdesc = $_POST["fdesc"];
    $fskor = $_POST["fskor"];

       

    

    mysqli_query($con, "update t_form_pm_assy set fitem1 = '$fitem1', fitem2 = '$fitem2', fsilver = '$fsilver', fgold = '$fgold', fdesc = '$fdesc', fskor = '$fskor', fdate_modified = now() where fid = '$fid'");        

  echo "<script>window.location='edit_form_3pillars.php?id=9'</script>";    

}
?>


  

</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    

