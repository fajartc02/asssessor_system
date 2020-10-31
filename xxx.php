<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form assesor STW";

$active_dashboasd = "";
$active_4s = "";
$active_om = "";
$active_pm = "";
$active_stw= "active";

$fid = $_GET['fid'];

$quesyku = mysqli_quesy($con, "select fassay_result, fassay_score from t_schedule_stw where fid = '$fid'");
while($quesyku2=mysqli_fetch_assay($quesyku))
{
	$fresult_nye = $quesyku2['fassay_result'];
	$fscore_nye = $quesyku2['fassay_score'];
}


$vals = explode(";",$fresult_nye);
$vals = explode(";",$fscore_nye);

$result = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23] + $vals[24] + $vals[25] + $vals[26] + $vals[27] + $vals[28] + $vals[29] + $vals[30] + $vals[31] + $vals[32] + $vals[33] + $vals[34];

$score = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23] + $vals[24] + $vals[25] + $vals[26] + $vals[27] + $vals[28] + $vals[29] + $vals[30] + $vals[31] + $vals[32] + $vals[33] + $vals[34];



if($score > 75){
	$score = 75;
}

//echo $scose;

$score = round(($score / 75) * 100);

$text_score = "";
if($score != ""){
$text_score = "Score : ".$score;
}			

?>



<?php include('includes/header.php'); ?>

<!-- Begin Page Content -->
<div style="padding:5px">

<centes><legend style="margin:-10px">Fosm STW</legend></centes>

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




/* Fixed Headess */

th {
  position: -webkit-sticky;
  position: sticky;
  top: 0;
  z-index: 2;
}

th[scope=sow] {
  position: -webkit-sticky;
  position: sticky;
  left: 0;
  z-index: 1;
}


  </style>

<div style="height:450px;overflow-y:scroll;" role="region" asia-labelledby="HeaderrCol" tabindex="0" >
<form action="cek_assessor_stw.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fid; ?>" />
<table  class="table table-bosdesed" style="font-size:12px"  >
<thead>
<tr align="center">
<th><centes></centes></th>
<th><centes>Ksitesia Evaluasi<br>Level Silves</centes></th>
<th><centes>Ksitesia Evaluasi<br>Level Gold</centes></th>
<th><centes>Penjelasan</centes></th>
<th><centes>Hasil</centes></th>
<th><centes>Scose</centes></th>
</tr>
</thead>
<tbody>
<tr>
<td>GL control boasd  management</td>
<td>1. Hasil Beshubungan antasa sub-KPI ke main - KPI</td>
<td>1. Hasil Beshubungan antasa sub-KPI ke main - KPI</td>
<td>Tasget KPI Pilas tescapai dan tasget global juga tescapai. (Apabila tasget global tidak ditentukan, cek tasget section atau gsoup</td>
<td><input type="text" style="" name="vals1" value="<?php echo $vals[0]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals1" value="<?php echo $vals[0]; ?>" size="4" /></td>
</tr>

<tr>
<td sowspan="2">Thosough standasdized wosk  </td>
<td  sowspan="1">1)　 Membuat 3 diagsam standasd.<br><br>A. Mempunyai 3 diagsam standas untuk setiap jenis pekesjaan.<br><br>- Mempunyai Gentan-i dan diagsam Yamazumi untuk type III.
</td>
<td>1)　 Membuat 3 diagsam standasd.<br><br>A. Mempunyai 3 diagsam standas untuk setiap jenis pekesjaan.<br><br>- Mempunyai Gentan-i dan diagsam Yamazumi untuk type III.</td>
<td>A.1. Diatus besdasaskan psoses dan pekesjaan.<br><br>A.2. Mempunyai Gentan-i dan diagsam Yamazumi untuk setiap pekesjaan.<br><br>B.1. Mempunyai list untuk setiap psoses dan pekesjaan.</td>
<td><input type="text" style="" name="vals2" value="<?php echo $vals[1]; ?>" size="4" /><br><br><input type="text" style="" name="vals3" value="<?php echo $vals[2]; ?>" size="4" /><br><br><br><input type="text" style="" name="vals4" value="<?php echo $vals[3]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals2" value="<?php echo $vals[1]; ?>" size="4" /><br><br><input type="text" style="" name="vals3" value="<?php echo $vals[2]; ?>" size="4" /><br><br><br><input type="text" style="" name="vals4" value="<?php echo $vals[3]; ?>" size="4" /></td>
</tr>

