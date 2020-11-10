<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form assesor";

$active_dashboard = "";
$active_4s = "active";
$active_stw = "";
$active_pm = "";
$active_om = "";

$fid = $_GET['fid'];

$queryku = mysqli_query($con, "select farray_value from t_schedule_4s where fid = '$fid'");
while($queryku2=mysqli_fetch_array($queryku))
{
	$farray_valuenye = $queryku2['farray_value'];
}



include 'cek_jml_4s.php';



$vale = explode(";",$farray_valuenye);


	$ss = mysqli_query($con, "select count(fid) as jml from t_form_4s_maintenance order by fid asc");
   while($ss2=mysqli_fetch_array($ss))
   {
	$jml_4s = $ss2['jml']; 
   }
    
	
	$sum_score = 0;

	for($i=0;$i<=$jml_4s;$i++){
		
	
		$sum_score += $vale[$i];
		
		
		//$sum_score += ${"val".$i."_"};
	}



$score = $sum_score;

/*
$score = $vale[0] + $vale[1] + $vale[2] + $vale[3] + $vale[4] + $vale[5] + $vale[6] + $vale[7] + $vale[8] + $vale[9] + $vale[10] + $vale[11] + $vale[12] + $vale[13] + $vale[14] + $vale[15] + $vale[16] + $vale[17] + $vale[18] + $vale[19] + $vale[20] + $vale[21] + $vale[22] + $vale[23] + $vale[24] + $vale[25] + $vale[26] + $vale[27] + $vale[28] + $vale[29] + $vale[30] + $vale[31] + $vale[32] + $vale[33] + $vale[34] + $vale[35] + $vale[36] + $vale[37] + $vale[38] + $vale[39] + $vale[40];
*/


 $scorex = mysqli_query($con, "select fscore from t_form_4s_maintenance order by fid asc limit 1");
   while($scorex2=mysqli_fetch_array($scorex))
   {
	$ts = $scorex2['fscore']; 
   }
   
   $ns = $jml_4s * $ts;
	


if($score > $ns){
	$score = $ns;
}

$score = round(($score / $ns) * 100);

$text_score = "";
if($score != ""){
$text_score = "Score : ".$score;
}			

?>





<?php include('includes/header.php'); 

		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
		// Include librari phpmailer
		include('assets/phpmailer/Exception.php');
		include('assets/phpmailer/PHPMailer.php');
		include('assets/phpmailer/SMTP.php');

?>

<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Begin Page Content -->
<div style="padding:5px">

<center><legend style="margin:-10px">Form 4S</legend></center>

<style>
 

table {
  margin: 1em 0;
  border-collapse: collapse;
  border: 0.1em solid #d6d6d6;
}

caption {
  text-align: left;
  font-style: italic;
  padding: 0.25em 0.5em 0.5em 0.5em;
}

th,
td {
  padding: 0.25em 0.5em 0.25em 1em;
  vertical-align: text-top;
  text-align: left;
}

th {
  vertical-align: bottom;
  background-color:#4287f5;
  color: #fff;
}




/* Fixed Headers */

th {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 2;
}

th[scope=row] {
  position: -webkit-sticky;
  position: sticky;
  left: 0;
  z-index: 1;
}


.btn-info{
  width: 80px !important;
  font-size: 10px;
}

  </style>

<div style="height:450px;overflow-y:scroll;" role="region" aria-labelledby="HeadersCol" tabindex="0" >
<form action="cek_assessor_4s_maintenance.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fid; ?>" />
<table  class="table table-bordered" style="font-size:12px"  >
<thead>
<tr align="center">
<th><center>No</center></th>
<th><center>Tempat yg dicek</center></th>
<th><center>Point</center></th>
<th><center>Score</center></th>
<th><center>Very Bad<br>(Level 1)</center></th>
<th><center>Bad<br>(Level 2)</center></th>
<th><center>Normal<br>(Level 2)</center></th>
<th><center>Good<br>(Level 4)</center></th>
<th><center>Very Good<br>(Level 5)</center></th>
<th><center>Temuan</center></th>
</tr>
</thead>
<tbody>

<?php  
$no = 0;
$no_jml = 1;

