<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form assesor";

$active_dashboard = "";
$active_4s = "active";
$active_stw = "";
$active_pm = "";
$active_om = "";

$fid = $_GET['fid'];

$queryku = mysqli_query($con, "select farray_value from t_schedule_4s where fid = '$fid'");
while($queryku2=mysqli_fetch_array($queryku))
{
	$farray_valuenye = $queryku2['farray_value'];
}


include 'cek_jml_4s.php';

$vale = explode(";",$farray_valuenye);


$score = $vale[0] + $vale[1] + $vale[2] + $vale[3] + $vale[4] + $vale[5] + $vale[6] + $vale[7] + $vale[8] + $vale[9] + $vale[10] + $vale[11] + $vale[12] + $vale[13] + $vale[14] + $vale[15] + $vale[16] + $vale[17] + $vale[18] + $vale[19] + $vale[20] + $vale[21] + $vale[22] + $vale[23] + $vale[24] + $vale[25] + $vale[26] + $vale[27] + $vale[28] + $vale[29] + $vale[30] + $vale[31] + $vale[32] + $vale[33] + $vale[34] + $vale[35] + $vale[36] + $vale[37] + $vale[38] + $vale[39] + $vale[40];

if($score > 205){
	$score = 205;
}

$score = round(($score / 205) * 100);

$text_score = "";
if($score != ""){
$text_score = "Score : ".$score;
}			

?>



<?php include('includes/header.php'); ?>

<!-- Begin Page Content -->
<div style="padding:5px">

<center><legend style="margin:-10px">Form 4S</legend></center>

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
<form action="cek_assessor_4s_maintenance.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fid; ?>" />
<table  class="table table-bordered" style="font-size:12px"  >
<thead>
<tr align="center">
<th><center>No</center></th>
<th><center>Tempat yg dicek</center></th>
<th><center>Point</center></th>
<th><center>Score</center></th>
<th><center>Very Bad<br>(Level 1)</center></th>
<th><center>Bad<br>(Level 2)</center></th>
<th><center>Normal<br>(Level 2)</center></th>
<th><center>Good<br>(Level 4)</center></th>
<th><center>Very Good<br>(Level 5)</center></th>

</tr>
</thead>
<tbody>
<tr>
<td rowspan="6"><br><br><br><br><br><span style="writing-mode: tb-rl;">Zona pejalan kaki</span></td>
<td rowspan="3">Jalur pejalan kaki</td>
<td>Seiri</td>
<td>
   <select name="val1" id="val1" value="<?php echo $vale[0]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[0] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[0] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[0] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[0] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[0] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[0] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tidak ada garis pembatas, barang diletakkan tidak beraturan</td>
