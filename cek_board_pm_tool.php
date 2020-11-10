<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form Board and Report PM";

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

$result = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8] + $valr[9] + $valr[10] + $valr[11] + $valr[12] + $valr[13] + $valr[14] + $valr[15] + $valr[16] + $valr[17] + $valr[18] + $valr[19] + $valr[20] + $valr[21] + $valr[22] + $valr[23] + $valr[24] + $valr[25] + $valr[26] + $valr[27] + $valr[28] + $valr[29] + $valr[30] + $valr[31];

$score = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23] + $vals[24] + $vals[25] + $vals[26] + $vals[27] + $vals[28] + $vals[29] + $vals[30] + $vals[31];



if($score > 96){
  $score = 96;
}

//echo $score;

$score = round(($score / 96) * 100);

$text_score = "";
if($score != ""){
$text_score = "Score : ".$score;
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
<form action="cek_board_pm_tool.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fidx; ?>" />
<input type="hidden" name="fid_pd" value="<?php echo $fid_pd; ?>" />
<input type="hidden" name="flinex" value="<?php echo $fline; ?>" />
<input type="hidden" name="fworsitex" value="<?php echo $fworsite; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr align="center">
<th width="5%" colspan="3"><center>Item</center></th>
<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
<th width="20%"><center>Assessment criteria<br>＜Gold level＞</center></th>
<th width="30%"><center>Description</center></th>
<th><center>Hasil</center></th>
<th ><center>Skore</center></th>
<th width="30%"><center>Evidence yg hrs di siapkan</center></th>
<th><center>Temuan</center></th>

</tr>
</thead>
<tbody>

<tr>
  <td colspan="3">Manajemen Papan Kontrol GL</td>
  <td>A. Memanfaatkan kontrol papan GL, dan melanjutkan aktivitas sambil kerjasama dengan manajer dan asisten MGR.</td>
  <td>A. Level Silver dijaga dan dilanjutkan</td>
  <td>A. Komen & konfirmasi dibuat oleh manajer& asistant manager terdapat pada papan</td>
  <td>
  <select name="valr1" id="valr1" style="width: 45px;">
     <option value="X" <?php echo ($valr[0] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[0] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals1" id="vals1" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[0] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>A. GL Board hrus up date dan ada komen dr SH DAN MGR</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='1','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml1;?> Temuan</p>
</td>
</tr> 

<tr>

  <td rowspan="22">Regrinding process</td>
  <td rowspan="8">Fundamentals and Worksite management</td>
  <td rowspan="4">Own process</td>
  <td>1) Kemampuan kerja, kreatifitas, dan Kaizen telah dilanjutkan dan hasilnya telah dibuat</td>
  
  <td>1) Level Silver dipertahankan dan dilanjutkan </td>

  <td>1) Anda memiliki contoh Kaizen dari urutan Regrinding, layout, tool & koordinasi setelah  mendapatkan level silver.</td>
  <td>
  <select name="valr2" id="valr2" style="width: 45px;">
     <option value="X" <?php echo ($valr[1] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[1] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals2" id="vals2" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[1] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1) Kaizen Report : Reg Squence , lay out , Tool , Koordinasi</td>
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='2','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml2;?> Temuan</p>
</td>
</tr> 


<tr>
  
  <td rowspan="2">2) Ada sistem untuk mencegah terjadinya deffect in-process (rework) / out flow  , dan Deffect (rework) telah berkurang


   </td>
  <td rowspan="2">2) Aktivitas pencegahan terhadap in-process deffect (rework) sedang diimplementasikan</td>
  <td>2)A. Target sectional terhadap regrind deffect (rework) telah dicapai : nol/bulan dilanjutkan selama 3 bulan terakhir dan lebih 
    
  </td>
  <td>
  <select name="valr3" id="valr3" style="width: 45px;">
     <option value="X" <?php echo ($valr[2] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[2] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>



</td>

<td>
  <select name="vals3" id="vals3" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[2] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td rowspan="2">2) Di GL Board(Quality in proses) dan di activity board ( Rework)</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='3','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml3;?> Temuan</p>
</td>
</tr>