$test = mysqli_query($con, "select * from t_form_4s order by fid asc");
  while($test2=mysqli_fetch_array($test))
  {

  $id = $test2['fid']; 
  $fjudul = $test2['fjudul']; 
  $fpoint = $test2['fpoint']; 
  $fscore = $test2['fscore']; 
  $fverybad = $test2['fverybad']; 
  $fbad = $test2['fbad']; 
  $fnormal = $test2['fnormal']; 
  $fgood = $test2['fgood']; 
  $fverygood = $test2['fverygood']; 
  
 
  
  
  ?>

<tr>
<td><span><?php echo $no_jml; ?></span></td>
<td><?php echo $fjudul; ?></td>
<td><?php echo $fpoint; ?></td>
<td>
	
   <select name="val<?php echo $no_jml; ?>" id="val<?php echo $no_jml; ?>" value="<?php echo $vale[$no]; ?>" style="width: 45px;">
	
	<?php for($i=0; $i <= $fscore; $i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[$no] ==  $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
   
	 
  <?php } ?>
  </select>  
</td>
<td><?php echo $fverybad; ?></td>
<td><?php echo $fbad; ?></td>
<td><?php echo $fnormal; ?></td>
<td><?php echo $fgood; ?>.</td>
<td><?php echo $fverygood; ?></td>
<td> <a href="#myModal" onclick="getId(document.getElementById('fid_score').value='<?php echo $no_jml; ?>','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
Total : <?php echo ${"jml".$no_jml};?> Temuan 
</p>
</td>
</tr>


  <?php 
  $no_jml++; 
$no++;  
  }

  ?>
  
  
</tbody>
</table>
<br>
<h2 class="text-center" style="color:blue"><?php echo $text_score; ?></h2>

<br>

<input type="submit" name="submit" value="SUBMIT" style="width:100%" class="btn btn-success" />
</form>
<br>
<!-- 
<center><h5>Ada temuan ? <a href="#myModal"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>
<br>-->
</div>
  


</div>
<!-- /.container-fluid -->

 
<?php