<td>Garis terhapus, barang dilantai.</td>
<td>Ada garis tetapi ada sebagian sisa garis yg lama.</td>
<td>Garis yang lama sudah benar-benar tidak ada. Tidak ada kotoran.</td>
<td>Mudah berjalan, di atas jalur jalan tidak ada apapun yang menghalangi.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val2" id="val2" value="<?php echo $vale[1]; ?>" style="width: 45px;">
	   <option value="0" <?php echo ($vale[1] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[1] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[1] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3"<?php echo ($vale[1] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[1] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[1] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Jalur alat angkut dan jalur jalan orang saling berpotongan.</td>
<td>Jalur simpang siur karena ada part dll yg diletakkan secara sementara.</td>
<td>Jalur alat angkut dan jalur jalan orang sudah dipisahkan sesuai standar.</td>
<td>Ada tanda untuk berhenti sebentar, menunjuk kiri kanan, gambar kaki saat menyebrang, dll.</td>
<td>Ada indikasi petunjuk arah, sehingga tidak bingung / tidak ragu.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val3" id="val3" value="<?php echo $vale[2]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[2] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1"<?php echo ($vale[2] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[2] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[2] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[2] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[2] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Jalur pejalan kaki kotor oleh part, sampah/kotoran, oli, pasir, dll.</td>
<td>Ada sampah atau kotoran, garis ada yang terhapus.</td>
<td>Tidak ada kotoran, garis tidak ada yang terhapus / terkelupas.</td>
<td>Garis tidak kotor ( bersih ).</td>
<td>Jalur pejalan kaki, lantai, dan garis selalu bersih.</td>

</tr>
<tr>
<td rowspan="3">Tempat cuci tangan</td>
<td>Seiri</td>
<td>
   <select name="val4" id="val4" value="<?php echo $vale[3]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[3] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[3] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[3] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[3] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[3] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[3] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Ada kain lap, sarung tangan, dll tergeletak.</td>
<td>Digunakan untuk mencuci part yang terkena oli.</td>
<td>Tidak tersimpan barang yang tidak diperlukan.</td>
<td>Disediakan peralatan seperti sikat, spon, dll.</td>
<td>Eye washer dan alat kumur dikontrol.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val5" id="val5" value="<?php echo $vale[4]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[4] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[4] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[4] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[4] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[4] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[4] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tidak ada alat pembersih, tidak ada aktivitas membersihkan.</td>
<td>Ada kain lap pengganti seperti kain wex, dll.</td>
<td>Ada kain lap dll, dan bersih.</td>
<td>Penanggung jawab untuk mengontrol sudah ditentukan.</td>
<td>Disiapkan alat pencair parafin, dll.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val6" id="val6" value="<?php echo $vale[5]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[5] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[5] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[5] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[5] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[5] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[5] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Sink (basin) kotor oleh air liur, riak, dan oli.</td>
<td>Lantai sekitar sink kotor oleh air.</td>
<td>Tidak ada kebocoran dari kran, dan kondisinya terjaga dengan baik.</td>
<td>Menjaga kondisi kebersihan, termasuk alat pemanas air.</td>
<td>Eye washer dan alat kumur selalu terjaga bersih.</td>

</tr>
<tr>
<td rowspan="9"><br><br><br><br><br><br><br><br><br><br><span style="writing-mode: tb-rl;">Peletakan barang Sekitar tempat</span></td>
<td rowspan="3">Penempatan oli</td>
<td>Seiri</td>
<td>
   <select name="val7" id="val7" value="<?php echo $vale[6]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[6] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[6] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[6] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[6] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[6] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[6] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Penyimpanan tercampur dengan produk selain oli.</td>
<td>Kain wex dan sarung tangan bergeletakan.</td>
<td>Hanya ada oli yang telah ditentukan.</td>
<td>Jelas siapa orang yang menjadi penanggung jawabnya, jumlah yang disimpan, dan jenis olinya.</td>
<td>Ada ide / inovasi untuk mengurangi jumlah pemakaian.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val8" id="val8" value="<?php echo $vale[7]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[7] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[7] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[7] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[7] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[7] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[7] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Jenis-jenis oli ditempatkan terkumpul secara berantakan.</td>
<td>Oli tersimpan secara tidak teratur di dalam garis pembatas. </td>
<td>Ada meja penampung dan oil pan yang terawat.</td>
<td>Oli ditempatkan berdasarkan jenisnya.</td>
<td>Jumlah yang diperlukan dan jenisnya berada dalam kondisi terkontrol.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val9" id="val9" value="<?php echo $vale[8]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[8] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[8] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[8] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[8] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[8] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[8] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Lantai kotor oleh oli dan ada bekas jejak kaki.</td>
<td>Sekitar tempat penyimpanan oli kotor.</td>
<td>Ada kain wex atau lap pembersih untuk mengelap jika ada oli yang tumpah / berceceran.</td>
<td>Oli ditempatkan berdasarkan jenisnya.</td>
<td>Jumlah yang diperlukan dan jenisnya berada dalam kondisi terkontrol.</td>

</tr>
<tr>
<td rowspan="3">Area stock / penyimpanan<br>Emergency stock<br>Part NG.
</td>
<td>Seiri</td>
<td>
   <select name="val10" id="val10" value="<?php echo $vale[9]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[9] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[9] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[9] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[9] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[9] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[9] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Barang diletakkan secara tidak teratur, tidak jelas apakah diperlukan dan tidak diperlukan.</td>
<td>Part OK dan part NG diletakkan berdekatan.</td>
<td>Tempat peletakan part OK dan part NG terpisah.</td>
<td>Part NG diberi cat merah, dan diletakkan dengan rapih.</td>
<td>Part OK diletakkan dengan rapih.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val11" id="val11" value="<?php echo $vale[10]; ?>" style="width: 45px;">
 <option value="0"<?php echo ($vale[10] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[10] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[10] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[10] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[10] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[10] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Ada part/barang tanpa kanban.</td>
<td>Ada kanban namun peletakannya tidak teratur.</td>
<td>Ada kanban, dan tersimpan rapih.</td>
<td>Menggunakan sistem FIFO.</td>
<td>Dapat mengontrol kanban secara pasti.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val12" id="val12" value="<?php echo $vale[11]; ?>" style="width: 45px;">
 <option value="0"<?php echo ($vale[11] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[11] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[11] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[11] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[11] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[11] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Barang berdebu.</td>
<td>Lantai kotor karena oli.</td>
<td>Control board dan kanban kotor.</td>
<td>Ada ide / inovasi agar barang tidak kotor.</td>
<td>Dibersihkan secara periodik dan berjalan dengan baik.</td>

</tr>
<tr>
<td rowspan="3">Penempatan tool<br>Sarung tangan, kain lap, dll.</td>
<td>Seiri</td>
<td>
   <select name="val13" id="val13" value="<?php echo $vale[12]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[12] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[12] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[12] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[12] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[12] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[12] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Ada barang yang tidak jelas penggunaannya.</td>
<td>Barang yang bisa dipakai dan barang yang tidak bisa dipakai tercampur.</td>
<td>Hanya menyimpan barang yang bisa dipakai.</td>
<td>Hanya menyimpan barang yang diperlukan saja.</td>
<td>Hanya menyimpan barang yang diperlukan saja, dan diletakan dengan teratur.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val14" id="val14" value="<?php echo $vale[13]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[13] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[13] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[13] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[13] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[13] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[13] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Ada barang yang tidak jelas penggunaannya berserakan.</td>
<td>Disimpan dengan diberi tag yang bertuliskan tentang pemakaiannya.</td>
<td>Disimpan dengan ditulis tanggal pemakaiannya.</td>
<td>Nama barang dan nomor rak tertulis dengan jelas dan benar.</td>
<td>Ada pengontrolan tentang order point dan jumlah order.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val15" id="val15" value="<?php echo $vale[14]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[14] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[14] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[14] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[14] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[14] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[14] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Barang kotor oleh debu, sampah, pasir, dan oli.</td>
<td>Rak kotor oleh debu, sampah, pasir, oli.</td>
<td>Kanban kotor oleh debu, oli.</td>
<td>Selalu bersih dan terlihat jelas.</td>
<td>Ada ide / inovasi agar rak dan barang tidak kotor.</td>

</tr>

<tr>
<td rowspan="15"><br><br><br><br><br><br><br><br><br><br><span style="writing-mode: tb-rl;">Line Produksi</span></td>
<td rowspan="3">Area kerja</td>
<td>Seiri</td>
<td>
   <select name="val16" id="val16" value="<?php echo $vale[15]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[15] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[15] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[15] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[15] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[15] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[15] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tergeletak barang pribadi dan barang yang tidak diperlukan.</td>
<td>Ada barang yang tidak diperlukan.</td>
<td>Hanya menyimpan barang yang diperlukan.</td>
<td>Tempat penyimpanan sudah jelas dan diletakkan dengan rapih.</td>
<td>Ditempatkan dengan rapih, bersih di tempat yang telah ditentukan.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val17" id="val17" value="<?php echo $vale[16]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[16] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[16] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[16] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[16] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[16] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[16] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Barang terletak berserakan.</td>
<td>Barang yang diperlukan dan barang yang tidak diperlukan disimpan secara terpisah.</td>
<td>Tidak ada barang yang tidak diperlukan, masih agar berantakan.</td>
<td>Schedule pembersihan dilakukan sesuai rencana, dan tidak ada yang kotor.</td>
<td>Ada label / indikasi, dan rapih.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val18" id="val18" value="<?php echo $vale[17]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[17] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[17] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[17] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[17] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[17] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[17] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Kotor oleh oli, sampah, pasir, dll.</td>
<td>Tidak ada sampah tetapi masih agak kotor.</td>
<td>Ada schedule cleaning ( pembersihan ), masih agak kotor.</td>
<td>Schedule pembersihan dilakukan sesuai rencana, dan tidak ada yang kotor.</td>
<td>Lantai selalu bersih.</td>

</tr>


<tr>
<td rowspan="3">Peralatan untuk maintenance GD, welding, DR,H1</td>
<td>Seiri</td>
<td>
   <select name="val19" id="val19" value="<?php echo $vale[18]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[18] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[18] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[18] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[18] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[18] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[18] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Peralatan tambahan seperti cover dll terlepas dan tergeletak.</td>
<td>Kain lap dan baut berserakan.</td>
<td>Ada pengajuan ijin untuk melepas cover.</td>
<td>Cover yang sudah dilepas ditempatkan dengan rapih dan bersih.</td>
<td>Rapih, bersih, dan mematuhi batas waktu yang telah ditentukan.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val20" id="val20" value="<?php echo $vale[19]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[19] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[19] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[19] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[19] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[19] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[19] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Kabel wiring, air hose ( selang udara ) tergeletak di lantai.</td>
<td>Ada wiring dan piping sementara.</td>
<td>Wiring masih terikat sementara.</td>
<td>Wiring dikumpulkan / disatukan dengan rapih.</td>
<td>Wiring dimasukkan di ducting / box.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val21" id="val21" value="<?php echo $vale[20]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[20] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[20] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[20] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[20] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[20] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[20] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Kotor karena kebocoran coolant dan kebocoran oli.</td>
<td>Ada kotoran karena kiriko dan oli.</td>
<td>Masih ada sedikit kotor karena oli, tetapi ada bekas dibersihkan.</td>
<td>Selalu dilakukan pembersihan, dan kondisinya bersih.</td>
<td>Selalu terjaga kebersihannya.</td>

</tr>

<tr>
<td rowspan="3">Work table ( meja ragum ）Work dolley washing machine
</td>
<td>Seiri</td>
<td>
   <select name="val22" id="val22" value="<?php echo $vale[21]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[21] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[21] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[21] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[21] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[21] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[21] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tergeletak barang pribadi dan barang yang tidak diperlukan.</td>
<td>Barang yang tidak diperlukan dan barang pribadi diletakkan berjajar.</td>
<td>Tidak menyimpan barang yang tidak diperlukan.</td>
<td>Barang diletakkan dengan dijelaskan tujuan pemakaiannya.</td>
<td>Di atas meja kerja tidak ada apa-apa.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val23" id="val23" value="<?php echo $vale[22]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[22] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[22] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[22] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[22] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[22] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[22] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Barang terletak berserakan.</td>
<td>Barang yang sudah dipakai tidak dirapihkan.</td>
<td>Tidak ada barang yang tidak diperlukan, tetapi masih agak kotor.</td>
<td>Ditempatkan dengan rapih dan bersih.</td>
<td>Ada indikasi / penanda, dan ditempel dengan rapih.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val24" id="val24" value="<?php echo $vale[23]; ?>" style="width: 45px;">
 <option value="0"<?php echo ($vale[23] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[23] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[23] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[23] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[23] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[23] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Kotor oleh oli, sampah, pasir, dll.</td>
<td>Ada barang pribadi seperti kue, dll.</td>
<td>Tidak ada barang pribadi, tetapi masih agak kotor.</td>
<td>Dibersihkan dan bersih.</td>
<td>Selalu terjaga kebersihannya.</td>

</tr>


<tr>
<td rowspan="3">Tool Alat ukur</td>
<td>Seiri</td>
<td>
   <select name="val25" id="val25" value="<?php echo $vale[24]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[24] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[24] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[24] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[24] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[24] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[24] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tergeletak barang pribadi dan barang yang tidak diperlukan.</td>
<td>Ada barang yang rusak, barang yang tidak bisa dipakai, dan barang yang tidak diperlukan.</td>
<td>Tidak ada barang yang tidak diperlukan.</td>
<td>Barang yang diperlukan ditempatkan dengan rapih dan bersih.</td>
<td>Address penempatan barang jelas dan pasti.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val26" id="val26" value="<?php echo $vale[25]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[25] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[25] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[25] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[25] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[25] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[25] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tidak jelas apa dan tersimpan di mana.</td>
<td>Ada tempat penyimpanan tetapi peletakannya tidak teratur.</td>
<td>Lokasi penyimpanan sudah jelas terindikasi.</td>
<td>Ada list untuk mencegah hilang.</td>
<td>Tools yang tepat dapat segera digunakan kapan saja.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val27" id="val27" value="<?php echo $vale[26]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[26] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[26] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[26] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[26] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[26] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[26] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Ada karat, kotor, dll.</td>
<td>Ada kotoran, oli.</td>
<td>Tidak ada sampah dan kotoran.</td>
<td>Terawat dan bersih.</td>
<td>Berada dalam kondisi yang dapat digunakan kapan saja.</td>

</tr>

<tr>
<td rowspan="3">Notifikasi di dalam line</td>
<td>Seiri</td>
<td>
   <select name="val28" id="val28" value="<?php echo $vale[27]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[27] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[27] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[27] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[27] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[27] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[27] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Ada dokumen lama dan dokumen yang kotor.</td>
<td>Ada dokumen yang miring dan sobek.</td>
<td>Hanya terpasang dokumen yang diperlukan.</td>
<td>Terpasang dengan lurus dan rapih.</td>
<td>Selalu terjaga dan terkontrol dalam kondisi yang baik.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val29" id="val29" value="<?php echo $vale[28]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[28] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[28] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[28] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[28] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[28] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[28] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tergeletak dalam kondisi bertumpuk dan sulit dilihat.</td>
<td>Dokumen yang sudah tidak valid masih terpasang.</td>
<td>Beberapa jenis dokumen tercampur dan terpasang.</td>
<td>Dipasang di tempat yang telah ditentukan.</td>
<td>Mematuhi batas waktu pemasangannya.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val30" id="val30" value="<?php echo $vale[29]; ?>" style="width: 45px;">
 <option vvalue="0" <?php echo ($vale[29] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[29] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[29] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[29] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[29] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[29] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Area penempelan tidak ditentukan.</td>
<td>Billboard dan dinding kotor.</td>
<td>Ada sedikit kotor, tetapi dibersihkan.</td>
<td>PIC ditentukan dengan jelas, dan selalu mengontrol.</td>
<td>Selalu terjaga kebersihan dan keindahannya.</td>

</tr>

<tr>
<td rowspan="9"><br><br><br><br><br><br><br><br><br><br><span style="writing-mode: tb-rl;">Tempat istirahat</span></td>
<td rowspan="3">Tempat istirahat</td>
<td>Seiri</td>
<td>
   <select name="val31" id="val31" value="<?php echo $vale[30]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[30] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[30] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[30] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[30] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[30] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[30] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tergeletak barang pribadi dan barang yang tidak diperlukan.</td>
<td>Terdapat pakaian kerja yang kotor, sarung tangan, dll.</td>
<td>Barang pribadi, snack tersimpan dengan rapih dan teratur.</td>
<td>Information board, kursi, meja tersusun dengan rapih.</td>
<td>Sama sekali tidak ada barang yang tidak diperlukan.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val32" id="val32" value="<?php echo $vale[31]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[31] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[31] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[31] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[31] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[31] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[31] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tools, kue, dll diletakan dalam waktu yang lama.</td>
<td>Ada koran, majalah, dll diletakkan secara sementara.</td>
<td>Disediakan kotak untuk menaruh barang pribadi.</td>
<td>Barang perusahaan dan barang pribadi terpisah,</td>
<td>Tidak ada peletakan sementara.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val33" id="val33" value="<?php echo $vale[32]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[32] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[32] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[32] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[32] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[32] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[32] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Lantai kotor karena oli.</td>
<td>Meja kotor karena kopi, dll.</td>
<td>Kaca, lemari, dan dinding agak kotor.</td>
<td>Ada pengaturan piket untuk bersih-bersih.</td>
<td>Pelaksanaan bersih-bersih terlaksana dengan baik.</td>

</tr>


<tr>
<td rowspan="3">Sekitar meja FM</td>
<td>Seiri</td>
<td>
   <select name="val34" id="val34" value="<?php echo $vale[33]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[33] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[33] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[33] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[33] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[33] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[33] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tergeletak barang pribadi dan barang yang tidak diperlukan.</td>
<td>Billboard dan materi yang dikontrol tidak dipisahkan.</td>
<td>Tidak ada penempatan sementara seperti sarung tangan, dll.</td>
<td>Tidak ada barang yang tidak diperlukan.</td>
<td>Menempatkan hanya barang yang diperlukan dengan rapih.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val35" id="val35" value="<?php echo $vale[34]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[34] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[34] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[34] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[34] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[34] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[34] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Dokumen bertumpuk tidak teratur.</td>
<td>Dokumen tersimpan secara terpisah & terpilah.</td>
<td>Dokumen tersimpan dengan rapih di atas meja.</td>
<td>Ada title untuk dokumen dan file.</td>
<td>Dokumen bisa langsung diambil tanpa mencari-cari.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val36" id="val36" value="<?php echo $vale[35]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[35] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[35] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[35] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[35] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[35] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[35] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Topi dan meja FM kotor oleh oli.</td>
<td>Pesawat telepon dan PC kotor.</td>
<td>Ada sedikit kotor, tetapi terlihat bekas dibersihkan.</td>
<td>Dibersihkan secara berkala (rutin).</td>
<td>Sekitar meja FM bersih dan rapih.</td>

</tr>

<tr>
<td rowspan="3">Rak penyimpanan dokumen</td>
<td>Seiri</td>
<td>
   <select name="val37" id="val37" value="<?php echo $vale[36]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[36] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[36] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[36] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[36] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[36] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[36] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Dokumen dan barang-barang tergeletak tidak teratur.</td>
<td>Ada barang selain dokumen yg diletakkan secara sementara.</td>
<td>Dokumen yang tidak jelas apakah diperlukan atau tidak diperlukan ada di dalam lemari.</td>
<td>Tidak ada dokumen yang tidak diperlukan.</td>
<td>Tidak meletakkan dokumen yang tidak diperlukan, kapanpun juga.</td>

</tr>
<tr>
<td>Seiton</td>
<td>
   <select name="val38" id="val38" value="<?php echo $vale[37]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[37] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[37] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[37] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[37] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[37] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[37] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Tidak jelas ada apa dan tersimpan dimana.</td>
<td>Title / judul hanya tertulis di dokumen saja.</td>
<td>Ada title dan label di dokumen dan lemari.</td>
<td>Dokumen ditempatkan dengan diklasifikasikan per genre.</td>
<td>Jika ada dokumen yang hilang, langsung bisa terlihat.</td>

</tr>
<tr>
<td>Seiso</td>
<td>
   <select name="val39" id="val39" value="<?php echo $vale[38]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[38] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[38] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[38] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[38] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[38] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[38] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>File cabinet kotor oleh oli, kotoran dan debu.</td>
<td>File cabinet kotor oleh kotoran dan debu.</td>
<td>Dibersihkan oleh orang yang melihat / mengetahui.</td>
<td>Ada giliran membersihkan lemari, dan dilakukan dengan bersih.</td>
<td>Lemari, kabinet selalu terlihat bersih dan rapih.</td>

</tr>


<tr>
<td>Rajin 1</td>
<td>Rajin member</td>
<td></td>
<td>
   <select name="val40" id="val40" value="<?php echo $vale[39]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[39] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[39] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[39] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[39] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[39] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[39] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Sama sekali tidak tahu mengenai 4S.</td>
<td>Tidak tahu secara mendalam mengenai arti 4S.</td>
<td>Member memahami 4S berdasarkan kartu pemahaman safety untuk pekerjaan umum.</td>
<td>Diterapkan dengan baik agar siapa saja member yang ditanya dapat menjawab dengan tepat mengenai arti 4S.</td>
<td>Diantara member saling memberikan improvement yang sesuai mengenai hal-hal yang masih kurang tentang 4S.</td>

</tr>

<tr>
<td>Rajin 2</td>
<td>Rajin pengawas</td>
<td></td>
<td>
   <select name="val41" id="val41" value="<?php echo $vale[40]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[40] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[40] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[40] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[40] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[40] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[40] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
</td>
<td>Pengawas / penanggung jawab tidak peduli dengan 4S.</td>
<td>Hanya memberi instruksi secara lisan untuk melakukan 4S.</td>
<td>Ada planning untuk melakukan ４Ｓ secara kapan, siapa, apa dan bagaimana, serta ada sistem nya.</td>
<td>4S dilakukan secara pasti dan terencana, sesuai dengan mapping, giliran, dll, serta ada petunjuk.</td>
<td>Kesadaran member mengenai 4S sudah tinggi, meskipun tidak diperintahkan, mampu menjaga 4S dan bisa membimbing.</td>

</tr>



</tbody>
</table>
<br>
<h2 class="text-center" style="color:blue"><?php echo $text_score; ?></h2>


</div>
  


</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>