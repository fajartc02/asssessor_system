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

$result_silver = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8];


$result_gold = $valr[9] + $valr[10] + $valr[11] + $valr[12] + $valr[13] + $valr[14] + $valr[15] + $valr[16] + $valr[17] + $valr[18] + $valr[19] + $valr[20] + $valr[21] + $valr[22] + $valr[23] + $valr[24] + $valr[25] + $valr[26] + $valr[27] + $valr[28];



$score_silver = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8];

$score_gold = $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23] + $vals[24] + $vals[25] + $vals[26] + $vals[27] + $vals[28];




if($score_silver > 27){
  $score_silver = 27;
}



if($score_gold > 57){
  $score_gold = 57;
}

//echo $score;

$score_silver = round(($score_silver / 27) * 100);

$score_gold = round(($score_gold / 57) * 100);

$text_score_silver = "";
if($score_silver != ""){
$text_score_silver = "Score : ".$score_silver;


}


$text_score_gold = "";
if($score_gold != ""){
$text_score_gold = "Score : ".$score_gold;
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
<form action="cek_assessor_pm_qc.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fidx; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr align="center">
<th colspan="2"><center>Item</center></th>
<th><center>SILVER LEVEL Klausul evaluasi</center></th>
<th><center>Hasil</center></th>
<th ><center>Skore</center></th>  
<th ><center>Penjelasan standard evaluasi & klosul</center></th>  

</tr>
</thead>
<tbody>

<tr>
  <td rowspan="10">Quality point management</td>
  <td rowspan="5">Kemampuan audit</td>
  <td> １）Membuat jelas/mieruka kondisi kualitas bagian produksi
        <br> A. Mengetahui kondisi kualitas, dokumen ditempel atau menjadi kondisi bisa dikonfirmasi dengan diambil</td>
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
<td> Kondisi kualitas bagian produksi dapat diketahui menggunakan sheet kumpulan informasi, <br>
laporan harian, laporan bulanan kualitas dll
</td>

</tr> 

<tr>

  <td> B. Kelemahan & masalah dari kondisi kualitas harian, seperti NG didalam proses, claim pasar, 
        <br> part yg dibeli, NG next proses kelihatan/nampak</td>
   
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
<td> Masalah yg sedang ditangani & kelemahan proses produksi dapat diketahui  <br>
dari penangkapan kondisi kualitas
</td>

</tr> 


<tr>

  <td> ２）Konten aktivitas/upaya audit henkaten & audit proses dll terlihat jelas/mieruka<br>
    A. Konten aktivitas/upaya audit henkaten & audit proses dll menjadi diketahui/kelihatan


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

<td> Menangani audit henkaten & audit proses (perubahan desain & perubahan proses)<br> kontennya dapat diketahui</td>

</tr>

<tr>
  
  <td>B.  Kondisi progres, hasil katual, planing konten aktivitas/upaya menjadi diketahui/kelihatan</td>

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
<td>B.  Hasil & kondisi progres, target, planing konten aktivitas dapat diketahui</td>

</tr> 


<tr>

  <td>C. Melaksanakan penanggulangan & kaizen bersama bagian terkait terhadap proses yg ada masalah<br>※Prosentase penanggulangan & kaizen 100%
     </td>
 <td></td>
 <td></td>
<td>Melaksanakan penanggulangan & kaizen selalu bersama bagian terkait terhadap proses yg ada masalah/bermasalah</td>

</tr> 


<tr>
  
  <td rowspan="5">Kemampuan analisis & kemapuan kaizen </td>

  <td>３）Membuat jelas/mieruka konten penanganan NG didalam proses, trouble kronis, kesulitan-kesulitan di produksi dll<br>A. Mengetahui konten pananganan NG didalam proses, trouble kronis, kesulitan-kesulitan di produksi
    

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
<td> Konten penanganan/aktivitas dapat diketahui menggunakan dokumen-dokumen<br>(action sheet, list aktivitas/upaya dll)  </td>

</tr> 


<tr>
 
  <td>B.  Kondisi progres, hasil aktual, planing konten aktivitas menjadi diketahui/kelihatan
    
     </td>
<td></td>
<td></td>
<td>B.  Hasil & kondisi progres, target, planing konten aktivitas/upaya dapat diketahui</td>

</tr> 


<tr>

  <td>C. Tertulis komentar & follow cek dari manager,

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
<td>C.  Komentar & tanda tangan manager/ CL ditulis di dokumen-dokumennya</td>

</tr> 


<tr>
 
 

  <td> ４）Tingkat kontribusi & keuntungan pihak produksi<br>A. Memenuhi jumlah kasus aktivitas hal kesulitan-kesulitan (tercapai)

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

<td>A. Kesulitan-kesulitannya adalah : NG didalam proses, trouble yg jarang-jarang, trouble kronis dll<br>
  Contoh jumlah kasus penanganan/aktivitas : 8 orang x 0.8 kasus = 6 kasus/tahun (potongan decimal point)</td>

</tr> 



<tr>


  <td>B. Dengan dilakukanya penanggulangan & kaizen, keluar efek di waktu, cost, berkurangnya NG didalam proses dll <br> (tingkat kontribusi)<br>C. erhubung dengan revisi SOP & perubahan desain dll<br>（Prosentase NG didalam proses, cost, waktu dll）

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
<td>B.  Terkait 1 kasus kesulitan, akan keluar beberapa hasil (efek)
  <br>C. Dengan adanya perubahan desain, perubahan standard cek kualitas, kualitas produksi meningkat
</td>

</tr> 





<tr>  
  <td colspan="2">Kondisi pengelolaan aktivitas pilar
  </td>
    
   <td> ６) 
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
<td></td>