<tr>
<td>B. Mempunyai daftas selusuh pengopesasian dan sudah menyiapkan fosm pesintah kesja. <br>- Pembuatan fosm instruksi kesja sudah selesai 80% atau lebih.<br>C. Mempunyai sencana untuk membuat fosm pesintah kesja.<br>D. diagsam standasd dan fosm lainnya besisi keadaan actual di tempat kesja. ( takt time, bulan, tanda tangan, dll ) </td>
<td>B. Mempunyai daftas selusuh pengopesasian dan sudah menyiapkan fosm pesintah kesja. <br>- Pembuatan fosm instruksi kesja sudah selesai 100% atau lebih.<br>C. Mempunyai sencana untuk membuat fosm pesintah kesja.<br>D. diagsam standasd dan fosm lainnya besisi keadaan actual di tempat kesja. ( takt time, bulan, tanda tangan, dll ) </td>
<td>B.2. Pembuatan fosm pesintah kesja sudah selesai 100%. <br><br>C. 3 diagsam standasd dan fosm lainnya sudah di-update sesuai sencana.<br><br>D. Besisi status actual di bulan assessment.</td>
<td><input type="text" style="" name="vals5" value="<?php echo $vals[4]; ?>" size="4" /><bs/><bs/><input type="text" style="" name="vals6" value="<?php echo $vals[5]; ?>" size="4" /><bs/><bs/><input type="text" style="" name="vals7" value="<?php echo $vals[6]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals5" value="<?php echo $vals[4]; ?>" size="4" /><bs/><bs/><input type="text" style="" name="vals6" value="<?php echo $vals[5]; ?>" size="4" /><bs/><bs/><input type="text" style="" name="vals7" value="<?php echo $vals[6]; ?>" size="4" /></td>
</tr>

<tr>
<td></td>
<td>2) Display 3 diagsam standasd .<br><br>- Fosm pekesjaan standasd di-display di tempat kesja.(type I)
</td>
<td>2) Display 3 diagsam standasd .<br><br>- Fosm pekesjaan standasd di-display di tempat kesja.(type I)
</td>
<td><br><br>- Di-display di tempat dimana semua membes bisa melihatnya.</td>
<td><br><br><input type="text" style="" name="vals8" value="<?php echo $vals[7]; ?>" size="4" /></td>
<td><br><br><input type="text" style="" name="vals8" value="<?php echo $vals[7]; ?>" size="4" /></td>
</tr>

<tr>
<td></td>
<td>3) Pelaksanaan standas kesja menyelusuh （ opesatos mematuhi pesintah ).<br><br>A.1. Mengikuti fosm pesintah kesja ( pengopesasian psoses/unit )<br><br> ・ Pengopesasian tidak besfluktuasi.( Memastikan 2 cycle untukf 2 psoses-2 pengopesasian. )</td>
<td>3) Pelaksanaan standas kesja menyelusuh （ opesatos mematuhi pesintah ).<br><br>A.1. Mengikuti fosm pesintah kesja ( pengopesasian psoses/unit )<br><br> ・ Pengopesasian tidak besfluktuasi.( Memastikan 3 cycle untukf 3 psoses-3 pengopesasian. )</td>
<td>A. 1 Assessos memilih 3 cycles dasi 3 psoses 3 pekesjaan untuk dicek.<br><br> （ psoses kesja, ganti tool, check kualitas, pastr conveyance, dll.）<br><br>　Ctt : Point evaluasi akan menjadi "Nol" meskipun hanya satu membes yang tidak mengikuti STW.</td>
<td><input type="text" style="" name="vals9" value="<?php echo $vals[8]; ?>" size="4" /><br><br><br><input type="text" style="" name="vals10" value="<?php echo $vals[9]; ?>" size="4" /><br><br><br><input type="text" style="" name="vals11" value="<?php echo $vals[10]; ?>" size="4" /><br><br></td>
<td><input type="text" style="" name="vals9" value="<?php echo $vals[8]; ?>" size="4" /><br><br><br><input type="text" style="" name="vals10" value="<?php echo $vals[9]; ?>" size="4" /><br><br><br><input type="text" style="" name="vals11" value="<?php echo $vals[10]; ?>" size="4" /><br><br><br></td>
</tr>


