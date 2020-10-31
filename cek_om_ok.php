<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>


<?php

$no = 1;
$idscore = $_POST['idscore'];
$idschedule = $_POST['idschedule'];
$idplan = $_POST['idplan'];

$tableku = "<center><legend>List Temuan</legend></center>";

$tableku .= "<table id='example' style='font-size:12px' class='table table-bordered' border='0' cellspacing='0' width='100%'>
	<thead>
	<tr class='data'>

	<th width='5%'>No</th>
	<th width='10%'>Nama</th>
	<th width='15%'>Foto Temuan</th>
	<th width='40%'>Temuan </th>
	<th width='30%'>Date </th>
	
	</tr>
	</thead>
	<tbody>";


$queryku = mysqli_query($con, "select t_finding_om.fphoto, t_finding_om.fnote, t_finding_om.fdate_modified as tgl, t_schedule_om.* from t_finding_om join t_schedule_om on t_finding_om.fid_schedule =  t_schedule_om.fid where t_finding_om.fid_schedule in ($idschedule,$idplan) and t_finding_om.fid_score = '$idscore' order by t_finding_om.fdate_modified desc");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fphotox = $queryku2['fphoto']; 
	$fnotex = $queryku2['fnote']; 
  $fnamex = $queryku2['fname']; 
  $ftglx = $queryku2['tgl']; 


    $tableku .= "<tr>
			<td>$no</td>
			
			<td>$fnamex</td>
			<td><img style='width:100px;' src='images/temuanOM/".$fphotox."' /></td>
			<td>";
	
	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnotex</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 
   
    
    $tableku .= "$xml->body</td><td>$ftglx</td></tr>";

$no++;

}
 
$tableku .= "</tbody></table>";


echo $tableku;

?>


