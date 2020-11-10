<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form assesor STW";

$active_dashboard = "";
$active_4s = "";
$active_stw = "";
$active_pm = "";
$active_om = "active";

$fid = $_GET['fid'];

include 'cek_jml_stw.php';

$queryku = mysqli_query($con, "select farray_result, farray_score from t_schedule_stw where fid = '$fid'");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fresult_nye = $queryku2['farray_result'];
	$fscore_nye = $queryku2['farray_score'];
}


$valr = explode(";",$fresult_nye);
$vals = explode(";",$fscore_nye);

$result_bronze = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8] + $valr[9] + $valr[10] + $valr[11];

$result_silver = $valr[12]  + $valr[13] + $valr[14] + $valr[15] + $valr[16] + $valr[17] + $valr[18] + $valr[19] + $valr[20] + $valr[21] + $valr[22] + $valr[23] + $valr[24] + $valr[25] + $valr[26];


$result_gold = $valr[27] + $valr[28] + $valr[29] + $valr[30] + $valr[31] + $valr[32] + $valr[33] + $valr[34] + $valr[35] + $valr[36] + $valr[37] + $valr[38] + $valr[39] + $valr[40];


$score_bronze = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11];

$score_silver = $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23] + $vals[24] + $vals[25] + $vals[26];

$score_gold =  + $vals[27] + $vals[28] + $vals[29] + $vals[30] + $vals[31] + $vals[32] + $vals[33] + $vals[34] + $vals[35]+ $vals[35] + $vals[36] + $vals[37] + $vals[38] + $vals[39] + $vals[40];





if($score_bronze > 36){
  $score_bronze = 36;
}

//echo $score;

$score_bronze = round(($score_bronze / 36) * 100);

$text_score_bronze = "";
if($score_bronze != ""){
$text_score_bronze = "Score : ".$score_bronze;
} 



if($score_silver > 42){
  $score_silver = 42;
}

//echo $score;

$score_silver = round(($score_silver / 42) * 100);

$text_score_silver = "";
if($score_silver != ""){
$text_score_silver = "Score : ".$score_silver;
}     



if($score_gold > 42){
  $score_gold = 42;
}

//echo $score;

$score_gold = round(($score_gold / 42) * 100);

