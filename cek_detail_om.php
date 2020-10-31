<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form assesor OM";

$active_dashboard = "";
$active_4s = "";
$active_stw = "";
$active_pm = "";
$active_om = "active";

$fid = $_GET['fid'];


include 'cek_jml_om.php';

$queryku = mysqli_query($con, "select farray_result, farray_score from t_schedule_om where fid = '$fid'");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fresult_nye = $queryku2['farray_result'];
	$fscore_nye = $queryku2['farray_score'];
}


$valr = explode(";",$fresult_nye);
$vals = explode(";",$fscore_nye);

$result = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8] + $valr[9] + $valr[10] + $valr[11] + $valr[12] + $valr[13] + $valr[14] + $valr[15] + $valr[16] + $valr[17] + $valr[18] + $valr[19] + $valr[20] + $valr[21] + $valr[22] + $valr[23] + $valr[24];

$score = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23] + $vals[24];



if($score > 75){
	$score = 75;
}

//echo $score;

$score = round(($score / 75) * 100);

$text_score = "";
if($score != ""){
$text_score = "Score : ".$score;
}			

?>



<?php include('includes/header.php'); ?>

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
<form action="cek_assessor_om.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fid; ?>" />
<table  class="table table-bordered" style="font-size:12px"  >
<thead>
<tr align="center">
<th><center></center></th>
<th><center>Kriteria Evaluasi<br>Level Silver</center></th>
<th><center>Kriteria Evaluasi<br>Level Gold</center></th>
<th><center>Penjelasan</center></th>
<th><center>Hasil</center></th>
<th><center>Score</center></th>

</tr>
</thead>
<tbody>
<tr>
<td>GL control board  management</td>
<td>1. Result are connected from sub-KPI to main KPI<br>(hasil antara sub KPI dan main KPI saling berhubungan)</td>
<td>2. Result are connected from sub-KPI to main KPI<br>(hasil antara sub KPI dan main KPI saling berhubungan)</td>
<td>3. Pillars KPI target is achieved and global target is also achieved.  (In case that global target is not set, check with section group target) <br><br>target KPI tercapai dan global target juga tercapai</td>
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
<td rowspan="2">Kondition 4S</td>
<td  rowspan="2">1)　Menciptakan lingkungan untuk menemukan defect kecil.<br><br> Materialized method (4S, kaizen, etc) has been deployed to 80% equipment of the line confirmed by the activity described in 1-1 to 4 (at right)<br><br>Metode yang diciptakan (4S, kaizen, dll) telah dilakukan pada 80% equipment  yang ada di line. (di konfirmasi   melalui   aktivitas 1-1  sampai 4 di penjelasan sebelah kanan)
</td>
<td>1)　Menciptakan lingkungan untuk menemukan defect kecil.<br><br>Kondisi 4S semua M/C sudah baik dan terjaga.（area kerja, mesin, display sheet）</td>
<td>In order to maintain the condition which is easy to find small defects<br><br>bertujuan untuk menjaga kondisi  sehingga mudah menemukan defect kecil</td>
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
<td>2)　Kaizen untuk 4S sudah dijalankan dan aktivitasnya dilanjutkan. <br>( Mempunyai cara kreatif untuk mendeteksi defect minor secara mudah ) </td>
<td>2) Pengurangan waktu 4S  / Review area 4S ( perluasan / pengurangan ) dilaksanakan secara kontinyu.</td>
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
<td rowspan="2">Maintenance harian</td>
<td  rowspan="2">2)　Aktivitas pencegahan dengan maintenance harian.<br><br> Aktivitas untuk mencegah breakdown mesin di awal sudah diterapkan. 
  （ Lubrikasi, Raw material, energy, Parts, Jig & Tool, dll )