<tr>
  

  <td>2)B.  #  deffect outflow  ke inspeksi akhir (Q-gate) :<br>nol/bln berlanjut selama 6 bulan terakhir dan lebih <br>(jika kecacatan terjadi akibat tanggung jawab regrind, maka hasilnya harus X)

     </td>
  <td>
  <select name="valr4" id="valr4" style="width: 45px;">
     <option value="X" <?php echo ($valr[3] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[3] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals4" id="vals4" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[3] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='4','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml4;?> Temuan</p>
</td>
</tr> 


<tr>
  
  <td>3) Departemen terkait dimasukkan ke dalam aktivitas</td>
    <td>3) Yokoten dari ide yang disarankan sedang diimplementasikan</td>
  <td>3) Yokoten dari aktivitas kaizen telah diimplementasikan setelah mendapatkan level silver 
     </td>
  <td>
  <select name="valr5" id="valr5" style="width: 45px;">
     <option value="X" <?php echo ($valr[4] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[4] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals5" id="vals5" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[4] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>3) Papan TRM & Papan cost Reduction</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='5','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml5;?> Temuan</p>
</td>
</tr> 


<tr>
 <td rowspan="4">Customer</td>
  <td rowspan="2">1)A. Aktivitas untuk mengurangi problem tool telah dilakukan </td>
   <td rowspan="2">1)A. Bersama dengan anggota produksi, bekerja menyelesaikan masalah dan membuat langkah pencegahan berulangnya masalah   </td>
  <td>1)A>  # deffect dari tanggung jawaban  yang tidak jelas (other deprtment) berkurang
    

     </td>
  <td>
  <select name="valr6" id="valr6" style="width: 45px;">
     <option value="X" <?php echo ($valr[5] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[5] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals6" id="vals6" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[5] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1)Papan TRM (problem others dept ) & lihat penanggulangan tool problem di Clean room</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='6','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml6;?> Temuan</p>
</td>
</tr> 


<tr>

  <td>1)B. Rasio deffect : kurang dari 0.05% / bln berlanjut selama 6 bulan terakhir atau lebih
     </td>
  <td>
  <select name="valr7" id="valr7" style="width: 45px;">
     <option value="X" <?php echo ($valr[6] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[6] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals7" id="vals7" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[6] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1)B. Papan TRM (problem others dept ) </td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='7','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml7;?> Temuan</p>
</td>
</tr> 


<tr>

  <td>2)A. Kontrol secara berlanjut pada tool critical
  </td>
    <td>2)A. Setelah penanggulangan selesai, cacat yang sama tidak pernah terjadi lagi
  </td>
  
  <td>2)A> # terulangnya deffect(penanggulangan tools) : zero/ bulan dan berlanjut selama 6 bulan dan lebih 

     </td>
  <td>
  <select name="valr8" id="valr8" style="width: 45px;">
     <option value="X" <?php echo ($valr[7] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[7] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals8" id="vals8" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[7] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>2)A. Data importan & critical Tool di Q-Gate</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='8','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml8;?> Temuan</p>
</td>
</tr> 


<tr>
 

  
  <td>2) B. Problem critical tool  telah diKaizen
    
  </td>
   <td>2) B. Yokoten untuk type tool yang sama  telah diimplementasikan
    
  </td>
  <td>2) B. Ada permintaan perubahan tool dan peta regrind, dll 

     </td>
  <td>
  <select name="valr9" id="valr9" style="width: 45px;">
     <option value="X" <?php echo ($valr[8] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[8] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals9" id="vals9" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[8] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>2)B. bantex Kaizen Report tool importan & Critical</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='9','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml9;?> Temuan</p>
</td>
</tr> 



<tr>

 
  <td>Collection / Delivery</td>
  <td>Periodic collection</td>
  <td>1)  pencegahan terhadap koleksi / delivery  Salah dikerahkan<br>2)  Deffect pada tool box diperbaiki
  </td>
  <td>1) Deffect yg terjadi karena pekerjaan delivery · · 0 cacat / bulan terus selama 6M
     </td>

     <td> 1)  # salah Tools / delivery  : nol / bulan  dan berlanjut selama 6 bulan dan lebih  
     </td>
  <td>
  <select name="valr10" id="valr10" style="width: 45px;">
     <option value="X" <?php echo ($valr[9] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[9] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals10" id="vals10" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[9] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1)Bantex Kaizen Report delivery. Contoh Kanban Tool box, bual mal utk insert , double check insert<br>
  2) Kaizen Report terkait Tool Box </td>
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='10','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml10;?> Temuan</p>
  </td>
</tr> 


