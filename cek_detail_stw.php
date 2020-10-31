<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form assesor STW";

$active_dashboard = "";
$active_4s = "";
$active_stw = "active";
$active_pm = "";
$active_om = "";

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

$result = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8] + $valr[9] + $valr[10] + $valr[11] + $valr[12] + $valr[13] + $valr[14] + $valr[15] + $valr[16] + $valr[17] + $valr[18] + $valr[19] + $valr[20] + $valr[21] + $valr[22] + $valr[23] + $valr[24] + $valr[25] + $valr[26] + $valr[27] + $valr[28] + $valr[29] + $valr[30] + $valr[31] + $valr[32] + $valr[33] + $valr[34] + $valr[35];


$score = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23] + $vals[24] + $vals[25] + $vals[26] + $vals[27] + $vals[28] + $vals[29] + $vals[30] + $vals[31] + $vals[32] + $vals[33] + $vals[34] + $vals[35];



if($score > 108){
  $score = 108;
}

//echo $score;

$score = round(($score / 108) * 100);

$text_score = "";
if($score != ""){
$text_score = "Score : ".$score;
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
<form action="cek_assessor_stw.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fid; ?>" />

<table  class="table table-bordered" style="font-size:12px"  >
<thead>
<tr align="center">

<th><center></center></th>
<th><center>Kriteria Evaluasi<br>Level Silver</center></th>
<th><center>Kriteria Evaluasi<br>Level Gold</center></th>
<th><center>Penjelasan</center></th>
<th><center>Hasil</center></th>
<th><center>Scose</center></th>

</tr>
</thead>
<tbody>
<tr>
<td>GL control board  management</td>
<td>1. Hasil Berhubungan antara sub-KPI ke main - KPI</td>
<td>1.  Hasil Berhubungan antara sub-KPI ke main - KPI</td>
<td>Target KPI pilar tercapai dan target global juga tercapai.  (Apabila target global tidak ditentukan, cek target section atau grup</td>
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
<td rowspan="2">Thorough standardized work  </td>
<td  rowspan="1">1)　 Membuat 3 diagram standard.<br><br>A. Mempunyai 3 diagram standar untuk setiap jenis pekerjaan.<br><br>- Mempunyai Gentan-i dan diagram Yamazumi untuk type III.
</td>
<td>1)　 Membuat 3 diagram standard.<br><br>A. Mempunyai 3 diagram standar untuk setiap jenis pekerjaan.<br><br>- Mempunyai Gentan-i dan diagram Yamazumi untuk type III.</td>
<td>A.1. Diatur berdasaskan psoses dan pekerjaan.<br><br>A.2. Mempunyai Gentan-i dan diagram Yamazumi untuk setiap pekerjaan.<br><br>B.1. Mempunyai list untuk setiap proses dan pekerjaan.</td>
<td>
   <select name="valr2" id="valr2" style="width: 45px;">
    <option value="X" <?php echo ($valr[1] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[1] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  <br><br>
 <select name="valr3" id="valr3" style="width: 45px;">
   <option value="X" <?php echo ($valr[2] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[2] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  <br><br><br>
  <select name="valr4" id="valr4" style="width: 45px;">
   <option value="X" <?php echo ($valr[3] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[3] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  </td>
<td>
 <select name="vals2" id="vals2" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[1] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  <br><br>
 <select name="vals3" id="vals3" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[2] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  <br><br><br>
  <select name="vals4" id="vals4" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[3] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  </td>

</tr>

<tr>
 
<td>B. Mempunyai daftar selusuh pengoperasian dan sudah menyiapkan form pesintah kerja. <br>- Pembuatan form instruksi kerja sudah selesai 80% atau lebih.<br>C. Mempunyai rencana untuk membuat form perintah kerja.<br>D. diagram standard dan form lainnya berisi keadaan actual di tempat kerja. ( takt time, bulan, tanda tangan, dll ) </td>
<td>B. Mempunyai daftar selusuh pengoperasian dan sudah menyiapkan form pesintah kerja. <br>- Pembuatan form instruksi kerja sudah selesai 100% atau lebih.<br>C. Mempunyai rencana untuk membuat form perintah kerja.<br>D. diagram standard dan form lainnya berisi keadaan actual di tempat kerja. ( takt time, bulan, tanda tangan, dll ) </td>
<td>B.2. Pembuatan form perintah kerja sudah selesai 100%. <br><br>C. 3 diagram standard dan form lainnya sudah di-update sesuai rencana.<br><br>D. Besisi status actual di bulan assessment.</td>
<td>
   <select name="valr5" id="valr5" style="width: 45px;">
    <option value="X" <?php echo ($valr[4] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[4] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  <br/><br/>
 <select name="valr6" id="valr6" style="width: 45px;">
     <option value="X" <?php echo ($valr[5] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[5] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  <br/><br/>
 <select name="valr7" id="valr7" style="width: 45px;">
   <option value="X" <?php echo ($valr[6] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[6] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  </td>
<td>
  <select name="vals5" id="vals5" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[4] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  <br/><br/>
<select name="vals6" id="vals6" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[5] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  <br/><br/>
   <select name="vals7" id="vals7" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[6] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  </td>


</tr>

<tr>
<td></td>
<td>2) Display 3 diagsam standard .<br><br>- Form pekerjaan standard di-display di tempat kesja.(type I)
</td>
<td>2) Display 3 diagsam standard .<br><br>- Form pekerjaan standard di-display di tempat kesja.(type I)
</td>
<td><br><br>- Di-display di tempat dimana semua member bisa melihatnya.</td>
<td><br><br>
 <select name="valr8" id="valr8" style="width: 45px;">
    <option value="X" <?php echo ($valr[7] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[7] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  </td>
<td><br><br>
  <select name="vals8" id="vals8" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[7] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  </td>

</tr>

<tr>
<td></td>
<td>3) Pelaksanaan standar kerja menyeluruh （ operator mematuhi perintah ).<br><br>A.1. Mengikuti form perintah kerja ( pengoperasian proses/unit )<br><br> ・ Pengoperasian tidak besfluktuasi.( Memastikan 2 cycle untukf 2 proses-2 pengoperasian. )</td>
<td>3) Pelaksanaan standar kerja menyeluruh （ operator mematuhi perintah ).<br><br>A.1. Mengikuti form perintah kerja ( pengoperasian proses/unit )<br><br> ・ Pengoperasian tidak besfluktuasi.( Memastikan 3 cycle untukf 3 proses-3 pengoperasian. )</td>
<td>A. 1 Assessos memilih 3 cycles dasi 3 psoses 3 pekerjaan untuk dicek.<br><br> （ proses kerja, ganti tool, check kualitas, parts conveyance, dll.）<br><br>　Ctt : Point evaluasi akan menjadi "Nol" meskipun hanya satu member yang tidak mengikuti STW.</td>
<td>
  <select name="valr9" id="valr9" style="width: 45px;">
   <option value="X" <?php echo ($valr[8] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[8] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  <br><br><br>
   <select name="valr10" id="valr10" style="width: 45px;">
   <option value="X" <?php echo ($valr[9] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[9] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  <br><br><br>
 <select name="valr11" id="valr11" style="width: 45px;">
   <option value="X" <?php echo ($valr[10] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[10] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  <br><br></td>
<td>
  <select name="vals9" id="vals9" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[8] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  <br><br><br>
   <select name="vals10" id="vals10" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[9] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  <br><br><br>
 <select name="vals11" id="vals11" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[10] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  <br><br><br></td>
 
</tr>


<tr>
<td></td>
<td>A.2 ratio kepatuhan standar kerja ･･･ 80% atau lebih  ( Lihat form lainnya ).<br><br></td>
<td>A.2　Ada bulan-bulan dimana ratio kepatuhan STW adalah 100% .<br><br></td>
<td>A.2　Ada bulan-bulan dimana ratio kepatuhan teshadap STW adalah 100% dalam 6 bulan sebelum audit. <br><br>（ Namun demikian, rata-rata hasus 98% & lebih dari itu untuk selama 6 bulan）</td>
<td>
  <select name="valr12" id="valr12" style="width: 45px;">
   <option value="X" <?php echo ($valr[11] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[11] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
  <br><br><br></td>
<td>
  <select name="vals12" id="vals12" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[11] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
  <br><br><br></td>

</tr>
<tr>
<td></td>
<td>4）Penerapam obsesvasi pekerjaan dengan 3 diagram standard dan manual. (GL, TL)</td>
<td>4）Penerapam obsesvasi pekerjaan dengan 3 diagram standard dan manual. (GL, TL)</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td></td>
<td>A. Item yang diobsesvasi telah ditentukan dan dicatat.</td>
<td>A. Item yang diobsesvasi telah ditentukan dan dicatat..</td>
<td>Mempunyai histosy mengenai obsesvasi.</td>
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
<td></td>
<td>B. Observasi pekerjaan sudah diterapkan dengan cara yang kreatif.  ( level dan metode observasi ) W.</td>
<td>B. Observasi pekerjaan sudah diterapkan dengan cara yang kreatif.  ( level dan metode observasi ) .</td>
<td>B. Level observasi di-improve melalui sesi belajar dan kaizen diterapkan melalui observasi bersama.<br><br>(Contoh : dua member mengobservasi satu member) </td>
<td>
   <select name="valr14" id="valr14" style="width: 45px;">
    <option value="X" <?php echo ($valr[13] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[13] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
<td>
   <select name="vals14" id="vals14" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[13] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>

<tr>
<td></td>
<td>C. A/M melakukan follow up secara periodik.</td>
<td>C. Manager melakukan follow up secasa periodik.</td>
<td>C. A/M melakukan follow-up untuk mencatat observasi. tanda tangan, comment, dll). </td>
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
<td rowspan="3">sevision of standasdized wosk </td>
<td>5) Observasi pekerjaan secara menyeluruh dengan 3 diagram standard dan manual.</td>
<td>5) Observasi pekerjaan secara menyeluruh dengan 3 diagram standard dan manual.</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Observasi pekerjaan & defect mengenai pekerjaan yang sulit sudah divisualisasikan ( list, dll )</td>
<td>A. Observasi pekerjaan & defect mengenai pekerjaan yang sulit sudah divisualisasikan ( list, dll )</td>
<td>A. Mempunyai rencana Kaizen atau list masalah dll yang dapat digunakan untuk mengecek isi/uraiannya.</td>
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
<td>B. Menerapkan analisa pekerjaan.<br>( menggunakan video atau form evaluasi untuk pekerjaan yang sulit dilakukan )</td>
<td>B. Menerapkan analisa pekerjaan.<br>( menggunakan video atau form evaluasi untuk pekerjaan yang sulit dilakukan )</td>
<td>B. Masalah diklasifikasi melalui analisa.<br>(Bagaimana masalah diselesaikan sudah di-visualisasikan).</td>
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
<td rowspan="4"></td>
<td>6) Kaizen pekerjaan dengan 3 diagram standar dan manual.</td>
<td>6) Kaizen pekerjaan dengan 3 diagram standar dan manual.</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Usaian masalah divisualisasikan ( list masalah ) </td>
<td>A. Aktivitas kaizen dilakukan secara kontinyu.</td>
<td>A. Aktivitas kaizen dilaksanakan setiap bulan.</td>
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
<td>B. Menerapkan aktivitas TPS dengan partisipasi seluruh member dengan menggunakan group kecil.</td>
<td>B. Hal-hal yang sudah di-kaizen ( di-improve ) sudah diorganisis.</td>
<td>B. Hasil sudah ada secara jelas..</td>
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
<td>C. ratio penerapan C/Ms adalah 80% atau lebih.  C/M mengenai masalah yang belum diselesaikan hasus diambil dalam waktu dua bulan.</td>
<td>C. satio penerapan C/Ms: 90% atau lebih.  C/M mengenai masalah yang belum diselesaikan hasus diambil dalam waktu dua bulan. </td>
<td>C.1 ratio implementasi C/M: 90％ atau lebih.<br><br>C.2 C/M terhadap masalah yang belum diselesaikan hasus diambil dalam dua bulan.</td>
<td>
  <select name="valr20" id="valr20" style="width: 45px;">
    <option value="X" <?php echo ($valr[19] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[19] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select>  <br><br>
 <select name="valr21" id="valr21" style="width: 45px;">
   <option value="X" <?php echo ($valr[20] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[20] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  <br><br>
</td>
<td>
  <select name="vals20" id="vals20" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[19] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  <br><br>
 <select name="vals21" id="vals21" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[20] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  <br><br>
</td>

</tr>

<tr>
<td rowspan="3"></td>
<td>7) revisi 3 diagram standard dan manual untuk standarisasi</td>
<td>7) revisi 3 diagram standard dan manual untuk standarisasi</td>
<td>A.1. rencana Kaizen dll dilengkapi dengan tanda tangan dan comment.</td>
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
<td>A. Sec. Manager atau A/M mengkonfirmasikan tempat kerja setelah revisi.</td>
<td>A. Sec. Manager atau A/M mengkonfirmasikan tempat kerja setelah revisi.</td>
<td>A.2. Sec. Manager dan A/M berpastisipasi dakan aktivitas kaizen secara periodik dan memberi perintah.</td>
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
<td>B. Instruksi dan training setelah revisi sudah diberikan dan dicatat.</td>
<td>B. Instruksi dan training setelah revisi sudah diberikan dan dicatat.</td>
<td>B. Kapan dan kepada siapa perintah dan training diberikan sudah divisualisasikan.</td>
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
<td rowspan="4">Change points control </td>
<td>8) Menerapkan pengontrolan henkaten (point perubahan)</td>
<td>8) Menerapkan pengontrolan henkaten (point perubahan)</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Menerapkan peraturan kontrol berikut ini ( dan sudah dicatat )</td>
<td>A.1. Mengikuti peraturan kontrol ( dan dicatat )</td>
<td>A.1. Pengontrolan henkaten diterapkan mengikuti peraturan.</td>
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
<td>B. Aktivitas pengurangan resiko henkaten ( point perubahan ) sudah diterapkan..</td>
<td>A.2. Sec. Manager dan A/M secara berkala memastikan histosy dan melakukan follow-up</td>
<td>A.2. Sec. Manager dan A/M secara periodik menanda tangani fosm histosy.</td>
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
<td>( pre-training, training, dll )</td>
<td>B. Tidak ada defects di proses berikut / vehicle plant yang disebabkan oleh henkaten ( point perubahan ) lebih dasi 6 bulan.<br>
     ( Timbulnya defect ･･･ 0 point )      .</td>
