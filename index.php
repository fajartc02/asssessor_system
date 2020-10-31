<?php ob_start(); ?>
<?php
session_start();
 header('Cache-control: private');
    if(!empty($_SESSION['username']))
    {
	echo "<script>window.location='home.php'</script>";
    }else{
		echo "<script>window.location='login.php'</script>";
	}
   
?>


