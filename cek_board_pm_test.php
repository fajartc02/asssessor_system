<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form Check and Action PM";

$active_dashboard = "";
$active_4s = "";
$active_stw = "";
$active_pm = "active";
$active_om = "";

$fidx = $_GET['fid'];
$fline = $_GET['fline'];
$fworsite = $_GET['fworsite'];

$queryku = mysqli_query($con, "select * from t_schedule_pm where fline = '$fline' and fworsite = '$fworsite' and finfo = 'Plan and Do'");
while($queryku2=mysqli_fetch_array($queryku))
{
  $fresult_nye = $queryku2['farray_result'];
  $fscore_nye = $queryku2['farray_score'];
  $fid_pd = $queryku2['fid']; 
  $fscorezz = $queryku2['fscore'];
}

$queryku = mysqli_query($con, "select * from t_schedule_pm where fline = '$fline' and fworsite = '$fworsite' and finfo = 'Check and Action'");
while($queryku2=mysqli_fetch_array($queryku))
{
  $fid_c = $queryku2['fid']; 
}

include 'cek_jml_pm_board.php';

 $querydivisi = mysqli_query($con, "select sum(farray_result) as farray_result from t_schedule_om where fline = '$fline' and fworsite = '$fworsite' and finfo = 'Check and Action'");
while($querydivisi2=mysqli_fetch_array($querydivisi))
{
  $farray_resultx = $querydivisi2['farray_result'];
 } 

$valr = explode(";",$fresult_nye);
$vals = explode(";",$fscore_nye);


$ss = mysqli_query($con, "select count(fid) as jml from t_form_pm_test order by fid asc");
   while($ss2=mysqli_fetch_array($ss))
   {
	$jml_pm = $ss2['jml']; 
   }    
	
	$sum_score = 0;

	for($i=0;$i<=$jml_pm;$i++){			
		$sum_score += $vals[$i];	
		$sum_value .= $valr[$i];
	}

$queryconfirm = mysqli_query($con, "select * from t_schedule_pm where fid = '$fidx'");
while($queryconfirm2=mysqli_fetch_array($queryconfirm))
{
  $farray_resultx = $queryconfirm2['farray_result'];
  $farray_scorex = $queryconfirm2['farray_score'];    
 } 

  $querydivisi = mysqli_query($con, "select sum(farray_result) as farray_result from t_schedule_pm where fline = '$fline' and fworsite = '$fworsite' and finfo = 'Check and Action'");
