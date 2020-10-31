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

$result = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8] + $valr[9] + $valr[10] + $valr[11] + $valr[12] + $valr[13] + $valr[14] + $valr[15] + $valr[16] + $valr[17] + $valr[18] + $valr[19] + $valr[20] + $valr[21] + $valr[22] + $valr[23];

$score = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23];



if($score > 72){
  $score = 72;
}

//echo $score;

$score = round(($score / 72) * 100);

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
<form action="cek_assessor_pm_assy.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fid; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr align="center">
<th colspan="2"><center>Item</center></th>

<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
<th><center>Assessment criteria<br>＜Gold level＞</center></th>
<th><center>Description</center></th>
<th><center>Hasil</center></th>
<th ><center>Skore</center></th>

</tr>
</thead>
<tbody>

<tr>
  <td colspan="2">Management GL Board</td>
  <td>Ada hubungan (link) hasil dari Sub-KPI ke Main KPI.</td>
  <td>Ada hubungan (link) hasil dari Sub-KPI ke Main KPI.</td>
  <td>Target global tercapai.
(Untuk area kerja yang tidak memiliki target global, maka dapat dicek dengan pencapaian target section/ grup).</td>
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
  <td rowspan="24">Machining akurasi dengan single shot</td>
  <td rowspan="7">New QA Network 2008</td>
  <td>1) Evaluasi New QA Network. <br><br>A. 1.000 item diidentifikasi dan dievaluasi (Termasuk juga 48 item yang sesuai di tempat kerjanya sendiri).</td>
   <td>1) Evaluasi New QA Network. <br><br>A. 1.000 item diidentifikasi dan dievaluasi (Termasuk juga 48 item yang sesuai di tempat kerjanya sendiri).</td>
  <td>A.1. Lembaran evaluasi QA untuk item-item yang sesuai di area kerjanya sendiri, di'posting'.<br>A.2. Dilakukan evaluasi ulang 'New QA' sesuai kebutuhan (Perubahan proses, ECI, dll).  (melakukan evaluasi ulang setiap tahun, meskipun tidak ada  </td>
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
  
  <td>2) Kegiatan 'Level UP Evaluasi' New QA Network<br><br>
  		A.1. 1.000 item mencapai rank target sebagai berikut (Rank target di dalam lembaran yang diterbitkan oleh pihak QA).<br>80% ke atas : 3 poin<br>60% ke atas dan kurang dari 80% : 2 poin<br> kurang dari 60% : 1 poin　


   </td>
  <td>A.1. Rank target 1000 item, tercapai 100%.</td>
  <td>A.1. Target tercapai 100%.<br>
(termasuk Lembar daftar kondisi OK / 'Difficult achievement sheet').
    
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

</tr>

