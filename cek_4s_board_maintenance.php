<?php session_start(); ?>
<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>


<?php

$ses_noreg = $_SESSION['fnoreg'];

$no = 1;
$idscore = $_POST['idscore'];
$idschedule = $_POST['idschedule'];
$idplan = $_POST['idplan'];
$idcheck = $_POST['idcheck'];


$tableku = "<center><legend>List Temuan</legend></center>";

$tableku .= "<table id='example' style='font-size:12px' class='table table-bordered' border='0' cellspacing='0' width='100%'>
	<thead>
	<tr class='data'>

	<th width='5%'>No</th>
	<th width='10%'>Nama</th>
	<th width='15%'>Foto Temuan</th>
	<th width='30%'>Temuan </th>
	<th width='30%'>Date </th>
	<th width='10%'></th>
	
	</tr>
	</thead>
	<tbody>";
	
	
$fidscorex = $idscore;	
$fidplanx = $idplan;
$fidcheckx = $idcheck;


$queryku = mysqli_query($con, "select t_finding_4s.fid as finding, t_finding_4s.fnote,  t_finding_4s.fphoto, t_finding_4s.fdate_modified as tgl, t_schedule_4s.* from t_finding_4s join t_schedule_4s on t_finding_4s.fid_schedule =  t_schedule_4s.fid where t_finding_4s.fgroup = '$idplan' and t_finding_4s.fid_score = '$idscore' order by t_finding_4s.fdate_modified desc");
while($queryku2=mysqli_fetch_array($queryku))
{

	$fid = $queryku2['fid']; 
	$finding = $queryku2['finding']; 
	$fnoregxx = $queryku2['fnoreg']; 
	$fphotox = $queryku2['fphoto']; 
	$fnotex = $queryku2['fnote']; 
  	$fnamex = $queryku2['fname']; 
  	$ftglx = $queryku2['tgl']; 
	
	if($fnoregxx == $ses_noreg){
			$test = "<a href='update_finding_4s_maintenance.php?fid=$fid&finding=$finding&fidscore=$fidscorex&fidplan=$fidplanx&fidcheck=$fidcheckx' class='btn btn-primary' style='font-size: 9px' >Update</a><br/><br/><a href='delete_finding_4s_maintenance.php?fid=$fid&finding=$finding&fidscore=$fidscorex&fidplan=$fidplanx&fidcheck=$fidcheckx' onclick=\"return confirm('Apakah Anda Ingin Menghapus Data Ini ?');\" style='font-size: 9px' class='btn btn-danger text-center' data-popup='tooltip' data-placement='top' title='Hapus Data'>DELETE</a>";
		}else {
			$test = "";
		}


    $tableku .= "<tr>
			<td>$no</td>	
		
			<td>$fnamex</td>
			<td><img style='width:100px;' src='images/temuan4s/".$fphotox."' /></td>
			<td>";
	
	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnotex</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 
   
    
    $tableku .= "$xml->body</td><td>$ftglx</td><td>$test</td></tr>";

$no++;

}
 
$tableku .= "</tbody></table>";


echo $tableku;

?>