<td>B. Tidak ada defect lolos yang terjadi di group (line) sendiri.</td>
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
<td rowspan="4">Human resousce Development</td>
<td>9) Klasifikasi pekerjaan (skill )</td>
<td>9) Klasifikasi pekerjaan (skill )</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Mendapatkan skill yang diperlukan untuk setiap elemen kerja.</td>
<td>A. Mendapatkan skill yang diperlukan untuk setiap elemen kerja.</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A.1. Status pengoperasian setiap member ( proses ).<br>A.2. Status skill setiap member ( form pengembangan skill ).</td>
<td>A.1. Status pengoperasian setiap member ( proses ).<br>A.2. Status skill setiap member ( form pengembangan skill ).</td>
<td>A.1. Status akuisisi pekerjaan (proses) individu sudah divisualisasikan. <br><br>A.2. Status akuisisi skill Individu sudah divisualisasikan.</td>
<td>
   <select name="valr28" id="valr28" style="width: 45px;">
    <option value="X" <?php echo ($valr[27] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[27] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select><br><br>
  <select name="valr29" id="valr29" style="width: 45px;">
    <option value="X" <?php echo ($valr[28] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[28] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select>  <br>
</td>
<td>
   <select name="vals28" id="vals28" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[27] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select><br><br>
   <select name="vals29" id="vals29" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[28] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>

<tr>
<td>B. Mempunyai sistem untuk sertifikasi pengoperasian dan skill.( psoses penting, dll ) .</td>
<td>B. Mempunyai sistem untuk sertifikasi pengoperasian dan skill.( psoses penting, dll ) .</td>
<td>B. Member yang sudah mendapat sertifikasi telah dibuatkan visualisasinya. (bisa di-cek di papan atau di-display di psoses).</td>
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

</tr>



<tr>
<td rowspan="3"></td>
<td>10) Level-up skill</td>
<td>10) Level-up skill</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Menerapkan training secara sistematis sesuai dengan priositas setiap level.</td>
<td>A. Menerapkan training sesuai dengan priositas tiap level setelah setting target..</td>
<td>A.1. ratio member yang dapat mengerjakan semua pekerjaan (proses) sudah lebih dari 30%<br>
（Berlangsung selama 6 bulan selama pengembangan)</td>
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