<tr>
  
  <td>A.2. Telah melakukan 'Level Up'- item-item yang belum mencapai target evaluasi QA (termasuk 48 items). </td>
  <td>A.2. Telah melakukan 'Level Up'- item-item yang belum mencapai target evaluasi QA (termasuk 48 items).</td>
  <td>A.2.  Dilakukan kegiatan 'level up-essensial C/M' (C/M mendasar; sehingga tidak terjadi lagi masalah yang sama) secara kontinyu, untuk item-item evaluasi yang belum tercapai (termasuk 48 item). 

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
  
  <td>A.3.  Telah dibuatkan 'daftar kondisi OK' (buat baru; untuk yang tadinya belum ada), untuk item-item yang belum mencapai target evaluasi QA.  </td>
  <td>A.3. Semua lembaran daftar kondisi OK untuk item-item yang belum mencapai target evaluasi QA, telah digunakan. </td>
  <td>A.3. Tersedia semua lembaran daftar kondisi OK untuk item-item evaluasi QA yang belum tercapai, dan dilakukan revisi SOP. 
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
  
  <td>B. Telah digunakan 'Daftar kondisi OK' / 'Daftar item yang sulit dicapai', untuk 48 items yang sulit dicapai di tempat kerjanya sendiri.  </td>
  <td>B. 48 items yang ada di area kerjanya sendiri, tidak terjadi di proses selanjutnya (selama 1 tahun) </td>
  <td>B. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit). 
    

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
  <td>C. Telah dilakukan kaizen terhadap masalah-masalah yang tercantum di dalam 'Check Sheet: Maintenance & Change Point Control' 48 items, yang ada di area kerjanya sendiri. </td>
  <td>C.  Rank target 48 items (yang ada di area kerjanya sendiri) yang tercantum di dalam 'Check Sheet: Maintenance & Change Point Control' yang diterbitkan oleh QA, telah tercapai.  </td>
  <td>C. Rank target 'Maintenance check sheet & Henkaten Control check sheet' telah tercapai, dan dicek secara berkala. 
    
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

  <td>D. Untuk masalah 'Customer outflow' yang pernah terjadi di area kerjanya sendiri, dilakukan pencegahan terjadinya kembali, serta C/M untuk mencegah terjadinya 'outflow' tersebut. 
  </td>
  <td>D. Masalah-masalah 'customer outflow' yang pernah terjadi di area kerjanya sendiri, tidak terjadi di proses selanjutnya (selama 1 tahun).  </td>
  <td>D. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit)

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
 
  <td rowspan="8">Process Maintenance & Control</td>
  
  <td>3) 'Maintenance & Control'<br>〈Tightening〉<br><br>A. Dilakukan pengecekan berkala terhadap kondisi 'tightening torque', dan dilakukan C/M untuk masalah yang ditemukan. 
    
  </td>
   <td>3) 'Maintenance & Control'<br><br><br>A. Dilakukan pencegahan masalah kualitas- 'Tightening torque'.
  </td>
  <td><br><br><br> A. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit).      

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

 
  <td>B. Dilakukan pengecekan berkala terhadap 'QL, FL Wrench', dan dilakukan C/M untuk masalah yang ditemukan. 
  </td>
  <td>B. Dilakukan pencegahan masalah kualitas yang disebabkan 'QL, FL Wrench'.
  </td>
  <td>B. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit). 

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

  <td>C. Dilakukan pengecekan berkala terhadap 'Tightening tools', dan dilakukan C/M untuk masalah yang ditemukan.  
  </td>
   <td>C. Dilakukan pencegahan masalah kualitas yang disebabkan 'Tightening Tools'.
  </td>
  <td>C. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit). 

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
  <td>〈Equipment〉<br><br>D. Dilakukan pengecekan berkala terhadap 'Kontrol kondisi/settingan Equipment', dan dilakukan C/M untuk masalah yang ditemukan. <br><br>Obyek: Equipment yang di-'countermeasure' untuk level penjaminan QA: 〔Tester, Detektor, dll〕
  </td>
     <td>〈Equipment〉<br><br>D. Dilakukan pencegahan masalah kualitas yang disebabkan 'equipment'.<br><br>Obyek: Equipment yang di-'countermeasure' untuk level penjaminan QA: 〔Tester, Detektor, dll〕
  </td>
   <td>〈Equipment〉<br><br>D. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit). 
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

  <td>E. Dilakukan pengecekan berkala terhadap 'JIG dan peralatan', dan dilakukan C/M untuk masalah yang ditemukan. <br>
Pallet, JIG Assy, dll
  </td>
   <td>E. Dilakukan pencegahan masalah kualitas yang disebabkan 'JIG & Tools'.<br>
