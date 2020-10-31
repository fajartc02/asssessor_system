<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form assesor PM";

$active_dashboard = "";
$active_4s = "";
$active_stw = "";
$active_pm = "active";
$active_om = "";

$fidx = $_GET['fid'];

include 'cek_jml_pm.php';

$queryku = mysqli_query($con, "select farray_result, farray_score from t_schedule_pm where fid = '$fidx'");
while($queryku2=mysqli_fetch_array($queryku))
{
  $fresult_nye = $queryku2['farray_result'];
  $fscore_nye = $queryku2['farray_score'];
}


$valr = explode(";",$fresult_nye);
$vals = explode(";",$fscore_nye);

$result = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8] + $valr[9] + $valr[10] + $valr[11] + $valr[12] + $valr[13] + $valr[14] + $valr[15] + $valr[16] + $valr[17] + $valr[18] + $valr[19] + $valr[20] + $valr[21] + $valr[22] + $valr[23] + $valr[24] + $valr[25] + $valr[26] + $valr[27];

$score = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23] + $vals[24] + $vals[25] + $vals[26] + $vals[27];



if($score > 84){
  $score = 84;
}

//echo $score;

$score = round(($score / 84) * 100);

$text_score = "";
if($score != ""){
$text_score = "Score : ".$score;
}     

?>



<?php include('includes/header.php'); ?>
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
<form action="cek_assessor_pm.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fidx; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr align="center">
<th colspan="3"><center></center></th>

<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
<th><center>Assessment criteria<br>＜Gold level＞</center></th>
<th><center>Description</center></th>
<th><center>Hasil</center></th>
<th ><center>Skor</center></th>

</tr>
</thead>
<tbody>

<tr>
  <td colspan="3">Management papan kontrol GL</td>
  <td>Results are connected from sub-KPI to main KPI.</td>
  <td>Results are connected from sub-KPI to main KPI.</td>
  <td> Pillar KPI target is achieved and global target is also achieved.  ( In case that global target is not set, check with section or group target )</td>
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

</tr> 

<tr>
  <td rowspan="19">Machining akurasi dengan single shot</td>
  <td rowspan="7" colspan="2">Dasar aktivitas dan management tempat kerja</td>
  <td>A. Pengoperasian sudah diimprove agar memudahkan pelaksanaan dan kaizen sedang berjalan. Hasil dari aktivitas sudah tampak.</td>
  <td>A.  Kemampuan untuk bekerja di dalam proses di ruang bersih meningkat.</td>
  <td>A. Mempunyai contoh Kaizen dalam setting 
     prosedur, alokasi, dan penanganan tool setelah memperoleh level silver.   </td>
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

</tr> 