</tr>

<tr>
<td></td>
<td></td>
<td>A.2. Setidaknya satu orang trainer yang bisa mengajar semua pekerjaan di group (line) nya sendiri juga menguasai skill di group (line) lain. (Bisa mengerjakan pekerjaan regular untuk semua psoses di line yang lain)</td>
<td>
  <select name="valr32" id="valr32" style="width: 45px;">
    <option value="X" <?php echo ($valr[31] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[31] ==  'O') ? ' selected="selected"' : "";?>>O</option>    
  </select>  
</td>
<td>
   <select name="vals32" id="vals32" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[31] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>


<tr>
<td rowspan="5">Safety Activity(sank down) </td>
<td>11) Menesapkan assessment / pengurangan / management resiko</td>
<td>11) Menesapkan assessment / pengurangan / management resiko</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Assessment resiko untuk semua pengoperasian( termasuk troubleshooting ) sudah komplit semuanya.</td>
<td>A. Assessment resiko untuk semua pengoperasian( termasuk troubleshooting ) sudah komplit semuanya.</td>
<td>A. Hasil Assessment di-sharing dengan semua member.</td>
<td>
   <select name="valr33" id="valr33" style="width: 45px;">
    <option value="X" <?php echo ($valr[32] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[32] ==  'O') ? ' selected="selected"' : "";?>>O</option>   
  </select>  
