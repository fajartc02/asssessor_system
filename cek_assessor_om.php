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
<th><center>Temuan</center></th>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='1','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml1;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='2','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
  <p class="text-center"><br/>
  Total : <?php echo $jml2;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='3','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
  <p class="text-center"><br/>
  Total : <?php echo $jml3;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='4','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml4;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='5','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml5;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='6','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml6;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='7','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml7;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='8','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml8;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='9','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
  <p class="text-center"><br/>
  Total : <?php echo $jml9;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='10','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
  <p class="text-center"><br/>
  Total : <?php echo $jml10;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='11','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml11;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='12','<?php echo $fid; ?>');"  data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml12;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='13','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml13;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='14','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
  <p class="text-center"><br/>
  Total : <?php echo $jml14;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='15','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
  <p class="text-center"><br/>
  Total : <?php echo $jml15;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='16','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
  <p class="text-center"><br/>
  Total : <?php echo $jml16;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='17','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
  <p class="text-center"><br/>
  Total : <?php echo $jml17;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='18','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
  <p class="text-center"><br/>
  Total : <?php echo $jml18;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='19','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml19;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='20','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml20;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='21','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml21;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='22','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml22;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='23','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml23;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='24','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml24;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='25','<?php echo $fid; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml25;?> Temuan</p>
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
<input type="submit" name="submit" value="SUBMIT" style="width:100%" class="btn btn-success" />
</form>
<br>
<!-- 
<center><h5>Ada temuan ? <a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>
<br>-->
</div>
  


</div>
<!-- /.container-fluid -->

 
<?php

if (isset($_POST['submit']))
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
	//
	
	
	$fidx = $_POST["fidx"];
	
	$blth_now = date("Y-m");
	
	$farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25;
	
	$farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25;


     $fscore = $xvals1 + $xvals2 + $xvals3 + $xvals4 + $xvals5 + $xvals6 + $xvals7 + $xvals8 + $xvals9 + $xvals10 + $xvals11 + $xvals12 + $xvals13 + $xvals14 + $xvals15 + $xvals16 + $xvals17 + $xvals18 + $xvals19 + $xvals20 + $xvals21 + $xvals22 + $xvals23 + $xvals24 + $xvals25;

    $score = round(($fscore / 75) * 100);
	
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
    $emailBody .="<td  width=\"5%\">No</td><td width=\"10%\">Judul</td><td width=\"7%\">Silver</td><td width=\"12%\">Gold</td><td width=\"16%\">Deskripsi</td><td width=\"30%\">Note</td><td width=\"20%\">Temuan</td><td width=\"20%\">Tanggal</td>";
    $emailBody .="</tr>";
	

$queryku = mysqli_query($con, "select *, substring(fdate_modified, 1, 7) from t_finding_om where fid_schedule = '$fidx' and substring(fdate_modified, 1, 7) = '$blth_now' order by fid ASC");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fphoto = $queryku2['fphoto'];
	$fnote = $queryku2['fnote'];
	$fdate_modified = $queryku2['fdate_modified'];
	$fid_score = $queryku2['fid_score'];
	
	
	$des = mysqli_query($con, "select * from t_form_om where fid = '$fid_score'");
	while($des2=mysqli_fetch_array($des))
{
	
	$fjudul = $des2['fjudul'];
	$fsilver = $des2['fsilver'];
	$fgold = $des2['fgold'];
	$fdesc = $des2['fdesc'];



	$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>";
	$myXMLData .= "<note><to></to><from></from><heading></heading><body>$fnote</body></note>";

    $xml=simplexml_load_string($myXMLData) or die('Error: Cannot create object'); 

	
	$emailBody .="<tr>";
    $emailBody .="<td>$no</td><td>$fjudul</td><td>$fsilver</td><td>$fgold</td><td>$fdesc</td><td>$xml->body</td><td><img style='width:100px;' src='".LOC_IMAGE."images/temuanOM/".$fphoto."' /></td><td>$fdate_modified</td>";
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
  

  mysqli_query($con, "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fidx'");
  
	
	
	//echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

	//mysqli_query($con, "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'");
	
	echo "<script>window.location='cek_assessor_om.php?fid=$fidx'</script>";
			
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
    $path = "images/temuanOM/";
    // Proses upload
    if(move_uploaded_file($tmp, $path.$foto)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database

  
  mysqli_query($con, "insert into t_finding_om (fid_schedule, fphoto, fnote, fid_score, fgroup) values ('$fid_schedule', '$foto', '$fnote', '$fid_score', '$fid_schedule')");

}

}
  
  //Submit Nilai
  
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
	//
	
	
	$fidx = $_POST["fid_schedule"];
	
	$farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25;
	
	$farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25;


     $fscore = $xvals1 + $xvals2 + $xvals3 + $xvals4 + $xvals5 + $xvals6 + $xvals7 + $xvals8 + $xvals9 + $xvals10 + $xvals11 + $xvals12 + $xvals13 + $xvals14 + $xvals15 + $xvals16 + $xvals17 + $xvals18 + $xvals19 + $xvals20 + $xvals21 + $xvals22 + $xvals23 + $xvals24 + $xvals25;

    $score = round(($fscore / 75) * 100);
  

  mysqli_query($con, "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fidx'");
  
  
   echo "<script>window.location='cek_assessor_om.php?fid=$fid_schedule'</script>";
  
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
      <form action="cek_assessor_om.php" method="post" enctype="multipart/form-data">
	  
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
      </form>
      <hr/>
      <div id="tableku"></div>
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
    url: 'cek_om.php',       
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


