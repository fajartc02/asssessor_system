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
  
  img :hover{
		background-color : red;
	  
  }	  
</style>


<?php include('includes/header.php'); ?>


<!-- Begin Page Content -->
<div class="container-fluid p-1">

<div class="card shadow">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-dark">Menu <?php echo $noflag; ?></h6>
    </div>
    <div class="card-body p-1">
      <div class="d-flex justify-content-between row">
        <div class="col-6">
          <div class="card card-menu active-hover shadow-none">
            <div class="d-flex justify-content-center card-body p-0">
              <a href="index_form.php?form=4s"><img src="./images/4s_menu_2.gif" alt="menu4s" class="menu" width="100%" height="300"></a>
            </div>
            <div class="d-flex justify-content-center card-header p-0 active-hover">
              4S
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card card-menu active-hover shadow-none">
            <div class="d-flex justify-content-center card-body p-0">
               <a href="index_form.php?form=om"><img src="./images/om_menu_gif.jpg" alt="menu4s" class="menu" width="100%" height="300"></a>
            </div>
            <div class="d-flex justify-content-center card-header p-0 active-hover">
              OM
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card card-menu active-hover shadow-none">
            <div class="d-flex justify-content-center card-body p-0">
               <a href="index_form.php?form=stw"><img src="./images/stw_menu.gif" alt="menu4s" class="menu" width="100%" height="300"></a>
            </div>
            <div class="d-flex justify-content-center card-header p-0 active-hover">
              STW
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card card-menu active-hover shadow-none" >
            <div class="d-flex justify-content-center card-body p-0">
               <a href="index_form.php?form=pm"><img src="./images/point_mgmt.gif" alt="menu4s" class="menu" width="100%" height="300"></a>
            </div>
            <div class="d-flex justify-content-center card-header p-0 active-hover">
              PM
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    