</td>
<td>
  <select name="vals33" id="vals33" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[32] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>

<tr>
<td>B. Aktivitas pengurangan resiko / Management resiko yang testinggal sudah diterapkan.</td>
<td>B. Aktivitas pengurangan resiko / Management resiko yang testinggal sudah diterapkan.</td>
<td>B. Kegiatan berjalan seperti yang direncanakan dan masalah yang tersisa divisualisasikan dengan menggunakan peta.
</td>
<td>
     <select name="valr34" id="valr34" style="width: 45px;">
   <option value="X" <?php echo ($valr[33] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[33] ==  'O') ? ' selected="selected"' : "";?>>O</option>    
  </select> 
</td>
<td>
   <select name="vals34" id="vals34" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[33] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select> 
</td>

</tr>

<tr>
<td>C. Safety untuk "target seksi" sudah sesuai</td>
<td>C. "Target Global" Safety  sudah sesuai.</td>
<td>C. Nol untuk semua kecelakaan/sakit karena kerja/pekerjaan rank A yang berhubungan dengan pekerjaan
    (Management resiko residual untuk pekerjaan rank A harus diterapkan)   
 Award Gold akan dihapus kecuali kondisi ini dijaga selama lebih dari 12 bulan.
</td>
<td>
  <select name="valr35" id="valr35" style="width: 45px;">
    <option value="X" <?php echo ($valr[34] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[34] ==  'O') ? ' selected="selected"' : "";?>>O</option> 
  </select> 
</td>
<td>
    <select name="vals35" id="vals35" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[34] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select> 
</td>

</tr>

<tr>
<td>12) Semua item  "Evaluasi S" pada form pengecekan aktivitas Safety harus lulus.</td>
<td>12) Semua item  "Evaluasi G" pada form pengecekan aktivitas Safety harus lulus.</td>
<td>Menesapkan casa optimal untuk plant/pesusahaan afiliasi.</td>
<td>
 <select name="valr36" id="valr36" style="width: 45px;">
    <option value="X" <?php echo ($valr[35] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[35] ==  'O') ? ' selected="selected"' : "";?>>O</option>  
  </select> 
</td>
<td>
    <select name="vals36" id="vals36" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[35] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select> 
</td>

</tr>


<tr>
<td colspan="6"><center>

</center>
</td>
</tr>

</tbody>
</table>

<br>
<center><h2 style="color:blue"><?php echo $text_score; ?></h2></center>
<br>

<br>
<!-- 
<center><h5>Ada temuan ? <a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>-->
<br>
</div>
  


</div>
<!-- /.container-fluid -->

 

 
<?php include('includes/footer.php'); ?>    



