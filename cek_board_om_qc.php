<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form Board OM";

$active_dashboard = "";
$active_4s = "";
$active_stw = "";
$active_pm = "";
$active_om = "active";

$fidx = $_GET['fid'];
$fline = $_GET['fline'];
$fworsite = $_GET['fworsite'];

$queryku = mysqli_query($con, "select * from t_schedule_om where fline = '$fline' and fworsite = '$fworsite' and finfo = 'Plan and Do'");
while($queryku2=mysqli_fetch_array($queryku))
{
  $fresult_nye = $queryku2['farray_result'];
  $fscore_nye = $queryku2['farray_score'];
  $fid_pd = $queryku2['fid']; 
}

$queryku = mysqli_query($con, "select * from t_schedule_om where fline = '$fline' and fworsite = '$fworsite' and finfo = 'Check and Action'");
while($queryku2=mysqli_fetch_array($queryku))
{
  $fid_c = $queryku2['fid']; 
}

include 'cek_jml_om_board.php';






$valr = explode(";",$fresult_nye);
$vals = explode(";",$fscore_nye);

$result_bronze = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8] + $valr[9];

$result_silver =  $valr[10] + $valr[11] + $valr[12] + $valr[13] + $valr[14] + $valr[15] + $valr[16] + $valr[17] + $valr[18] + $valr[19] + $valr[20] + $valr[21];


$result_gold = $valr[22] + $valr[23] + $valr[24] + $valr[25] + $valr[26] + $valr[27] + $valr[28] + $valr[29] + $valr[30] + $valr[31] + $valr[32] + $valr[33] + $valr[34];


$score_bronze = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9];

$score_silver =  $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21];

$score_gold = $vals[22] + $vals[23] + $vals[24] + $vals[25] + $vals[26] + $vals[27] + $vals[28] + $vals[29] + $vals[30] + $vals[31] + $vals[32] + $vals[33] + $vals[34];





if($score_bronze > 30){
  $score_bronze = 30;
}

//echo $score;

$score_bronze = round(($score_bronze / 30) * 100);

$text_score_bronze = "";
if($score_bronze != ""){
$text_score_bronze = "Score : ".$score_bronze;
} 



if($score_silver > 36){
  $score_silver = 36;
}

//echo $score;

$score_silver = round(($score_silver / 36) * 100);

$text_score_silver = "";
if($score_silver != ""){
$text_score_silver = "Score : ".$score_silver;
}     



if($score_gold > 39){
  $score_gold = 39;
}

//echo $score;

$score_gold = round(($score_gold / 39) * 100);

$text_score_gold = "";
if($score_gold != ""){
$text_score_gold = "Score : ".$score_gold;
}  



$queryf = mysqli_query($con, "select * from t_finding_om where fid_schedule = '$fid_pd'");
while($queryf2=mysqli_fetch_array($queryf))
{
  $fnotex = $queryf2['fnote']; 
} 

$queryconfirm = mysqli_query($con, "select * from t_schedule_om where fid = '$fidx'");
while($queryconfirm2=mysqli_fetch_array($queryconfirm))
{
  $farray_resultx = $queryconfirm2['farray_result'];
  $farray_scorex = $queryconfirm2['farray_score'];    
 } 

  $querydivisi = mysqli_query($con, "select sum(farray_result) as farray_result from t_schedule_om where fline = '$fline' and fworsite = '$fworsite' and finfo = 'Check and Action'");
