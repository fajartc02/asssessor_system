<?php session_start(); ?>
<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>
<?php

$noreg = $_POST['fnoreg'];
$password = md5($_POST['fpassword']);


$q = "SELECT * FROM t_users WHERE fnoreg = '$noreg' AND fpassword = '$password'";
$sql_query = mysqli_query($con, $q);
$result = mysqli_fetch_array($sql_query);

$queryku = mysqli_query($con, "SELECT * FROM t_users WHERE fnoreg = '$noreg' AND fpassword = '$password'");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fname = $queryku2['fname'];
	$fnoreg = $queryku2['fnoreg'];
	$flevel = $queryku2['flevel'];
	
}




if(empty($result))
{ 
   echo "<script>alert('Username or Password Invalid');window.location='login.php'</script>";
}
else
{
    $_SESSION['fname'] = $fname;
	$_SESSION['fnoreg'] = $fnoreg;
	$_SESSION['flevel'] =  $flevel; 
	
		echo "<script>window.location='home.php'</script>";    
}
	



?>