　 Pallet, JIG Assy, dll
  </td>
  <td>E. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit). 

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
  
  <td>F. Dilakukan pengecekan berkala terhadap 'perangkat pokayoke', dan dilakukan C/M untuk masalah yang ditemukan.
  </td>
   <td>F.  Dilakukan pencegahan masalah kualitas yang disebabkan oleh perangkat pokayoke.
  </td>
  <td> F. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit). 
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


  <td>〈Proses kritikal〉<br>G. Dilakukan 'Trend control' terhadap 'Tighetening torque' untuk proses kritikal.
  </td>
  <td>〈Proses kritikal〉<br>G. Dilakukan pencegahan masalah kualitas untuk item-item 'tighetening torque' yang dilakukan 'trend control'.
  </td>
   <td>〈Proses kritikal〉<br>G. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit). 
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


  <td>H.  Melaksanakan schedule penggantian 'consumable tools' untuk proses kritikal.<br>Contoh 'consumable tools': soket, 'impact wrench' dll.）
  </td>
   <td>H. Dilakukan pencegahan masalah kualitas yang disebabkan oleh 'consumable tools' proses kritikal.<br>Contoh 'consumable tools': soket, 'impact wrench' dll.）　　　　
  </td>
  <td>H. Dilakukan kaizen masalah 'tools' bersama-sama dengan departemen terkait.
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
  <td rowspan="4">Kontrol Henkaten (poin perubahan) </td>

  <td>4) Kontrol Henkaten (Diringkas secara 4M)<br>A. Dilakukan pengecekan & pencatatan (record): Perubahan proses, ECI, dan modifikasi mesin.<br>(Dapat ditangani dengan: implementasi & revisi SW).
  </td>
   <td>4) Kontrol Henkaten (Diringkas secara 4M)<br>A. 'Rule' Perubahan proses, ECI, dan modifikasi mesin, ditaati, serta tidak ada masalah yang terjadi.<br>(Dapat ditangani dengan: implementasi & revisi SW).
  </td>
  <td> <br>A. Dilakukan pencatatan tanpa terlewat (record) selama 1 tahun/lebih, serta tidak ada 'outflow' masalah ke test bench dst. & ke customer.
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
  
 

  <td>B. Dilakukan pendidikan dan training terhadap orang yang ditunjuk melakukan 'rework'.
  </td>
   <td>B. Tidak ada masalah 'rework' yang terjadi di proses selanjutnya. 
  </td>
  <td>B. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit). 
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
  <td>C.  Telah dilakukan training secara terschedule, terhadap orang yang ditunjuk untuk melakukan pekerjaan 'back up' di area kerjanya sendiri《48 items + Proses kritikal》
  </td>
   <td>C. Tidak ada masalah pekerjaan 'back up' yang terjadi di proses selanjutnya. 
  </td>
  <td>C. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit). 
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
  <td>D.  Telah dilakukan training secara terschedule, terhadap orang yang ditunjuk untuk melakukan penanganan 'abnormality' di area kerjanya sendiri《48 items + Proses kritikal》.
  </td>
   <td>D. Tidak ada masalah penanganan 'abnormality' yang terjadi di proses selanjutnya. 
  </td>
  <td>D. Tidak ada 'outflow' masalah ke test bench dst. & ke customer (berkelanjutan selama 1 tahun sebelum audit). 
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
  <td rowspan="2">Pengembangan SDM</td>

  <td>5) Pendidikan dan Training SDM<br>A. Memahami konten evaluasi, dan dapat melakukan C/M serta Kaizen (GL, TL, Skill leader).</td>
  <td>5) Pendidikan dan Training SDM<br>A. Dapat menjamin kualitas 'based on' evaluasi QA (GL, TL, Skill leader)..</td>
   <td><br>A. Dapat melakukan pengecekan: setting 'equipments' ('Tightening tools dll), perubahan proses, dan cek fungsi (pokayoke dll), 
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
  
  
  <td>B.  Memahami metode penjaminan kualitas di prosesnya sendiri, serta dapat memberikan usulan kaizen  ( TM )   (Ex: metode cek torsi, perangkat pokayoke, cek kualitas, dll)
  </td>
   <td>B. Memahami metode penjaminan kualitas di prosesnya sendiri, serta dapat melakukan kaizen  ( TM )   (Ex: metode cek torsi, perangkat pokayoke, cek kualitas, dll)
  </td>
  <td>B. Ada record pendidikan seperti: pendidikan pengenalan (introduction), dsb (Lembar catatan personal, lembar pendidikan skill), serta ada contoh kaizennya  (Dapat ditunjukan juga dengan contoh kegiatan kaizen kreatif, atau kegiatan 'small group').
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

</tr>



<tr> 
  <td rowspan="2">Hasil Kegiatan</td>

  <td>6) Pengurangan 'Defect' & Masalah<br><br>A. Untuk 'defect in process' telah mencapai Main-KPI (berkelanjutan selama 3 bulan) * Main KPI= Target di grupnya sendiri, yang mana diambil dari 'Section Hosin'.
  </td>
   <td>6) Pengurangan 'Defect' & Masalah<br><br>A.  'Defect in process' mencapai target global, serta target grup pun tercapai.Berkelanjutan selama 6 bulan）
  </td><td>'Quality defect in process' ini tidak termasuk untuk: abnormalitas 'equipment' yang tidak berdampak pada produk ('NR tightening abnormality, miss deteksi masing-masing tester, abnormalitas mesin assembly otomatis, abnormalitas pengangkutan/transfer, abnormalitas supply part', dll)<br>(kegiatan dilakukan dengan membaginya secara 'Man' dan 'Machine'). 
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
  

  <td>B.1. Masalah 'Customer outflow' 5ppm ke bawah (berkelanjutan selama 6 bulan sebelum diaudit).
  	<br>
  	B.2. Masalah proses kritikal '0 item' (berkelanjutan selama 6 bulan sebelum diaudit).<br>
　Proses kritikal =
  </td>
   <td>

   	B. Tidak ada 'outflow' masalah ke pihak customer ('Vehicle factory').<br> (berkelanjutan selama 1 tahun sebelum audit)<br>※Evaluasi keseluruhan-hasil kegiatan,　Apabila terjadi‥‥‥0 poin
  </td>
  <td>B. Tidak ada 'outflow' masalah ke pihak customer. <br>(Mengecek Lembar 'trend' masalah customer')<br>
※Meskipun ① di atas hasilnya 'maru' (O), poin yang diberikan tetap 0 apabila ada 'outflow'.
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








</tbody>
</table>
<br/>
<center><h2 style="color:blue"><?php echo $text_score; ?></h2></center>
<br>

</div>
  


</div>
<!-- /.container-fluid -->

 
 
<?php include('includes/footer.php'); ?>  