if (isset($_POST['submit']))
{
	
	$fidx = $_POST["fidx"];
	
	$blth_now = date("Y-m");
	
	$sub = mysqli_query($con, "select count(fid) as jml from t_form_4s_maintenance order by fid asc");
   while($sub2=mysqli_fetch_array($sub))
   {
	$jml_form_4s = $sub2['jml']; 
   }
    
	$sum_score = 0;
    $sum_array_value = "";
	for($i=1;$i<=$jml_form_4s;$i++){
		${"val".$i} = $_POST["val$i"];
		$sum_array_value .= ${"val".$i}.";";
		$sum_score += ${"val".$i};
	}

	$farray_value = $sum_array_value;	
	
   $fscore = $sum_score;
   
   $scorex = mysqli_query($con, "select fscore from t_form_4s_maintenance order by fid asc limit 1");
   while($scorex2=mysqli_fetch_array($scorex))
   {
	$total_score = $scorex2['fscore']; 
   }
	
	$nilai = $jml_form_4s * $total_score;

    $score = round(($fscore / $nilai) * 100);
	
		//Awal Email
	
	
	$get = mysqli_query($con, "select *, '4S' as fhave from t_schedule_4s where fid = '$fidx'");
   while($get2=mysqli_fetch_array($get))
   {
	$fname = $get2['fname']; 
	$fline = $get2['fline']; 
	$fworsite = $get2['fworsite']; 
	$fhave = $get2['fhave']; 
	$fjobas = $get2['fjobas'];	
	
	
	if($fjobas == 'Assessor'){
			$getjobas = 'Section Head';
	}else if($fjobas == 'Section Head'){
			$getjobas = 'Manager';
	}else if($fjobas == 'Manager'){
			$getjobas = 'Manager Cross';
	}else if($fjobas == 'Manager Cross'){
			$getjobas = 'Division';
	}	
	
	
	$getlv = mysqli_query($con, "select fname from t_schedule_4s where fworsite = '$fworsite' and fline = '$fline' and fjobas = '$getjobas'");
   while($getlv2=mysqli_fetch_array($getlv))
   {
	$fnamelv = $getlv2['fname']; 
   }
	
	
	$getemail = mysqli_query($con, "select femail from t_users where fname = '$fnamelv'");
   while($getemail2=mysqli_fetch_array($getemail))
   {
	$femaillv = $getemail2['femail']; 
   }
	
	
	
   }
   
   $no = 1;
   
   
	
	//	
		
	
	 $emailBody =
    "Dear Admin<br/><br/>
	<br/>
	
	
	Nama 		: ".$fname."<br/>
	Line 		: ".$fline." ".$fworsite."<br/>
	Pilar 		: ".$fhave."<br/>
	Jobas 		: ".$fjobas."<br/>
	Nilai 		: ".$score."<br/>
	
	";
	
	$emailBody .="<h4><b>Isi Temuan</b></h4>";
    $emailBody .="<br/>";
    $emailBody .="<table width=\"100%\" border=\"1\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\">";
    $emailBody .="<tr style=\"bgcolor: blue;\">";
    $emailBody .="<td  width=\"5%\">No</td><td width=\"30%\">Judul</td><td width=\"5%\">Point</td><td width=\"30%\">Note</td><td width=\"30%\">Temuan</td><td width=\"20%\">Tanggal</td>";
    $emailBody .="</tr>";
	

$queryku = mysqli_query($con, "select *, substring(fdate_modified, 1, 7) from t_finding_4s where fid_schedule = '$fidx' and substring(fdate_modified, 1, 7) = '$blth_now' order by fid ASC");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fphoto = $queryku2['fphoto'];
	$fnote = $queryku2['fnote'];
	$fdate_modified = $queryku2['fdate_modified'];
	$fid_score = $queryku2['fid_score'];
	
	
	$des = mysqli_query($con, "select * from t_form_4s_maintenance where fid = '$fid_score'");
	while($des2=mysqli_fetch_array($des))
{
	
	$fjudul = $des2['fjudul'];
	$fpoint = $des2['fpoint'];


	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnote</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 

	
	$emailBody .="<tr>";
    $emailBody .="<td>$no</td><td>$fjudul</td><td>$fpoint</td><td>$xml->body</td><td><img style='width:100px;' src='".LOC_IMAGE."images/temuan4s/".$fphoto."' /></td><td>$fdate_modified</td>";
    $emailBody .="</tr>";
		
	$no++;
	}
	
	}
	
	$emailBody .="</table>";
	
	$emailBody .=
	
	
	"
	<br/><br/><br/>
	Terima kasih atas kerjasamanya.
	<br/><br/>
	
	
	Regards,<br/>
	Admin 3 Pillars";


    $mail = new PHPMailer;
	$mail->isHTML(true);
    $mail->isSMTP();
    $mail->Host = 'smartandonplant3.com';
    $mail->Username = 'info@smartandonplant3.com'; // Email Pengirim
    $mail->Password = '4d4pt1v3'; // Isikan dengan Password email pengirim
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
    $mail->setFrom('info@smartandonplant3.com', 'Mailer');
	//$mail->addAddress('prastyaharyantop@gmail.com', '');
    $mail->addAddress('fajar.cahyono@toyota.co.id', '');
	$mail->AddCC($femaillv, '');
    //$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
    // Load file content.php

    $mail->Subject = 'Email Reminder - 3 Pillars System';
    $mail->Body = $emailBody;
	 $send = $mail->send();
	
	
	//Akhir EMail
	

	mysqli_query($con, "update t_schedule_4s set farray_value = '$farray_value', fscore = '$score' where fid = '$fidx'");
	
	echo "<script>window.location='cek_assessor_4s_maintenance.php?fid=$fidx'</script>";
	
	//echo "update t_schedule_4s set farray_value = '$farray_value' where fid = '$fidx'";
			
}
	
	
	