$text_score_gold = "";
if($score_gold != ""){
$text_score_gold = "Score : ".$score_gold;
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

<center><legend style="margin:-10px">Form STW</legend></center>

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
<form action="cek_assessor_stw_qc.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fid; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr>
<th width="20%"><center>Item</center></th>
<th width="70%"><center>Standard evaluasi<br>Level bronze (sistemnya jadi)</center></th>
<th width="5%"><center>Hasil</center></th>
<th width="5%"><center>Score</center></th>
<th><center>Temuan</center></th>
</tr>
</thead>
<tbody>
<tr>
  <td rowspan="5">
    Konsistensi standard kerja
  </td>
  <td>
      １）Membuat jelas/mieruka standard kerja (boarr kontrol pekerjaan : tabel yamazumi horisontal axis)<br/><br/>
         A. Ada board kontrol pekerjaan (masing-masing ruangan)
  </td>
  <td>
  <select name="valrb1" id="valrb1" style="width: 45px;" >
    <option value="X" <?php echo ($valr[0] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[0] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
  <select name="valsb1" id="vals1" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[0] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='1','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml1;?> Temuan</p>
</td>
 
</tr>

<tr>

  <td>
       ２）Membuat jelas/mieruka SOP & kesiapanya (SOP : semua pekerjaan di dalam grup)<br/><br/>
          A. Ada list semua pekerjaan didalam grup<br><br>B. SOP dipilah-pilah & kondisinya siap segera bisa dipakai (porsi yg sudah dibuat)
          </td>
  <td>
  <select name="valrb2" id="valrb2" style="width: 45px;">
    <option value="X" <?php echo ($valr[1] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[1] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
  <select name="valsb2" id="vals2" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[1] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='2','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml2;?> Temuan</p>
</td>

</tr>


<tr>
  <td>
      C. Pembuatan SOP 70% atau lebih (semua pekerjaan didalam grup)
      <br><br>
      D.  Ada planing pembuatan SOP, kondisi progresnya kelihatan
  </td>
  <td>
  <select name="valrb3" id="valrb3" style="width: 45px;">
    <option value="X" <?php echo ($valr[2] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[2] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
</td>
  <td>
  <select name="valsb3" id="vals3" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[2] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='3','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml3;?> Temuan</p>
</td>
 
</tr>


<tr>
  <td>
     ３）Melaksanakan observasi pekerjaan berdasarkan SOP (GL & TL)<br/><br/>
         A. Membuat planing observasi pekerjaan dan melaksanakanya<br><br>
         B. Pekerjaan reguler member dilaksanakan 1kali atau lebih dalam 1 bulan
  </td>
  <td>
  <select name="valrb4" id="valrb4" style="width: 45px;">
    <option value="X" <?php echo ($valr[3] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[3] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
</td>
  <td>
  <select name="valsb4" id="vals4" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[3] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='4','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml4;?> Temuan</p>
</td>
</tr>


<tr>
  <td>
     ４）Observasi kepatuhan standard kerja (pergerakan orang)<br/><br/>
          A. Melakukan pekerjaan sesuai dengan SOP (hasil kepatuhanya kelihatan)
  </td>
  <td>
  <select name="valrb5" id="valrb5" style="width: 45px;">
   <option value="X" <?php echo ($valr[4] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[4] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
  <select name="valsb5" id="vals5" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[4] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
 
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='5','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml5;?> Temuan</p>
  </td> 
</tr>
<tr>
  <td rowspan="3">Revisi standard kerja</td>
  <td>
     ５）Melihat lebih dalam pekerjaan dengan observasi berdasarkab SOP<br/><br/>
         A. Melistup point masalah & pekerjaan sulit dikerjakan dengan observasi berdasarkan SOP
  </td>
  <td>
  <select name="valrb6" id="valrb6" style="width: 45px;">
    <option value="X" <?php echo ($valr[5] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[5] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
 <select name="valsb6" id="vals6" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[5] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
 <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='6','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml6;?> Temuan</p>
 </td>
</tr>

<tr>

  <td>
      ６）Kaizen point masalah & pekerjaan sulit dikerjakan<br/><br/>
         A. Melakukan kaizen terhadap point masalah *& pekerjaan sulit dikerjakan dari observasi pekerjaan
         <br>※Prosentase pencapaian kaizen 70% atau lebih
  </td>
  <td>
  <select name="valrb7" id="valrb7" style="width: 45px;">
    <option value="X" <?php echo ($valr[6] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[6] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
 <select name="valsb7" id="vals7" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[6] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='7','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml7;?> Temuan</p>
  </td>
</tr>

<tr>

  <td>
      ７）Melakukan revisi SOP dan men-standarisasi<br/><br/>
         A. Item kaizen/revisi di turunkan ke SOP
  </td>
  <td>
  <select name="valrb8" id="valrb8" style="width: 45px;">
     <option value="X" <?php echo ($valr[7] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[7] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
 <select name="valsb8" id="vals8" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[7] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
   <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='8','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml8;?> Temuan</p>
   </td>
</tr>



<tr>
  <td colspan="4" class="text-center">Standard evaluasi aktivitas terkait GL & TL</td>
<tr>  

<tr>
  <td>
   Item aktivitas
  </td>
  <td>
       ８）Menjadi aktivitas yg sesuai dengan kebutuhan grup<br/><br/>
         A. Ada keterkaitan dari konsistensi & revisi SOP
  </td>
  <td>
 <select name="valrb9" id="valrb9" style="width: 45px;">
    <option value="X" <?php echo ($valr[8] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[8] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
 <select name="valsb9" id="vals9" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[8] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='9','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml9;?> Temuan</p>
</td>

</tr>


<tr>
  <td>
   Kondisi aktivitas
  </td>
  <td>
        ９）Bisa membuat jelas/mieruka item aktivitas <br/><br/>
         A. Melakukan aktivitas/upaya dengan menetukan planing, target, item pelaksanaan<br>
         B. Kondisi progres & follow cek terhadap planing diketahui (prosentase progres 70%)
  </td>
  <td>
  <select name="valrb10" id="valrb10" style="width: 45px;">
    <option value="X" <?php echo ($valr[9] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[9] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
 <select name="valsb10" id="vals10" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[9] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='10','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml10;?> Temuan</p>
</td>
</tr>

<tr>
  <td>
   Hasil
  </td>
  <td>
        10) Pendidikan SDM & safety dll <br/><br/>
         A. Dengan dilakukanya aktivitas, teknikal skill (sheet pendidikan teknikal skill dll) meningkat
         <br>
         B.  Evaluasi resiko semua pekerjaan menggunakan evaluasi OSHMS berjalan
       
  </td>
  <td>
 <select name="valrb11" id="valrb11" style="width: 45px;">
    <option value="X" <?php echo ($valr[10] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[10] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
 <select name="valsb11" id="vals11" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[10] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
 <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='11','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml11;?> Temuan</p>
 </td>
</tr>


<tr>
  <td>
   Pengelolaan GL kontrol board
  </td>
  <td>
         11）Melakukan aktivitas bersama atasan menggunakan GL kontrol board
       
  </td>
 <td>
 <select name="valrb12" id="valrb12" style="width: 45px;">
    <option value="X" <?php echo ($valr[11] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[11] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
 <select name="valsb12" id="vals12" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[11] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='12','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml12;?> Temuan</p>
</td>
</tr>

<tr bgcolor="bronze" style="color:white;">
  <td class="text-center">
   Standard evaluasi
  </td>
  <td colspan="3" class="text-center">
        Level bronze <br><br>Didalam full score 36 point, sertifikasi bronz 29 point (80%)<br><br>（Jika 29 point atau lebih, Lulus level bronz pengeloalaan tempat kerja)
       
  </td>
 
</tr>




</tbody>
</table>

<br>
<br>

<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr>
<th width="20%"><center>Item</center></th>
<th width="30%"><center>Standard evaluasi<br>Level silver (PDCA berjalan/berputar)</center></th>
<th width="5%"><center>Hasil</center></th>
<th width="5%"><center>Score</center></th>
<th width="40%"><center>Penjelasan</center></th>
<th><center>Temuan</center></th>
</tr>
</thead>
<tbody>
<tr>
  <td rowspan="6">
    Konsistensi standard kerja
  </td>
  <td>
      １）Membuat jelas/mieruka standard kerja (boarr kontrol pekerjaan : tabel yamazumi horisontal axis)<br/><br/>
         A. Ada board kontrol pekerjaan (masing-masing ruangan)<br> ※Masing-masing member, melakukan maintenance/update setiap setengah sift
  </td>
  <td>
  <select name="valrb13" id="valrb13" style="width: 45px;" >
    <option value="X" <?php echo ($valr[12] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[12] ==  'O') ? ' selected="selected"' : "";?>>O</option>      
  </select>  
</td>
  <td>
  <select name="valsb13" id="vals13" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[12] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br><br>
  A.1 Pekerjaan dapat diketahui menggunakan board kontrol pekerjaan
  <br><br>
  A.2 Termaintenance/update setiap setengah sift, melakukan follow keterlambatan & kemajuan pekerjaan
</td>  
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='13','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml13;?> Temuan</p>
</td>
</tr>

<tr>

  <td>
       ２）Membuat jelas/mieruka SOP & kesiapanya (SOP : semua pekerjaan di dalam grup)<br/><br/>
          A. Ada list semua pekerjaan didalam grup<br><br>B. SOP dipilah-pilah & kondisinya siap segera bisa dipakai (porsi yg sudah dibuat)
          </td>
  <td>
  <select name="valrb14" id="valrb14" style="width: 45px;">
    <option value="X" <?php echo ($valr[13] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[13] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
  <select name="valsb14" id="vals14" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[13] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br><br>A. Ada list semua pekerjaan, ada/tidak adanya SOP segera bisa diketahui
    <br><br>
    B. SOP siap & dipilah-pilah, jadi bisa segera dipakai/diambil
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='14','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml14;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
      C. Pembuatan SOP 90% atau lebih (semua pekerjaan didalam grup)
      <br><br>
      D.  Ada planing pembuatan SOP, kondisi progresnya kelihatan
  </td>
  <td>
  <select name="valrb15" id="valrb15" style="width: 45px;">
   <option value="X" <?php echo ($valr[14] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[14] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
  <select name="valsb15" id="vals15" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[14] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>C. Memenuhi prosentase pembuatan masing-masing level (baru, revisi pembautanya di planingkan 3 bulan)
<br><br>
※Periode kontrol waktu awal start engine baru disesuaikan di 3 bulan
  </td> 
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='15','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml15;?> Temuan</p>
  </td> 
</tr>


<tr>
  <td>
     ３）Melaksanakan observasi pekerjaan berdasarkan SOP (GL & TL)<br/><br/>
         A. Membuat planing observasi pekerjaan dan melaksanakanya<br><br>
         B. Semua member dilaksanakan 1 kali atau lebih dalam 1 bulan (termasuk pekerjaan abnormal treatment, pekerjaan berfrekuensi rendah)
  </td>
  <td>
  <select name="valrb16" id="valrb16" style="width: 45px;">
    <option value="X" <?php echo ($valr[15] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[15] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
  <select name="valsb16" id="vals16" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[15] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br> <br> 
   A. Melaksanakan secara periodik observasi pekerjaan berdasarkan SOP
    （Tidak ada observasi pekerjaan yg sama dengan operator yg sama)
    <br> 
    B. Ada inovasi observasi pekerjaan (observasi pekerjaan berfrekuensi rendah, pekerjaan abnormal treatment)<br>Benkyokai observasi, observasi bersama, member mengikuti aktivitas observasi dll)
    </td> 
    <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='16','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml16;?> Temuan</p>
    </td> 
</tr>


<tr>
  <td>
     C. Ada rekord & follow cek dari manager, CL 
  </td>
  <td>
  <select name="valrb17" id="valrb17" style="width: 45px;">
    <option value="X" <?php echo ($valr[16] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[16] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
  <select name="valsb17" id="vals17" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[16] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    C. Ada follow cek dari manager, CL di rekord observasi<br>Tenda tangan, komentar dll）
   </td>  
   <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='17','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml17;?> Temuan</p>
   </td>
</tr>


<tr>
  <td>
     ４）Observasi kepatuhan standard kerja (pergerakan orang)<br/><br/>
          A. Melakukan pekerjaan sesuai dengan SOP (hasil kepatuhanya kelihatan)
          <br>
          B. Pergerakan berbahaya dari elemen safety, kualitas segera dengan cepat diperbaiki
  </td>
  <td>
  <select name="valrb18" id="valrb18" style="width: 45px;">
    <option value="X" <?php echo ($valr[17] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[17] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
</td>
  <td>
  <select name="valsb18" id="vals18" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[17] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td> 
    <br><br>A. Auditor (asesor) memilih 2 operator dan melakukan observasi kerja<br>
    - (Cek sebagian dari pekerjaan mengukur, pekerjaan mengetest, patorl proses dll)<br>
    - Perhatian : memilih 2 orang operator, jika 1 orang saja X, point evaluasinya 0 point

  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='18','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml18;?> Temuan</p>
  </td>
</tr>
<tr>
  <td rowspan="3">Revisi standard kerja</td>
  <td>
     ５）Melihat lebih dalam pekerjaan dengan observasi berdasarkab SOP<br/><br/>
         A. Melistup point masalah & pekerjaan sulit dikerjakan dengan observasi berdasarkan SOP
         <br>
         B. Point masalah & pekerjaan sulit dikerjakan di SOP dari operator/bottom-up, dikeluarkan secara aktiv
  </td>
  <td>
  <select name="valrb19" id="valrb19" style="width: 45px;">
     <option value="X" <?php echo ($valr[18] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[18] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
 <select name="valsb19" id="vals19" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[18] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
  

</td>
  <td>
    <br><br><br>
    A. Melakukan identifikasi & bimbingan terhadap yg belum dipatuhi (hasil aktualnya kelihatan/diketahui)
    <br>
    B. Ada reekord, dan dilakukan share
    


  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='19','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml19;?> Temuan</p>
  </td> 
</tr>

<tr>

  <td>
      ６）Kaizen point masalah & pekerjaan sulit dikerjakan<br/><br/>
         A. Melakukan kaizen terhadap point masalah *& pekerjaan sulit dikerjakan dari observasi pekerjaan
         <br>※Prosentase pencapaian kaizen 80% atau lebih
  </td>
  <td>
  <select name="valrb20" id="valrb20" style="width: 45px;">
   <option value="X" <?php echo ($valr[19] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[19] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
</td>
  <td>
 <select name="valsb20" id="vals20" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[19] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    <br><br>
    A.1. Memenihi prosentase pencapaian kaizen dari masing-masing level
    <br>
    A.2. Hasil aktual kaizen terkontrol dan efektivitasnya kelihatan/diketahui (kumpulan contoh kaizen dll)
  </td> 
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='20','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml20;?> Temuan</p>
  </td>  
</tr>

<tr>

  <td>
      ７）Melakukan revisi SOP dan men-standarisasi<br/><br/>
         A. Item kaizen/revisi di turunkan ke SOP<br>
         B. Setelah dilakukan revisi, melakukan bimbingan & pelatihan/training dan ada rekordnya
  </td>
  <td>
  <select name="valrb21" id="valrb21" style="width: 45px;">
    <option value="X" <?php echo ($valr[20] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[20] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
 <select name="valsb21" id="vals21" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[20] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    <br><br>
    A. SOP yg telah direvisi, ada tanda tangan dari manager, CL<br>
    B. Kapan ke siapa, apa yg ditrainingkan kelihatan/diketahui
  </td>
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='21','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml21;?> Temuan</p>
  </td>   
</tr>



<tr>
  <td colspan="5" class="text-center">Standard evaluasi aktivitas terkait GL & TL</td>
<tr>  

<tr>
  <td>
   Item aktivitas
  </td>
  <td>
       ８）Menjadi aktivitas yg sesuai dengan kebutuhan grup<br/><br/>
         A. Ada keterkaitan dari konsistensi & revisi SOP<br><br>
         B. Ada keterkaitan dengan henkaten & trend/tendensi kedepanya
  </td>
  <td>
 <select name="valrb22" id="valrb22" style="width: 45px;">
   <option value="X" <?php echo ($valr[21] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[21] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
 <select name="valsb22" id="vals22" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[21] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    <br><br>
    A. Melakukan dari aktivitas konsistensi & revisi SOP, hingga meningkatkan kelemahanya<br>
    B. Melakukan aktivitas yg diperlukan saat ini & kedepanya (terkait ① atau ② mana yg tuju）
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='22','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml22;?> Temuan</p>
  </td>
</tr>


<tr>
  <td rowspan="2">
   Kondisi aktivitas
  </td>
  <td>
        ９）Bisa membuat jelas/mieruka item aktivitas <br/><br/>
         A. Melakukan aktivitas/upaya dengan menetukan planing, target, item pelaksanaan<br>
         B. Kondisi progres & follow cek terhadap planing diketahui (prosentase progres 90%)
  </td>
  <td>
  <select name="valrb23" id="valrb23" style="width: 45px;">
    <option value="X" <?php echo ($valr[22] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[22] ==  'O') ? ' selected="selected"' : "";?>>O</option>    
  </select>  
</td>
  <td>
 <select name="valsb23" id="vals23" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[22] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    <br><br>
     A. Planing, target, item pelaksanaanya menajadi diketahui<br>
     B. Memenuhi prosentase progres dari masing-masing level (jika ada yg tidak tercapai harus ada alasan yg tepat)

  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='23','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml23;?> Temuan</p>
  </td>
</tr>


<tr>

  <td>
        C. Ada follow cel manager, CL di dokumen-dokumenya
  </td>
  <td>
  <select name="valrb24" id="valrb24" style="width: 45px;">
   <option value="X" <?php echo ($valr[23] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[23] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
 <select name="valsb24" id="vals24" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[23] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    C. Follow dari manager, CL berjalan (ada komentar tulisan tangan)
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='24','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml24;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
   Hasil
  </td>
  <td>
        10) Pendidikan SDM & safety dll <br/><br/>
         A. Dengan dilakukanya aktivitas, teknikal skill (sheet pendidikan teknikal skill dll) meningkat
         <br>
         B.  Dengan evaluasi OSHMS riskdown & rankdown tercapai 
       
  </td>
  <td>
 <select name="valrb25" id="valrb25" style="width: 45px;">
    <option value="X" <?php echo ($valr[24] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[24] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
 <select name="valsb25" id="vals25" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[24] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    <br><br>
    A. Kondisi balajar teknikal skill per individu diketahui (boleh juga link dengan board kontrol)<br>
    B. Peningkatan dari elemen safety diketahui (boleh juga link dengan board kontrol)
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='25','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml25;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
   Pengelolaan GL kontrol board
  </td>
  <td>
         11）Menjaga & melanjutkan level bronz
       
  </td>
 <td>
 <select name="valrb26" id="valrb26" style="width: 45px;">
    <option value="X" <?php echo ($valr[25] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[25] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
 <select name="valsb26" id="vals26" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[25] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='26','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml26;?> Temuan</p>
  </td>
</tr>

<tr bgcolor="silver" style="color:black;">
  <td class="text-center">
   Standard evaluasi
  </td>
  <td colspan="4" class="text-center">
        Level silver <br><br>Didalam full score 42 point, sertifikasi silver 36 point (85%) <br><br>（Jika 36 point atau lebih, Lulus level silver pengelolaan tempat kerja)
  </td>
 
</tr>




</tbody>
</table>





<br>
<br>

<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr>
<th width="20%"><center>Item</center></th>
<th width="30%"><center>Standard evaluasi<br>Level gold (hasilnya keluar/ada)</center></th>
<th width="5%"><center>Hasil</center></th>
<th width="5%"><center>Score</center></th>
<th width="40%"><center>Penjelasan</center></th>
<th><center>Temuan</center></th>
</tr>
</thead>
<tbody>
<tr>
  <td rowspan="6">
    Konsistensi standard kerja
  </td>
  <td>
      １）Membuat jelas/mieruka standard kerja (boarr kontrol pekerjaan : tabel yamazumi horisontal axis)<br/><br/>
         A. Ada board kontrol pekerjaan (masing-masing ruangan)<br> ※Masing-masing member, melakukan maintenance/update setiap setengah sift
  </td>
  <td>
  <select name="valrb27" id="valrb27" style="width: 45px;" >
     <option value="X" <?php echo ($valr[26] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[26] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
  <select name="valsb27" id="vals27" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[26] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br><br>
  A.1 Pekerjaan dapat diketahui menggunakan board kontrol pekerjaan
  <br><br>
  A.2 Termaintenance/update setiap setengah sift, melakukan follow keterlambatan & kemajuan pekerjaan
</td>  
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='27','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
  <p class="text-center"><br/>
  Total : <?php echo $jml27;?> Temuan</p>
</td>

</tr>

<tr>

  <td>
       ２）Membuat jelas/mieruka SOP & kesiapanya (SOP : semua pekerjaan di dalam grup)<br/><br/>
          A. Ada list semua pekerjaan didalam grup<br><br>B. SOP dipilah-pilah & kondisinya siap segera bisa dipakai (porsi yg sudah dibuat)
          </td>
  <td>
  <select name="valrb28" id="valrb28" style="width: 45px;">
    <option value="X" <?php echo ($valr[27] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[27] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
  <select name="valsb28" id="vals28" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[27] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br><br>A. Ada list semua pekerjaan, ada/tidak adanya SOP segera bisa diketahui
    <br><br>
    B. SOP siap & dipilah-pilah, jadi bisa segera dipakai/diambil
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='28','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml28;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
      C. Pembuatan SOP 100% atau lebih (semua pekerjaan didalam grup)
      <br><br>
      ※Jika ada pekerjaan yg baru, ada planing pembuatanya, dan kondisi progresnya kelihatan
  </td>
  <td>
  <select name="valrb29" id="valrb29" style="width: 45px;">
    <option value="X" <?php echo ($valr[28] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[28] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
  <select name="valsb29" id="vals29" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[28] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>C. Memenuhi prosentase pembuatan masing-masing level (baru, revisi pembautanya di planingkan 3 bulan)
<br><br>
※Periode kontrol waktu awal start engine baru disesuaikan di 3 bulan
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='29','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml29;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
     ３）Melaksanakan observasi pekerjaan berdasarkan SOP (GL & TL)<br/><br/>
         A. Membuat planing observasi pekerjaan dan melaksanakanya<br><br>
         B. Semua member dilaksanakan 1 kali atau lebih dalam 1 bulan (termasuk pekerjaan abnormal treatment, pekerjaan berfrekuensi rendah)
  </td>
  <td>
  <select name="valrb30" id="valrb30" style="width: 45px;">
    <option value="X" <?php echo ($valr[29] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[29] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
  <select name="valsb30" id="vals30" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[29] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br> <br> 
   A. Melaksanakan secara periodik observasi pekerjaan berdasarkan SOP
    （Tidak ada observasi pekerjaan yg sama dengan operator yg sama)
    <br> 
    B. Ada inovasi observasi pekerjaan (observasi pekerjaan berfrekuensi rendah, pekerjaan abnormal treatment)<br>Benkyokai observasi, observasi bersama, member mengikuti aktivitas observasi dll)
    </td> 
    <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='30','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml30;?> Temuan</p>
    </td> 
</tr>


<tr>
  <td>
     C. Ada rekord & follow cek dari manager, CL 
  </td>
  <td>
  <select name="valrb31" id="valrb31" style="width: 45px;">
   <option value="X" <?php echo ($valr[30] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[30] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
  </select>  
</td>
  <td>
  <select name="valsb31" id="vals31" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[30] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    C. Ada follow cek dari manager, CL di rekord observasi<br>Tenda tangan, komentar dll）
   </td> 
   <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='31','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml31;?> Temuan</p>
   </td> 
</tr>


<tr>
  <td>
     ４）Observasi kepatuhan standard kerja (pergerakan orang)<br/><br/>
          A. Melakukan pekerjaan sesuai dengan SOP (hasil kepatuhanya kelihatan)
          <br>
          B. Pergerakan berbahaya dari elemen safety, kualitas segera dengan cepat diperbaiki
  </td>
  <td>
  <select name="valrb32" id="valrb32" style="width: 45px;">
   <option value="X" <?php echo ($valr[31] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[31] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
  <select name="valsb32" id="vals32" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[31] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td> 
    <br><br>A. Auditor (asesor) memilih 2 operator dan melakukan observasi kerja<br>
    - (Cek sebagian dari pekerjaan mengukur, pekerjaan mengetest, patorl proses dll)<br>
    - Perhatian : memilih 2 orang operator, jika 1 orang saja X, point evaluasinya 0 point

  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='32','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml32;?> Temuan</p>
  </td>
</tr>
<tr>
  <td rowspan="3">Revisi standard kerja</td>
  <td>
     ５）Melihat lebih dalam pekerjaan dengan observasi berdasarkab SOP<br/><br/>
         A. Melistup point masalah & pekerjaan sulit dikerjakan dengan observasi berdasarkan SOP
         <br>
         B. Point masalah & pekerjaan sulit dikerjakan di SOP dari operator/bottom-up, dikeluarkan secara aktiv
  </td>
  <td>
  <select name="valrb33" id="valrb33" style="width: 45px;">
    <option value="X" <?php echo ($valr[33] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[33] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
 <select name="valsb33" id="vals33" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[32] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
  

</td>
  <td>
    <br><br><br>
    A. Melakukan identifikasi & bimbingan terhadap yg belum dipatuhi (hasil aktualnya kelihatan/diketahui)
    <br>
    B. Ada reekord, dan dilakukan share
    


  </td>
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='33','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml33;?> Temuan</p>
  </td>   
</tr>

<tr>

  <td>
      ６）Kaizen point masalah & pekerjaan sulit dikerjakan<br/><br/>
         A. Melakukan kaizen terhadap point masalah *& pekerjaan sulit dikerjakan dari observasi pekerjaan
         <br>※Prosentase pencapaian kaizen 80% atau lebih
  </td>
  <td>
  <select name="valrb34" id="valrb34" style="width: 45px;">
    <option value="X" <?php echo ($valr[33] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[33] ==  'O') ? ' selected="selected"' : "";?>>O</option>    
  </select>  
</td>
  <td>
 <select name="valsb34" id="vals34" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[33] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    <br><br>
    A.1. Memenihi prosentase pencapaian kaizen dari masing-masing level
    <br>
    A.2. Hasil aktual kaizen terkontrol dan efektivitasnya kelihatan/diketahui (kumpulan contoh kaizen dll)
  </td> 
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='34','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml34;?> Temuan</p>
  </td>  
</tr>

<tr>

  <td>
      ７）Melakukan revisi SOP dan men-standarisasi<br/><br/>
         A. Item kaizen/revisi di turunkan ke SOP<br>
         B. Setelah dilakukan revisi, melakukan bimbingan & pelatihan/training dan ada rekordnya
  </td>
  <td>
  <select name="valrb35" id="valrb35" style="width: 45px;">
    <option value="X" <?php echo ($valr[34] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[34] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
 <select name="valsb35" id="vals35" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[34] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    <br><br>
    A. SOP yg telah direvisi, ada tanda tangan dari manager, CL<br>
    B. Kapan ke siapa, apa yg ditrainingkan kelihatan/diketahui
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='35','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml35;?> Temuan</p>
  </td> 
</tr>



<tr>
  <td colspan="5" class="text-center">Standard evaluasi aktivitas terkait GL & TL</td>
<tr>  

<tr>
  <td>
   Item aktivitas
  </td>
  <td>
       ８）Menjadi aktivitas yg sesuai dengan kebutuhan grup<br/><br/>
         A. Ada keterkaitan dari konsistensi & revisi SOP<br><br>
         B. Ada keterkaitan dengan henkaten & trend/tendensi kedepanya
  </td>
  <td>
 <select name="valrb36" id="valrb36" style="width: 45px;">
   <option value="X" <?php echo ($valr[35] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[35] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
 <select name="valsb36" id="vals36" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[35] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    <br><br>
    A. Melakukan dari aktivitas konsistensi & revisi SOP, hingga meningkatkan kelemahanya<br>
    B. Melakukan aktivitas yg diperlukan saat ini & kedepanya (terkait ① atau ② mana yg tuju）
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='36','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml36;?> Temuan</p>
  </td>
</tr>


<tr>
  <td rowspan="2">
   Kondisi aktivitas
  </td>
  <td>
        ９）Bisa membuat jelas/mieruka item aktivitas <br/><br/>
         A. Melakukan aktivitas/upaya dengan menetukan planing, target, item pelaksanaan<br>
         B. Kondisi progres & follow cek terhadap planing diketahui (prosentase progres 100%)
  </td>
  <td>
  <select name="valrb37" id="valrb37" style="width: 45px;">
    <option value="X" <?php echo ($valr[36] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[36] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
 <select name="valsb37" id="vals37" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[36] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    <br><br>
     A. Planing, target, item pelaksanaanya menajadi diketahui<br>
     B. Memenuhi prosentase progres dari masing-masing level (jika ada yg tidak tercapai harus ada alasan yg tepat)

  </td> 
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='37','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml37;?> Temuan</p>
  </td> 
</tr>


<tr>

  <td>
        C. Ada follow cel manager, CL di dokumen-dokumenya
  </td>
  <td>
  <select name="valrb38" id="valrb38" style="width: 45px;">
    <option value="X" <?php echo ($valr[37] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[37] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
 <select name="valsb38" id="vals38" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[37] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    C. Follow dari manager, CL berjalan (ada komentar tulisan tangan)
  </td>
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='38','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml38;?> Temuan</p>
  </td>  
</tr>


<tr>
  <td>
   Hasil
  </td>
  <td>
        10) Pendidikan SDM & safety dll <br/><br/>
         A. Dengan dilakukanya aktivitas, teknikal skill (sheet pendidikan teknikal skill dll) meningkat
         <br>
         B.  Dengan evaluasi OSHMS riskdown & rankdown tercapai 
       
  </td>
  <td>
 <select name="valrb39" id="valrb39" style="width: 45px;">
   <option value="X" <?php echo ($valr[38] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[38] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
 <select name="valsb39" id="vals39" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[38] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
    <br><br>
    A. Kondisi balajar teknikal skill per individu diketahui (boleh juga link dengan board kontrol)<br>
    B. Peningkatan dari elemen safety diketahui (boleh juga link dengan board kontrol)
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='39','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml39;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
   Pengelolaan GL kontrol board
  </td>
  <td>
         11）Menjaga & melanjutkan level silver
       
  </td>
 <td>
 <select name="valrb40" id="valrb40" style="width: 45px;">
    <option value="X" <?php echo ($valr[39] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[39] ==  'O') ? ' selected="selected"' : "";?>>O</option>    
  </select>  
</td>
  <td>
 <select name="valsb40" id="vals40" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[39] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
  </td>  
  <td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='40','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
      <p class="text-center"><br/>
  Total : <?php echo $jml40;?> Temuan</p>
  </td>
</tr>

<tr bgcolor="gold" style="color:black;">
  <td class="text-center">
   Standard evaluasi
  </td>
  <td colspan="4" class="text-center">
        Level gold <br><br>　Didalam full score 42 point, sertifikasi gold 38 point (90%) <br><br>（Jika mendapat 38 point atau lebih Lulus level silver pengelolaan tempat kerja）
       
  </td>
 
</tr>




</tbody>
</table>

<div class="row text-center">
  <div class="col-sm-4">
    <h2 style="color:brown;"><?php echo $text_score_bronze; ?></h2>

  </div>

  <div class="col-sm-4">
    <h2 style="color:silver"><?php echo $text_score_silver; ?></h2>
    
  </div>


<div class="col-sm-4">
    <h2 style="color:gold"><?php echo $text_score_gold; ?></h2>
    
  </div>


</div>  





<br>
<input type="submit" name="submit" value="SUBMIT" style="width:100%" class="btn btn-success" />
</form>
<br><!--
<center><h5>Ada temuan ? <a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>-->
<br>
</div>

</div>
<!-- /.container-fluid -->

 
<?php

if (isset($_POST['submit']))
{
	
	$xvalr1 = $_POST["valrb1"];
	$xvalr2 = $_POST["valrb2"];
	$xvalr3 = $_POST["valrb3"];
	$xvalr4 = $_POST["valrb4"];
	$xvalr5 = $_POST["valrb5"];
	$xvalr6 = $_POST["valrb6"];
	$xvalr7 = $_POST["valrb7"];
	$xvalr8 = $_POST["valrb8"];
	$xvalr9 = $_POST["valrb9"];
	$xvalr10 = $_POST["valrb10"];
  $xvalr11 = $_POST["valrb11"];
  $xvalr12 = $_POST["valrb12"];


  $xvalr13 = $_POST["valrb13"];
  $xvalr14 = $_POST["valrb14"];
  $xvalr15 = $_POST["valrb15"];
  $xvalr16 = $_POST["valrb16"];
  $xvalr17 = $_POST["valrb17"];
  $xvalr18 = $_POST["valrb18"];
  $xvalr19 = $_POST["valrb19"];
  $xvalr20 = $_POST["valrb20"];
  $xvalr21 = $_POST["valrb21"];
  $xvalr22 = $_POST["valrb22"];
  $xvalr23 = $_POST["valrb23"];
  $xvalr24 = $_POST["valrb24"];
  $xvalr25 = $_POST["valrb25"];
  $xvalr26 = $_POST["valrb26"];


  $xvalr27 = $_POST["valrb27"];
  $xvalr28 = $_POST["valrb28"];
  $xvalr29 = $_POST["valrb29"];
  $xvalr30 = $_POST["valrb30"];
  $xvalr31 = $_POST["valrb31"];
  $xvalr32 = $_POST["valrb32"];
  $xvalr33 = $_POST["valrb33"];
  $xvalr34 = $_POST["valrb34"];
  $xvalr35 = $_POST["valrb35"];
  $xvalr36 = $_POST["valrb36"];
  $xvalr37 = $_POST["valrb37"];
  $xvalr38 = $_POST["valrb38"];
  $xvalr39 = $_POST["valrb39"];
  $xvalr40 = $_POST["valrb40"];


	
	//Bronze
	$xvals1 = $_POST["valsb1"];
	$xvals2 = $_POST["valsb2"];
	$xvals3 = $_POST["valsb3"];
	$xvals4 = $_POST["valsb4"];
	$xvals5 = $_POST["valsb5"];
	$xvals6 = $_POST["valsb6"];
	$xvals7 = $_POST["valsb7"];
	$xvals8 = $_POST["valsb8"];
	$xvals9 = $_POST["valsb9"];
	$xvals10 = $_POST["valsb10"];
	$xvals11 = $_POST["valsb11"];
	$xvals12 = $_POST["valsb12"];

  //Silver

	$xvals13 = $_POST["valsb13"];
	$xvals14 = $_POST["valsb14"];
	$xvals15 = $_POST["valsb15"];
	$xvals16 = $_POST["valsb16"];
	$xvals17 = $_POST["valsb17"];
	$xvals18 = $_POST["valsb18"];
	$xvals19 = $_POST["valsb19"];
	$xvals20 = $_POST["valsb20"];
	$xvals21 = $_POST["valsb21"];
	$xvals22 = $_POST["valsb22"];
	$xvals23 = $_POST["valsb23"];
	$xvals24 = $_POST["valsb24"];
	$xvals25 = $_POST["valsb25"];
  $xvals26 = $_POST["valsb26"];

  //Gold

  $xvals27 = $_POST["valsb27"];
  $xvals28 = $_POST["valsb28"];
  $xvals29 = $_POST["valsb29"];
  $xvals30 = $_POST["valsb30"];
  $xvals31 = $_POST["valsb31"];
  $xvals32 = $_POST["valsb32"];
  $xvals33 = $_POST["valsb33"];
  $xvals34 = $_POST["valsb34"];
  $xvals35 = $_POST["valsb35"];
  $xvals36 = $_POST["valsb36"];
  $xvals37 = $_POST["valsb37"];
  $xvals38 = $_POST["valsb38"];
  $xvals39 = $_POST["valsb39"];
  $xvals40 = $_POST["valsb40"];
	//
	
	
	$fidx = $_POST["fidx"];
	
		$blth_now = date("Y-m");
	
	$farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25.";".$xvalr26.";".$xvalr27.";".$xvalr28.";".$xvalr29.";".$xvalr30.";".$xvalr31.";".$xvalr32.";".$xvalr33.";".$xvalr34.";".$xvalr35.";".$xvalr36.";".$xvalr37.";".$xvalr38.";".$xvalr39.";".$xvalr40;
	
	$farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26.";".$xvals27.";".$xvals28.";".$xvals29.";".$xvals30.";".$xvals31.";".$xvals32.";".$xvals33.";".$xvals34.";".$xvals35.";".$xvals36.";".$xvals37.";".$xvals38.";".$xvals39.";".$xvals40;


    $fscore = $xvals27 + $xvals28 + $xvals29 + $xvals30 + $xvals31 + $xvals32 + $xvals33 + $xvals34 + $xvals35 + $xvals36 + $xvals37 + $xvals38 + $xvals39 + $xvals40;

    $score = round(($fscore / 42) * 100);
	
		//Awal Email
	
	
	$get = mysqli_query($con, "select *, 'STW' as fhave from t_schedule_stw where fid = '$fidx'");
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
	
	
	$getlv = mysqli_query($con, "select fname from t_schedule_stw where fworsite = '$fworsite' and fline = '$fline' and fjobas = '$getjobas'");
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
    $emailBody .="<td  width=\"5%\">No</td><td width=\"10%\">Item</td><td width=\"12%\">Deskripsi</td><td width=\"16%\">Penjelasan</td><td width=\"30%\">Note</td><td width=\"10%\">Temuan</td><td width=\"30%\">Tanggal</td>";
    $emailBody .="</tr>";
	

$queryku = mysqli_query($con, "select *, substring(fdate_modified, 1, 7) from t_finding_stw where fid_schedule = '$fidx' and substring(fdate_modified, 1, 7) = '$blth_now' order by fid ASC");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fphoto = $queryku2['fphoto'];
	$fnote = $queryku2['fnote'];
	$fdate_modified = $queryku2['fdate_modified'];
	$fid_score = $queryku2['fid_score'];
	
	
	$des = mysqli_query($con, "select * from t_form_stw_qc where fid = '$fid_score'");
	while($des2=mysqli_fetch_array($des))
{
	
	$fitem = $des2['fitem'];
	$fdesc = $des2['fdesc'];
	$fpenj = $des2['fpenj'];


	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnote</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 

	
	$emailBody .="<tr>";
    $emailBody .="<td>$no</td><td>$fitem</td><td>$fdesc</td><td>$fpenj</td><td>$xml->body</td><td><img style='width:100px;' src='".LOC_IMAGE."images/temuanSTW/".$fphoto."' /></td><td>$fdate_modified</td>";
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
  

  mysqli_query($con, "update t_schedule_stw set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fidx'");
	
	
	//echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

	mysqli_query($con, "update t_schedule_stw set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'");
	
	echo "<script>window.location='cek_assessor_stw_qc.php?fid=$fidx'</script>";
			
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
    $path = "images/temuanSTW/";
    // Proses upload
    if(move_uploaded_file($tmp, $path.$foto)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database

  
  mysqli_query($con, "insert into t_finding_stw (fid_schedule, fphoto, fnote, fid_score, fgroup) values ('$fid_schedule', '$foto', '$fnote', '$fid_score', '$fid_schedule')");

}

}
  
  
  //Submit Nilai
  
  $xvalr1 = $_POST["valrb1"];
	$xvalr2 = $_POST["valrb2"];
	$xvalr3 = $_POST["valrb3"];
	$xvalr4 = $_POST["valrb4"];
	$xvalr5 = $_POST["valrb5"];
	$xvalr6 = $_POST["valrb6"];
	$xvalr7 = $_POST["valrb7"];
	$xvalr8 = $_POST["valrb8"];
	$xvalr9 = $_POST["valrb9"];
	$xvalr10 = $_POST["valrb10"];
  $xvalr11 = $_POST["valrb11"];
  $xvalr12 = $_POST["valrb12"];


  $xvalr13 = $_POST["valrb13"];
  $xvalr14 = $_POST["valrb14"];
  $xvalr15 = $_POST["valrb15"];
  $xvalr16 = $_POST["valrb16"];
  $xvalr17 = $_POST["valrb17"];
  $xvalr18 = $_POST["valrb18"];
  $xvalr19 = $_POST["valrb19"];
  $xvalr20 = $_POST["valrb20"];
  $xvalr21 = $_POST["valrb21"];
  $xvalr22 = $_POST["valrb22"];
  $xvalr23 = $_POST["valrb23"];
  $xvalr24 = $_POST["valrb24"];
  $xvalr25 = $_POST["valrb25"];
  $xvalr26 = $_POST["valrb26"];


  $xvalr27 = $_POST["valrb27"];
  $xvalr28 = $_POST["valrb28"];
  $xvalr29 = $_POST["valrb29"];
  $xvalr30 = $_POST["valrb30"];
  $xvalr31 = $_POST["valrb31"];
  $xvalr32 = $_POST["valrb32"];
  $xvalr33 = $_POST["valrb33"];
  $xvalr34 = $_POST["valrb34"];
  $xvalr35 = $_POST["valrb35"];
  $xvalr36 = $_POST["valrb36"];
  $xvalr37 = $_POST["valrb37"];
  $xvalr38 = $_POST["valrb38"];
  $xvalr39 = $_POST["valrb39"];
  $xvalr40 = $_POST["valrb40"];


	
	//Bronze
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

  //Silver

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

  //Gold

  $xvals27 = $_POST["vals27"];
  $xvals28 = $_POST["vals28"];
  $xvals29 = $_POST["vals29"];
  $xvals30 = $_POST["vals30"];
  $xvals31 = $_POST["vals31"];
  $xvals32 = $_POST["vals32"];
  $xvals33 = $_POST["vals33"];
  $xvals34 = $_POST["vals34"];
  $xvals35 = $_POST["vals35"];
  $xvals36 = $_POST["vals36"];
  $xvals37 = $_POST["vals37"];
  $xvals38 = $_POST["vals38"];
  $xvals39 = $_POST["vals39"];
  $xvals40 = $_POST["vals40"];
	//
	
	
	$fidx = $_POST["fid_schedule"];
	
	$farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25.";".$xvalr26.";".$xvalr27.";".$xvalr28.";".$xvalr29.";".$xvalr30.";".$xvalr31.";".$xvalr32.";".$xvalr33.";".$xvalr34.";".$xvalr35.";".$xvalr36.";".$xvalr37.";".$xvalr38.";".$xvalr39.";".$xvalr40;
	
	$farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26.";".$xvals27.";".$xvals28.";".$xvals29.";".$xvals30.";".$xvals31.";".$xvals32.";".$xvals33.";".$xvals34.";".$xvals35.";".$xvals36.";".$xvals37.";".$xvals38.";".$xvals39.";".$xvals40;


    $fscore = $xvals27 + $xvals28 + $xvals29 + $xvals30 + $xvals31 + $xvals32 + $xvals33 + $xvals34 + $xvals35 + $xvals36 + $xvals37 + $xvals38 + $xvals39 + $xvals40;

    $score = round(($fscore / 42) * 100);
  

  mysqli_query($con, "update t_schedule_stw set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fidx'");
	
	
  
  
   echo "<script>window.location='cek_assessor_stw_qc.php?fid=$fid_schedule'</script>";
  
}


?>
 
 

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Isi Temua OM</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="cek_assessor_stw_qc.php" method="post" enctype="multipart/form-data">
	  
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
      <input type="hidden" name="vals33" id="vals33_" />
      <input type="hidden" name="vals34" id="vals34_" />
      <input type="hidden" name="vals35" id="vals35_" />
	  <input type="hidden" name="vals36" id="vals36_" />
	  <input type="hidden" name="vals37" id="vals37_" />
      <input type="hidden" name="vals38" id="vals38_" />
      <input type="hidden" name="vals39" id="vals39_" />
      <input type="hidden" name="vals40" id="vals40_" />
	  
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
		
		<input type="hidden" name="fid_schedule" value="<?php echo $fid; ?>" >
		
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
      <hr/>
      <div id="tableku"></div>
      </form>
    </div>
  </div>
</div> 
 
<?php include('includes/footer.php'); ?>    


    <script>

    function getId(idschedule,idscore){
      
    var dataString = "idschedule="+idschedule+"&idscore="+idscore; 
    //alert(dataString);

    $.ajax({
    type: 'POST',
    data: dataString,
    url: 'cek_stw_qc.php',       
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
    document.getElementById('vals33_').value = document.getElementById('vals33').value;
    document.getElementById('vals34_').value = document.getElementById('vals34').value;
    document.getElementById('vals35_').value = document.getElementById('vals35').value;
	document.getElementById('vals36_').value = document.getElementById('vals36').value;  
	document.getElementById('vals37_').value = document.getElementById('vals37').value;
    document.getElementById('vals38_').value = document.getElementById('vals38').value;
    document.getElementById('vals39_').value = document.getElementById('vals39').value;
    document.getElementById('vals40_').value = document.getElementById('vals40').value;
	
	
	

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

if($fafterdel == "1"){
	echo "<script>$('#myModal').modal('show');getId('$fid_score_afterdel','$fid_afterdel');</script>";
}

else if($fafteredit == "1"){
	echo "<script>$('#myModal').modal('show');getId('$fid_score_afterdel','$fid_afterdel');</script>";
}

?>