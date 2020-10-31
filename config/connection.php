<?php //error_reporting(0);?>
<?php
	
    require ('constants.php');
    
   
	$con=mysqli_connect(DB_SERVER,DB_USER,DB_PWD,DB_NAME);

	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}

?>