//save temuan
if (isset($_POST['submit_temuan']))
{
	$fid_schedule = $_POST["fid_schedule"];
  $fid_score = $_POST["fid_score"];
	$fnote = $_POST["fnote"];

   $foto = $_FILES['fphoto']['name'];
   $tmp = $_FILES['fphoto']['tmp_name'];
    
    if(isset($foto) and !empty($foto)){
    $path = "images/temuan4s/";
    // Proses upload
    if(move_uploaded_file($tmp, $path.$foto)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database

	
	mysqli_query($con, "insert into t_finding_4s (fid_schedule, fphoto, fnote, fid_score, fgroup) values ('$fid_schedule', '$foto', '$fnote', '$fid_score', '$fid_schedule')");

}

}
  //Simpan nilai

	/*
	
  $val1_ = $_POST["val1_"];
  $val2_ = $_POST["val2_"];
  $val3_ = $_POST["val3_"];
  $val4_ = $_POST["val4_"];
  $val5_ = $_POST["val5_"];
  $val6_ = $_POST["val6_"];
  $val7_ = $_POST["val7_"];
  $val8_ = $_POST["val8_"];
  $val9_ = $_POST["val9_"];
  $val10_ = $_POST["val10_"];
  $val11_ = $_POST["val11_"];
  $val12_ = $_POST["val12_"];
  $val13_ = $_POST["val13_"];
  $val14_ = $_POST["val14_"];
  $val15_ = $_POST["val15_"];
  $val16_ = $_POST["val16_"];
  $val17_ = $_POST["val17_"];
  $val18_ = $_POST["val18_"];
  $val19_ = $_POST["val19_"];
  $val20_ = $_POST["val20_"];
  $val21_ = $_POST["val21_"];
  $val22_ = $_POST["val22_"];
  $val23_ = $_POST["val23_"];
  $val24_ = $_POST["val24_"];
  $val25_ = $_POST["val25_"];
  $val26_ = $_POST["val26_"];
  $val27_ = $_POST["val27_"];
  $val28_ = $_POST["val28_"];
  $val29_ = $_POST["val29_"];
  $val30_ = $_POST["val30_"];
  $val31_ = $_POST["val31_"];
  $val32_ = $_POST["val32_"];
  $val33_ = $_POST["val33_"];
  $val34_ = $_POST["val34_"];
  $val35_ = $_POST["val35_"];
  $val36_ = $_POST["val36_"];
  $val37_ = $_POST["val37_"];
  $val38_ = $_POST["val38_"];
  $val39_ = $_POST["val39_"];
  $val40_ = $_POST["val40_"];
  $val41_ = $_POST["val41_"];
  
  */
  
  $fidx_ = $_POST["fid_schedule"];
  
  	
	$sub = mysqli_query($con, "select count(fid) as jml from t_form_4s_maintenance order by fid asc");
   while($sub2=mysqli_fetch_array($sub))
   {
	$jml_form_4s = $sub2['jml']; 
   }
    
	$sum_score = 0;
    $sum_array_value = "";
	for($i=1;$i<=$jml_form_4s;$i++){
		${"val".$i."_"} = $_POST["val".$i."_"];
		$sum_array_value .= ${"val".$i."_"}.";";
		$sum_score += ${"val".$i."_"};
	}

	$farray_value_ = $sum_array_value;	
	
   $fscore_ = $sum_score;
   
   $scorex = mysqli_query($con, "select fscore from t_form_4s_maintenance order by fid asc limit 1");
   while($scorex2=mysqli_fetch_array($scorex))
   {
	$total_score = $scorex2['fscore']; 
   }
	
	$nilai = $jml_form_4s * $total_score;

    $score_ = round(($fscore_ / $nilai) * 100);

  mysqli_query($con, "update t_schedule_4s set farray_value = '$farray_value_', fscore = '$score_' where fid = '$fidx_'");


   
  //
	
	 echo "<script>window.location='cek_assessor_4s_maintenance.php?fid=$fid_schedule'</script>";
	
}

?>



 
 

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Isi Temua 4S</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="cek_assessor_4s_maintenance.php" method="post" enctype="multipart/form-data">
      <!-- Modal body -->
      <input type="hidden" name="fid_score" id="fid_score" >

      <!-- data score -->
	

	<?php $sub = mysqli_query($con, "select count(fid) as jml from t_form_4s_maintenance order by fid asc");
   while($sub2=mysqli_fetch_array($sub))
   {
	$jml_form_4s = $sub2['jml']; 
   }
    

	for($i=1;$i<=$jml_form_4s;$i++){
		?>

	<input type="hidden" name="val<?php echo $i; ?>_" id="val<?php echo $i; ?>_" />	
    
	<?php  } ?>
	