</td>
<td rowspan="2">2)　Aktivitas pencegahan dengan maintenance harian.<br><br> Keabnormalan diketahui berdasarkan kontrol trend dan aktivitas pendegahan breakdown diterapkan dan memberikan hasil yang baik.</td>
<td>1. Ada revisi dan contoh KAIZEN untuk pencegahan breakdown.</td>
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
<td>2. Item yang sedang dikontrol memberikan efek untuk pencegahan breakdown.<br>( lubrikasi/material/energy/parts/jig dan tools, dll)</td>
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
<td rowspan="7"><br><br><br><br><br><br><br>Leadership Manager (Section manager & GL)</td>
<td rowspan="2">3) Partisipasi Manager / supervisor (MGR・CL)<br><br>Level Bronze di-maintain. ( Peran Mgr: berpartisipasi dalam aktivitas dan melakukan follow up.) </td>
<td rowspan="2">3) Partisipasi Manager / supervisor (MGR・CL)<br><br>Mendaftar ke training manager untuk ownership maintenance.</td>
<td>1. Sec. Mgr melakukan training ownership maintenance untuk manager.  ( Untuk section manager di luar negeri, dapat mengambil training dari orang yang sudah mendapat training Manager di Jepang.)</td>
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
<td>2. CL menyelesaikan leaders training mengenai ownership maintenance. ( Jika ada CL yang di luar negeri, dapat mengambil training dari orang yang sudah mendapat training Manager di Jepang.) </td>
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
<td>3) Partisipasi Manager / supervisor (MGR・CL)<br><br>Budget yang diperlukan untuk mencapai target sudah aman.</td>
<td rowspan="2">3) Partisipasi Manager / supervisor (MGR・CL)<br><br>Mengecek hasil aktivitas</td>
<td>Hasil dari mengamankan man hour dan budget yang diperlukan untuk aktivitas sudah dikonfirmasikan.</td>
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
<td>3) Partisipasi Manager / supervisor (MGR・CL)<br><br>Menanyakan dept, divisi dan seksi terkait untuk mendukung pekerjaan leader dan member agar lancar</td>
<td>Follow-up kemajuan aktivitas. ( Mengecek kehadiran/sheets)</td>
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
<td>3) Partisipasi Manager / supervisor (GL)<br><br>Level Bronze dijaga. ( Bagaimana melaksanakan ownership maintenance sudah jelas dan diberikan instruksi.)</td>
<td>3) Partisipasi Manager / supervisor (GL)<br><br>Member dikembangkan melalui aktivitas ownership maintenance.　</td>
<td>1. Mengarahkan member untuk mengerti tujuan dan arti aktivitas ownership maintenance.</td>
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
<td>3) Partisipasi Manager / supervisor (GL)<br><br>Melibatkan dept terkait dengan kesadaran mereka sendiri dan mempromosikan Kaizen dalam aktivitas ownership maintenance.( Special maintenance, Seksi Quality, dll.)I</td>
<td rowspan="2">3) Partisipasi Manager / supervisor (GL)<br><br>Memberikan tema kepada setiap member, dan melakukan follow-up untuk aktivitas mereka.</td>
<td>2. Memberi semangat kepada member untuk menentukan tema aktivitas.</td>
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
<td>3) Partisipasi Manager / supervisor (GL)<br><br>Mendaftar training leader ownership maintenance.</td>
<td>3. Follow-up aktivitas dan hasil yang diperoleh.</td>
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
<td rowspan="7"><br><br><br><br><br><br><br><br>Pengembangan Energy Dan Manusia</td>
<td>Step 3 Membuat standar tentative <br><br>Masalah dan history C/M dari setiap M/C sudah divisualisasikan.</td>
<td>Step 3 Membuat standar tentative <br><br>Melibatkan dept dan seksi terkait, sharing problem dan melaksanakan aktivitas dengan dukungan dari mereka semua.</td>
<td>1. Pencapaian aktivitas sambil bekerja sama dengan department terkait dapat divisualisasikan. ( Jishuken, projects, dll. )</td>
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
<td>1. Setiap member mempunyai pengalaman sukses mereka sendiri.</td>
<td>1. Dapat memastikan improvement mengenai skill self-maintenance.</td>
<td>1. Bisa memastikan skill assessment untuk self-maintenance</td>
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
<td>2. PDCA untuk ownership maintenance terus bergulir.</td>
<td>2. Cycle PDCA untuk ownership maintenance terus berlanjut.</td>
<td>2-1. Fokus pada Kaizen/aktivitas tema yang secara terus menerus memberikan hasil.</td>
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
<td>Kemudahan, peralatan dan Kaizen untuk aktivitas ownership maintenance sedang berlangsung.</td>
<td>Aktivitas ownership maintenance dilaksanakan, di-kaizen, dan mudah diterapkan</td>
<td>2-2. Member yang bertanggung jawam untuk ownership/special maintenance juga di-review.</td>
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
<td>Aktivitas preventive untuk kegagalan peralatan, bekerjasama dalam item self-maintenance, dan memvisualisasikannya.</td>
<td>Aktivitas preventive untuk kegagalan peralatan pada item self-maintenance, dan semuanya berjalan secara efektif</td>
<td>2-3. Maintenance ledger di-review dan di-revisi secara periodik. ( items, cycle, metode inspeksi ).</td>
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
<td rowspan="2">Step 4 Pengecekan Total dan self-control<br><br>KAIZEN dilaksanakan melalui aktivitas yang berfokus pada tema, dan hasilnya tampak.</td>
<td>Step 4 Pengecekan Total dan self-control <br><br>1 Member Produksi/Maintenance dan engine bekerja bersama untuk kaizen M/C. ( Eliminasi M/C / perubahan mekanisme / material, perubahan bentuk )</td>
<td>1. Mempunyai rencana mengenai M/C Kaizen yang penting.</td>
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
<td>2. Countermeasure penting untuk M/C dilaksanakan dengan PE (Act2).</td>
<td>2  Ada rencana untuk mengimprove penyebab utama down nya mesin.</td>
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
<td rowspan="3"><br><br><br><br><br>Hasil Sharing</td>
<td rowspan="3">5)　Konfirmasi hasil <br><br>1. Masalah Line divisualisasikan.<br><br>2. Target seksi tercapai. ( selama 3 bulan ）（ Jumlah peralatan gagal, stop yang sering, ratio pengoperasian ）</td>
<td rowspan="3">5)　Konfirmasi hasil <br><br>1. Masalah Line divisualisasikan.<br><br>2 Target Global tercapai. （selama 6 bulan） （ Ratio pengoperasian ）</td>
<td>1-1 Topik seperti bottleneck process atau proses yang sering terjadi sudah divisualisasikan secara quantitative. </td>
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
<td>1-2　Action plan dan target sudah jelas dan proses untuk mencapai target sudah divisualisasikan.</td>
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
<td>2  Tempat kerja yang tidak mengeset global target perlu diperkenalkan mengenai section target (Div. Target).</td>
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
<td rowspan="3"><br><br><br><br><br>Aktivitas dengan member maintenance</td>
<td>6)　Aktivitas yang melibatkan divisi terkait<br><br>Berpartisipasi dalam aktivitas yang berfokus pada tema.</td>
<td>6)　Aktivitas yang melibatkan divisi terkait<br><br>Problems di-sharing dan countermeasure dilaksanakan dengan produksi.</td>
<td>Melakukan prioritas untuk masalah berdasarkan cara pandang dari member produksi, dan sudah ada hasilnya.</td>
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
<td> Systematically implement repairing and C/M which cannot be done only by Production (Analysis and C/M of long time stop, etc.).</td>
<td>Bekerja untuk improvement reliability M/C dan standarisasi.(Act 2) </td>
<td>Status terakhir mengenai standard M/C termasuk informasi mengenai department lain sudah diketahui & diberikan petunjuk.</td>
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
<td> Training Skill-up untuk member produksi dijelaskan secara kontinyu dan diberikan instruksi.</td>
<td> Secara kontinyu mendukung aktivitas ownership maintenance. </td>
<td>Mempunyai aktivitas untuk meningkatkan improvement mengenai ownership maintenance skill. ( OJT, support untuk mendapatkan license ownership maintenance, dll. )</td>
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
<center><h5>Ada temuan ? <a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>
<br>-->
</div>
  


</div>
<!-- /.container-fluid -->



 
<?php include('includes/footer.php'); ?>    





