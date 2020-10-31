<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>


<?php

$no = 1;
$idschedule = $_POST['idschedule'];
$idscore = $_POST['idscore'];

$tableku = "<center><legend>List Temuan</legend></center>";

$tableku .= "<table id='example' style='font-size:12px' class='table table-bordered' border='0' cellspacing='0' width='100%'>
	<thead>
	<tr class='data'>

	<th width='10%'>No</th>
	<th width='20%'>Foto Temuan </th>
	<th width='40%'>Temuan </th>
	<th width='30%'>Date </th>
	
	</tr>
	</thead>
	<tbody>";


$queryku = mysqli_query($con, "select * from t_finding_om where fid_schedule = '$idscore' and fid_score='$idschedule' order by fid DESC");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fphoto = $queryku2['fphoto'];
	$fnote = $queryku2['fnote'];
	$fdate_modified = $queryku2['fdate_modified'];


    $tableku .= "<tr>
			<td>$no</td>
			<td><img style='width:100px;' src='images/temuanOM/".$fphoto."' /></td>
			<td>";
	
	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnote</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 
   
    
    $tableku .= "$xml->body</td><td>$fdate_modified</td></tr>";

$no++;

}
 
$tableku .= "</tbody></table>";


echo $tableku;

?>