<!--
	
	  <input type="hidden" name="val1_" id="val1_" />
      <input type="hidden" name="val2_" id="val2_" />
      <input type="hidden" name="val3_" id="val3_" />   
      <input type="hidden" name="val4_" id="val4_" />
      <input type="hidden" name="val5_" id="val5_" />
      <input type="hidden" name="val6_" id="val6_" />
      <input type="hidden" name="val7_" id="val7_" />
      <input type="hidden" name="val8_" id="val8_" />
      <input type="hidden" name="val9_" id="val9_" />
      <input type="hidden" name="val10_" id="val10_" />
      <input type="hidden" name="val11_" id="val11_" />
      <input type="hidden" name="val12_" id="val12_" />
      <input type="hidden" name="val13_" id="val13_" />
      <input type="hidden" name="val14_" id="val14_" />
      <input type="hidden" name="val15_" id="val15_" />
      <input type="hidden" name="val16_" id="val16_" />
      <input type="hidden" name="val17_" id="val17_" />
      <input type="hidden" name="val18_" id="val18_" />
      <input type="hidden" name="val19_" id="val19_" />
      <input type="hidden" name="val20_" id="val20_" />
      <input type="hidden" name="val21_" id="val21_" />
      <input type="hidden" name="val22_" id="val22_" />
      <input type="hidden" name="val23_" id="val23_" />
      <input type="hidden" name="val24_" id="val24_" />
      <input type="hidden" name="val25_" id="val25_" />
      <input type="hidden" name="val26_" id="val26_" />
      <input type="hidden" name="val27_" id="val27_" />
      <input type="hidden" name="val28_" id="val28_" />
      <input type="hidden" name="val29_" id="val29_" />
      <input type="hidden" name="val30_" id="val30_" />
      <input type="hidden" name="val31_" id="val31_" />
      <input type="hidden" name="val32_" id="val32_" />
      <input type="hidden" name="val33_" id="val33_" />
      <input type="hidden" name="val34_" id="val34_" />
      <input type="hidden" name="val35_" id="val35_" />
      <input type="hidden" name="val36_" id="val36_" />
      <input type="hidden" name="val37_" id="val37_" />
      <input type="hidden" name="val38_" id="val38_" />
      <input type="hidden" name="val39_" id="val39_" />
      <input type="hidden" name="val40_" id="val40_" />
      <input type="hidden" name="val41_" id="val41_" />
	  
