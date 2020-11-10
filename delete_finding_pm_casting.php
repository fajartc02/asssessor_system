<?php session_start(); ?>
<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>




<?php


$fidx = $_GET['fid'];
$fid_score = $_GET['fidscore'];

$fid_plan = $_GET['fidplan'];

$findingx = $_GET['finding'];

$fid_check = $_GET['fidcheck'];


$queryku = mysqli_query($con, "select * from t_schedule_pm where fid = '$fidx'");
while($queryku2=mysqli_fetch_array($queryku))
{
	$flinex = $queryku2['fline'];
	$fworsitex = $queryku2['fworsite'];
	$fjobas = $queryku2['fjobas'];
}

$queryz = mysqli_query($con, "delete from t_finding_pm where fid = '$findingx'");

		if($fjobas == 'Assessor'){
		echo "<script>window.location='cek_assessor_pm_casting.php?fid=$fidx&fafteredit=1&fid_score=$fid_score'</script>";
		}else if($fjobas == 'Section Head'){
		echo "<script>window.location='cek_levelup_pm_casting.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan'</script>";
		}else if($fjobas == 'Manager'){
		echo "<script>window.location='cek_levelup_pm_casting.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan'</script>";
		}else if($fjobas == 'Manager Cross'){
		echo "<script>window.location='cek_levelup_pm_casting.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan'</script>";
		}else if($fjobas == 'Division'){
		echo "<script>window.location='cek_board_pm_casting.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan&fid_check=$fid_check'</script>";
		}

?>