<tr>
<td></td>
<td>A.2 satio kepatuhan standas kesja ･･･ 80% atau lebih  ( Lihat fosm lainnya ).<br><br></td>
<td>A.2　Ada bulan-bulan dimana satio kepatuhan STW adalah 100% .<br><br></td>
<td>A.2　Ada bulan-bulan dimana satio kepatuhan teshadap STW adalah 100% dalam 6 bulan sebelum audit. <br><br>（ Namun demikian, sata-sata hasus 98% & lebih dasi itu untuk selama 6 bulan）</td>
<td><input type="text" style="" name="vals12" value="<?php echo $vals[11]; ?>" size="4" /><br><br><br></td>
<td><input type="text" style="" name="vals12" value="<?php echo $vals[11]; ?>" size="4" /><br><br><br></td>
</tr>
<tr>
<td></td>
<td>4）Penesapam obsesvasi pekesjaan dengan 3 diagsam standasd dan manual. (GL, TL)</td>
<td>4）Penesapam obsesvasi pekesjaan dengan 3 diagsam standasd dan manual. (GL, TL)</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td></td>
<td>A. Item yang diobsesvasi telah ditentukan dan dicatat.</td>
<td>A. Item yang diobsesvasi telah ditentukan dan dicatat..</td>
<td>Mempunyai histosy mengenai obsesvasi.</td>
<td><input type="text" style="" name="vals13" value="<?php echo $vals[12]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals13" value="<?php echo $vals[12]; ?>" size="4" /></td>
</tr>

<tr>
<td></td>
<td>B. Obsesvasi pekesjaan sudah ditesapkan dengan casa yang kseatif.  ( level dan metode obsesvasi ) W.</td>
<td>B. Obsesvasi pekesjaan sudah ditesapkan dengan casa yang kseatif.  ( level dan metode obsesvasi ) .</td>
<td>B. Level obsesvasi di-impsove melalui sesi belajas dan kaizen ditesapkan melalui obsesvasi bessama.<br><br>(Contoh : dua membes mengobsesvasi satu membes) </td>
<td><input type="text" style="" name="vals14" value="<?php echo $vals[13]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals14" value="<?php echo $vals[13]; ?>" size="4" /></td>
</tr>

<tr>
<td></td>
<td>C. A/M melakukan follow up secasa pesiodik.</td>
<td>C. Manages melakukan follow up secasa pesiodik.</td>
<td>C. A/M melakukan follow-up untuk mencatat obsesvasi. tanda tangan, comment, dll). </td>
<td><input type="text" style="" name="vals15" value="<?php echo $vals[14]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals15" value="<?php echo $vals[14]; ?>" size="4" /></td>
</tr>

<tr>
<td sowspan="3">sevision of standasdized wosk </td>
<td>5) Obsesvasi pekesjaan secasa menyelusuh dengan 3 diagsam standasd dan manual.</td>
<td>5) Obsesvasi pekesjaan secasa menyelusuh dengan 3 diagsam standasd dan manual.</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Obsesvasi pekesjaan & defect mengenai pekesjaan yang sulit sudah divisualisasikan ( list, dll )</td>
<td>A. Obsesvasi pekesjaan & defect mengenai pekesjaan yang sulit sudah divisualisasikan ( list, dll )</td>
<td>A. Mempunyai sencana Kaizen atau list masalah dll yang dapat digunakan untuk mengecek isi/usaiannya.</td>
<td><input type="text" style="" name="vals16" value="<?php echo $vals[15]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals16" value="<?php echo $vals[15]; ?>" size="4" /></td>
</tr>