while($querydivisi2=mysqli_fetch_array($querydivisi))
{
  $farray_resultx = $querydivisi2['farray_result'];
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

<center><legend style="margin:-10px">Form OM</legend></center>

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

<form action="cek_board_om_qc.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fidx; ?>" />
<input type="hidden" name="fid_pd" value="<?php echo $fid_pd; ?>" />
<input type="hidden" name="flinex" value="<?php echo $fline; ?>" />
<input type="hidden" name="fworsitex" value="<?php echo $fworsite; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr>
<th width="20%"><center>Item</center></th>
<th width="30%"><center>Standard evaluasi<br>Level bronze (sistemnya jadi)</center></th>
<th width="5%"><center>Hasil</center></th>
<th width="5%"><center>Score</center></th>
<th width="40%"><center>Penjelasan</center></th>
<th><center>Temuan</center></th>
</tr>
</thead>
<tbody>
<tr>
  <td>
    Kondisi 4S di tempat kerja
  </td>
  <td>
     １）Membuat lingkungan menemukan defect sampai yg terkecil<br/><br/>
         Tabel evaluasi kondisi aktivitas diagnosa tempat kerja (4S) alat-alat equipment harus level 3 atau lebih
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
  <td></td>
  <td> <a href="#myModal" onclick="getId(document.getElementById('fid_score').value='1','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml1;?> Temuan</p>
  </td>  
</tr>

<tr>
  <td rowspan="5">
    Kondisi 4S di tempat kerja
  </td>
  <td>
      ２） Aktivitas pengembangan 5 step<br/><br/>
         Step 1 menangkan semua equipment yg dimiliki<br><br>A. Ada list semua equipmengt yg dimiliki
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
  <td><br><br><br><br>A. Ada map & list semua equipment yg dimiliki (boleh juga drawing penempatan asset fix)</td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='2','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml2;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
     Step 2 Membuat jelas/mieruka frekuensi pengecekan otonomi & planing pengecekan periodik<br/><br/>
         A. Ada list frekuensi & planing pengecekan
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
  <td><br><br><br>A. List equipment yg perlu maintenance (boleh juga beda kamar)<br>B. Melaksanakan sesuai planing (tidak ada keterlambatan equipment laporan ke government office)<br><br> ※Jika government office pada waktu audit teridentifikasi masalah besar berarti tidak lulus</td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='3','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml3;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
    Step 3 pendidikan & training chekker<br/><br/>
         A. Ada planing pendidikan & training untuk chekker (pengecekan otonomi equipment)
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
  <td><br><br>A. Ada planing pendidikan & training </td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='4','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml4;?> Temuan</p>
  </td>
</tr>
<tr>
  <td>
     Step 4 menangkap historikal kerusakan equipment<br/><br/>
          A. Ada sistem untuk merekord konten perbaikan sampai historikalnya
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
  <td><br><br>A. Ada rekord, dan dilakukan share<br> ※Contoh share : rekord/catatan yg sudah disampaikan informasi dari member di tulis ke ledger & map </td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='5','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml5;?> Temuan</p>
  </td>
</tr>
<tr>
  <td>
    Step 5 pencegahan supaya tidak terjadi kembali kerusakan equipment (saihatsuboshi)<br/><br/>
         A. Melakukan action preventive maintenance dari konten perbaikan
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
  <td><br><br><br>A. Melakukan action preventive maintenance (hanya yg bisa di action saja)<br> B.  Penambahan iten & melakasanakan secara berkelanjutan </td>   
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='6','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml6;?> Temuan</p>
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
      ３） Menjadi item yg sesuai dengan jishuhozen/OM<br/><br/>
         A. Ada keterkaitan dari pengembangan step
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
  <td><br><br>A. Melakukan aktivitas dari pengembangan step bagian yg lemah & meningkatkanya</td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='7','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml7;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
   Kondisi aktivitas
  </td>
  <td>
       ４） Planingnya jadi & membuat jelas/mieruka item aktivitasnya <br/><br/>
         A. Beraktivitas dengan menetukan planing, target, item pelaksanaan<br>
         B. Memahami kondisi progres & melakukan follow cek terhadap planing <br>
         （prosentase progres 70%）
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
  <td><br><br>A. Planing, target, item pelaknsanaan menjadi dimengerti<br><br>B.Prosentase progres masing-masing level memuaskan<br>（Jika belum tercapai, harus ada alasan yg tepat)
  </td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='8','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml8;?> Temuan</p>
  </td>
</tr>

<tr>
  <td>
   Hasil aktivitas
  </td>
  <td>
        ５） Pendidikan SDM & safety & cost dll <br/><br/>
         A. Dengan dilakukanya aktivitas, teknikal sekill meningkat (sheet pendidikan teknikal skill dll)
       
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
  <td><br><br>A. Memahami kondisi belajar teknikal skill per individu (boleh juga link dengan kontrol board). <br>B. Hasilnya diketahui (boleh juga ling dengan kontrol board)
  </td>  
<td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='9','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
   <p class="text-center"><br/>
  Total : <?php echo $jml9;?> Temuan</p>
</td>

</tr>


<tr>
  <td>
   Pengelolaan GL kontrol board
  </td>
  <td>
        A. Melakukan aktivitas bekerja sama dengan atasan menggunakan GL kontrol board
       
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
  <td>
  </td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='10','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml10;?> Temuan</p>
  </td>
</tr>

