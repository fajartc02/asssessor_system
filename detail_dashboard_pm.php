<?php session_start(); ?>
<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>







<?php

$no = 1;
$fidschedule = $_POST['fidschedule'];
$fnoreg = $_POST['fnoreg'];
$ses_noreg = $_SESSION['fnoreg'];

$cek_sh = "";
$cek_mgr = "";
$cek_cross = "";
$cek_div = "";

$regsh = mysqli_query($con, "select * from t_schedule_pm where fid_pd = '$fidschedule' and fjobas = 'Section Head'");
while($regsh2=mysqli_fetch_array($regsh))
{
	$cek_sh = $regsh2['fnoreg'];
}


$regmgr = mysqli_query($con, "select * from t_schedule_pm where fid_pd = '$fidschedule' and fjobas = 'Manager'");
while($regmgr2=mysqli_fetch_array($regmgr))
{
	$cek_mgr = $regmgr2['fnoreg'];
}


$regcross = mysqli_query($con, "select * from t_schedule_pm where fid_pd = '$fidschedule' and fjobas = 'Manager Cross'");
while($regcross2=mysqli_fetch_array($regcross))
{
	$cek_cross = $regcross2['fnoreg'];
}

$regdiv = mysqli_query($con, "select * from t_schedule_pm where fid_pd = '$fidschedule' and fjobas = 'Division'");
while($regdiv2=mysqli_fetch_array($regdiv))
{
	$cek_div = $regdiv2['fnoreg'];
}




$tableku = "<center><legend>List Temuan</legend></center>";

$tableku .= "<table class='table table-bordered dataTable' id='dataTable' style='font-size:12px' border='0' cellspacing='0' width='100%'>
	<thead>
	<tr class='data'>

	<th width='5%'>No</th>
	<th width='5%'>Id</th>
	<th width='30%'>Date </th>
	<th width='25%'>Description </th>
	<th width='20%'>Ilustration </th>
	<th width='10%'>Status</th>
	<th width='10%'></th>
	
	
	
	</tr>
	</thead>
	<tbody>";


$queryz = mysqli_query($con, "select * from t_finding_pm where fgroup ='$fidschedule' order by fid DESC");
while($queryz2=mysqli_fetch_array($queryz))
{
	$fid = $queryz2['fid'];
	$fphoto = $queryz2['fphoto'];
	$fnote = $queryz2['fnote'];
	$fdate_modified = $queryz2['fdate_modified'];
	$fstatus = $queryz2['fstatus'];
	
	
		if($cek_sh == $ses_noreg){
			$test = "<button class='btn btn-primary' style='font-size: 9px'  onclick='mySolving($fid)' >On Solving</button><button class='btn btn-success' onclick='myFunction($fid)' style='font-size: 9px'>Solved</button>";
		}else  if($cek_mgr == $ses_noreg){
			$test = "<button class='btn btn-primary' style='font-size: 9px'  onclick='mySolving($fid)' >On Solving</button><button class='btn btn-success' onclick='myFunction($fid)' style='font-size: 9px'>Solved</button>";
		}else  if($cek_cross == $ses_noreg){
			$test = "<button class='btn btn-primary' style='font-size: 9px'  onclick='mySolving($fid)' >On Solving</button><button class='btn btn-success' onclick='myFunction($fid)' style='font-size: 9px'>Solved</button>";
		}else  if($cek_div == $ses_noreg){
			$test = "<button class='btn btn-primary' style='font-size: 9px'  onclick='mySolving($fid)' >On Solving</button><button class='btn btn-success' onclick='myFunction($fid)' style='font-size: 9px'>Solved</button>";
		}else  if($ses_noreg == $fnoreg){
			$test = "<button class='btn btn-primary' style='font-size: 9px'  onclick='mySolving($fid)' >On Solving</button><button class='btn btn-success' onclick='myFunction($fid)' style='font-size: 9px'>Solved</button>";
		}else{
			$test = "<button class='btn btn-primary' style='font-size: 9px' disabled >On Solving</button><button class='btn btn-success' disabled style='font-size: 9px'>Solved</button>";
		}
	

	if($fphoto != ''){
		$foto = "<td><img style='width:100px;' src='images/temuanPM/".$fphoto."' /></td>";
	}else{
		$foto = '<td></td>';
	}


	if($fstatus == '0'){
		$fstatus = "On Solving";
	}else{
		$fstatus = 'Solved';
	}



    $tableku .= "<tr>
			<td>$no</td>
			<td>$fid</td>

			
			<td>$fdate_modified</td>
			
			<td>";
	
	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnote</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 
   
    
    $tableku .= "$xml->body</td>$foto<td><p id='oke".$fid."'>$fstatus</p></td>";
	
	$tableku .= "<td>$test</td>";
	

$no++;

}
 



echo $tableku;

?>





<script>
function open_modal(){
	alert("rF");
	/*
    var user = document.getElementById('user').value; 
	var password = document.getElementById('password').value;	
    var dataString = "user="+user+"&password="+password; 
    alert(dataString);

    $.ajax({
    type: 'POST',
    data: dataString,
    url: 'proc_solve.php',       
    success: function(htmlx) {
      var myStr = htmlx;
      document.getElementById('ket').innerHTML = htmlx;
    }
    
    });
*/
}
</script>