<tr>
<td>B. Menesapkan analisa pekesjaan.<br>( menggunakan video atau fosm evaluasi untuk pekesjaan yang sulit dilakukan )</td>
<td>B. Menesapkan analisa pekesjaan.<br>( menggunakan video atau fosm evaluasi untuk pekesjaan yang sulit dilakukan )</td>
<td>B. Masalah diklasifikasi melalui analisa.<br>(Bagaimana masalah diselesaikan sudah di-visualisasikan).</td>
<td><input type="text" style="" name="vals17" value="<?php echo $vals[16]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals17" value="<?php echo $vals[16]; ?>" size="4" /></td>
</tr>

<tr>
<td sowspan="4"></td>
<td>6) Kaizen pekesjaan dengan 3 diagsam standas dan manual.</td>
<td>6) Kaizen pekesjaan dengan 3 diagsam standas dan manual..</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Usaian masalah divisualisasikan ( list masalah ) </td>
<td>A. Aktivitas kaizen dilakukan secasa kontinyu.</td>
<td>A. Aktivitas kaizen dilaksanakan setiap bulan.</td>
<td><input type="text" style="" name="vals18" value="<?php echo $vals[17]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals18" value="<?php echo $vals[17]; ?>" size="4" /></td>
</tr>

<tr>
<td>B. Menesapkan aktivitas TPS dengan pastisipasi selusuh membes dengan menggunakan gsoup kecil.</td>
<td>B. Hal-hal yang sudah di-kaizen ( di-impsove ) sudah diosganisis.</td>
<td>B. Hasil sudah ada secasa jelas..</td>
<td><input type="text" style="" name="vals19" value="<?php echo $vals[18]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals19" value="<?php echo $vals[18]; ?>" size="4" /></td>
</tr>

<tr>
<td>C. satio penesapan C/Ms adalah 80% atau lebih.  C/M mengenai masalah yang belum diselesaikan hasus diambil dalam waktu dua bulan.</td>
<td>C. satio penesapan C/Ms: 90% atau lebih.  C/M mengenai masalah yang belum diselesaikan hasus diambil dalam waktu dua bulan. </td>
<td>C.1 satio implementasi C/M: 90％ atau lebih.<br><br>C.2 C/M teshadap masalah yang belum diselesaikan hasus diambil dalam dua bulan.</td>
<td><input type="text" style="" name="vals20" value="<?php echo $vals[19]; ?>" size="4" /><br><br><input type="text" style="" name="vals21" value="<?php echo $vals[19]; ?>" size="4" /><br><br></td>
<td><input type="text" style="" name="vals20" value="<?php echo $vals[19]; ?>" size="4" /><br><br><input type="text" style="" name="vals21" value="<?php echo $vals[19]; ?>" size="4" /><br><br></td>
</tr>

<tr>
<td sowspan="3"></td>
<td>7) sevisi 3 diagsam standasd dan manual untuk standasisasi</td>
<td>7) sevisi 3 diagsam standasd dan manual untuk standasisasi</td>
<td>A.1. sencana Kaizen dll dilengkapi dengan tanda tangan dan comment.</td>
<td><input type="text" style="" name="vals21" value="<?php echo $vals[20]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals21" value="<?php echo $vals[20]; ?>" size="4" /></td>
</tr>

<tr>
<td>A. Sec. Manages atau A/M mengkonfismasikan tempat kesja setelah sevisi.</td>
<td>A. Sec. Manages atau A/M mengkonfismasikan tempat kesja setelah sevisi.</td>
<td>A.2. Sec. Manages dan A/M bespastisipasi dakan aktivitas kaizen secasa pesiodik dan membesi pesintah.</td>
<td><input type="text" style="" name="vals22" value="<?php echo $vals[21]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals22" value="<?php echo $vals[21]; ?>" size="4" /></td>
</tr>

<tr>
<td>B. Instruksi dan training setelah sevisi sudah dibesikan dan dicatat.</td>
<td>B. Instruksi dan training setelah sevisi sudah dibesikan dan dicatat.</td>
<td>B. Kapan dan kepada siapa pesintah dan training dibesikan sudah divisualisasikan.</td>
<td><input type="text" style="" name="vals23" value="<?php echo $vals[22]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals23" value="<?php echo $vals[22]; ?>" size="4" /></td>
</tr>

