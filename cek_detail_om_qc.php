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
<form action="cek_assessor_om_qc.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fid; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr>
<th width="20%"><center>Item</center></th>
<th width="30%"><center>Standard evaluasi<br>Level bronze (sistemnya jadi)</center></th>
<th width="5%"><center>Hasil</center></th>
<th width="5%"><center>Score</center></th>
<th width="40%"><center>Penjelasan</center></th>

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

<br>
<!--
<center><h5>Ada temuan ? <a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>
<br>-->
</div>

</div>
<!-- /.container-fluid -->

 
 
<?php include('includes/footer.php'); ?>    



