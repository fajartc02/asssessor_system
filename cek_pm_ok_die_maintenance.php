<?php session_start(); ?>
<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>


<?php

$ses_noreg = $_SESSION['fnoreg'];

$no = 1;
$idschedule = $_POST['idschedule'];
$idscore = $_POST['idscore'];

$tableku = "<center><legend>List Temuan</legend></center>";

$tableku .= "<table id='example' style='font-size:12px' class='table table-bordered' border='0' cellspacing='0' width='100%'>
	<thead>
	<tr class='data'>

	<th width='10%'>No</th>
	<th width='20%'>Foto Temuan </th>
	<th width='30%'>Temuan </th>
	<th width='30%'>Date </th>
	<th width='10%'> </th>
	
	</tr>
	</thead>
	
	<tbody>";
	
$fidscorex = $idscore;	


$queryku = mysqli_query($con, "select * from t_finding_pm where fgroup = '$idschedule' and fid_score='$idscore' order by fid DESC");
while($queryku2=mysqli_fetch_array($queryku))
{
	$finding = $queryku2['fid']; 
	$fid = $queryku2['fid_schedule']; 
	$fphoto = $queryku2['fphoto'];
	$fnote = $queryku2['fnote'];
	$fdate_modified = $queryku2['fdate_modified'];
	
	$query = mysqli_query($con, "select * from t_schedule_pm where fid = '$fid'");
	while($query2=mysqli_fetch_array($query))
	{
		$fnoregxx = $query2['fnoreg'];	
	}	
	
	if($fnoregxx == $ses_noreg){
			$test = "<a href='update_finding_pm_die_maintenance.php?fid=$fid&finding=$finding&fidscore=$fidscorex' class='btn btn-primary' style='font-size: 9px' >Update</a><br/><br/><a href='delete_finding_pm_die_maintenance.php?fid=$fid&finding=$finding&fidscore=$fidscorex&fidplan=0&fidcheck=0' onclick=\"return confirm('Apakah Anda Ingin Menghapus Data Ini ?');\" style='font-size: 9px' class='btn btn-danger text-center' data-popup='tooltip' data-placement='top' title='Hapus Data'>DELETE</a>";
		}else {
			$test = "";
		}


    $tableku .= "<tr>

			<td>$no</td>
			<td><img style='width:100px;' src='images/temuanPM/".$fphoto."' /></td>
			<td>";
	
	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnote</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 
   
    
    $tableku .= "$xml->body</td><td>$fdate_modified</td><td>$test</td></tr>";

$no++;

}
 
$tableku .= "</tbody></table>";


echo $tableku;

?>


