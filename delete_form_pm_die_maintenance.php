<?php 
session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php


?>
 

<?php
$fid = $_GET['fid'];

$query_delete_satu = mysqli_query($con, "delete from t_form_pm_die_maintenance where fid = '$fid'"); 	
 
 if($query_delete_satu){ 
	echo "<script>
	alert('Delete is successfully!');
	window.location='edit_form_3pillars.php?id=11';
	</script>";
}else{
	echo "<script>
	alert('Delete is failed!');
	window.location='edit_form_3pillars.php?id=11';
	</script>";
}

	
		
?>