<tr> 
<td rowspan="8">Regrinding</td>
<td rowspan="2">Tip check before grinding</td> 
  <td rowspan="2">1) Penyebab retak/kehausan abnormal diinvestigasi dengan member produksi dan membuat countermeasure

  </td>
 <td rowspan="2">1) Tool yang selesai penanggulangan deffect tidak kambuh lagi

  </td>
   <td>1)A. Feedback ke tempat kerja yang sebenarnya telah dilakukan.
  </td>
 
  <td>
  <select name="valr11" id="valr11" style="width: 45px;">
     <option value="X" <?php echo ($valr[10] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[10] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals11" id="vals11" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[10] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1)A. Papan TRM (problem dificult ) </td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='11','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml11;?> Temuan</p>
</td>
</tr> 



<tr>  

   <td>1)B. Manajemen poin sudah jelas. ( Ulasan ).
  </td>
  <td>
  <select name="valr12" id="valr12" style="width: 45px;">
     <option value="X" <?php echo ($valr[11] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[11] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals12" id="vals12" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[11] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1)B. Bukti pengontrolan tool yg di check ( wash & Dry )</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='12','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml12;?> Temuan</p>
</td>
</tr> 



<tr>  

  <td rowspan="2">Holder / Collet
  </td>
   <td>1) Metode pemilihan holder selalu dibuat Kaizen
  </td>
  <td>1) Tidak ada Rework (in-proses deffect) yg terjadi dikarenakan oleh  holder / collet  · 0 deffect / bulan - dilanjutkan selama 6 dan lebih
    <td>1) Tidak ada Rework (in proses deffect) yg terjadi  karena kesalahan pemilihan tool :   nol / bulan terus selama sebulan terakhir 6 dan lebih</td>

     </td>
  <td>
  <select name="valr13" id="valr13" style="width: 45px;">
     <option value="X" <?php echo ($valr[12] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[12] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals13" id="vals13" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[12] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1) Papan TRM History terkait dg holder dan kaizennya</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='13','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml13;?> Temuan</p>
</td>
</tr> 



<tr>  
  
  <td>2)A. Tidak ada karat yang terbentuk pada collet dan holder<br>2)B. Problem yang terkait dengan poin kontrol dibuat  KAIZEN</td>
   <td>2) Jumlah problem deffect karena holder / collet   - Zero /bulan dilanjutkan selama 6 bulan
  </td>
  <td>2) masalah terjadinya:  zero / bulan terus selama sebulan terakhir 6 dan lebih "
     </td>
  <td>
  <select name="valr14" id="valr14" style="width: 45px;">
     <option value="X" <?php echo ($valr[13] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[13] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals14" id="vals14" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[13] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>2)A. Data pengecheckan Concentrasi coolant  di ultra sonic ( clean room)<br>2)B. Data kaizen report holder dan pencegahan spy tdk terulang problem</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='14','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml14;?> Temuan</p>
</td>
</tr> 



<tr> 

  <td rowspan="2">Grinding stone</td>
  <td>1) Problem (frekuensi abnormal) berhubungan dengan poin kontrol  dibuat  KAIZEN
  </td>
 <td>1) Ada sejarah penanggulangan dan pencegahan berulangnya telah dibuat.
  </td>
   <td>1) # Problem berulangnya : nol / bulan terus selama sebulan terakhir 6 dan lebih
  </td>
  <td>
  <select name="valr15" id="valr15" style="width: 45px;">
     <option value="X" <?php echo ($valr[14] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[14] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals15" id="vals15" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[14] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1) Papan TRM , History terkait Dg penggantian batu grinda dan kaizennya</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='15','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml15;?> Temuan</p>
</td>
</tr> 

<tr> 


  <td>2) Problem dan deffect yg ditemukan pada cek profil telah di perbaiki
  </td>
   <td>2) Jumlah deffect pada saat mengkonfirmasi profil  /bentuk   · 0 cacat / bulan -continued untuk 6M
  </td>
  <td>2) Tidak ada deffect kualitas terjadi selama penggantian batu grinda : nol / bulan terus selama sebulan terakhir 6 dan lebih
     </td>
  <td>
  <select name="valr16" id="valr16" style="width: 45px;">
     <option value="X" <?php echo ($valr[15] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[15] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals16" id="vals16" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[15] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>2) Kaizen Report terkait Batu grinda</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='16','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml16;?> Temuan</p>
</td>
</tr> 


<tr> 
 
  <td rowspan="2">Quality assurance</td>
  <td>1) Masalah yang ditemukan di pekerjaan maintanance alat ukur telah diperbaharui (didapat feedback) dan countermeasure telah diimplementasikan
  </td>
     <td>1) Tidak ada deffect kualitas karena kerusakan alat ukur terjadi
  </td>
  <td> 1)  # Problem terjadinya: nol / bulan terus selama sebulan terakhir 6 dan lebih
     </td>
  <td>
  <select name="valr17" id="valr17" style="width: 45px;">
     <option value="X" <?php echo ($valr[16] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[16] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals17" id="vals17" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[16] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1) Papan TRM , History terkait dg Alat ukur dan kaizennya</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='17','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml17;?> Temuan</p>
</td>
</tr> 


<tr> 
  
 

  <td>2)  Penanggulangan deffect yg ditemukan pd saat check kualitas diterapkan
  </td>
   <td>2) Deffect keluar dari bagian reground tidak dilaporkan
  </td>
  <td>2) # Problem berulangnya: nol / bulan terus selama sebulan terakhir 6 dan lebih
     </td>
  <td>
  <select name="valr18" id="valr18" style="width: 45px;">
     <option value="X" <?php echo ($valr[17] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[17] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals18" id="vals18" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[17] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>2) History kaizen terkait alat ukur yg problem </td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='18','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml18;?> Temuan</p>
</td>
</tr> 

<tr> 
  <td rowspan="5">Tool care</td>
  <td rowspan="2">Production preparation for tools （change/allocation）</td>
  <td>1) Countermeasure untuk masalah dilakukan/alokasi dapat diimplementasikan
  </td>
   <td>1) Problem tersisa setelah H / O dibuat penanggulangan dan umpan balik informasi kepada dept perencanaan. Telah diimplementasikan.
  </td>
  <td>1) "Form Permintaan penggantian Tool." telah dikeluarkan (data terakhir diterima.)
     </td>
  <td>
  <select name="valr19" id="valr19" style="width: 45px;">
     <option value="X" <?php echo ($valr[18] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[18] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals19" id="vals19" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[18] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td></td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='19','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml19;?> Temuan</p>
</td>
</tr> 



<tr> 
  <td>2) Membuat Countermeasure terhadap masalah yang berhubungan dengan penggantian /alokasi
  </td>
   <td>2) Tidak ada keterlambatan dalam setup / alokasi
  </td>
  <td>2) Deffect di set-up / alokasi: nol / bulan terus selama sebulan terakhir 6 dan lebih
     </td>
  <td>
  <select name="valr20" id="valr20" style="width: 45px;">
     <option value="X" <?php echo ($valr[19] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[19] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals20" id="vals20" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[19] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>2) Bantex preparasi terkait TR Kai project</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='20','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml20;?> Temuan</p>
</td>
</tr> 



<tr> 

  <td>Struggles </td>
  <td>1) Investigasi & membuatan penanggulangan yang melibatkan dept terkait</td>
  <td>1)  item Penanggulangan distandarisasi.</td>
   <td>1) Ada dokumen distandardisasi
  </td>

  <td>
  <select name="valr21" id="valr21" style="width: 45px;">
     <option value="X" <?php echo ($valr[20] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[20] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals21" id="vals21" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[20] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1) Problem2 saat project TR kai yg melibatkan all dept</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='21','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml21;?> Temuan</p>
</td>
</tr>



<tr> 
  <td >( tools & production, tool cost )
  </td>
  
  <td>2) PDCA dijalankan dan countermeasure berjalan
  </td>
  <td>2) Silver level dipertahankan dan aktivitas masih terus berlanjut.
  </td>
  <td>2) Ada aktivitas kaizen untuk pencegahan deffect
     </td>
  <td>
  <select name="valr22" id="valr22" style="width: 45px;">
     <option value="X" <?php echo ($valr[21] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[21] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals22" id="vals22" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[21] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>2) Papan TRM (problem dificult ) ,Kaizen report nya</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='22','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml22;?> Temuan</p>
</td>
</tr>



<tr> 

  <td>Own-worksite Kaizen</td>
  <td>3) Usulan Kaizen dari tool regrind terhubung ke  cost reduction
  </td>
   <td>B3)  item Penanggulangan distandardisasi dan diyokoten
  </td>
  <td>3) Ada record/catatan yokoten aktivitas kaizen
     </td>
  <td>
  <select name="valr23" id="valr23" style="width: 45px;">
     <option value="X" <?php echo ($valr[22] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[22] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals23" id="vals23" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[22] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>3) bantex kaizen report terkait dg cost reduction yg tool problem dri produsi</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='23','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml23;?> Temuan</p>
</td>
</tr>



<tr> 
  <td rowspan="5">Human resources development</td><td rowspan="5">Skill improvement</td>
  <td>Required skill list</td>

  <td>1) Aktivitas pengembangan level untuk pengetahuan & skill telah diimplementasikan
    
  </td>
    <td>1) Level skill ditingkatkan dan dipertahankan seperti yang direncanakan.
  </td>
  <td>1) Kamu memiliki kriteria untuk evaluasi member', yang telah disetujui oleh GL / Bagian Mgr / Mgr ..
     </td>
  <td>
  <select name="valr24" id="valr24" style="width: 45px;">
     <option value="X" <?php echo ($valr[23] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[23] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals24" id="vals24" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[23] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>1)bantex kaizen report terkait dg cost reduction yg tool problem dri produsi</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='24','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml24;?> Temuan</p>
</td>
</tr>

<tr> 
  
<td rowspan="2">Development tool / location<br>Development tool / location</td>
  <td>2)A>  Training ini dg OJT pada tempat kerja berdasarkan rencana
  </td>
    <td>2)A. WIS untuk semua item skill development sheet telah dibuat
   
  </td>
  <td>2)A. Anda memiliki catatan training di mana WIS digunakan
     </td>
  <td>
  <select name="valr25" id="valr25" style="width: 45px;">
     <option value="X" <?php echo ($valr[24] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[24] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals25" id="vals25" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[24] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>2)A. Papan assegment terkait Skill dan di bantek evaluasi skill yg di ttd sampai mgr</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='25','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml25;?> Temuan</p>
</td>
</tr>


<tr> 
  

  <td>2)B. Sesuai dengan tujuanya, DOJO telah digunakan
  </td>
   <td>2)B. Rencana pengembangan tahunan untuk semua TM telah dibuat dan berjalan seperti yang direncanakan
  </td>
  <td>2)B. Setiap skema training digunakan sesuai dengan tujuan.
     </td>
  <td>
  <select name="valr26" id="valr26" style="width: 45px;">
     <option value="X" <?php echo ($valr[25] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[25] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals26" id="vals26" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[25] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>2)B. Schedule training di Papan assigment</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='26','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml26;?> Temuan</p>
</td>
</tr>

<tr> 
  
  <td rowspan="2">Work observation</td>
  <td>3)A.  Item untuk observasi kerja telah ditetapkan dan diimplementasikan  
  </td>
   <td>3)A. Standard prosedure kerja (SOP)  diobservasi
  </td>
  <td>3)A. observasi Job disediakan sesuai dengan kategori, misalnya Prosedur, Keselamatan, kinerja member  (gerakan), dll
     </td>
  <td>
  <select name="valr27" id="valr27" style="width: 45px;">
     <option value="X" <?php echo ($valr[26] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[26] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals27" id="vals27" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[26] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td></td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='27','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml27;?> Temuan</p>
</td>
</tr>


<tr> 
  

  <td>3)B. Hasil obsevasi kerja telah diperbaharui (feedback) dan memberikan pengajaran
  </td>
   <td>3)B. Hasil observasi kerja difollow oleh  asisten manajer secara berkala "
  </td>
  <td>3)B. Mgr secara periodik (sebulan sekali) menindaklanjuti hasil Observasi pekerjaan members dan memberi komentar pada lembar observasi pekerjaan. . (Lihat STW)
     </td>
  <td>
  <select name="valr28" id="valr28" style="width: 45px;">
     <option value="X" <?php echo ($valr[27] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[27] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals28" id="vals28" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[27] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td>3)B. Papan SW harus up date observasinya dan ada koment dri SH dan MGR</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='28','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml28;?> Temuan</p>
</td>
</tr>


<tr> 
  
  <td rowspan="4" colspan="3">Activity result</td>
  <td>1) Pencapaian target section tahunan rasio deffect regrinding (rework) - lanjutan 3 bulan
  </td>
   <td>1) Target Tercapai rasio regrinding deffect (kurang dari 0,05%) - lanjutan 6 bulan
  </td>
  <td>1) Target section Tahunan tercapai (rasio kegagalan regrind kurang dari 0,05% - Rework): terus melewati berturut-turut 6 bulan dan lebih
     </td>
  <td>
  <select name="valr29" id="valr29" style="width: 45px;">
     <option value="X" <?php echo ($valr[28] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[28] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals29" id="vals29" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[28] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td></td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='29','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml29;?> Temuan</p>
</td>
</tr>





<tr> 
    <td>2)  Deffect Customer (penyebab terjadi dr tool regrind) => 0 kasus/bulan   berlanjut 3 bulan
  </td>
  <td>2) Costumer deffect (penyebab terjadi pada tool regrind)  => 0 kasus / bulan dilanjutkan selama 6 bulan "
  </td>
  <td>2) Costumer deffect (kesalahan regrind) Nol cacat / bulan   : Terus melewati berturut-turut 6 bulan dan lebih "
     </td>
  <td>
  <select name="valr30" id="valr30" style="width: 45px;">
     <option value="X" <?php echo ($valr[29] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[29] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals30" id="vals30" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[29] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td></td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='30','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml30;?> Temuan</p>
</td>
</tr>


<tr> 
    <td>3) Mencapai target section untuk cost reduction untuk tool regrind--berlanjut 3 bulan
  </td>
  <td>3) Mencapai target section dari cost reduction tool  untuk tool regrind - lanjutan 6 bulan
  </td>
  <td>3) Target section Tahunan tercapai (cost reduction tool regrind)   : Terus melewati berturut-turut 6 bulan dan lebih "
     </td>
  <td>
  <select name="valr31" id="valr31" style="width: 45px;">
     <option value="X" <?php echo ($valr[30] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[30] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals31" id="vals31" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[30] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td></td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='31','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml31;?> Temuan</p>
</td>
</tr>



<tr> 
    <td>4) Mencapai target section untuk cost reduction tool  untuk produksi--berlanjut 3 bulan
  </td>
  <td>4)  Mencapai target section dari cost reduction tool  untuk tool production - lanjutan 6 bulan
  </td>
  <td>4) Target section Tahunan tercapai (cost reduction tool produksi (  : Terus melewati berturut-turut 6 bulan dan lebih "
     </td>
  <td>
  <select name="valr32" id="valr32" style="width: 45px;">
     <option value="X" <?php echo ($valr[31] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[31] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals32" id="vasl32" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[31] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td></td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='32','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');"data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml32;?> Temuan</p>
</td>
</tr>







</tbody>
</table>
<br>
<center><h2 style="color:blue"><?php echo $text_score; ?></h2></center>
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
</div>
  


</div>
<!-- /.container-fluid -->

 
<?php

if (isset($_POST['update']))
{
  
  $xvalr1 = $_POST["valr1"];
  $xvalr2 = $_POST["valr2"];
  $xvalr3 = $_POST["valr3"];
  $xvalr4 = $_POST["valr4"];
  $xvalr5 = $_POST["valr5"];
  $xvalr6 = $_POST["valr6"];
  $xvalr7 = $_POST["valr7"];
  $xvalr8 = $_POST["valr8"];
  $xvalr9 = $_POST["valr9"];
  $xvalr10 = $_POST["valr10"];
  $xvalr11 = $_POST["valr11"];
  $xvalr12 = $_POST["valr12"];
  $xvalr13 = $_POST["valr13"];
  $xvalr14 = $_POST["valr14"];
  $xvalr15 = $_POST["valr15"];
  $xvalr16 = $_POST["valr16"];
  $xvalr17 = $_POST["valr17"];
  $xvalr18 = $_POST["valr18"];
  $xvalr19 = $_POST["valr19"];
  $xvalr20 = $_POST["valr20"];
  $xvalr21 = $_POST["valr21"];
  $xvalr22 = $_POST["valr22"];
  $xvalr23 = $_POST["valr23"];
  $xvalr24 = $_POST["valr24"];
  $xvalr25 = $_POST["valr25"];
  $xvalr26 = $_POST["valr26"];
  $xvalr27 = $_POST["valr27"];
  $xvalr28 = $_POST["valr28"];
  $xvalr29 = $_POST["valr29"];
  $xvalr30 = $_POST["valr30"];
  $xvalr31 = $_POST["valr31"];
  $xvalr32 = $_POST["valr32"];



  
  
  //
  $xvals1 = $_POST["vals1"];
  $xvals2 = $_POST["vals2"];
  $xvals3 = $_POST["vals3"];
  $xvals4 = $_POST["vals4"];
  $xvals5 = $_POST["vals5"];
  $xvals6 = $_POST["vals6"];
  $xvals7 = $_POST["vals7"];
  $xvals8 = $_POST["vals8"];
  $xvals9 = $_POST["vals9"];
  $xvals10 = $_POST["vals10"];
  $xvals11 = $_POST["vals11"];
  $xvals12 = $_POST["vals12"];
  $xvals13 = $_POST["vals13"];
  $xvals14 = $_POST["vals14"];
  $xvals15 = $_POST["vals15"];
  $xvals16 = $_POST["vals16"];
  $xvals17 = $_POST["vals17"];
  $xvals18 = $_POST["vals18"];
  $xvals19 = $_POST["vals19"];
  $xvals20 = $_POST["vals20"];
  $xvals21 = $_POST["vals21"];
  $xvals22 = $_POST["vals22"];
  $xvals23 = $_POST["vals23"];
  $xvals24 = $_POST["vals24"];
  $xvals25 = $_POST["vals25"];
  $xvals26 = $_POST["vals26"];
  $xvals27 = $_POST["vals27"];
  $xvals28 = $_POST["vals28"];
  $xvals29 = $_POST["vals29"];
  $xvals30 = $_POST["vals30"];
  $xvals31 = $_POST["vals31"];
  $xvals32 = $_POST["vals32"];



  //
  //
  
     $fworsitex = $_POST["fworsitex"];
  $flinex = $_POST["flinex"];
  $fidx = $_POST["fidx"];
   $fid_pd = $_POST["fid_pd"];
   
     $blth_now = date("Y-m");
  
  
  $farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25.";".$xvalr26.";".$xvalr27.";".$xvalr28.";".$xvalr29.";".$xvalr30.";".$xvalr31.";".$xvalr32;

  $farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26.";".$xvals27.";".$xvals28.";".$xvals29.";".$xvals30.";".$xvals31.";".$xvals32;
  
  
  //echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";
  $fscore = $xvals1 + $xvals2 + $xvals3 + $xvals4 + $xvals5 + $xvals6 + $xvals7 + $xvals8 + $xvals9 + $xvals10 + $xvals11 + $xvals12 + $xvals13 + $xvals14 + $xvals15 + $xvals16 + $xvals17 + $xvals18 + $xvals19 + $xvals20 + $xvals21 + $xvals22 + $xvals23 + $xvals24 + $xvals25 + $xvals26 + $xvals27 + $xvals28 + $xvals29 + $xvals30 + $xvals31 + $xvals32;

        $score = round(($fscore / 96) * 100);
		
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
    $emailBody .="<td  width=\"5%\">No</td><td width=\"10%\">Item</td><td width=\"10%\"></td><td width=\"10%\"></td><td width=\"10%\">Silver</td><td width=\"10%\">Gold</td><td width=\"10%\">Deskripsi</td><td width=\"10%\">Evaluasi</td><td width=\"10%\">Note</td><td width=\"10%\">Temuan</td><td width=\"20%\">Tanggal</td>";
    $emailBody .="</tr>";
	

$queryku = mysqli_query($con, "select *, substring(fdate_modified, 1, 7) from t_finding_pm where fid_schedule = '$fidx' and substring(fdate_modified, 1, 7) = '$blth_now' order by fid ASC");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fphoto = $queryku2['fphoto'];
	$fnote = $queryku2['fnote'];
	$fdate_modified = $queryku2['fdate_modified'];
	$fid_score = $queryku2['fid_score'];
	
	
	$des = mysqli_query($con, "select * from t_form_pm_tool where fid = '$fid_score'");
	while($des2=mysqli_fetch_array($des))
{
	
	$fitem1 = $des2['fitem1'];
	$fitem2 = $des2['fitem2'];
	$fitem3 = $des2['fitem3'];
	$fsilver = $des2['fsilver'];
	$fgold = $des2['fgold'];
	$fdesc = $des2['fdesc'];
	$fevi = $des2['fevi'];


	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnote</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 

	
	$emailBody .="<tr>";
    $emailBody .="<td>$no</td><td>$fitem1</td><td>$fitem2</td><td>$fitem3</td><td>$fsilver</td><td>$fgold</td><td>$fdesc</td><td>$fevi</td><td>$xml->body</td><td><img style='width:100px;' src='".LOC_IMAGE."images/temuanPM/".$fphoto."' /></td><td>$fdate_modified</td>";
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
  
 echo "<script>window.location='cek_board_pm_tool.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex'</script>";
  
      
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
  
      //Tst Nilai
  
    $xvalr1 = $_POST["valr1"];
  $xvalr2 = $_POST["valr2"];
  $xvalr3 = $_POST["valr3"];
  $xvalr4 = $_POST["valr4"];
  $xvalr5 = $_POST["valr5"];
  $xvalr6 = $_POST["valr6"];
  $xvalr7 = $_POST["valr7"];
  $xvalr8 = $_POST["valr8"];
  $xvalr9 = $_POST["valr9"];
  $xvalr10 = $_POST["valr10"];
  $xvalr11 = $_POST["valr11"];
  $xvalr12 = $_POST["valr12"];
  $xvalr13 = $_POST["valr13"];
  $xvalr14 = $_POST["valr14"];
  $xvalr15 = $_POST["valr15"];
  $xvalr16 = $_POST["valr16"];
  $xvalr17 = $_POST["valr17"];
  $xvalr18 = $_POST["valr18"];
  $xvalr19 = $_POST["valr19"];
  $xvalr20 = $_POST["valr20"];
  $xvalr21 = $_POST["valr21"];
  $xvalr22 = $_POST["valr22"];
  $xvalr23 = $_POST["valr23"];
  $xvalr24 = $_POST["valr24"];
  $xvalr25 = $_POST["valr25"];
  $xvalr26 = $_POST["valr26"];
  $xvalr27 = $_POST["valr27"];
  $xvalr28 = $_POST["valr28"];
  $xvalr29 = $_POST["valr29"];
  $xvalr30 = $_POST["valr30"];
  $xvalr31 = $_POST["valr31"];
  $xvalr32 = $_POST["valr32"];



  
  
  //
  $xvals1 = $_POST["vals1"];
  $xvals2 = $_POST["vals2"];
  $xvals3 = $_POST["vals3"];
  $xvals4 = $_POST["vals4"];
  $xvals5 = $_POST["vals5"];
  $xvals6 = $_POST["vals6"];
  $xvals7 = $_POST["vals7"];
  $xvals8 = $_POST["vals8"];
  $xvals9 = $_POST["vals9"];
  $xvals10 = $_POST["vals10"];
  $xvals11 = $_POST["vals11"];
  $xvals12 = $_POST["vals12"];
  $xvals13 = $_POST["vals13"];
  $xvals14 = $_POST["vals14"];
  $xvals15 = $_POST["vals15"];
  $xvals16 = $_POST["vals16"];
  $xvals17 = $_POST["vals17"];
  $xvals18 = $_POST["vals18"];
  $xvals19 = $_POST["vals19"];
  $xvals20 = $_POST["vals20"];
  $xvals21 = $_POST["vals21"];
  $xvals22 = $_POST["vals22"];
  $xvals23 = $_POST["vals23"];
  $xvals24 = $_POST["vals24"];
  $xvals25 = $_POST["vals25"];
  $xvals26 = $_POST["vals26"];
  $xvals27 = $_POST["vals27"];
  $xvals28 = $_POST["vals28"];
  $xvals29 = $_POST["vals29"];
  $xvals30 = $_POST["vals30"];
  $xvals31 = $_POST["vals31"];
  $xvals32 = $_POST["vals32"];



  //
  
  
  $fidx = $_POST["fid_pd"];
  
  $farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25.";".$xvalr26.";".$xvalr27.";".$xvalr28.";".$xvalr29.";".$xvalr30.";".$xvalr31.";".$xvalr32;

  $farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26.";".$xvals27.";".$xvals28.";".$xvals29.";".$xvals30.";".$xvals31.";".$xvals32;
  
  
  //echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

 $fscore = $xvals1 + $xvals2 + $xvals3 + $xvals4 + $xvals5 + $xvals6 + $xvals7 + $xvals8 + $xvals9 + $xvals10 + $xvals11 + $xvals12 + $xvals13 + $xvals14 + $xvals15 + $xvals16 + $xvals17 + $xvals18 + $xvals19 + $xvals20 + $xvals21 + $xvals22 + $xvals23 + $xvals24 + $xvals25 + $xvals26 + $xvals27 + $xvals28+ $xvals29 + $xvals30 + $xvals31 + $xvals32;

        $score = round(($fscore / 96) * 100);
  
  
  mysqli_query($con, "update t_schedule_pm set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fidx'");
  
  
  //End Nilai
  
  echo "<script>window.location='cek_board_pm_tool.php?fid=$fid_schedule&&fline=$flinex&&fworsite=$fworsitex'</script>";
  
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
      <form action="cek_board_pm_tool.php" method="post" enctype="multipart/form-data">
	  
	  	  	  	  	  	  	   <!-- data score -->



      <input type="hidden" name="vals1" id="vals1_" />
      <input type="hidden" name="vals2" id="vals2_" />
      <input type="hidden" name="vals3" id="vals3_" />   
      <input type="hidden" name="vals4" id="vals4_" />
      <input type="hidden" name="vals5" id="vals5_" />
      <input type="hidden" name="vals6" id="vals6_" />
      <input type="hidden" name="vals7" id="vals7_" />
      <input type="hidden" name="vals8" id="vals8_" />
      <input type="hidden" name="vals9" id="vals9_" />
      <input type="hidden" name="vals10" id="vals10_" />
      <input type="hidden" name="vals11" id="vals11_" />
      <input type="hidden" name="vals12" id="vals12_" />
      <input type="hidden" name="vals13" id="vals13_" />
      <input type="hidden" name="vals14" id="vals14_" />
      <input type="hidden" name="vals15" id="vals15_" />
      <input type="hidden" name="vals16" id="vals16_" />
      <input type="hidden" name="vals17" id="vals17_" />
      <input type="hidden" name="vals18" id="vals18_" />
      <input type="hidden" name="vals19" id="vals19_" />
      <input type="hidden" name="vals20" id="vals20_" />
      <input type="hidden" name="vals21" id="vals21_" />
      <input type="hidden" name="vals22" id="vals22_" />
      <input type="hidden" name="vals23" id="vals23_" />
      <input type="hidden" name="vals24" id="vals24_" />
	  <input type="hidden" name="vals25" id="vals25_" />
      <input type="hidden" name="vals26" id="vals26_" />
      <input type="hidden" name="vals27" id="vals27_" />
      <input type="hidden" name="vals28" id="vals28_" />
      <input type="hidden" name="vals29" id="vals29_" />
	   <input type="hidden" name="vals30" id="vals30_" />
      <input type="hidden" name="vals31" id="vals31_" />
      <input type="hidden" name="vals32" id="vals32_" />
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
    url: 'cek_pm_tool.php',       
    success: function(htmlx) {
      var myStr = htmlx;
      document.getElementById('tableku').innerHTML = htmlx;
    }
    });
	
								//get score
    document.getElementById('vals1_').value = document.getElementById('vals1').value;
    document.getElementById('vals2_').value = document.getElementById('vals2').value;
    document.getElementById('vals3_').value = document.getElementById('vals3').value;
    document.getElementById('vals4_').value = document.getElementById('vals4').value;
    document.getElementById('vals5_').value = document.getElementById('vals5').value;
    document.getElementById('vals6_').value = document.getElementById('vals6').value;  
    document.getElementById('vals7_').value = document.getElementById('vals7').value;
    document.getElementById('vals8_').value = document.getElementById('vals8').value;
    document.getElementById('vals9_').value = document.getElementById('vals9').value;
    document.getElementById('vals10_').value = document.getElementById('vals10').value;
    document.getElementById('vals11_').value = document.getElementById('vals11').value;  
    document.getElementById('vals12_').value = document.getElementById('vals12').value;
    document.getElementById('vals13_').value = document.getElementById('vals13').value;
    document.getElementById('vals14_').value = document.getElementById('vals14').value;
    document.getElementById('vals15_').value = document.getElementById('vals15').value;
    document.getElementById('vals16_').value = document.getElementById('vals16').value;  
    document.getElementById('vals17_').value = document.getElementById('vals17').value;
    document.getElementById('vals18_').value = document.getElementById('vals18').value;
    document.getElementById('vals19_').value = document.getElementById('vals19').value;
    document.getElementById('vals20_').value = document.getElementById('vals20').value;
    document.getElementById('vals21_').value = document.getElementById('vals21').value;  
    document.getElementById('vals22_').value = document.getElementById('vals22').value;
    document.getElementById('vals23_').value = document.getElementById('vals23').value;
    document.getElementById('vals24_').value = document.getElementById('vals24').value;
	document.getElementById('vals25_').value = document.getElementById('vals25').value;
    document.getElementById('vals26_').value = document.getElementById('vals26').value;  
    document.getElementById('vals27_').value = document.getElementById('vals27').value;
    document.getElementById('vals28_').value = document.getElementById('vals28').value;
    document.getElementById('vals29_').value = document.getElementById('vals29').value;
	document.getElementById('vals30_').value = document.getElementById('vals30').value;
    document.getElementById('vals31_').value = document.getElementById('vals31').value;  
    document.getElementById('vals32_').value = document.getElementById('vals32').value;

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






