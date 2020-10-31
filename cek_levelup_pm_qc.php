<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form Check and Action PM";

$active_dashboard = "";
$active_4s = "";
$active_stw = "";
$active_pm = "active";
$active_om = "";

$fidx = $_GET['fid'];
$fline = $_GET['fline'];
$fworsite = $_GET['fworsite'];

$queryku = mysqli_query($con, "select * from t_schedule_pm where fline = '$fline' and fworsite = '$fworsite' and finfo = 'Plan and Do'");
while($queryku2=mysqli_fetch_array($queryku))
{
  $fresult_nye = $queryku2['farray_result'];
  $fscore_nye = $queryku2['farray_score'];
    $fid_pd = $queryku2['fid']; 
}

include 'cek_jml_pm_ok.php';


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

$queryf = mysqli_query($con, "select * from t_finding_pm where fid_schedule = '$fid_pd'");
while($queryf2=mysqli_fetch_array($queryf))
{
  $fnotex = $queryf2['fnote']; 
} 

$queryconfirm = mysqli_query($con, "select * from t_finding_pm where fid = '$fidx'");
while($queryconfirm2=mysqli_fetch_array($queryconfirm))
{
  $farray_resultxx = $queryconfirm2['farray_result'];
  $farray_scorex = $queryconfirm2['farray_score'];    
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

<form action="cek_levelup_pm_qc.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fidx; ?>" />
<input type="hidden" name="fid_pd" value="<?php echo $fid_pd; ?>" />
<input type="hidden" name="flinex" value="<?php echo $fline; ?>" />
<input type="hidden" name="fworsitex" value="<?php echo $fworsite; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr align="center">
<th colspan="2"><center>Item</center></th>
<th><center>SILVER LEVEL Klausul evaluasi</center></th>
<th><center>Hasil</center></th>
<th ><center>Skore</center></th>  
<th ><center>Penjelasan standard evaluasi & klosul</center></th>  
<th><center>Temuan</center></th>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='1','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml1;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='2','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml2;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='3','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml3;?> Temuan</p>
</td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='4','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml4;?> Temuan</p>
</td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='5','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml5;?> Temuan</p>
</td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='6','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml6;?> Temuan</p>
</td>
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
  <td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='7','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml7;?> Temuan</p>
  </td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='8','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml8;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='9','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml9;?> Temuan</p>
</td>
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
<th><center>Temuan</center></th>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='10','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml10;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='11','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml11;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='12','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml12;?> Temuan</p>
</td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='13','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>

<p class="text-center"><br/>
  Total : <?php echo $jml13;?> Temuan</p>
</td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='14','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml14;?> Temuan</p>
</td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='15','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml15;?> Temuan</p>
</td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='16','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml16;?> Temuan</p>
</td>

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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='17','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml17;?> Temuan</p>
</td>
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
  <td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='18','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml18;?> Temuan</p>
  </td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='19','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml19;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='20','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml20;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='21','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml21;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='22','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml22;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='23','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml23;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='24','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml24;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='25','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml25;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='26','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml26;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='27','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml27;?> Temuan</p>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='28','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml28;?> Temuan</p>
</td>
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


<br>
<br>

<input type="submit" name="update" value="UPDATE" style="width:100%" class="btn btn-success" />



<br><br><!--
<center><h5>Ada temuan ? <a href="isi_temuan_4s.php"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>-->
<br>
<br>
<!--
<h3 class="text-center"><a style="color:green;">Isi Temuan</a></h3></center>
<br>
<div style="padding-left: 20px;">

<?php

$queryf = mysqli_query($con, "select t_finding_pm.fnote, t_finding_pm.fdate_modified as tgl, t_schedule_pm.* from t_finding_pm join t_schedule_pm on t_finding_pm.fid_schedule =  t_schedule_pm.fid where t_finding_pm.fid_schedule in ($fid_pd,$fidx) order by t_finding_pm.fdate_modified desc");
while($queryf2=mysqli_fetch_array($queryf))
{
  $fnotex = $queryf2['fnote']; 
  $fnamex = $queryf2['fname']; 
  $ftglx = $queryf2['tgl']; 





    $myXMLData ="<?xml version='1.0' encoding='UTF-8'?>
    <note>
    <to></to>
    <from></from>
    <heading></heading>
    <body>$fnotex</body>
    </note>";
    $xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object"); 
    echo $xml->body;

    echo "<br/>";
    echo "<span class='badge badge-success'>by ".$fnamex. "</span> |  ".$ftglx;
    echo "<hr/>";

    }
    ?>
  </div>
-->
    <hr>

<br/>


<input type="hidden" name="fids" value="<?php echo $fidx; ?>">
<input type="hidden" name="farray_result" value="1">
<input type="hidden" name="farray_score" value="1">


</form> 

<br>
</div>
  


</div>
<!-- /.container-fluid -->

 
<?php




if (isset($_POST['update']))
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
  $xvalr26 = $_POST["valr26"];
  $xvalr27 = $_POST["valr27"];
  $xvalr28 = $_POST["valr28"];


  
  
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
  $xvals26 = $_POST["vals26"];
  $xvals27 = $_POST["vals27"];
  $xvals28 = $_POST["vals28"];


  //
  //

  $fworsitex = $_POST["fworsitex"];
  $flinex = $_POST["flinex"];
  $fid_pd = $_POST["fid_pd"];
  $fidx = $_POST["fidx"];


    $farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25.";".$xvalr26.";".$xvalr27.";".$xvalr28;
  
  $farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26.";".$xvals27.";".$xvals28;


      $fscore = $xvals10 + $xvals11 + $xvals12 + $xvals13 + $xvals14 + $xvals15 + $xvals16 + $xvals17 + $xvals18 + $xvals19 + $xvals20 + $xvals21 + $xvals22 + $xvals23 + $xvals24 + $xvals25 + $xvals26 + $xvals27 + $xvals28;

    $score = round(($fscore / 57) * 100);
  

  mysqli_query($con, "update t_schedule_pm set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fid_pd'");

      $fidx = $_POST["fidx"];
  $farray_result = $_POST["farray_result"];
  $farray_score = $_POST["farray_score"];
  $fid_pd = $_POST["fid_pd"];
  
  mysqli_query($con, "update t_schedule_pm set farray_result = '$farray_result', farray_score = '$farray_score', fid_pd = '$fid_pd' where fid = '$fidx'");



  
 echo "<script>window.location='cek_levelup_pm_qc.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex'</script>";
  

}



