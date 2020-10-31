<?php 
session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php


?>
 

<?php
$fid = $_GET['fid'];

$query_delete_satu = mysqli_query($con, "delete from t_pattern_schedule where fid = '$fid'"); 	
 
 if($query_delete_satu){ 
	echo "<script>
	alert('Delete is successfully!');
	window.location='pattern_schedule.php';
	</script>";
}else{
	echo "<script>
	alert('Delete is failed!');
	window.location='pattern_schedule.php';
	</script>";
}

	
		
?>