</tr> 


<tr style="background-color: silver">
  
<td colspan="2">Standard evaluasi</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
</tbody>
</table>

<br><br>





<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr align="center">
<th colspan="2"><center>Item</center></th>
<th><center>GOLD LEVEL Klausul evaluasi</center></th>
<th><center>Hasil</center></th>
<th ><center>Skore</center></th>  
<th ><center>Penjelasan standard evaluasi & klosul</center></th>  

</tr>
</thead>
<tbody>

<tr>
  <td rowspan="18">Quality point management</td>
  <td rowspan="5">Kemampuan audit</td>
  <td> １）Membuat jelas/mieruka kondisi kualitas bagian produksi
        <br> A. Mengetahui kondisi kualitas, dokumen ditempel atau menjadi kondisi bisa dikonfirmasi dengan diambil</td>
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
<td> Kondisi kualitas bagian produksi dapat diketahui menggunakan sheet kumpulan informasi, <br>
laporan harian, laporan bulanan kualitas dll
</td>

</tr> 

<tr>

  <td> B. Kelemahan & masalah dari kondisi kualitas harian, seperti NG didalam proses, claim pasar, 
        <br> part yg dibeli, NG next proses kelihatan/nampak</td>
   
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
<td> Masalah yg sedang ditangani & kelemahan proses produksi dapat diketahui  <br>
dari penangkapan kondisi kualitas
</td>

</tr> 


<tr>

  <td> ２）Konten aktivitas/upaya audit henkaten & audit proses dll terlihat jelas/mieruka<br>
    A. Konten aktivitas/upaya audit henkaten & audit proses dll menjadi diketahui/kelihatan


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

<td> Menangani audit henkaten & audit proses (perubahan desain & perubahan proses)<br> kontennya dapat diketahui</td>

</tr>


<tr>
  
  <td>B.  Kondisi progres, hasil katual, planing konten aktivitas/upaya menjadi diketahui/kelihatan</td>

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
<td>B.  Hasil & kondisi progres, target, planing konten aktivitas dapat diketahui</td>

</tr> 


<tr>

  <td>C. Melaksanakan penanggulangan & kaizen bersama bagian terkait terhadap proses yg ada masalah<br>※Prosentase penanggulangan & kaizen 100%
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
<td>Melaksanakan penanggulangan & kaizen selalu bersama bagian terkait terhadap proses yg ada masalah/bermasalah</td>

</tr> 


<tr>
  
  <td rowspan="13">Kemampuan analisis & kemapuan kaizen </td>

  <td>３）Membuat jelas/mieruka konten penanganan NG didalam proses, trouble kronis, kesulitan-kesulitan di produksi dll<br>A. Mengetahui konten pananganan NG didalam proses, trouble kronis, kesulitan-kesulitan di produksi
    

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
<td> Konten penanganan/aktivitas dapat diketahui menggunakan dokumen-dokumen<br>(action sheet, list aktivitas/upaya dll)  </td>

</tr> 


<tr>
 
  <td>B.  Kondisi progres, hasil aktual, planing konten aktivitas menjadi diketahui/kelihatan
    
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
<td>B.  Hasil & kondisi progres, target, planing konten aktivitas/upaya dapat diketahui</td>


