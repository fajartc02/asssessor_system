<?php session_start(); ?>
<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>




<?php


$fidx = $_POST['fid'];


$queryz = mysqli_query($con, "update t_finding_4s set fstatus = '0' where fid = '$fidx'");


echo $status;

?>