<tr bgcolor="bronze" style="color:white;">
  <td class="text-center">
   Standard evaluasi
  </td>
  <td colspan="4" class="text-center">
        Level bronze <br><br>Didalam full score 30 point, sertifikasi bronze 24 point (80%)<br><br>(Jika mendapat 24 point atau lebih Lulus level bronze pengelolaan tempat kerja）
       
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
  <td>
    Kondisi 4S di tempat kerja
  </td>
  <td>
     １）Membuat lingkungan menemukan defect sampai yg terkecil<br/><br/>
         Tabel evaluasi kondisi aktivitas diagnosa tempat kerja (4S) alat-alat equipment harus level 3 atau lebih
  </td>
  <td>
  <select name="valrs11" id="valrs11" style="width: 45px;">
    <option value="X" <?php echo ($valr[10] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[10] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
  <select name="valss11" id="vals11" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[10] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td></td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='11','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml11;?> Temuan</p>
  </td>
</tr>

<tr>
  <td rowspan="5">
    Kondisi 4S di tempat kerja
  </td>
  <td>
      ２） Aktivitas pengembangan 5 step<br/><br/>
         Step 1 menangkan semua equipment yg dimiliki<br><br>
          </td>
  <td>
  <select name="valrs12" id="valrs12" style="width: 45px;">
    <option value="X" <?php echo ($valr[11] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[11] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
  <td>
  <select name="valss12" id="vals12" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[11] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br><br><br>A. Ada map & list semua equipment yg dimiliki (boleh juga drawing penempatan asset fix)</td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='12','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml12;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
     Step 2 Membuat jelas/mieruka frekuensi pengecekan otonomi & planing pengecekan periodik<br/><br/>
         A. Ada list frekuensi & planing pengecekan<br>B. Melaksanakan pengecekan berdasarkan frekuensi & planing<br>（belum cek/tidak cek zero)
  </td>
  <td>
  <select name="valrs13" id="valrs13" style="width: 45px;">
    <option value="X" <?php echo ($valr[12] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[12] ==  'O') ? ' selected="selected"' : "";?>>O</option>    
  </select>  
</td>
  <td>
  <select name="valss13" id="vals13" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[12] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br><br>A. List equipment yg perlu maintenance (boleh juga beda kamar)<br>B. Melaksanakan sesuai planing (tidak ada keterlambatan equipment laporan ke government office)<br><br> ※Jika government office pada waktu audit teridentifikasi masalah besar berarti tidak lulus</td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='13','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml13;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
    Step 3 pendidikan & training chekker<br/><br/>
         A. Ada planing pendidikan & training untuk chekker (pengecekan otonomi equipment)<br><br>B. Pendidikan & training dilaksanakan berdasarkan planing
  </td>
  <td><br><br>
 <select name="valrs14" id="valrs14" style="width: 45px;">
    <option value="X" <?php echo ($valr[13] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[13] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
  <br><br><br> 

  <select name="valrs15" id="valrs15" style="width: 45px;">
    <option value="X" <?php echo ($valr[14] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[14] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  

</td>
  <td><br><br>
  <select name="valss14" id="vals14" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[13] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
  <br><br><br>  

  <select name="valss15" id="vals15" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[14] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  

</td>
  <td><br><br>A. Ada planing pendidikan & training<br><br><br>B.1 Pendidikan & training berjalan sesuai planing
    <br>B.2 Peningkatanya terefleksi di board kontrol
   </td>  
   <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='14','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml14;?> Temuan</p>
    <br><br>
   <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='15','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
    <p class="text-center"><br/>
  Total : <?php echo $jml15;?> Temuan</p>
 </td>
</tr>
<tr>
  <td>
     Step 4 menangkap historikal kerusakan equipment<br/><br/>
          A. Ada sistem untuk merekord konten perbaikan sampai historikalnya<br>※Ledger kontrol equipment (ledger peralatan) & dokumen laporan perbaikan equipment dll
  </td>
  <td>
  <select name="valrs16" id="valrs16" style="width: 45px;">
    <option value="X" <?php echo ($valr[15] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[15] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
  <select name="valss16" id="vals16" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[15] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br>A. Ada rekord, dan dilakukan share<br><br> ※Contoh share : rekord/catatan yg sudah disampaikan informasi dari member di tulis ke ledger & map </td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='16','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml16;?> Temuan</p>
  </td>
</tr>
<tr>
  <td>
    Step 5 pencegahan supaya tidak terjadi kembali kerusakan equipment (saihatsuboshi)<br/><br/>
         A. Melakukan action preventive maintenance dari konten perbaikan<br>B. Konten action ditambahkan ke item pengecekan jishuhozen, melanjutkan & melaksanakan
  </td>
  <td>
  <select name="valrs17" id="valrs17" style="width: 45px;">
    <option value="X" <?php echo ($valr[16] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[16] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
  <select name="valss17" id="vals17" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[16] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br><br>A. Melakukan action preventive maintenance (hanya yg bisa di action saja)<br><br> B.  Penambahan iten & melakasanakan secara berkelanjutan<br> </td>   
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='17','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml17;?> Temuan</p>
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
      ３） Menjadi item yg sesuai dengan jishuhozen/OM<br/><br/>
         A. Ada keterkaitan dari pengembangan step<br>B. Ada keterkaitan dengan henkaten & trend kedepanya
  </td>
   <td>
  <select name="valrs18" id="valrs18" style="width: 45px;">
    <option value="X" <?php echo ($valr[17] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[17] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
</td>
  <td>
  <select name="valss18" id="vals18" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[17] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br>A. Melakukan aktivitas dari pengembangan step bagian yg lemah & meningkatkanya<br>B. Melakukan aktivitas bagian yg menjadi perlu untuk saat ini & masa depan</td>  
  <td> <a href="#myModal" onclick="getId(document.getElementById('fid_score').value='18','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml18;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
   Kondisi aktivitas
  </td>
  <td>
       ４） Planingnya jadi & membuat jelas/mieruka item aktivitasnya <br/><br/>
         A. Beraktivitas dengan menetukan planing, target, item pelaksanaan<br>
         B. Memahami kondisi progres & melakukan follow cek terhadap planing <br>
         （prosentase progres 90%）<br><br>
        C. Ada follow cek dari CL & manager di dokumen-dokumen
  </td>
  <td>
   <select name="valrs19" id="valrs19" style="width: 45px;">
    <option value="X" <?php echo ($valr[18] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[18] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
  <br><br><br> <br><br><br> <br><br>
  <select name="valrs20" id="valrs20" style="width: 45px;">
    <option value="X" <?php echo ($valr[19] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[19] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
</td>
  <td>
 <select name="valss19" id="vals19" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[18] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  

  <br><br><br> <br><br><br> <br><br>

   <select name="valss20" id="vals20" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[19] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  

</td>
  <td><br><br>A. Planing, target, item pelaknsanaan menjadi dimengerti<br><br>B.Prosentase progres masing-masing level memuaskan<br>（Jika belum tercapai, harus ada alasan yg tepat)<br><br><br>C. Manager, CL melakukan follow cek (ada komentar tulisan tangan)
  </td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='19','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml19;?> Temuan</p>
    <br/><br/> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='20','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml20;?> Temuan</p>
  </td>
</tr>

<tr>
  <td>
   Hasil aktivitas
  </td>
  <td>
        ５） Pendidikan SDM & safety & cost dll <br/><br/>
         A. Dengan dilakukanya aktivitas, teknikal sekill meningkat (sheet pendidikan teknikal skill dll)
         <br>B. Ada hasil pada elemen safety, cost, lingkungan
       
  </td>
  <td>
  <select name="valrs21" id="valrs21" style="width: 45px;">
    <option value="X" <?php echo ($valr[20] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[20] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
  <select name="valss21" id="vals21" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[20] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br>A. Memahami kondisi belajar teknikal skill per individu (boleh juga link dengan kontrol board). <br>B. Hasilnya diketahui (boleh juga ling dengan kontrol board)<br> Hasilnya diketahui (boleh juga ling dengan kontrol board)
  </td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='21','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml21;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
   Pengelolaan GL kontrol board
  </td>
  <td>
        A. Memelihara & melanjutkan level bronze
       
  </td>
  <td>
  <select name="valrs22" id="valrs22" style="width: 45px;">
    <option value="X" <?php echo ($valr[21] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[21] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
  <select name="valss22" id="vals22" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[21] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
  </td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='22','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml22;?> Temuan</p>
  </td>
</tr>

<tr bgcolor="silver" style="color:black;">
  <td class="text-center">
   Standard evaluasi
  </td>
  <td colspan="4" class="text-center">
        Level silver <br><br>Didalam full score 36 point, sertifikasi silver 31 point (85%) <br><br>（Jika mendapat 31 point atau lebih Lulus level silver pengelolaan tempat kerja）
       
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
  <td>
    Kondisi 4S di tempat kerja
  </td>
  <td>
     １）Membuat lingkungan menemukan defect sampai yg terkecil<br/><br/>
         Tabel evaluasi kondisi aktivitas diagnosa tempat kerja (4S) alat-alat equipment harus level 3 atau lebih
  </td>
  <td>
  <select name="valrg23" id="valrg23" style="width: 45px;">
   <option value="X" <?php echo ($valr[22] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[22] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
</td>
  <td>
  <select name="valsg23" id="vals23" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[22] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td></td> 
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='23','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml23;?> Temuan</p>
  </td> 
</tr>

<tr>
  <td rowspan="5">
    Kondisi 4S di tempat kerja
  </td>
  <td>
      ２） Aktivitas pengembangan 5 step<br/><br/>
         Step 1 menangkan semua equipment yg dimiliki<br><br>
          </td>
    <td>
  <select name="valrg24" id="valrg24" style="width: 45px;">
    <option value="X" <?php echo ($valr[23] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[23] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
  <select name="valsg24" id="vals24" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[23] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br><br><br>A. Ada map & list semua equipment yg dimiliki (boleh juga drawing penempatan asset fix)</td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='24','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml24;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
     Step 2 Membuat jelas/mieruka frekuensi pengecekan otonomi & planing pengecekan periodik<br/><br/>
         A. Ada list frekuensi & planing pengecekan<br>B. Melaksanakan pengecekan berdasarkan frekuensi & planing<br>（belum cek/tidak cek zero)
  </td>
   <td>
  <select name="valrg25" id="valrg25" style="width: 45px;">
    <option value="X" <?php echo ($valr[24] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[24] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
</td>
  <td>
  <select name="valsg25" id="vals25" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[24] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br><br>A. List equipment yg perlu maintenance (boleh juga beda kamar)<br>B. Melaksanakan sesuai planing (tidak ada keterlambatan equipment laporan ke government office)<br><br> ※Jika government office pada waktu audit teridentifikasi masalah besar berarti tidak lulus</td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='25','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml25;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
    Step 3 pendidikan & training chekker<br/><br/>
         A. Ada planing pendidikan & training untuk chekker (pengecekan otonomi equipment)<br><br>B. Pendidikan & training dilaksanakan berdasarkan planing
  </td>
  <td><br><br>
 <select name="valrg26" id="valrg26" style="width: 45px;">
    <option value="X" <?php echo ($valr[25] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[25] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
  <br><br><br> 

 <select name="valrg27" id="valrg27" style="width: 45px;">
    <option value="X" <?php echo ($valr[26] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[26] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  

</td>
  <td><br><br>
  <select name="valsg26" id="vals26" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[25] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
  <br><br><br>  

  <select name="valsg27" id="vals27" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[26] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>   

</td>
  <td><br><br>A. Ada planing pendidikan & training<br><br><br>B.1 Pendidikan & training berjalan sesuai planing
    <br>B.2 Peningkatanya terefleksi di board kontrol
   </td>  
   <td><br/><br/><a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='26','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml26;?> Temuan</p>
    <br/><br/><a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='27','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml27;?> Temuan</p>
    </td>
</tr>
<tr>
  <td>
     Step 4 menangkap historikal kerusakan equipment<br/><br/>
          A. Ada sistem untuk merekord konten perbaikan sampai historikalnya<br>※Ledger kontrol equipment (ledger peralatan) & dokumen laporan perbaikan equipment dll
  </td>
  <td>
  <select name="valrg28" id="valrg28" style="width: 45px;">
    <option value="X" <?php echo ($valr[27] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[27] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
</td>
  <td>
  <select name="valsg28" id="vals28" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[27] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br>A. Ada rekord, dan dilakukan share<br><br> ※Contoh share : rekord/catatan yg sudah disampaikan informasi dari member di tulis ke ledger & map </td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='28','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml28;?> Temuan</p>
  </td>
</tr>
<tr>
  <td>
    Step 5 pencegahan supaya tidak terjadi kembali kerusakan equipment (saihatsuboshi)<br/><br/>
         A. Melakukan action preventive maintenance dari konten perbaikan<br>B. Konten action ditambahkan ke item pengecekan jishuhozen, melanjutkan & melaksanakan<br>C. Ada laporan hasil menggunakan sran/ide, kaizen, QC dll
  </td>
  <td>
    <select name="valrg29" id="valrg29" style="width: 45px;">
    <option value="X" <?php echo ($valr[28] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[28] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select> <br><br><br><br><br><br><br>

   <select name="valrg30" id="valrg30" style="width: 45px;">
    <option value="X" <?php echo ($valr[29] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[29] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>
</td>
  <td>
  <select name="valsg29" id="vals29" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[28] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>   <br><br><br><br><br><br><br>

  <select name="valsg30" id="vals30" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[29] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br><br>A. Melakukan action preventive maintenance (hanya yg bisa di action saja)<br><br> B.  Penambahan iten & melakasanakan secara berkelanjutan<br><br>C. Ada tempat/wadah untuk melapor/presentasi, melakukan share ke semua member </td>   
  <td> <br><br><br><a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='29','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>

     <p class="text-center"><br/>
  Total : <?php echo $jml29;?> Temuan</p>
    <br/><br/> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='30','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml30;?> Temuan</p>
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
      ３） Menjadi item yg sesuai dengan jishuhozen/OM<br/><br/>
         A. Ada keterkaitan dari pengembangan step<br>B. Ada keterkaitan dengan henkaten & trend kedepanya
  </td>
    <td>
  <select name="valrg31" id="valrg31" style="width: 45px;">
    <option value="X" <?php echo ($valr[30] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[30] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
</td>
  <td>
  <select name="valsg31" id="vals31" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[30] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br>A. Melakukan aktivitas dari pengembangan step bagian yg lemah & meningkatkanya<br>B. Melakukan aktivitas bagian yg menjadi perlu untuk saat ini & masa depan</td>  
   <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='31','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml31;?> Temuan</p>
   </td>
</tr>


<tr>
  <td>
   Kondisi aktivitas
  </td>
  <td>
       ４） Planingnya jadi & membuat jelas/mieruka item aktivitasnya <br/><br/>
         A. Beraktivitas dengan menetukan planing, target, item pelaksanaan<br>
         B. Memahami kondisi progres & melakukan follow cek terhadap planing <br>
         （prosentase progres 90%）<br><br>
        C. Ada follow cek dari CL & manager di dokumen-dokumen
  </td>
  <td>
  <select name="valrg32" id="valrg32" style="width: 45px;">
    <option value="X" <?php echo ($valr[31] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[31] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  
  <br><br><br> <br><br><br> <br><br>
  <select name="valrg33" id="valrg33" style="width: 45px;">
    <option value="X" <?php echo ($valr[32] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[32] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  
</td>
  <td>
  <select name="valsg32" id="vals32" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[31] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>   

  <br><br><br> <br><br><br> <br><br>

  <select name="valsg33" id="vals33" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[32] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  

</td>
  <td><br><br>A. Planing, target, item pelaknsanaan menjadi dimengerti<br><br>B.Prosentase progres masing-masing level memuaskan<br>（Jika belum tercapai, harus ada alasan yg tepat)<br><br><br>C. Manager, CL melakukan follow cek (ada komentar tulisan tangan)
  </td>  
   <td> <br><br><a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='32','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml32;?> Temuan</p>
    <br><br><br><a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='33','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml33;?> Temuan</p>
  </td>
</tr>

<tr>
  <td>
   Hasil aktivitas
  </td>
  <td>
        ５） Pendidikan SDM & safety & cost dll <br/><br/>
         A. Dengan dilakukanya aktivitas, teknikal sekill meningkat (sheet pendidikan teknikal skill dll)
         <br>B. Ada hasil pada elemen safety, cost, lingkungan
       
  </td>
    <td>
  <select name="valrg34" id="valrg34" style="width: 45px;">
    <option value="X" <?php echo ($valr[33] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[33] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
  <select name="valsg34" id="vals34" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[33] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td><br><br>A. Memahami kondisi belajar teknikal skill per individu (boleh juga link dengan kontrol board). <br>B. Hasilnya diketahui (boleh juga ling dengan kontrol board)<br> Hasilnya diketahui (boleh juga ling dengan kontrol board)
  </td>  
  <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='34','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml34;?> Temuan</p>
  </td>
</tr>


<tr>
  <td>
   Pengelolaan GL kontrol board
  </td>
  <td>
        A. Memelihara & melanjutkan level silver
       
  </td>
    <td>
  <select name="valrg35" id="valrg35" style="width: 45px;">
    <option value="X" <?php echo ($valr[34] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[34] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  
</td>
  <td>
  <select name="valsg35" id="vals35" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[34] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>
  <td>
  </td>  
    <td> <a href="#myModal"  onclick="getId(document.getElementById('fid_score').value='35','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
     <p class="text-center"><br/>
  Total : <?php echo $jml35;?> Temuan</p>
  </td>
</tr>

<tr bgcolor="gold" style="color:black;">
  <td class="text-center">
   Standard evaluasi
  </td>
  <td colspan="4" class="text-center">
        Level gold <br><br>Didalam full score 39 point, sertifikasi silver 36 point (90%) <br><br>（Jika mendapat 36 point atau lebih Lulus level silver pengelolaan tempat kerja）
       
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

<input type="submit" name="update" value="UPDATE" style="width:100%" class="btn btn-success" />



<br><br>
<!-- 
<center><h5>Ada temuan ? <a href="#myModal"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>-->
<br>
<br>

<!--
<h3 class="text-center"><a style="color:green;">Isi Temuan</a></h3></center>
<br>
<div style="padding-left: 20px;">

<?php

$queryf = mysqli_query($con, "select t_finding_om.fnote, t_finding_om.fdate_modified as tgl, t_schedule_om.* from t_finding_om join t_schedule_om on t_finding_om.fid_schedule =  t_schedule_om.fid where t_finding_om.fid_schedule in ($fid_pd,$fidx) order by t_finding_om.fdate_modified desc");
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

<input type="hidden" name="fid" value="<?php echo $fid; ?>">
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


  $xvalr11 = $_POST["valrs11"];
  $xvalr12 = $_POST["valrs12"];
  $xvalr13 = $_POST["valrs13"];
  $xvalr14 = $_POST["valrs14"];
  $xvalr15 = $_POST["valrs15"];
  $xvalr16 = $_POST["valrs16"];
  $xvalr17 = $_POST["valrs17"];
  $xvalr18 = $_POST["valrs18"];
  $xvalr19 = $_POST["valrs19"];
  $xvalr20 = $_POST["valrs20"];
  $xvalr21 = $_POST["valrs21"];
  $xvalr22 = $_POST["valrs22"];


  $xvalr23 = $_POST["valrg23"];
  $xvalr24 = $_POST["valrg24"];
  $xvalr25 = $_POST["valrg25"];
  $xvalr26 = $_POST["valrg26"];
  $xvalr27 = $_POST["valrg27"];
  $xvalr28 = $_POST["valrg28"];
  $xvalr29 = $_POST["valrg29"];
  $xvalr30 = $_POST["valrg30"];
  $xvalr31 = $_POST["valrg31"];
  $xvalr32 = $_POST["valrg32"];
  $xvalr33 = $_POST["valrg33"];
  $xvalr34 = $_POST["valrg34"];
  $xvalr35 = $_POST["valrg35"];

  
  //
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

  $xvals11 = $_POST["valss11"];
  $xvals12 = $_POST["valss12"];
  $xvals13 = $_POST["valss13"];
  $xvals14 = $_POST["valss14"];
  $xvals15 = $_POST["valss15"];
  $xvals16 = $_POST["valss16"];
  $xvals17 = $_POST["valss17"];
  $xvals18 = $_POST["valss18"];
  $xvals19 = $_POST["valss19"];
  $xvals20 = $_POST["valss20"];
  $xvals21 = $_POST["valss21"];
  $xvals22 = $_POST["valss22"];

  $xvals23 = $_POST["valsg23"];
  $xvals24 = $_POST["valsg24"];
  $xvals25 = $_POST["valsg25"];
  $xvals26 = $_POST["valsg26"];
  $xvals27 = $_POST["valsg27"];
  $xvals28 = $_POST["valsg28"];
  $xvals29 = $_POST["valsg29"];
  $xvals30 = $_POST["valsg30"];
  $xvals31 = $_POST["valsg31"];
  $xvals32 = $_POST["valsg32"];
  $xvals33 = $_POST["valsg33"];
  $xvals34 = $_POST["valsg34"];
  $xvals35 = $_POST["valsg35"];

  //
  //
  
  $fworsitex = $_POST["fworsitex"];
  $flinex = $_POST["flinex"];
  $fid_pd = $_POST["fid_pd"];
  $fidx = $_POST["fidx"];
  
  $blth_now = date("Y-m");
  
  $farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25.";".$xvalr6.";".$xvalr27.";".$xvalr28.";".$xvalr29.";".$xvalr30.";".$xvalr31.";".$xvalr32.";".$xvalr33.";".$xvalr34.";".$xvalr35;
  
  $farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26.";".$xvals27.";".$xvals28.";".$xvals29.";".$xvals30.";".$xvals31.";".$xvals32.";".$xvals33.";".$xvals34.";".$xvals35;
  //echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

$fscore = $xvals23 + $xvals24 + $xvals25 + $xvals26 + $xvals27 + $xvals28 + $xvals29 + $xvals30 + $xvals31 + $xvals32 + $xvals33 + $xvals34 + $xvals35;

     $score = round(($fscore / 39) * 100);
	 
		//Awal Email
	
	
	$get = mysqli_query($con, "select *, 'OM' as fhave from t_schedule_om where fid = '$fidx'");
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
	
	
	$getlv = mysqli_query($con, "select fname from t_schedule_om where fworsite = '$fworsite' and fline = '$fline' and fjobas = '$getjobas'");
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
    $emailBody .="<td  width=\"5%\">No</td><td width=\"17\">Item</td><td width=\"12%\">Evaluasi</td><td width=\"16%\">Deskripsi</td><td width=\"30%\">Note</td><td width=\"20%\">Temuan</td><td width=\"20%\">Tanggal</td>";
    $emailBody .="</tr>";
	

$queryku = mysqli_query($con, "select *, substring(fdate_modified, 1, 7) from t_finding_om where fid_schedule = '$fidx' and substring(fdate_modified, 1, 7) = '$blth_now' order by fid ASC");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fphoto = $queryku2['fphoto'];
	$fnote = $queryku2['fnote'];
	$fdate_modified = $queryku2['fdate_modified'];
	$fid_score = $queryku2['fid_score'];
	
	
	$des = mysqli_query($con, "select * from t_form_om_qc where fid = '$fid_score'");
	while($des2=mysqli_fetch_array($des))
{
	
	$fitem = $des2['fitem'];
	$fevaluasi = $des2['fevaluasi'];
	$fdesc = $des2['fdesc'];



	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnote</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 

	
	$emailBody .="<tr>";
    $emailBody .="<td>$no</td><td>$fitem</td><td>$fevaluasi</td><td>$fdesc</td><td>$xml->body</td><td><img style='width:100px;' src='".LOC_IMAGE."images/temuanOM/".$fphoto."' /></td><td>$fdate_modified</td>";
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
  

  mysqli_query($con, "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fid_pd'");

    $fidx = $_POST["fidx"];
  $farray_result = $_POST["farray_result"];
  $farray_score = $_POST["farray_score"];
    $fid_pd = $_POST["fid_pd"];
  
  mysqli_query($con, "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score', fid_pd = '$fid_pd' where fid = '$fidx'");
  
 echo "<script>window.location='cek_board_om_qc.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex'</script>";
  
      
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
    $path = "images/temuanOM/";
    // Proses upload
    if(move_uploaded_file($tmp, $path.$foto)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database

  
  mysqli_query($con, "insert into t_finding_om (fid_schedule, fphoto, fnote, fid_score, fgroup) values ('$fid_schedule', '$foto', '$fnote', '$fid_score', '$fid_pd')");

}

}  
  
    // Nilai
  
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


	$xvalr11 = $_POST["valrs11"];
	$xvalr12 = $_POST["valrs12"];
	$xvalr13 = $_POST["valrs13"];
	$xvalr14 = $_POST["valrs14"];
	$xvalr15 = $_POST["valrs15"];
	$xvalr16 = $_POST["valrs16"];
	$xvalr17 = $_POST["valrs17"];
	$xvalr18 = $_POST["valrs18"];
	$xvalr19 = $_POST["valrs19"];
	$xvalr20 = $_POST["valrs20"];
	$xvalr21 = $_POST["valrs21"];
	$xvalr22 = $_POST["valrs22"];


	$xvalr23 = $_POST["valrg23"];
	$xvalr24 = $_POST["valrg24"];
	$xvalr25 = $_POST["valrg25"];
  $xvalr26 = $_POST["valrg26"];
  $xvalr27 = $_POST["valrg27"];
  $xvalr28 = $_POST["valrg28"];
  $xvalr29 = $_POST["valrg29"];
  $xvalr30 = $_POST["valrg30"];
  $xvalr31 = $_POST["valrg31"];
  $xvalr32 = $_POST["valrg32"];
  $xvalr33 = $_POST["valrg33"];
  $xvalr34 = $_POST["valrg34"];
  $xvalr35 = $_POST["valrg35"];

	
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
  $xvals33 = $_POST["vals33"];
  $xvals34 = $_POST["vals34"];
  $xvals35 = $_POST["vals35"];
	//
	
	
	$fidx = $_POST["fid_pd"];
	
	$farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25.";".$xvalr6.";".$xvalr27.";".$xvalr28.";".$xvalr29.";".$xvalr30.";".$xvalr31.";".$xvalr32.";".$xvalr33.";".$xvalr34.";".$xvalr35;
	
	$farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26.";".$xvals27.";".$xvals28.";".$xvals29.";".$xvals30.";".$xvals31.";".$xvals32.";".$xvals33.";".$xvals34.";".$xvals35;




	
	
	//echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

   $fscore = $xvals23 + $xvals24 + $xvals25 + $xvals26 + $xvals27 + $xvals28 + $xvals29 + $xvals30 + $xvals31 + $xvals32 + $xvals33 + $xvals34 + $xvals35;

     $score = round(($fscore / 39) * 100);

  

  mysqli_query($con, "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fidx'");
  
 echo "<script>window.location='cek_board_om_qc.php?fid=$fid_schedule&&fline=$flinex&&fworsite=$fworsitex'</script>";
  
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
      <form action="cek_board_om_qc.php" method="post" enctype="multipart/form-data">
	  
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
      <hr/>
      <div id="tableku"></div>
      </form>
    </div>
  </div>
</div> 
 

<?php include('includes/footer.php'); ?>    

<script>

    function getId(idscore,idschedule,idplan,idcheck){
      
    var dataString = "idscore="+idscore+"&idschedule="+idschedule+"&idplan="+idplan+"&idcheck="+idcheck; 
    //alert(dataString);

    $.ajax({
    type: 'POST',
    data: dataString,
    url: 'cek_om_board_qc.php',       
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