</tr> 


<tr>

  <td>C. Tertulis komentar & follow cek dari manager,

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
<td>C.  Komentar & tanda tangan manager/ CL ditulis di dokumen-dokumennya</td>

</tr> 


<tr>
 
 

  <td> ４）Tingkat kontribusi & keuntungan pihak produksi<br>A. Memenuhi jumlah kasus aktivitas hal kesulitan-kesulitan (tercapai)

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

<td>A. Kesulitan-kesulitannya adalah : NG didalam proses, trouble yg jarang-jarang, trouble kronis dll<br>
  Contoh jumlah kasus penanganan/aktivitas : 8 orang x 0.8 kasus = 6 kasus/tahun (potongan decimal point)</td>

</tr> 



<tr>


  <td>B. Dengan dilakukanya penanggulangan & kaizen, keluar efek di waktu, cost, berkurangnya NG didalam proses dll <br> (tingkat kontribusi)<br>C. erhubung dengan revisi SOP & perubahan desain dll<br>（Prosentase NG didalam proses, cost, waktu dll）

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
<td>B.  Terkait 1 kasus kesulitan, akan keluar beberapa hasil (efek)
  <br>C. Dengan adanya perubahan desain, perubahan standard cek kualitas, kualitas produksi meningkat
</td>

</tr> 



<tr>


  <td> ５）Konten aktivitas/upaya<br>A. Me-listup kesulitan-kesulitan produksi dan memilihnya

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
<td><br><br>A. Menangkap kondisi keseluruhan produksi dan memilih masalah yg akan ditangani
</td>

</tr> 



<tr>


  <td> B.  Menngunakan cara/teknik QC

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
<td>B. Terhadap pelaksanaan penanggulangan & pencarian pengrucutan penyebab, menggunakan teknik/cara QC
</td>

</tr> 



<tr>


  <td>C.  Men-spesifikasi penyebab utama/sesungguhnya (mengejar penyebab utama menggunakan 5W)  

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
<td>C.  Mencari penyebab utama/sesungguhnya dengan kenapa-kenapa-kenapa, melakukan spesifikasi
</td>

</tr> 


<tr>


  <td>D.  Melaksanakan dengan bekerja sama dengan bagian terkait, staff, atasan 

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
<td>D.  Menangani/beraktivitas sembari bekerja sama dengan bagian terkait seperti maker, staff, produksi dll
</td>

</tr> 



<tr>


  <td>E.  Standard penggunaan ５W1H berjalan (efektivitas kaizen terpelihara)

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
<td>E.  Bisa memelihara/menjaga efektivitas dari kaizen dan membuat standarisasi
</td>

</tr> 




<tr>


  <td>F. Menjalankan dengan menentukan leader tergantung tingkat kerumitan & kesulitan

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
<td>F.  Mendidik SDM dengan memberikan peran/tugas yg sudah mempertimbangkan perkembangan member & tingkat kerumitan dari kesulitan-kesulitan
</td>

</tr> 




<tr>


  <td>G. Dokumen laporan pemecahan masalah kesulitan dibuat (dokumen laporan investigasi & QC dll)

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
<td>G.  Sudah melawati (1)～(5), dan dibuatkan kesimpulan (dokumen laporan invsetigasi, QC dll)
</td>

</tr> 


<tr>


  <td>H. Item upaya terefleksi ke periode berikutnya, dan menjadi aktivitas yg berkelanjutan

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
<td>H.  Bukan hanya single-single aktivitas tetapi menjadi aktivitas yg berkelanjutan dengan membuat jelas masalah yg akan ditangani kedepanya
</td>

</tr> 











<tr>  
  <td colspan="2">Kondisi pengelolaan aktivitas pilar
  </td>
    
   <td> ６) 
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
<td></td>

</tr> 



<tr style="background-color: gold">
  
<td colspan="2">Standard evaluasi</td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>








</tbody>
</table>
<br>
<div class="row text-center">
  <div class="col-lg-6">
    <h2 style="color:silver"><?php echo $text_score_silver; ?></h2>
  </div>
  <div class="col-lg-6">
    <h2 style="color:gold"><?php echo $text_score_gold; ?></h2>
  </div>
</div>


<br/>


<br>
</div>
  


</div>
<!-- /.container-fluid -->

 

 
<?php include('includes/footer.php'); ?>    



