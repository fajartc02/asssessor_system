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


$score = $vale[0] + $vale[1] + $vale[2] + $vale[3] + $vale[4] + $vale[5] + $vale[6] + $vale[7] + $vale[8] + $vale[9] + $vale[10] + $vale[11] + $vale[12] + $vale[13] + $vale[14] + $vale[15] + $vale[16] + $vale[17] + $vale[18] + $vale[19] + $vale[20] + $vale[21] + $vale[22] + $vale[23] + $vale[24] + $vale[25] + $vale[26] + $vale[27] + $vale[28] + $vale[29] + $vale[30] + $vale[31] + $vale[32] + $vale[33] + $vale[34] + $vale[35] + $vale[36] + $vale[37] + $vale[38] + $vale[39] + $vale[40] + $vale[41] + $vale[42] + $vale[43] + $vale[44] + $vale[45] + $vale[46] + $vale[47] + $vale[48] + $vale[49] + $vale[50] + $vale[51] + $vale[52] + $vale[53] + $vale[54] + $vale[55] + $vale[56] + $vale[57] + $vale[58] + $vale[59] + $vale[60] + $vale[61] + $vale[62] + $vale[63] + $vale[64] + $vale[65] + $vale[66] + $vale[67] + $vale[68] + $vale[69] + $vale[70] + $vale[71] + $vale[72] + $vale[73] + $vale[74] + $vale[75];

if($score > 380){
	$score = 380;
}

$score = round(($score / 380) * 100);

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
<form action="cek_assessor_4s_qc.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fid; ?>" />
<table  class="table table-bordered" style="font-size:12px"  >
<thead>
<tr align="center">
<th colspan="2" width="20"><center>Tempat yang di cek</center></th>
<th width="20"><center>Item Evaluasi</center></th>
<th width="10"><center>No</center></th>
<th width=""><center>Konten Evaluasi</center></th>
<th width="10"><center>Hasil Evaluasi</center></th>

