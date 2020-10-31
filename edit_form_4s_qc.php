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
$searchku = "select * from t_form_4s_qc where fid = '$fidku'";

//datatables bang sandy 
$no = 1;
$queryku = mysqli_query($con, $searchku);
while($queryku2=mysqli_fetch_array($queryku))
{

    $fjudul1 = $queryku2["fjudul1"];
    $fjudul2 = $queryku2["fjudul2"];
    $fitem = $queryku2["fitem"];
    $fno = $queryku2["fno"];
    $fkonten = $queryku2["fkonten"];
    $fhasil = $queryku2["fhasil"];
	
	

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
  <center><legend>Edit Form 4S</legend><hr /></center>

<div class="container">
<div class="row">
<div class="col-md-12"> 
<form action="" method="post" >

<input type="hidden" name="fid" value="<?php echo $fidku; ?>">
<table width="100%" cellpadding="10">
<tr>
<td width="10%" valign="top">Judul 1</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fjudul1"><?php echo $fjudul1; ?></textarea>
</td>
</tr>

<tr>
<td valign="top">Judul 2</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fjudul2"><?php echo $fjudul2; ?></textarea>
</td>
</tr>


<tr>
<td valign="top">Item Evaluasi</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fitem"><?php echo $fitem; ?></textarea>
</td>
</tr>


<tr>
<td>No</td>
<td>:</td>
<td>
  <select name="fno" class="js-example-basic-single form-control" id="fno" >
<option value="">-pilih-</option>
<?php
for($x = 0; $x <= 10; $x++ )
  {
  $sele = "";
  if($x == $fno){ $sele = "selected"; } 
  
?>
<option value="<?php echo $x; ?>" <?php echo $sele; ?>><?php echo $x; ?></option>

<?php
}
?>
</select>

</td>
</tr>

<tr>
<td valign="top">Konten Evaluasi</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fkonten"><?php echo $fkonten; ?></textarea>
</td>
</tr>

<tr>
<td>Hasil Evaluasi</td>
<td>:</td>
<td>
  <select name="fhasil" class="js-example-basic-single form-control" id="fhasil" >
<option value="">-pilih-</option>
<?php
for($x = 0; $x <= 10; $x++ )
  {
  $sele = "";
  if($x == $fhasil){ $sele = "selected"; } 
  
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
<button type="submit" name="submit" class="btn btn-success btn-lg">Save</button>
</center>
</form>
<br /><br />

</div>


<?php
if (isset($_POST['submit']))
{
	$fid = $_POST["fid"];
    $fjudul1 = $_POST["fjudul1"];
    $fjudul2 = $_POST["fjudul2"];
    $fitem = $_POST["fitem"];
    $fno = $_POST["fno"];
    $fkonten = $_POST["fkonten"];
    $fhasil = $_POST["fhasil"];
   
            

 	mysqli_query($con, "update t_form_4s_qc set fjudul1 = '$fjudul1', fjudul2 = '$fjudul2', fitem = '$fitem', fno = '$fno', fkonten = '$fkonten', fhasil = '$fhasil', fdate_modified = now() where fid = '$fid'");  

	
  echo "<script>window.location='edit_form_3pillars.php?id=3'</script>";    

}
?>


  

</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    

