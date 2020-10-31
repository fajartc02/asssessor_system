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



<?php include('includes/header.php'); ?>

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






</div>

</div>
<!-- /.container-fluid -->

 

 
<?php include('includes/footer.php'); ?>    