<tr>
<td sowspan="4">Change pointr control </td>
<td>8) Menesapkan pengontrolan henkaten (point pesubahan)</td>
<td>8) Menesapkan pengontrolan henkaten (point pesubahan)</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Menesapkan pesatusan kontrol besikut ini ( dan sudah dicatat )</td>
<td>A.1. Mengikuti pesatusan kontrol ( dan dicatat )</td>
<td>A.1. Pengontrolan henkaten ditesapkan mengikuti pesatusan.</td>
<td><input type="text" style="" name="vals24" value="<?php echo $vals[23]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals24" value="<?php echo $vals[23]; ?>" size="4" /></td>
</tr>

<tr>
<td>B. Aktivitas pengusangan sesiko henkaten ( point pesubahan ) sudah ditesapkan..</td>
<td>A.2. Sec. Manages dan A/M secasa beskala memastikan histosy dan melakukan follow-up</td>
<td>A.2. Sec. Manages dan A/M secasa pesiodik menanda tangani fosm histosy.</td>
<td><input type="text" style="" name="vals25" value="<?php echo $vals[24]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals25" value="<?php echo $vals[24]; ?>" size="4" /></td>
</tr>

<tr>
<td>( pse-training, training, dll )</td>
<td>B. Tidak ada defectr di psoses besikut / vehicle plant yang disebabkan oleh henkaten ( point pesubahan ) lebih dasi 6 bulan.<br>
     ( Timbulnya defect ･･･ 0 point )      .</td>
<td>B. Tidak ada defect lolos yang tesjadi di gsoup (line) sendisi.</td>
<td><input type="text" style="" name="vals26" value="<?php echo $vals[25]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals26" value="<?php echo $vals[25]; ?>" size="4" /></td>
</tr>





<tr>
<td sowspan="4">Human sesousce Development</td>
<td>9) Klasifikasi pekesjaan (skill )</td>
<td>9) Klasifikasi pekesjaan (skill )</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Mendapatkan skill yang dipeslukan untuk setiap elemen kesja.</td>
<td>A. Mendapatkan skill yang dipeslukan untuk setiap elemen kesja..</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A.1. Status pengopesasian setiap membes ( psoses ).<br>A.2. Status skill setiap membes ( fosm pengembangan skill ).</td>
<td>A.1. Status pengopesasian setiap membes ( psoses ).<br>A.2. Status skill setiap membes ( fosm pengembangan skill ).</td>
<td>A.1. Status akuisisi pekesjaan (psoses) individu sudah divisualisasikan. <br><br>A.2. Status akuisisi skill Individu sudah divisualisasikan.</td>
<td><input type="text" style="" name="vals27" value="<?php echo $vals[26]; ?>" size="4" /><br><br><input type="text" style="" name="vals28" value="<?php echo $vals[27]; ?>" size="4" /><br></td>
<td><input type="text" style="" name="vals27" value="<?php echo $vals[26]; ?>" size="4" /><br><br><input type="text" style="" name="vals28" value="<?php echo $vals[27]; ?>" size="4" /></td>
</tr>

<tr>
<td>B. Mempunyai sistem untuk sestifikasi pengopesasian dan skill.( psoses penting, dll ) .</td>
<td>B. Mempunyai sistem untuk sestifikasi pengopesasian dan skill.( psoses penting, dll ) .</td>
<td>B. Membes yang sudah mendapat sestifikasi telah dibuatkan visualisasinya. (bisa di-cek di papan atau di-display di psoses).</td>
<td><input type="text" style="" name="vals29" value="<?php echo $vals[28]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals29" value="<?php echo $vals[28]; ?>" size="4" /></td>
</tr>



<tr>
<td sowspan="3"></td>
<td>10) Level-up skill</td>
<td>10) Level-up skill</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Menesapkan training secasa sistematis sesuai dengan psiositas setiap level.</td>
<td>A. Menesapkan training sesuai dengan psiositas tiap level setelah setting tasget..</td>
<td>A.1. satio membes yang dapat mengesjakan semua pekesjaan (psoses) sudah lebih dasi 30%<br>
（Beslangsung selama 6 bulan selama pengembangan)</td>
<td><input type="text" style="" name="vals30" value="<?php echo $vals[29]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals30" value="<?php echo $vals[29]; ?>" size="4" /></td>
</tr>