//save temuan
if (isset($_POST['submit_temuan']))
{
  $fworsitex = $_POST["fworsitex"];
  $flinex = $_POST["flinex"];
  $fid_schedule = $_POST["fid_schedule"];
  $fid_score = $_POST["fid_score"];
  $fnote = $_POST["fnote"];
  
   $foto = $_FILES['fphoto']['name'];
   $tmp = $_FILES['fphoto']['tmp_name'];
    
    $fid_pd = $_POST["fid_pd"];
    
    if(isset($foto) and !empty($foto)){
    $path = "images/temuanPM/";
    // Proses upload
    if(move_uploaded_file($tmp, $path.$foto)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database

  
  mysqli_query($con, "insert into t_finding_pm (fid_schedule, fphoto, fnote, fid_score, fgroup) values ('$fid_schedule', '$foto', '$fnote', '$fid_score', '$fid_pd')");

}

}
  
  
  
  
    //Cek Nilai
  
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
  $xvalr26 = $_POST["valr26"];
  $xvalr27 = $_POST["valr27"];
  $xvalr28 = $_POST["valr28"];


  
  
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
  $xvals26 = $_POST["vals26"];
  $xvals27 = $_POST["vals27"];
  $xvals28 = $_POST["vals28"];


  //
  
  
  $fidx = $_POST["fid_pd"];
  
  $farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25.";".$xvalr26.";".$xvalr27.";".$xvalr28;

  $farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26.";".$xvals27.";".$xvals28;
  
  
  //echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

    $fscore = $xvals10 + $xvals11 + $xvals12 + $xvals13 + $xvals14 + $xvals15 + $xvals16 + $xvals17 + $xvals18 + $xvals19 + $xvals20 + $xvals21 + $xvals22 + $xvals23 + $xvals24 + $xvals25 + $xvals26 + $xvals27 + $xvals28;

        $score = round(($fscore / 57) * 100);
  
  
  mysqli_query($con, "update t_schedule_pm set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fidx'");
  
  
  //AKhir Nilai
  
  echo "<script>window.location='cek_levelup_pm_qc.php?fid=$fid_schedule&&fline=$flinex&&fworsite=$fworsitex'</script>";
  
}



?>



 
 <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Isi Temua PM</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="cek_levelup_pm_qc.php" method="post" enctype="multipart/form-data">
	  
	  
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
      <input type="hidden" name="vals26" id="vals26_" />
      <input type="hidden" name="vals27" id="vals27_" />
      <input type="hidden" name="vals28" id="vals28_" />
	  
	  
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
    
	<input type="hidden" name="fid_pd" value="<?php echo $fid_pd; ?>" />
    <input type="hidden" name="fid_schedule" value="<?php echo $fidx; ?>" >
    <input type="hidden" name="fworsitex" value="<?php echo $fworsite; ?>" >
    <input type="hidden" name="flinex" value="<?php echo $fline; ?>" >
    
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

    function getId(idscore,idschedule,idplan){
      
    var dataString = "idscore="+idscore+"&idschedule="+idschedule+"&idplan="+idplan; 
    //alert(dataString);

    $.ajax({
    type: 'POST',
    data: dataString,
    url: 'cek_pm.php',       
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
    document.getElementById('vals26_').value = document.getElementById('vals26').value;  
    document.getElementById('vals27_').value = document.getElementById('vals27').value;
    document.getElementById('vals28_').value = document.getElementById('vals28').value;

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