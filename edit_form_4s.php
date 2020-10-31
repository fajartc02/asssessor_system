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
$searchku = "select * from t_form_4s where fid = '$fidku'";

//datatables bang sandy 
$no = 1;
$queryku = mysqli_query($con, $searchku);
while($queryku2=mysqli_fetch_array($queryku))
{

    $fjudul = $queryku2["fjudul"];
    $fpoint = $queryku2["fpoint"];
    $fscore = $queryku2["fscore"];
    $fverybad = $queryku2["fverybad"];
    $fbad = $queryku2["fbad"];
    $fnormal = $queryku2["fnormal"];
    $fgood = $queryku2["fgood"];
	$fverygood = $queryku2["fverygood"];

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
<td width="10%" valign="top">Judul</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fjudul"><?php echo $fjudul; ?></textarea>
</td>
</tr>

<tr>
<td valign="top">Point</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fpoint"><?php echo $fpoint; ?></textarea>
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
<td valign="top">Very Bad</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fverybad"><?php echo $fverybad; ?></textarea>
</td>
</tr>


<tr>
<td valign="top">Bad</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fbad"><?php echo $fbad; ?></textarea>
</td>
</tr>

<tr>
<td valign="top">Normal</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fnormal"><?php echo $fnormal; ?></textarea>
</td>
</tr>

<tr>
<td valign="top">Good</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fgood"><?php echo $fgood; ?></textarea>
</td>
</tr>

<tr>
<td valign="top">Verry Good</td>
<td valign="top">:</td>
<td>
  <textarea class="form-control" name="fverygood"><?php echo $fverygood; ?></textarea>
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
    $fjudul = $_POST["fjudul"];
    $fpoint = $_POST["fpoint"];
    $fscore = $_POST["fscore"];
    $fverybad = $_POST["fverybad"];
    $fbad = $_POST["fbad"];
    $fnormal = $_POST["fnormal"];
    $fgood = $_POST["fgood"];
	$fverygood = $_POST["fverygood"];   
            

    

    mysqli_query($con, "update t_form_4s set fjudul = '$fjudul', fpoint = '$fpoint', fscore = '$fscore', fverybad = '$fverybad', fbad = '$fbad', fnormal = '$fnormal', fgood = '$fgood',fverygood = '$fverygood', fdate_modified = now() where fid = '$fid'");        

  echo "<script>window.location='edit_form_3pillars.php?id=1'</script>";    

}
?>


  

</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    