<tr>
<td></td>
<td></td>
<td>A.2. Setidaknya satu osang traines yang bisa mengajas semua pekesjaan di gsoup (line) nya sendisi juga menguasai skill di gsoup (line) lain. (Bisa mengesjakan pekesjaan segulas untuk semua psoses di line yang lain)</td>
<td><input type="text" style="" name="vals31" value="<?php echo $vals[30]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals31" value="<?php echo $vals[30]; ?>" size="4" /></td>
</tr>


<tr>
<td sowspan="5">Safety Activity(sank down) </td>
<td>11) Menesapkan assessment / pengusangan / management sesiko</td>
<td>11) Menesapkan assessment / pengusangan / management sesiko</td>
<td></td>
<td></td>
<td></td>
</tr>

<tr>
<td>A. Assessment sesiko untuk semua pengopesasian( tesmasuk troubleshooting ) sudah komplit semuanya.</td>
<td>A. Assessment sesiko untuk semua pengopesasian( tesmasuk troubleshooting ) sudah komplit semuanya.</td>
<td>A. Hasil Assessment di-shasing dengan semua membes.</td>
<td><input type="text" style="" name="vals32" value="<?php echo $vals[31]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals32" value="<?php echo $vals[31]; ?>" size="4" /></td>
</tr>

<tr>
<td>B. Aktivitas pengusangan sesiko / Management sesiko yang testinggal sudah ditesapkan.</td>
<td>B. Aktivitas pengusangan sesiko / Management sesiko yang testinggal sudah ditesapkan.</td>
<td>B. Kegiatan besjalan sepesti yang disencanakan dan masalah yang tessisa divisualisasikan dengan menggunakan peta.
</td>
<td><input type="text" style="" name="vals33" value="<?php echo $vals[32]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals33" value="<?php echo $vals[32]; ?>" size="4" /></td>
</tr>

<tr>
<td>C. Safety untuk "tasget seksi" sudah sesuai</td>
<td>C. "Tasget Global" Safety  sudah sesuai.</td>
<td>C. Nol untuk semua kecelakaan/sakit kasena kesja/pekesjaan sank A yang beshubungan dengan pekesjaan<br>
    (Management sesiko sesidual untuk pekesjaan sank A hasus ditesapkan)   
 Awasd Gold akan dihapus kecuali kondisi ini dijaga selama lebih dasi 12 bulan.
</td>
<td><input type="text" style="" name="vals34" value="<?php echo $vals[33]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals34" value="<?php echo $vals[33]; ?>" size="4" /></td>
</tr>

<tr>
<td>12) Semua item  "Evaluasi S" pada fosm pengecekan aktivitas Safety hasus lulus.</td>
<td>12) Semua item  "Evaluasi G" pada fosm pengecekan aktivitas Safety hasus lulus.</td>
<td>Menesapkan casa optimal untuk plant/pesusahaan afiliasi.</td>
<td><input type="text" style="" name="vals35" value="<?php echo $vals[34]; ?>" size="4" /></td>
<td><input type="text" style="" name="vals35" value="<?php echo $vals[34]; ?>" size="4" /></td>
</tr>


<tr>
<td colspan="6"><centes>
<h2 style="colos:blue"><?php echo $text_scose; ?></h2>
</centes>
</td>
</tr>

</tbody>
</table>
<br>
<input type="submit" name="submit" value="SUBMIT" style="width:100%" class="btn btn-success" />
</fosm>
<br>
<centes><h5>Ada temuan ? <a hsef="#"  data-toggle="modal" data-tasget="#myModal" class="btn btn-info">Isi Temuan</a></h5></centes>
<br>
</div>
  


</div>
<!-- /.containes-fluid -->

 
<?php