</tr>
</thead>
<tbody>
  <tr>
    <td colspan="3" rowspan="4">Planing Pelaksanaan 4S</td>
    <td>1</td>
    <td>Tidak ada planing pelaksanaan 4s, dan juga 4s tidak dikerjakan </td>
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

  </tr> 
  <tr>
    <td>2</td>
    <td>Tidak ada planing 4S tapi 4S dikerjakan</td>
    <td>
      <select name="val2" id="val2" value="<?php echo $vale[1]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[1] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[1] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[1] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[1] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[1] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[1] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  
  </td>

  </tr>
  <tr>
    <td>3</td>
    <td>Ada planing pelaksanaan 4S, dan dilakukan sesuai planing</td>
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

  </tr>  
  <tr>
    <td>4</td>
    <td>Frekuensi pelaksanaan 4S tepat, PIC ditentukan, dan pelaksanaanya di ikuti oleh semua member</td>
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

  </tr>


  <tr>
    <td style="" rowspan="24">Dalam Ruangan</td>
    <td rowspan="4">Garis layout</td>
    <td rowspan="4">Ringkas Rapi</td>
    <td>1</td>
    <td>Tidak ada garis layout, tempat peletakanya tidak ada ketentuanya</td>
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

  </tr> 
  <tr>
    <td>2</td>
    <td>Ada garis layout tapi, diletakan menonjol keluar dari garis </td>
    <td> <select name="val6" id="val6" value="<?php echo $vale[5]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[5] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[5] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[5] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[5] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[5] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[5] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  </td>

  </tr>
  <tr>
    <td>3</td>
    <td>Ada garis layout, ada petunjuk untuk tempat di setiap part (doly), tidak keluar dari garis layout</td>
    <td> <select name="val7" id="val7" value="<?php echo $vale[6]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[6] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[6] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[6] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[6] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[6] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[6] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  </td>

  </tr> 
  <tr>
    <td>4</td>
    <td>Tidak ada barang yg tidak perlu dan diletakan didalam garis layout</td>
    <td> <select name="val8" id="val8" value="<?php echo $vale[7]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[7] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[7] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[7] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[7] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[7] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[7] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  </td>

  </tr>  


   <tr>
     <td rowspan="4">・Lantai<br>・Jendela<br>・Tempat cuci tangan</td>
     <td rowspan="4">Resik</td>
     <td>1</td>
     <td>Didalam ruangan secara keseluruhan kotor, oli, air, debu dll jejak kaki mudah ngecap</td>
     <td><select name="val9" id="val9" value="<?php echo $vale[8]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[8] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[8] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[8] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[8] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[8] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[8] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Ada kotoran seperti debu, oli, air dll di bawah equipment & pojokan & sebagian dari tempat cuci tangan, jendela, lantai</td>
    <td>  <select name="val10" id="val10" value="<?php echo $vale[9]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[9] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[9] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[9] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[9] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[9] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[9] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Tidak ada kotoran oli, air, debu di dalam ruangan</td>
    <td>  <select name="val11" id="val11" value="<?php echo $vale[10]; ?>" style="width: 45px;">
 <option value="0"<?php echo ($vale[10] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[10] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[10] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[10] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[10] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[10] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>     </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Didalam ruangan higenis dan terjaga kebersihanya</td>
    <td>  <select name="val12" id="val12" value="<?php echo $vale[11]; ?>" style="width: 45px;">
 <option value="0"<?php echo ($vale[11] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[11] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[11] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[11] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[11] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[11] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>


   <tr>
     <td rowspan="4">Tempat istirahat (oasis)</td>
     <td rowspan="4">Ringkas</td>
     <td>1</td>
     <td>Barang yg tidak perlu, barang pribadi (minuman, makanan, majalah dll) diletakan berantakan</td>
     <td> <select name="val13" id="val13" value="<?php echo $vale[12]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[12] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[12] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[12] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[12] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[12] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[12] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Barang yg tidak perlu, barang pribadi (minuman, makanan, majalah dll) diltekan secara teratur</td>
    <td>  <select name="val14" id="val14" value="<?php echo $vale[13]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[13] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[13] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[13] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[13] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[13] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[13] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Papan informasi, kursi, meja, cabinet dll teratur </td>
    <td>  <select name="val15" id="val15" value="<?php echo $vale[14]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[14] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[14] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[14] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[14] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[14] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[14] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Barang yg tidak perlu, barang pribadi (minuman, makanan, majalah dll) benar-benar tidak ada</td>
    <td>   <select name="val16" id="val16" value="<?php echo $vale[15]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[15] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[15] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[15] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[15] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[15] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[15] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>



  <tr>
     <td rowspan="4">Atas meja</td>
     <td rowspan="4">Ringkas Rapi</td>
     <td>1</td>
     <td>Barang yg perlu & brang yg tidak perlu diletakan berantakan</td>
     <td>  <select name="val17" id="val17" value="<?php echo $vale[16]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[16] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[16] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[16] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[16] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[16] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[16] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Barang yg perlu & barang yg tidak perlu diletakan teratur/dipilah-pilah</td>
    <td>    <select name="val18" id="val18" value="<?php echo $vale[17]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[17] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[17] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[17] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[17] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[17] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[17] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Hanya diletakan barang yg perlu saja</td>
    <td> <select name="val19" id="val19" value="<?php echo $vale[18]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[18] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[18] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[18] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[18] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[18] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[18] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>  </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Hanya ada barang yg perlu saja, dan tempat peletakanya ditentukan</td>
    <td>  <select name="val20" id="val20" value="<?php echo $vale[19]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[19] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[19] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[19] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[19] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[19] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[19] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

  </tr>



   <tr>
     <td rowspan="4">Peralatan kantor</td>
     <td rowspan="4">Ringkas Rapi</td>
     <td>1</td>
     <td>Ada alat kantor (meja, kursi, lemari dokumen, alat tulis dll) melebihi dari kebutuhanya</td>
     <td> <select name="val21" id="val21" value="<?php echo $vale[20]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[20] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[20] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[20] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[20] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[20] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[20] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Alat kantor hanya ada berjumlah yg dibutuhkan saja tapi, diletakan berantakan</td>
    <td> <select name="val22" id="val22" value="<?php echo $vale[21]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[21] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[21] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[21] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[21] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[21] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[21] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Ada alat kantor dengan jumlah yg dibutuhkan saja, dan diletakan teratur/dipilah-pilah</td>
    <td> <select name="val23" id="val23" value="<?php echo $vale[22]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[22] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[22] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[22] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[22] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[22] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[22] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Tempat melatakan alat kantor ditandai, menjadi kondisi yg kapan saja mudah dipakai</td>
    <td> <select name="val24" id="val24" value="<?php echo $vale[23]; ?>" style="width: 45px;">
 <option value="0"<?php echo ($vale[23] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[23] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[23] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[23] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[23] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[23] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

  </tr>


<tr>
     <td rowspan="4">Tempelan-tempelan di tempat kerja (benda visualisasi)</td>
     <td rowspan="4">Ringkas Rapi</td>
     <td>1</td>
     <td>Tempat tempel/visualisasi tidak ada ketentuan di setiap kontenya, isi dokumen tidak dimengerti</td>
     <td> <select name="val25" id="val25" value="<?php echo $vale[24]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[24] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[24] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[24] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[24] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[24] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[24] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Tempat tempel/visualisasi ditentukan tapi, ada dokumen yg sudah lama, sudah expired/tidak berlaku</td>
    <td>  <select name="val26" id="val26" value="<?php echo $vale[25]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[25] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[25] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[25] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[25] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[25] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[25] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>     </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Tidak ada dokumen yg lama dan tidak expired, ada judul di dokumen yg ditempel (kecuali : poster) di tempel begitu saja</td>
    <td>  <select name="val27" id="val27" value="<?php echo $vale[26]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[26] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[26] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[26] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[26] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[26] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[26] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Papan informasi maupun dokumen, di layout/tempel ditempat yg mudah dilihat</td>
    <td>   <select name="val28" id="val28" value="<?php echo $vale[27]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[27] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[27] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[27] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[27] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[27] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[27] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

  </tr>


   <tr>
    <td style="" rowspan="16">Equipment</td>
    <td rowspan="4">・Mesin ukur besar<br>・Mesin tester （mesin instalasi）</td>
    <td rowspan="4">Resik　　</td>
    <td>1</td>
    <td>Ada kotoran (karat, debu, kiriko dll) di alat tester & mesin ukur, sehingga mengganggu test maupun pengukuran</td>
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

  </tr>
   <tr>
    <td>2</td>
    <td>Ada kotoran (karat, debu, kiriko dll) di alat tester & alat mesin ukur, tapi tidak mengganggu test maupun pengukuran</td>
    <td>  <select name="val30" id="val30" value="<?php echo $vale[29]; ?>" style="width: 45px;">
 <option vvalue="0" <?php echo ($vale[29] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[29] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[29] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[29] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[29] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[29] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Tidak ada kotoran (karat, debu, kiriko dll) di alat tester & mesin ukur</td>
    <td> <select name="val31" id="val31" value="<?php echo $vale[30]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[30] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[30] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[30] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[30] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[30] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[30] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Sebelum dipakai, di lindungi dengan seatcover & treatment pencegah karat dll, supaya kotoran (karat, debu, kiriko dll) tidak menumpuk dijaga & dikontrol</td>
    <td>   <select name="val32" id="val32" value="<?php echo $vale[31]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[31] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[31] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[31] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[31] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[31] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[31] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

  </tr> 



  <tr>
     <td rowspan="12">・Mesin ukur kecil (termasuk : jig tool, fixtures/peralatan tetap)</td>
     <td rowspan="4">Ringkas</td>
     <td>1</td>
     <td>Barang yg perlu & barang yg tidak perlu tidak di pilah-pilah</td>
     <td>  <select name="val33" id="val33" value="<?php echo $vale[32]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[32] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[32] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[32] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[32] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[32] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[32] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Barang yg perlu & barang yg tidak perlu di pilah-pilah</td>
    <td>  <select name="val34" id="val34" value="<?php echo $vale[33]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[33] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[33] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[33] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[33] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[33] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[33] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Diletakan hanya jumlah yg dibutuhkan saja, aturan pembuangan terhadap barang yg tidak perlu ditempel/di visualisasi</td>
    <td>  <select name="val35" id="val35" value="<?php echo $vale[34]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[34] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[34] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[34] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[34] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[34] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[34] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Barang yg tidak perlu dibuang, manjadi hanya barang yg perlu saja</td>
    <td>  <select name="val36" id="val36" value="<?php echo $vale[35]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[35] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[35] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[35] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[35] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[35] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[35] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

  </tr>



  <tr>

     <td rowspan="4">Ringkas</td>
     <td>1</td>
     <td>Tidak ada ketentuan tempat peletakanya, barang yg diperlukan ada dimana tidak diketahui</td>
     <td> <select name="val37" id="val37" value="<?php echo $vale[36]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[36] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[36] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[36] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[36] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[36] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[36] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Ada ketentuan tempat peletakanya tapi, peletakanya tidak dipatuhi</td>
    <td>  <select name="val38" id="val38" value="<?php echo $vale[37]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[37] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[37] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[37] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[37] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[37] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[37] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Ada ketentuan tempat peletakanya, peletakanya dipatuhi</td>
    <td> <select name="val39" id="val39" value="<?php echo $vale[38]; ?>" style="width: 45px;">
 <option value="0" <?php echo ($vale[38] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[38] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[38] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[38] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[38] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[38] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Label nama barang ditempel, barang yg diperlukan dengan pandangan sekilas saja langsung ketahuan, dan menjadi kondisi yg segera bisa diambil</td>
    <td> <select name="val40" id="val40" value="<?php echo $vale[39]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[39] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[39] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[39] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[39] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[39] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[39] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>    </td>

  </tr>

  <tr>

     <td rowspan="4">Ringkas</td>
     <td>1</td>
     <td>Ada kotoran (karat, debu, kiriko dll) di mesin ukur kecil, sehingga mengganggu tester maupun pengukuran</td>
     <td> <select name="val41" id="val41" value="<?php echo $vale[40]; ?>" style="width: 45px;">
     <option value="0" <?php echo ($vale[40] ==  '0') ? ' selected="selected"' : '';?>>0</option>
     <option value="1" <?php echo ($vale[40] ==  '1') ? ' selected="selected"' : '';?>>1</option>
     <option value="2" <?php echo ($vale[40] ==  '2') ? ' selected="selected"' : '';?>>2</option>
     <option value="3" <?php echo ($vale[40] ==  '3') ? ' selected="selected"' : '';?>>3</option>
     <option value="4" <?php echo ($vale[40] ==  '4') ? ' selected="selected"' : '';?>>4</option>
     <option value="5" <?php echo ($vale[40] ==  '5') ? ' selected="selected"' : '';?>>5</option>
  </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Ada kotoran (karat, debu, kiriko dll) di alat tester & alat mesin ukur kecil, tapi tidak mengganggu test maupun pengukuran</td>
    <td>  <select name="val42" id="val42" value="<?php echo $vale[41]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[41] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Tidak ada kotoran (karat, debu, kiriko dll) di alat tester & mesin ukur kecil</td>
    <td>  <select name="val43" id="val43" value="<?php echo $vale[42]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[42] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Sebelum dipakai, di lindungi dengan seatcover & treatment pencegah karat dll, supaya kotoran (karat, debu, kiriko dll) tidak menumpuk dijaga & dikontrol</td>
    <td>  <select name="val44" id="val44" value="<?php echo $vale[43]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[43] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>    </td>

  </tr>


  <tr>
     <td rowspan="8">Part</td> 
     <td rowspan="8">・Part pengukuran<br>・Tester Eng<br>・Part pending<br>・Part display</td>
     <td rowspan="4">Ringkas</td>
     <td>1</td>
     <td>Tidak ada kartu historikal di setiap part</td>
     <td> <select name="val45" id="val45" value="<?php echo $vale[44]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[44] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Historikal di setiap part di isi/tulis tapi, tidak dibedakan disetiap tujuanya</td>
    <td>  <select name="val46" id="val46" value="<?php echo $vale[45]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[45] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>    </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Semua historikal part jelas, dan dibedakan di setiap tujuanya</td>
    <td> <select name="val47" id="val47" value="<?php echo $vale[46]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[46] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>  </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Tidak ada expired (pending) pengembalian, menjadi kondisi hanya part yg diperlukan saja</td>
    <td>  <select name="val48" id="val48" value="<?php echo $vale[47]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[47] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>


  <tr>

     <td rowspan="4">Rapi</td>
     <td>1</td>
     <td>Tidak ada ketentuan tempat untuk meletakan part</td>
     <td> <select name="val49" id="val49" value="<?php echo $vale[48]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[48] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>    </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Ada ketentuan tempat peletakan tapi, peletakanya tidak dipatuhi</td>
    <td>  <select name="val50" id="val50" value="<?php echo $vale[49]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[49] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Ada ketentuan tempat peletakanya, peletakanya dipatuhi</td>
    <td> <select name="val51" id="val51" value="<?php echo $vale[50]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[50] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Ada tanda tempat peletakanya, menjadi kondisi dengan pandangan sekilas saja langsung dimengerti</td>
    <td>  <select name="val52" id="val52" value="<?php echo $vale[51]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[51] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>




  <tr>
     <td rowspan="8">Dokumen</td> 
     <td rowspan="8">・Dokumen<br>・Laporan/report・Aturan inspeksi<br>・Drawing</td>
     <td rowspan="4">Ringkas</td>
     <td>1</td>
     <td>Dokueman yg diperlukan & dokumen yg tidak diperlukan tidak dipilah</td>
     <td> <select name="val53" id="val53" value="<?php echo $vale[52]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[52] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Dokumen yg diperlukan & dokumen yg tidak diperlukan di pilah</td>
    <td>  <select name="val54" id="val54" value="<?php echo $vale[53]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[53] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Hanya ada dokumen yg diperlukan saja, aturan membuang terhadap dokumen yg tidak diperlukan jelas/ditempel</td>
    <td><select name="val76" id="val76" value="<?php echo $vale[75]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[75] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Dokumen yg tidak perlu dibuang, menjadi hanya dokumen yg diperlukan saja</td>
    <td><select name="val55" id="val55" value="<?php echo $vale[54]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[54] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>


  <tr>

     <td rowspan="4">Rapi</td>
     <td>1</td>
     <td>Tidak ada ketentuan tempat penyimpanan, dokumen yg diperlukan ada dimana tidak diketahui</td>
     <td><select name="val56" id="val56" value="<?php echo $vale[55]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[55] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Ada ketentuan tempat penyimpanan tapi, tempat penyimpananya tidak dipatuhi</td>
    <td> <select name="val57" id="val57" value="<?php echo $vale[56]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[56] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Ada ketentuan tempat penyimpanan, dan tempat penyimapananya dipatuhi</td>
    <td> <select name="val58" id="val58" value="<?php echo $vale[57]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[57] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Tempat penyimpanan jelas, dengan pandangan sekilas saja dimengerti, menjadi kondisi segera bisa diambil</td>
    <td> <select name="val59" id="val59" value="<?php echo $vale[58]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[58] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>



  <tr>
     <td rowspan="8">Oil, minyak dll</td> 
     <td rowspan="8">・Barang berbahaya<br>・Barang special<br>・Pelarut organik<br>・Limbah oli<br>dll</td>
     <td rowspan="4">Ringkas</td>
     <td>1</td>
     <td>Oli/minyak yang diperlukan & oli/minyak yg tidak diperlukan dicampur</td>
     <td><select name="val60" id="val60" value="<?php echo $vale[59]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[59] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Oli/minyak yg diperlukan & oli/minyak yg tidak diperlukan di pilah</td>
    <td> <select name="val61" id="val61" value="<?php echo $vale[60]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[60] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>    </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Oli/minyak yg diperlukan stock layaknya jelas, tidak ada oli/minyak yg tidak diperlukan</td>
    <td> <select name="val62" id="val62" value="<?php echo $vale[61]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[61] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Penanggung jawab jelas dan benar-benar terkontrol</td>
    <td><select name="val63" id="val63" value="<?php echo $vale[62]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[62] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>    </td>

  </tr>


  <tr>

     <td rowspan="4">Rapi</td>
     <td>1</td>
     <td>Tidak ada ketentuan tempat penyimpanan setiap oli/minyak, ada dimana tidak diketahui</td>
     <td><select name="val64" id="val64" value="<?php echo $vale[63]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[63] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Ada ketentuan tempat penyimpanan setiap oli/minyak tapi, tidak dipatuhi</td>
    <td> <select name="val65" id="val65" value="<?php echo $vale[64]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[64] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Ada ketentuan tempat penyimpanan setiap oli/minyak, dan dipatuhi</td>
    <td> <select name="val66" id="val66" value="<?php echo $vale[65]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[65] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>    </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Ada indikasi naman oli/minyak, ada dimana dengan pandangan sekilas langsung ketahuan, menjadi kondisi yg segera bisa diambil</td>
    <td> <select name="val67" id="val67" value="<?php echo $vale[66]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[66] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>    </td>

  </tr>


  <tr>
     <td rowspan="8">Rajin/Kedisiplinan</td> 
     <td rowspan="4" colspan="2">Penampilan diri</td>

     <td>1</td>
     <td>Topi maupun baju kerja kotor, dipakai dan tidak teratur</td>
     <td><select name="val68" id="val68" value="<?php echo $vale[67]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[67] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Pakai baju kerja & topi tapi tidak teratur</td>
    <td> <select name="val69" id="val69" value="<?php echo $vale[68]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[68] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Bersih dan dipakai tidak acak-acakan</td>
    <td> <select name="val70" id="val70" value="<?php echo $vale[69]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[69] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>4</td>
    <td>Kuku sampai rambut di potong, ada kesan bersih/tidak jorok</td>
    <td> <select name="val71" id="val71" value="<?php echo $vale[70]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[70] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>



   <tr>
     
     <td rowspan="4" colspan="2">Dress code</td>

     <td>1</td>
     <td>Tidak ada standard pemakaian APD</td>
     <td><select name="val72" id="val72" value="<?php echo $vale[71]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[71] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>  </td>

   </tr>
    <tr>
    <td>2</td>
    <td>Ada standard pemakaina APD tapi, tidak dipatuhi</td>
    <td>  <select name="val73" id="val73" value="<?php echo $vale[72]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[72] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>    </td>

  </tr>
   <tr>
    <td>3</td>
    <td>Dipatuhi sesuai standard pemakaian APD</td>
    <td> <select name="val74" id="val74" value="<?php echo $vale[73]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[73] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>   </td>

  </tr>
   <tr>
    <td>4</td>
    <td>APD terjaga kebersihanya, dan terkontrol</td>
    <td><select name="val75" id="val75" value="<?php echo $vale[74]; ?>" style="width: 45px;">

       <?php for($i=0;$i < 6;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[74] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
      <?php }  ?>    


    </select>  </td>

  </tr>





    


<tr>
<td colspan="6"><center>

</center>
</td>
</tr>


</tbody>
</table>
<br>

<h2 class="text-center" style="color:blue"><?php echo $text_score; ?></h2>

<br>

<!-- 
<center><h5>Ada temuan ? <a href="isi_temuan_4s.php"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>
<br>-->
</div>
  


</div>
<!-- /.container-fluid -->

 
 
<?php include('includes/footer.php'); ?>    