while($querydivisi2=mysqli_fetch_array($querydivisi))
{
  $farray_result_konfirmasi = $querydivisi2['farray_result'];
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

<!-- Begin Page Content -->
<div style="padding:5px">

<center><legend style="margin:-10px">Form PM</legend></center>

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

<form action="cek_board_pm_test.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fidx; ?>" />
<input type="hidden" name="fid_pd" value="<?php echo $fid_pd; ?>" />
<input type="hidden" name="flinex" value="<?php echo $fline; ?>" />
<input type="hidden" name="fworsitex" value="<?php echo $fworsite; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr align="center">
<th>No</th>
<th colspan="2"><center>Item</center></th>

<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
<th><center>Assessment criteria<br>＜Gold level＞</center></th>
<th><center>Description</center></th>
<th><center>Hasil</center></th>
<th ><center>Skore</center></th>
<th><center>Temuan</center></th>
</tr>
</thead>
<tbody>
<?php  
$no = 0;
$no_jml = 1;

$test = mysqli_query($con, "select * from t_form_pm_test order by fid asc");
  while($test2=mysqli_fetch_array($test))
  {

  $id = $test2['fid']; 
  $fitem1 = $test2['fitem1']; 
  $fitem2 = $test2['fitem2']; 
  $fsilver = $test2['fsilver']; 
  $fskor = $test2['fskor']; 
  $fgold = $test2['fgold']; 
  $fdesc = $test2['fdesc']; 
  
  $awalun = $fitem1;
  
  
  ?>

<tr>
<td><span><?php echo $no_jml; ?></span></td>
<td><?php echo $fitem1; ?></td>
<td><?php echo $fitem2; ?></td>
<td><?php echo $fsilver; ?></td>
<td><?php echo $fgold; ?></td>
<td><?php echo $fdesc; ?></td>
<td>
   <select name="valr<?php echo $no_jml; ?>" class="<?php echo str_replace(array(' ', '&', '(', ')','/'), array('', '','','',''), $fitem1); ?>" onchange="<?php echo str_replace(array(' ', '&', '(', ')'), array('', '','',''), $fitem1); ?>();ubahscore()" id="valr<?php echo $no_jml; ?>" value="<?php echo $valr[$no]; ?>" style="width: 45px;">
	 <option value="X" <?php echo ($valr[$no] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[$no] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select> 
</td>
<td>  
    <?php
  if($awalun != $awalunz){
  ?>
  <span  class="totalscorex" id="<?php echo str_replace(array(' ', '&', '(', ')','/'), array('', '','','',''), $fitem1); ?>"></span>
  <?php
  }
  ?>
</td>


<td> <a href="#myModal" onclick="getId(document.getElementById('fid_score').value='<?php echo $no_jml; ?>','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
Total : <?php echo ${"jml".$no_jml};?> Temuan 
</p>
</td>

</tr>

<?php 
  
  $awalunz = $awalun;
  
  $no_jml++; 
$no++;  

	echo "<script>
	var x = document.querySelectorAll('.".str_replace(array(' ', '&', '(', ')','/'), array('', '','','',''), $fitem1)."');
	var total = 0;
	for(var i=0;i<x.length;i++)
	{
	if( x[i].value == 'X'){
		total += 0;
	}else{
		total += 1;
	}
	}
	var text_avg = 0;
	var avg_score = (total/x.length)*100;
	if(avg_score >= 1 && avg_score <= 49){
		text_avg = 1;
	}else if(avg_score >= 50 && avg_score <= 99){
		text_avg = 2;
	}else if(avg_score == 100){
		text_avg = 3;
	}

	document.getElementById('".str_replace(array(' ', '&', '(', ')','/'), array('', '','','',''), $fitem1)."').innerHTML = text_avg;
	
	
	function ".str_replace(array(' ', '&', '(', ')','/'), array('', '','','',''), $fitem1)."(){ 
	var x = document.querySelectorAll('.".str_replace(array(' ', '&', '(', ')','/'), array('', '','','',''), $fitem1)."');
	var total = 0;
	for(var i=0;i<x.length;i++)
	{
	if( x[i].value == 'X'){
		total += 0;
	}else{
		total += 1;
	}
	}
	var text_avg = 0;
	var avg_score = (total/x.length)*100;
	if(avg_score >= 1 && avg_score <= 49){
		text_avg = 1;
	}else if(avg_score >= 50 && avg_score <= 99){
		text_avg = 2;
	}else if(avg_score == 100){
		text_avg = 3;
	}

	document.getElementById('".str_replace(array(' ', '&', '(', ')','/'), array('', '','','',''), $fitem1)."').innerHTML = text_avg;
  }
	
	
	
	</script>";

  
  }
  
  
  
  

  ?>
</tbody>
</table>
<br>
<center><h2 style="color:blue"><?php echo $fscorezz; ?></h2></center>
<input type="hidden" name="idtotalscore" id="idtotalscore" />
<br>

<input type="submit" name="update" value="UPDATE" style="width:100%" class="btn btn-success" />



<br><br><!--
<center><h5>Ada temuan ? <a href="isi_temuan_4s.php"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>-->
<br>
<br>
<!--
<h3 class="text-center"><a style="color:green;">Isi Temuan</a></h3></center>
<br>
<div style="padding-left: 20px;">

<?php

$queryf = mysqli_query($con, "select t_finding_pm.fnote, t_finding_pm.fdate_modified as tgl, t_schedule_pm.* from t_finding_pm join t_schedule_pm on t_finding_pm.fid_schedule =  t_schedule_pm.fid where t_finding_pm.fid_schedule in ($fid_pd,$fidx) order by t_finding_pm.fdate_modified desc");
while($queryf2=mysqli_fetch_array($queryf))
{
  $fnotex = $queryf2['fnote']; 
  $fnamex = $queryf2['fname']; 
  $ftglx = $queryf2['tgl']; 





    $myXMLData ="<?xml version='1.0' encoding='UTF-8'?>
    <note>
    <to></to>
    <from></from>
    <heading></heading>
    <body>$fnotex</body>
    </note>";
    $xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object"); 
    echo $xml->body;

    echo "<br/>";
    echo "<span class='badge badge-success'>by ".$fnamex. "</span> |  ".$ftglx;
    echo "<hr/>";

    }
    ?>
  </div>
-->
    <hr>

<br/>


<br>

<br>

<input type="hidden" name="fidx" value="<?php echo $fidx; ?>">
<input type="hidden" name="farray_result" value="1">
<input type="hidden" name="farray_score" value="1">

</form> 

<br>

<script>
//Perhitungan Total Skor
	
	var y = document.querySelectorAll(".totalscorex");
	var totalscore = 0;
	for(var j=0;j<y.length;j++)
	{
		totalscore += parseInt(y[j].innerHTML);
	}
	

	document.getElementById('idtotalscore').value = (totalscore/(y.length*3))*100;


	function ubahscore(){ 

	var y = document.querySelectorAll(".totalscorex");
	var totalscore = 0;
	for(var j=0;j<y.length;j++)
	{
		totalscore += parseInt(y[j].innerHTML);
	}
	

	document.getElementById('idtotalscore').value = (totalscore/(y.length*3))*100;

	 };

</script>

</div>
  <?php


if (isset($_POST['update']))
{
 
  //
  
     $fworsitex = $_POST["fworsitex"];
  $flinex = $_POST["flinex"];
  $fidx = $_POST["fidx"];
   $fid_pd = $_POST["fid_pd"];
   
     $blth_now = date("Y-m");
  
  
 
  	$sub = mysqli_query($con, "select count(fid) as jml from t_form_pm_test order by fid asc");
   while($sub2=mysqli_fetch_array($sub))
   {
	$jml_form_pm = $sub2['jml']; 
   }
    
	$sum_score = 0;
	$result_array_value = "";
    $sum_array_value = "";
	for($i=1;$i<=$jml_form_pm;$i++){
		${"xvalr".$i} = $_POST["valr$i"];
		${"xvals".$i} = $_POST["vals$i"];
		$result_array_value .= ${"xvalr".$i}.";";
		$sum_array_value .= ${"xvals".$i}.";";
		$sum_score += ${"xvals".$i};
	}
	
	$farray_result = $result_array_value;
	$farray_score = $sum_array_value;	
	
  $score = number_format($_POST["idtotalscore"], 2, '.', '');
		
//Awal Email
	
	
	$get = mysqli_query($con, "select *, 'PM' as fhave from t_schedule_pm where fid = '$fidx'");
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
	
	
	$getlv = mysqli_query($con, "select fname from t_schedule_pm where fworsite = '$fworsite' and fline = '$fline' and fjobas = '$getjobas'");
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
    $emailBody .="<td  width=\"5%\">No</td><td width=\"10%\">Item</td><td width=\"10%\"></td><td width=\"15%\">Silver</td><td width=\"15%\">Gold</td><td width=\"10%\">Deskripsi</td><td width=\"15%\">Note</td><td width=\"20%\">Temuan</td><td width=\"20%\">Tanggal</td>";
    $emailBody .="</tr>";
	

$queryku = mysqli_query($con, "select *, substring(fdate_modified, 1, 7) from t_finding_pm where fid_schedule = '$fidx' and substring(fdate_modified, 1, 7) = '$blth_now' order by fid ASC");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fphoto = $queryku2['fphoto'];
	$fnote = $queryku2['fnote'];
	$fdate_modified = $queryku2['fdate_modified'];
	$fid_score = $queryku2['fid_score'];
	
	
	$des = mysqli_query($con, "select * from t_form_pm_test where fid = '$fid_score'");
	while($des2=mysqli_fetch_array($des))
{
	
	$fitem1 = $des2['fitem1'];
	$fitem2 = $des2['fitem2'];
	$fsilver = $des2['fsilver'];
	$fgold = $des2['fgold'];
	$fdesc = $des2['fdesc'];


	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnote</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 

	
	$emailBody .="<tr>";
    $emailBody .="<td>$no</td><td>$fitem1</td><td>$fitem2</td><td>$fsilver</td><td>$fgold</td><td>$fdesc</td><td>$xml->body</td><td><img style='width:100px;' src='".LOC_IMAGE."images/temuanPM/".$fphoto."' /></td><td>$fdate_modified</td>";
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
  

  mysqli_query($con, "update t_schedule_pm set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fid_pd'");

    $fidx = $_POST["fidx"];
  $farray_result = $_POST["farray_result"];
  $farray_score = $_POST["farray_score"];
   $fid_pd = $_POST["fid_pd"];
  
  mysqli_query($con, "update t_schedule_pm set farray_result = '$farray_result', farray_score = '$farray_score', fid_pd = '$fid_pd' where fid = '$fidx'");
  
 echo "<script>window.location='cek_board_pm_test.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex'</script>";
  
      
}
  
  
  
//save temuan
if (isset($_POST['submit_temuan']))
{
  $fworsitex = $_POST["fworsitex"];
  $flinex = $_POST["flinex"];
  $fid_schedule = $_POST["fid_schedule"];
  $fid_score = $_POST["fid_score"];
  $fnote = $_POST["fnote"];
  
  $foto = $_FILES['fphoto']['name'];
   $tmp = $_FILES['fphoto']['tmp_name'];
    
 $fid_pd = $_POST["fid_pd"];
    
    if(isset($foto) and !empty($foto)){
    $path = "images/temuanPM/";
    // Proses upload
    if(move_uploaded_file($tmp, $path.$foto)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database

  
  mysqli_query($con, "insert into t_finding_pm (fid_schedule, fphoto, fnote, fid_score, fgroup) values ('$fid_schedule', '$foto', '$fnote', '$fid_score', '$fid_pd')");

}

}
  
  
      //Cek Nilai
  
 
  
  $fidx = $_POST["fid_pd"];
  
  $sub = mysqli_query($con, "select count(fid) as jml from t_form_pm_test order by fid asc");
   while($sub2=mysqli_fetch_array($sub))
   {
	$jml_form_pm = $sub2['jml']; 
   }
    
	$sum_score = 0;
	$result_array_value = "";
    $sum_array_value = "";
	for($i=1;$i<=$jml_form_pm;$i++){
		${"xvalr".$i} = $_POST["valr$i"];
		${"xvals".$i} = $_POST["vals$i"];
		$result_array_value .= ${"xvalr".$i}.";";
		$sum_array_value .= ${"xvals".$i}.";";
		$sum_score += ${"xvals".$i};
	}
	
	$farray_result = $result_array_value;
	$farray_score = $sum_array_value;	
	
   $score = number_format($_POST["idtotalscore"], 2, '.', '');
  
  
  //echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

  mysqli_query($con, "update t_schedule_pm set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'");
  
  //Akhir Nilai
  
  echo "<script>window.location='cek_board_pm_test.php?fid=$fid_schedule&&fline=$flinex&&fworsite=$fworsitex'</script>";
  
}



  

?>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Isi Temua PM</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="cek_board_pm_test.php" method="post" enctype="multipart/form-data">
	  
	  	  	  	  	  	  	   <!-- data score -->
	
	<?php $sub = mysqli_query($con, "select count(fid) as jml from t_form_pm_test order by fid asc");
   while($sub2=mysqli_fetch_array($sub))
   {
	$jml_form_pm = $sub2['jml']; 
   }
    

	for($i=1;$i<=$jml_form_pm;$i++){
		?>

	<input type="hidden" name="valr<?php echo $i; ?>" id="valr<?php echo $i; ?>_" />	
    
	<?php  } ?>
      <!-- Modal body -->
      <input type="hidden" name="fid_score" id="fid_score" >
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
    
  <input type="hidden" name="fid_pd" value="<?php echo $fid_pd; ?>" />
    <input type="hidden" name="fid_schedule" value="<?php echo $fidx; ?>" >
    <input type="hidden" name="fworsitex" value="<?php echo $fworsite; ?>" >
    <input type="hidden" name="flinex" value="<?php echo $fline; ?>" >
    
    <input type="file" name="fphoto" id="fphoto"><br/><br/>
    <img src="" id="imgView" style="width: 30%;"class="card-img-top img-fluid">
    <hr/>
    <label>Note :</label>
    <textarea id="myTextarea" name="fnote" ></textarea>
    
    
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="submit" name="submit_temuan" value="Save" class="btn btn-success" /> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </form>
      <hr/>
      <div id="tableku"></div>
    </div>
  </div>
</div> 
 
  
 
<?php include('includes/footer.php'); ?>    

  <script>

    function getId(idscore,idschedule,idplan){
      
    var dataString = "idscore="+idscore+"&idschedule="+idschedule+"&idplan="+idplan; 
    //alert(dataString);

    $.ajax({
    type: 'POST',
    data: dataString,
    url: 'cek_pm_test.php',       
    success: function(htmlx) {
      var myStr = htmlx;
      document.getElementById('tableku').innerHTML = htmlx;
    }
    });
	
								//get score
	
	<?php $subx = mysqli_query($con, "select count(fid) as jml from t_form_pm_test order by fid asc");
   while($subx2=mysqli_fetch_array($subx))
   {
	$jml_form_pmx = $subx2['jml']; 
   }
    

	for($i=1;$i<=$jml_form_pmx;$i++){
		?>

	 document.getElementById('valr<?php echo $i; ?>_').value = document.getElementById('valr<?php echo $i; ?>').value;
    
	<?php  }	?>

  }
  
  </script> 

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
$fid_plan_afterdel = $_GET['fid_plan'];
$fid_check_afterdel = $_GET['fid_check'];

if($fafterdel == "1"){
	echo "<script>$('#myModal').modal('show');getId('$fid_score_afterdel','$fid_afterdel','$fid_plan_afterdel','$fid_check_afterdel');</script>";
}

else if($fafteredit == "1"){
	echo "<script>$('#myModal').modal('show');getId('$fid_score_afterdel','$fid_afterdel','$fid_plan_afterdel','$fid_check_afterdel');</script>";
}

?>