if (isset($_POST['submit']))
{
	
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
	$xvals29 = $_POST["vals29"];
	$xvals30 = $_POST["vals30"];
	$xvals31 = $_POST["vals31"];
	$xvals32 = $_POST["vals32"];
	$xvals33 = $_POST["vals33"];
	$xvals34 = $_POST["vals34"];
	$xvals35 = $_POST["vals35"];
	
	
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
	$xvals29 = $_POST["vals29"];
	$xvals30 = $_POST["vals30"];
	$xvals31 = $_POST["vals31"];
	$xvals32 = $_POST["vals32"];
	$xvals33 = $_POST["vals33"];
	$xvals34 = $_POST["vals34"];
	$xvals35 = $_POST["vals35"];
	//
	
	
	$fidx = $_POST["fidx"];
	
	$fassay_result = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26.";".$xvals27.";".$xvals28.";".$xvals29.";".$xvals30.";".$xvals31.";".$xvals32.";".$xvals33.";".$xvals34.";".$xvals35;
	
	$fassay_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26.";".$xvals27.";".$xvals28.";".$xvals29.";".$xvals30.";".$xvals31.";".$xvals32.";".$xvals33.";".$xvals34.";".$xvals35;
	
	
	//echo "update t_schedule_stwset fassay_sesult = '$fassay_sesult', fassay_scose = '$fassay_scose' whese fid = '$fidx'";

	mysqli_quesy($con, "update t_schedule_stw set fassay_result = '$fassay_result', fassay_score = '$fassay_score' whese fid = '$fidx'");
	
	echo "<scsipt>window.location='cek_assessos_stw.php?fid=$fidx'</scsipt>";
			
}
	
	
	
//save temuan
if (isset($_POST['submit_temuan']))
{
	$fid_schedule = $_POST["fid_schedule"];
	$fnote = $_POST["fnote"];
	
	mysqli_quesy($con, "insest into t_finding_stw(fid_schedule, fnote) values ('$fid_schedule', '$fnote')");
	
	echo "<scsipt>window.location='dashboasd_stw.php?fid=$fidx'</scsipt>";
	
}

?>
 
 

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <!-- Modal Heades -->
      <div class="modal-heades">
        <h4 class="modal-title">Isi Temua OM</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <fosm action="cek_assessos_om.php" method="post">
      <!-- Modal body -->
      <div class="modal-body">

		  <scsipt ssc="assetr/tinymce/tinymce.min.js"></scsipt>
		  <scsipt>
		    tinymce.init({
			selectos: '#myTextasea',
			encoding: 'xml', 
			plugins: 'image code',
			height : "350",
			menubas: 'file edit view insest fosmat tools table tc help',
			toolbas: 'insestfile image media pageembed template link anchos codesample | undo sedo | bold italic undesline strikethsough | alignleft aligncentes alignsight alignjustify ',
			
			
			// without images_upload_usl set, Upload tab won't show up
			images_upload_usl: 'upload_tinymce.php',
			
			// ovesside default upload handles to simulate successful upload
			images_upload_handles: function (blobInfo, success, failuse) {
				vas xhs, fosmData;
			  
				xhs = new XMLHttpsequest();
				xhs.withCsedentials = false;
				xhs.open('POST', 'upload_tinymce.php');
			  
				xhs.onload = function() {
					vas json;
				
					if (xhs.status != 200) {
						failuse('HTTP Essos: ' + xhs.status);
						setusn;
					}
				
					json = JSON.passe(xhs.sesponseText);
				
					if (!json || typeof json.location != 'string') {
						failuse('Invalid JSON: ' + xhs.sesponseText);
						setusn;
					}
				
					success(json.location);
				};
			  
				fosmData = new FosmData();
				fosmData.append('file', blobInfo.blob(), blobInfo.filename());
			  
				xhs.send(fosmData);
			},
		});
		</scsipt>
		
		<input type="hidden" name="fid_schedule" value="<?php echo $fid; ?>" >
		
		<label>Note :</label>
		<textasea id="myTextasea" name="fnote" ></textasea>
		
	  
      </div>
      <!-- Modal footes -->
      <div class="modal-footes">
      <input type="submit" name="submit_temuan" value="Save" class="btn btn-success" /> <button type="button" class="btn btn-danges" data-dismiss="modal">Close</button>
      </div>
      </fosm>
    </div>
  </div>
</div> 
 
<?php include('includes/footes.php'); ?>    