<tr>
  
  <td>B. Investigasi, countermeasure, dan Kaizen untuk defect tool sedang berjalan. </td>
  <td>B. Penyebab semua defect tool sudah jelas.</td>
  <td> B.1. Penyebab dari 80% defects sudah diinvestigasi dan countermeasures sudah dibuat secara menyeluruh.<br>
    B.2. Mempunyai contoh Kaizen tentang cutting tool break dan improvement life tool.
  </td>
  <td>
  <select name="valr22" id="valr22" style="width: 45px;">
     <option value="X" <?php echo ($valr[21] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[21] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>

  <br>  <br>  <br>  

  <select name="valr22" id="valr22" style="width: 45px;">
     <option value="X" <?php echo ($valr[21] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[21] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>

</td>

<td>
  <select name="vals3" id="vals3" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[2] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  <br>  <br>  

  <br>

  <select name="vals3" id="vals3" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[2] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>

<tr>
  
  <td>C.1. Masalah tools penting sudah diimprove. </td>
  <td>C.1. Level Silver terjaga.</td>
  <td>C.1. Mempunyai contoh Kaizen setelah memperoleh level Silver.

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

</tr> 


<tr>
  
  <td>C.2. Tidak ada defect pada unit pertama yang disebabkan oleh tools penting <br> ・・・ harus dilanjutkan untuk 3 bulan terakhir. </td>
  <td>C.2. Tidak ada defect unit pertama yang disebabkan oleh tools penting.<br> ・・・harus dilanjutkan untuk 6 bulan terakhir.Kejadian・・・0 points　　　Tidak kejadian ・・・3 points）　 </td>
  <td> C.2. Lihat daftar defect unit pertama. <br> 
       ( History ganti tool )  
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

</tr> 


<tr>
  
  <td>D. Target seksi untuk defect in-proses ( defect machining ) sudah tercapai melalui aktivitas dengan departement terkait.. <br>( Aktivitas Cabbage patch, dll ) </td>
  <td>D.1. Defect diklasifikasi dengan 4M dan countermeasure nya dijalankan sesuai dengan rencana kaizen. Tidak ada defect yang berulang. </td>
  <td> D.1. The mold-release-agent spraying condition is continuously recorded (concentration/ application/ discharge condition/ amount/ range/ pressure, etc.). 
    

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

</tr> 


<tr>
  <td></td>
  <td>D.2. Melaporkan masalah ke PE dan menanyakan rencana Kaizen. <br>( Form laporan: Laporan masalah ACT2 )  </td>
  <td>D.2. Menerima respon (rencana kaizen) dari PE dan penyelesaiannya. ( lebih dari 1 masalah / bulan ).
    
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


</tr> 


<tr>

  <td>E. Revisi untuk manual proses setting sudah dijalankan.
  </td>
  <td>E. Level Silver terjaga. </td>
  <td>E. Kaizen untuk proses setting telah dimasukkan ke dalam manual.

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

</tr> 


<tr>
  <td rowspan="9">Proses Setting</td>
  <td>Sentralisasi area setting </td>
  
  <td>A. Cutting tools (yang sudah di set) sudah disentralisasi dan dikontrol. Dilengkapi dengan pelindung debu.
    <br> 
    B. Tools besar yang tidak bisa disentralisasi dilengkapi dengan pelindung debu.
  </td>
   <td>A. Rak kontrol Central tools mempunyai struktur yang membuat kondisi normal / abnormal nya dapat diketahui.
  </td>
  <td> A. Kondisi abnormal tool dapat diketahui di rak tool central.<br>(Kanban, board, dll.)     

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

</tr> 



<tr>

  <td>Ruang bersih</td>
  <td>A. Pelindung debu di-maintain.<br> B. Tidak ada serpihan cutting atau kontaminasi di dalam ruang bersih.<br>
    C. Papan display disekitar ruang bersih dijaga agar tetap bersih.
  </td>
  <td>A. Level Silver terjaga.
  </td>
  <td>A. Tidak ada kontaminasi yang dibawa masuk / menjaga kebersihan dengan 4S.

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

</tr> 


<tr>  
  <td rowspan="2">Kebersihan holder/collet </td>
  <td>A.1. Washer digunakan dan cairan pembersih dijaga agar tetap bersih <br>contoh : type sirkulasi auto 
  </td>
   <td>A. Level Silver terjaga.
  </td>
  <td> A. Kekentalan cairan pembersih dikontrol.

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

</tr> 



<tr>  
  <td>B. Metode pembersihan (hasil pembersihan) sudah diimprove.
  </td>
   <td>B. Tidak ada serpihan cutting / kontaminasi yang menempel di collets dan holders.
  </td>
  <td> B. Tidak ada defects yang disebabkan oleh cutting chips atau kontaminasi.

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

</tr> 



<tr>  
  <td>Pengecekan baret / aus</td>
  <td>A.  Kaizen untuk defect sudah dilaksanakan.<br>Tindakan pencegahan agar tidak berulang 100%) 
  </td>
   <td>A. Level Silver terjaga.
  </td>
  <td> A.  Mempunyai history untuk C/Ms dan melakukan aktivitas untuk menjaga level Silver.

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

</tr> 



<tr>  
  <td>Jig dan tools spesial</td>
  <td>A. Pengecekan tools dilaksanakan sesuai rencana.(keausan tool, keakuratan QL wrench, dll.)<br>
    B. Tidak ada keausan atau kekendoran pada height gauge 
  </td>
   <td>A. Level Silver terjaga.
  </td>
  <td> A. History mengenai pengecekan tool check / penggantian tool dicatat. <br>( setting torque diberi indikasi.)
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

</tr> 



<tr> 

<td rowspan="2">Pengukuran run-out </td> 
  <td>A. Run-out measuring dial di-check dan dicatat secara periodik.
  </td>
   <td>A. Run-out measuring jig terjaga. 
  </td>
  <td> A. Pengecekan kekensoran atau baret pada area rotasi secara periodik.
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

</tr> 

<tr> 


  <td>
  </td>
   <td>B. Level Silver terjaga.
  </td>
  <td> B. C/Ms dan Kaizen untuk defects dilakukan secara konrtan dan mempunyai history.
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

</tr> 


<tr> 
  <td>Pengecekan Cutting edge </td>

  <td>A> Feed-back untuk defect cutting edge sudah diberikan, dan Kaizen dilaksanakan secara penuh.
  </td>
   <td>A. Level Silver terjaga.
  </td>
  <td> A. C/Ms (feedback, Kaizen) untuk semua defect cutting edge sudah diperoleh.
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

</tr> 


<tr> 
  <td rowspan="3" colspan="2">Ganti Tool  di dalam M/C</td>
 

  <td>A. Metode Kaizens, cutting tools dan measuring tools dilaksanakan.
  </td>
   <td>A. Kaizen yang mementingkan keakuratan machining satu shot sudah dilaksanakan.
  </td>
  <td> A. Yokoten ke plant lain.
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

</tr> 

<tr> 
  <td>B. Apa yang telah di-kaizen ( telah diimprove ) sudah distandarisasikan.
  </td>
   <td>B. Level Silver terjaga.
  </td>
  <td> B. Hal-hal yang sudah di-Kaizen direfleksikan ke dalam form instruksi. 
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

</tr> 



<tr> 
  <td>C. Defects karena penggantian tool di dalam M/C sudah berkurang setengahnya.
  </td>
   <td>C. Tidak ada defect yang disebabkan oleh penggantian tool di dalam M/C <br>・・・ harus dilanjutkan selama 6 bulan terakhir. 
  </td>
  <td>C. Tidak ada defect yang disebabkan oleh ganti tool di dalam M/C <br>・・・ harus dilanjutkan untuk selama 6 bulan terakhir. 
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

</tr> 



<tr> 
  <td rowspan="5">HRD</td>
  <td rowspan="5">Pengembangan Skill </td>
  <td>Daftar skill penting<br>（ganti tool ）</td>
  <td>A. Training untuk member yang bertanggung jawab di line telah diterapkan sesuai rencana.<br>B. Levels untuk pengetahuan dan skill sudah berkembang, dan dicatat.
  </td>
   <td>A.B. Semua member untuk ganti tool mempunyai kemampuan sesuai instruksi penggantian tools.<br>( Ruang bersih ) 
  </td>
  <td>A.B. All members yang bertanggung jawab untuk ganti tool mempunyai kualifikasi level 4 dalam form pengembangan skill.
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

</tr>



<tr> 
  
  <td rowspan="2">Tool dan kesempatan untuk HRD</td>
  <td>A. Instruksi diberikan melalui OJT sesuai dengan rencana di tempat kerja.
  </td>
   <td>A.Form instruksi untuk setiap item dari form pengembangan skill sudah disiapkan semua.
  </td>
  <td>A.Mempunyai form instruksi mengenai ganti tool, pengecekan kualitas, dan setting tool.
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

</tr>



<tr> 
  

  <td>B. Dojo dll digunakan sesuai dengan tujuannya.
  </td>
   <td>B. Keterampilan anggota team (T/Ms) telah di tingkatkan tanpa penundaan terhadap jadwal.<br>(tool change, quality check, tool setting work）　
  </td>
  <td>B. (T/Ms) harus memiliki Level yang lebih tinggi  "mampu melakukan pekerjaan sendiri" secara mandiri" dari Development Sheet. *(Pada saat penilaian, New member adalah masa pengembangan atau pelatihan ining period, Data selama 6 Bulan)
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

</tr>



<tr> 
  
  <td rowspan="2">Observasi gerakan operator</td>
  <td>A. Items untuk observasi ( apa yang diobservasi ) telah ditentukan sebelum observasi.
  </td>
   <td>A.Level Silver terjaga.
  </td>
  <td>A.  Observasi pekerjaan dilakukan sesuai "prosedur", "safety" dan "gerakan".
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

</tr>



<tr> 
  

  <td>B. A/M Seksi melakukan follow up untuk hasil observasi secara periodik.
  </td>
   <td>B. Section manager melakukan follow up hasil observasi secara periodik.
  </td>
  <td>B. Section manager melakukan follow-up hasil observasi secara periodik.
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

</tr>



<tr> 
  <td rowspan="2" colspan="3">Hasil Aktivitas</td>
  <td rowspan="2">Defect unit pertama setelah ganti tools berkurang.
  Defect unit pertama setelah ganti tool (kecuali ganti tool di dalam M/C) 
  ･･･ 2 atau kurang dari 2 defect/bulan （harus dilanjutkan selama 3 bulan terakhir.）</td>
  

  <td>A. Tidak ada defect unit pertama setelah ganti tool <br>・・・ Harus dilanjutkan selama 6 bulan terakhir.
  </td>
   <td>
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

</tr>


<tr> 

  

  <td>B. Global target untuk defect in-process dilanjutkan. <br>( Harus dilanjutkan selama 6 bulan ) 
  </td>
   <td>
  </td>

  <td>
  <select name="valr28" id="valr28" style="width: 45px;">
     <option value="X" <?php echo ($valr[26] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[26] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals28" id="vals28" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[26] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>







</tbody>
</table>
<br/>
<center><h2 style="color:blue"><?php echo $text_score; ?></h2></center>

</div>
  


</div>
<!-- /.container-fluid -->

 

 
<?php include('includes/footer.php'); ?>   





