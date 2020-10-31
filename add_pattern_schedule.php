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

$active_dashboard = "active";
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
  <center><legend>Add Pattern Schedule</legend><hr /></center>

<div class="container">
<div class="row">
<div class="col-md-4"> 
<form action="" method="post" >
<table width="100%" cellpadding="10">
<tr>
<td valign="top">Nama</td>
<td valign="top">:</td>
<td>
  
   <select name="fname" class="js-example-basic-single form-control" id="fname"  required="required">
<option value="">-pilih-</option>
<?php
$querykuaa = mysqli_query($con, "select distinct fname from t_users where fname <> ''");
  while($querykuaa22=mysqli_fetch_array($querykuaa))
  {
  $fname = $querykuaa22['fname'];
  

  
?>
<option value="<?php echo $fname; ?>"><?php echo $fname; ?></option>
<?php
}
?>
</select>
</td>
</tr>

<tr>
<td>Fline</td>
<td>:</td>
<td>
  <select name="fline" class="js-example-basic-single form-control" id="fline"  required="required">
<option value="">-pilih-</option>
<?php
$querykuaa = mysqli_query($con, "select distinct fline from t_pattern_schedule where fline <> ''");
  while($querykuaa22=mysqli_fetch_array($querykuaa))
  {
  $fline = $querykuaa22['fline'];
  

  
?>
<option value="<?php echo $fline; ?>"><?php echo $fline; ?></option>
<?php
}
?>
</select>

</td>
</tr>
<tr>
<td>Worsite</td>
<td>:</td>
<td>
  <select name="fworsite" class="js-example-basic-single form-control" id="fworsite" required="required">
<option value="">-pilih-</option>
<?php
$querykuaa = mysqli_query($con, "select distinct fworsite from t_pattern_schedule where fworsite <> ''");
  while($querykuaa22=mysqli_fetch_array($querykuaa))
  {
  $fworsite = $querykuaa22['fworsite'];
  

  
?>
<option value="<?php echo $fworsite; ?>"><?php echo $fworsite; ?></option>
<?php
}
?>
</select>

</td>
<tr>
<td>Job Title</td>
<td>:</td>
<td>
  <select name="fjobas" class="js-example-basic-single form-control"  id="fjobas" required="required">
<option value="">-pilih-</option>
<?php
$querykuaa = mysqli_query($con, "select distinct fjobas from t_pattern_schedule where fjobas <> ''");
  while($querykuaa22=mysqli_fetch_array($querykuaa))
  {
  $fjobas = $querykuaa22['fjobas'];
  

  
?>
<option value="<?php echo $fjobas; ?>"><?php echo $fjobas; ?></option>
<?php
}
?>
</select>

</td>
</tr>
<tr>
<td>Tipe Pilar</td>
<td>:</td>
<td>
  <select name="ftype_pillar" class="js-example-basic-single form-control" id="ftype_pillar"  required="required">
<option value="">-pilih-</option>
<?php
$querykuaa = mysqli_query($con, "select distinct ftype_pillar from t_pattern_schedule where ftype_pillar <> ''");
  while($querykuaa22=mysqli_fetch_array($querykuaa))
  {
  $ftype_pillar = $querykuaa22['ftype_pillar'];
  

  
?>
<option value="<?php echo $ftype_pillar; ?>"><?php echo $ftype_pillar; ?></option>
<?php
}
?>
</select>

</td>
</tr>

<tr>
<td>Date</td>
<td>:</td>
<td>
<input type="text" name="fdate_modified" id="datetwo" class="form-control" value="" required />
</td>
</tr>
</table>

</div>

<div class="col-md-6">



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
    $fname = $_POST["fname"];

    $fnoreg = '';
    $carinoreg = mysqli_query($con, "select fnoreg from t_users where fname = '$fname'");
  while($carinoreg2=mysqli_fetch_array($carinoreg))
  {
  $fnoreg = $carinoreg2['fnoreg'];
  }
    $fline = $_POST["fline"];
    $fworsite = $_POST["fworsite"];
    $fjobas = $_POST["fjobas"];
    $ftype_pillar = $_POST["ftype_pillar"];
    $fdate_modified = $_POST["fdate_modified"];


    
    ///echo "insert into t_pattern_schedule (fname, fnoreg, fline, fworsite, fjobas, ftype_pillar, fdate_modified) values ('$fname', '$fnoreg', '$fline', '$fworsite', '$fjobas', '$ftype_pillar', '$fdate_modified'";        
    
    mysqli_query($con, "insert into t_pattern_schedule (fname, fnoreg, fline, fworsite, fjobas, ftype_pillar, fdate_modified) values ('$fname', '$fnoreg', '$fline', '$fworsite', '$fjobas', '$ftype_pillar', '$fdate_modified')");
          

  echo "<script>window.location='pattern_schedule.php'</script>";    

}
?>


  

</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    

<script>
 $(document).ready(function() {
     $('#fname').select2({
      placeholder: 'Nama',
      allowClear: true
     });

     $('#fline').select2({
      placeholder: 'Line',
      allowClear: true
     });  

     $('#ftype_pillar').select2({
      placeholder: 'Tipe',
      allowClear: true
     });

      $('#fjobas').select2({
      placeholder: 'Job Title',
      allowClear: true
     });

       $('#fworsite').select2({
      placeholder: 'Worsite',
      allowClear: true
     });


      
 });


</script>