-->

      <div class="modal-body">


		  <script src="assets/tinymce/tinymce.min.js"></script>
		  <script>
		    tinymce.init({
			selector: '#myTextarea',
			encoding: 'xml', 
			plugins: 'image code',
			height : "350",
			menubar: 'file edit view format tools table tc help',
			toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify ',
			
			
			// without images_upload_url set, Upload tab won't show up
			images_upload_url: 'upload_tinymce.php',
			
			// override default upload handler to simulate successful upload
			images_upload_handler: function (blobInfo, success, failure) {
				var xhr, formData;
			  
				xhr = new XMLHttpRequest();
				xhr.withCredentials = false;
				xhr.open('POST', 'upload_tinymce.php');
			  
				xhr.onload = function() {
					var json;
				
					if (xhr.status != 200) {
						failure('HTTP Error: ' + xhr.status);
						return;
					}
				
					json = JSON.parse(xhr.responseText);
				
					if (!json || typeof json.location != 'string') {
						failure('Invalid JSON: ' + xhr.responseText);
						return;
					}
				
					success(json.location);
				};
			  
				formData = new FormData();
				formData.append('file', blobInfo.blob(), blobInfo.filename());
			  
				xhr.send(formData);
			},
		});
		</script>
		
		<input type="hidden" name="fid_schedule" value="<?php echo $fid; ?>" >
   
    <input type="file" name="fphoto" id="fphoto" required="required"><br/><br/>
    <img src="" id="imgView" style="width: 30%;"class="card-img-top img-fluid">
		<hr/>
		<label>Note :</label>
		<textarea id="myTextarea" name="fnote" ></textarea>


		


    <script>

    function getId(idschedule,idscore){
      
    var dataString = "idschedule="+idschedule+"&idscore="+idscore; 
    //alert(dataString);

    $.ajax({
    type: 'POST',
    data: dataString,
    url: 'cek_4s_maintenance.php',       
    success: function(htmlx) {
      var myStr = htmlx;
      document.getElementById('tableku').innerHTML = htmlx;
    }
    });
	
	

	
		<?php $subx = mysqli_query($con, "select count(fid) as jml from t_form_4s_maintenance order by fid asc");
   while($subx2=mysqli_fetch_array($subx))
   {
	$jml_form_4x = $subx2['jml']; 
   }
    

	for($i=1;$i<=$jml_form_4x;$i++){
		?>

	 document.getElementById('val<?php echo $i; ?>_').value = document.getElementById('val<?php echo $i; ?>').value;
    
	<?php  }	?>




    //get score
	
/*
    document.getElementById('val1_').value = document.getElementById('val1').value;
    document.getElementById('val2_').value = document.getElementById('val2').value;
    document.getElementById('val3_').value = document.getElementById('val3').value;
    document.getElementById('val4_').value = document.getElementById('val4').value;
    document.getElementById('val5_').value = document.getElementById('val5').value;
    document.getElementById('val6_').value = document.getElementById('val6').value;  
    document.getElementById('val7_').value = document.getElementById('val7').value;
    document.getElementById('val8_').value = document.getElementById('val8').value;
    document.getElementById('val9_').value = document.getElementById('val9').value;
    document.getElementById('val10_').value = document.getElementById('val10').value;
    document.getElementById('val11_').value = document.getElementById('val11').value;  
    document.getElementById('val12_').value = document.getElementById('val12').value;
    document.getElementById('val13_').value = document.getElementById('val13').value;
    document.getElementById('val14_').value = document.getElementById('val14').value;
    document.getElementById('val15_').value = document.getElementById('val15').value;
    document.getElementById('val16_').value = document.getElementById('val16').value;  
    document.getElementById('val17_').value = document.getElementById('val17').value;
    document.getElementById('val18_').value = document.getElementById('val18').value;
    document.getElementById('val19_').value = document.getElementById('val19').value;
    document.getElementById('val20_').value = document.getElementById('val20').value;
    document.getElementById('val21_').value = document.getElementById('val21').value;  
    document.getElementById('val22_').value = document.getElementById('val22').value;
    document.getElementById('val23_').value = document.getElementById('val23').value;
    document.getElementById('val24_').value = document.getElementById('val24').value;
    document.getElementById('val25_').value = document.getElementById('val25').value;
    document.getElementById('val26_').value = document.getElementById('val26').value;  
    document.getElementById('val27_').value = document.getElementById('val27').value;
    document.getElementById('val28_').value = document.getElementById('val28').value;
    document.getElementById('val29_').value = document.getElementById('val29').value;
    document.getElementById('val30_').value = document.getElementById('val30').value;
    document.getElementById('val31_').value = document.getElementById('val31').value;  
    document.getElementById('val32_').value = document.getElementById('val32').value;
    document.getElementById('val33_').value = document.getElementById('val33').value;
    document.getElementById('val34_').value = document.getElementById('val34').value;
    document.getElementById('val35_').value = document.getElementById('val35').value;
    document.getElementById('val36_').value = document.getElementById('val36').value;  
    document.getElementById('val37_').value = document.getElementById('val37').value;
    document.getElementById('val38_').value = document.getElementById('val38').value;
    document.getElementById('val39_').value = document.getElementById('val39').value;
    document.getElementById('val40_').value = document.getElementById('val40').value;
    document.getElementById('val41_').value = document.getElementById('val41').value;  
*/
	

    
  }
  
  </script>



    
	  
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="submit" name="submit_temuan" value="Save" class="btn btn-success" /> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      <hr/>
      <div id="tableku"></div>
      </form>
    </div>
  </div>
</div> 
 
<?php include('includes/footer.php'); ?>    

<script>
    $("#fphoto").change(function(event) {  
      fadeInAdd();
      getURL(this);    
    });

    $("#fphoto").on('click',function(event){
      fadeInAdd();
    });

    function getURL(input) {    
      if (input.files && input.files[0]) {   
        var reader = new FileReader();
        var filename = $("#fphoto").val();
        filename = filename.substring(filename.lastIndexOf('\\')+1);
        reader.onload = function(e) {
          debugger;      
          $('#imgView').attr('src', e.target.result);
          $('#imgView').hide();
          $('#imgView').fadeIn(500);      
          $('.custom-file-label').text(filename);             
        }
        reader.readAsDataURL(input.files[0]);    
      }
      $(".alert").removeClass("loadAnimate").hide();
    }

    function fadeInAdd(){
      fadeInAlert();  
    }
    function fadeInAlert(text){
      $(".alert").text(text).addClass("loadAnimate");  
    }
</script>

<?php
$fafterdel = $_GET['fafterdel'];
$fafteredit = $_GET['fafteredit'];
$fid_afterdel = $_GET['fid'];
$fid_score_afterdel = $_GET['fid_score'];

if($fafterdel == "1"){
	echo "<script>$('#myModal').modal('show');getId('$fid_score_afterdel','$fid_afterdel');</script>";
}

else if($fafteredit == "1"){
	echo "<script>$('#myModal').modal('show');getId('$fid_score_afterdel','$fid_afterdel');</script>";
}

?>
