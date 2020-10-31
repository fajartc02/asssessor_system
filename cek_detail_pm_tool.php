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
<form action="cek_assessor_pm_tool.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fidx; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr align="center">
<th width="5%" colspan="3"><center>Item</center></th>
<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
<th width="20%"><center>Assessment criteria<br>＜Gold level＞</center></th>
<th width="30%"><center>Description</center></th>
<th><center>Hasil</center></th>
<th ><center>Skor</center></th>
<th width="30%"><center>Evidence yg hrs di siapkan</center></th>


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

</tr>








</tbody>
</table>
<br>

<center><h2 style="color:blue"><?php echo $text_score; ?></h2></center>
</br>

</div>
  


</div>
<!-- /.container-fluid -->

 

 
<?php include('includes/footer.php'); ?>  





