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

$result = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8] + $valr[9] + $valr[10] + $valr[11] + $valr[12] + $valr[13] + $valr[14] + $valr[15] + $valr[16] + $valr[17] + $valr[18] + $valr[19] + $valr[20] + $valr[21] + $valr[22] + $valr[23] + $valr[24] + $valr[25];

$score = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23] + $vals[24] + $vals[25];



if($score > 78){
  $score = 78;
}

//echo $score;

$score = round(($score / 78) * 100);

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
<form action="cek_assessor_pm_maintenance.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fidx; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr align="center">
<th colspan="2"><center>Item</center></th>

<th width="20%"><center>Certification Criterion <br>＜Silver level＞</center></th>
<th><center>Certification Criterion <br>＜Gold level＞</center></th>
<th><center>GOLD LEVEL Evaluation Items (Explanation)</center></th>
<th><center>Hasil</center></th>
<th ><center>Skor</center></th>
<th><center>Temuan</center></th>
</tr>
</thead>
<tbody>

<tr>
  <td colspan="2">Management Indicator</td>
  <td>1) Activity has been exercised in order to achieve Hoshin target.<br><br>- Operation of GL control board (FMDS)</td>
  <td>1) Hoshin and target is achieved.</td>
  <td>A.1. 1 Activity to tackle problems is continuously implemented.<br>A.2.Action result is evaluated/reflected to control activity board.<br>A.3.Leadership as a manager is exercised.</td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='1','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml1;?> Temuan</p>
</td>
</tr> 

<tr>
  <td rowspan="3">Prevention (The maintenance point management</td>
  <td>1. Create better Machines</td>
  <td>1) Activity is performed while cooperating with PE,MFG and
  　engineers. (Including SE Activity)</td>
   <td>1) As the result of activity, there is no specific breakdown occurred.</td>
  <td>1) Issues tackled with design, PE, and plant operators are solved essentially and produced results.<br>( Continue zero specific breakdown for 6 mos ) </td>
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='2','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml2;?> Temuan</p>
</td>
</tr> 


<tr>
  <td rowspan="2">2. KAIZEN for Focus Machine</td>
  <td>3) Activity is performed based on KAIZEN Plan for Focus Machine.<br><br>(Do you know clearly breakdown that is occurred & that might be occurred ? " ）


   </td>
  <td>3) Breakdown occurrence reduction target on critical line & critical equipment is achieved.</td>
  <td>3.A. Activity is operated repeatedly based on critical item orientation and target has been accomplished for the past 6 months.<br>(Note: if this can't be satisfied,  evaluation point should be 0 pt and following 3 items will not be evaluated )<br><br>3.B. No delay on Kaizen focus equipment.<br><br>3.C. Revision of maintenance STD or other STD materials are completed without delay.
    
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='3','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml3;?> Temuan</p>
</td>
</tr>

<tr>
  
  <td>4) Activity is performed with full participation while sharing. responsibilities </td>
  <td>4) Activity of Silver level requirement is continued.</td>
  <td>4) Role assignment is created and activity is operating.
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='4','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml4;?> Temuan</p>
</td>
</tr> 


<tr>
  <td rowspan="10">Prediction (Facilities skill)</td>
  <td rowspan="3">3. Support system for ownership maintenance activity</td>
  <td>1) Continuously working on the support for manufacturing dept
    by all members.<br> (Kaizen is being implemented in order to make ownership
    maintenance easier ) </td>
  <td>1) Support manufacturing dept. for them to obtain the gold. </td>
  <td>1) Support, cooperation and effort to establish gold worksite. 
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='5','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml5;?> Temuan</p>
</td>
</tr> 


<tr>
  
  <td>2) Breakdown has been decreasing by the support.<br>3) Tasks and problem kaizen is performed while reviewing activity.  </td>
  <td>2) 3) Breakdown due to manufacturing-related issue has been reducing.</td>
  <td>2) 3) There is at least one month that achieve zero breakdown due to manufacturing-related issue/ (during past 6 months)
    

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
<td> <a href="isi_temuan_4s.php" onclick="getId(document.getElementById('fid_score').value='6','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml6;?> Temuan</p>
</td>
</tr> 


<tr>
  <td>C. Telah dilakukan kaizen terhadap masalah-masalah yang tercantum di dalam 'Check Sheet: Maintenance & Change Point Control' 48 items, yang ada di area kerjanya sendiri. </td>
  <td>C.  Rank target 48 items (yang ada di area kerjanya sendiri) yang tercantum di dalam 'Check Sheet: Maintenance & Change Point Control' yang diterbitkan oleh QA, telah tercapai.  </td>
  <td>C. Rank target 'Maintenance check sheet & Henkaten Control check sheet' telah tercapai, dan dicek secara berkala. 
    
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='7','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml7;?> Temuan</p>
</td>

</tr> 


<tr>
  <td rowspan="7">4. Periodical/Quantitative Maintenance Predictive Maintenance</td>

  <td>1) Upgrading of maintenance ledger has been implemented according to the plan.
  </td>
  <td>1) Upgrading of maintenance ledger is assured. </td>
  <td>1) 100% of updated maintenance ledger.

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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='8','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml8;?> Temuan</p>
</td>
</tr> 


<tr>
 
 
  <td>2) Maintenance of job instruction sheet has been implemented according to the plan.
    
  </td>
   <td>2) Upgrading of WIS is assured.
  </td>
  <td>2) 100% of updated maintenance ledger.  

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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='9','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml9;?> Temuan</p>
</td>
</tr> 



<tr>

 
  <td>3)-1 Schedule/plan is made based on Hoshin or target and implemented. <br> 
  </td>
  <td>3)-1 Schedule/plan is made based on Hoshin or target and implemented. (including predictive maintenance evil. Items)
  </td>
  <td>3)-1 Action ratio to the plan at 100% (past 3months result) <br>( Activity of silver requirement is continued )

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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='10','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml10;?> Temuan</p>
</td>
</tr> 


<tr>  

  <td>3)-2 Kaizen has been implemented while reviewing work result. 
  </td>
   <td>3)-2 Periodical & fixed quantity maintenance work is expanding, and breakdown has been reducing.
  </td>
  <td>3)-2 Periodic/fixed quantity-centered structure is organized.

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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='11','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml11;?> Temuan</p>
</td>
</tr> 



<tr>  
  <td>4)  Normal or abnormal condition is judged based on the result and treated correctly.
  </td>
     <td>4) There are no "Maintenance-responsible" breakdown.
  </td>
   <td>4) No breakdown occurs due to maintenance delay.(past 6 mos)
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='12','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml12;?> Temuan</p>
</td>
</tr> 



<tr>  

  <td>6)-1 Predictive Maintenance has been implemented based on Hoshin or target.
  </td>
   <td>6)-1 Owing to predictive maintenance, there are no specific breakdown & continues zero occurrence.
  </td>
  <td>6)-1 Continues longer than 1 year.
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='13','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml13;?> Temuan</p>
</td>
</tr> 



<tr>  
  
  <td>6)-2 Application of predictive maintenance has been extended. (Critical point）
  </td>
   <td>6)-2 Activity of Silver level requirement is continued.
  </td>
  <td> 6)-2 Activity is maintaining and continuing.
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='14','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml14;?> Temuan</p>
</td>
</tr> 



<tr> 
<td rowspan="9">Action (Standard time of the maintenance</td>
<td rowspan="7">5. Quick action against Emergency repair</td>

  <td>5-1-1) to 5-2-4)<br> Supervisors (AM & GL) should turn PDCA cycle for visual control in order to "repair quickly"
  </td>
 <td>5-1-1) to 5-2-4)<br>  Kaizen of system & tools has created work standardization
 and repair work time has been reduced.
  </td>
   <td>1) Management members follow the activity so that<br> repair work is finished within the standard time.
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='15','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml15;?> Temuan</p>
</td>
</tr> 

<tr> 


  <td>
  </td>
   <td>　　
  </td>
  <td>2) There is a Kaizen that enables work standardization.
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='16','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml16;?> Temuan</p>
</td>
</tr> 


<tr> 


  <td>5-3-1) to 5-4-1)<br> Realize "Just-In-Time" that can respond quickly.（what is needed when it is needed, in exactly the amount needed)
  </td>
   <td>5-3-1) to 5-4-1)<br> Realize "Just-In-Time" that can respond quickly and result is producing.
  </td>
  <td>1) Add Kaizen on control method for spare parts and<br> maintenance tool to operate repair work.
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='17','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml17;?> Temuan</p>
</td>
</tr> 


<tr> 
  
 

  <td>
  </td>
   <td>
  </td>
  <td>2) optimization of spare parts inventory has been promoted.
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='18','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml18;?> Temuan</p>
</td>
</tr> 

<tr> 
  <td>5-5-1)-5) <br> Recurrence Prevention against breakdown is performed.
  </td>
  <td>5-5-1)-5) <br>  Recurrence Prevention against breakdown is performed and result is producing.
  </td>
  <td>1) Recurrence prevention action ratio against the plan is at 100% and continued for past 6 months.<br> ** Against the plan that you created
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='19','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml19;?> Temuan</p>
</td>
</tr> 



<tr> 
  <td>
  </td>
   <td> 
  <td>2) Leadership as a manager is exercised.
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='20','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml20;?> Temuan</p>
</td>
</tr> 



<tr> 


  <td></td>
  <td></td>
   <td>3) No breakdown recurrence is occurred on the equipment which had applied recurrence prevention measure after the long-hour stop. (kept more than 6 mos) 
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='21','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml21;?> Temuan</p>
</td>
</tr>



<tr> 
  
  <td rowspan="2">6. Maintenance Skills</td>
  <td>6-1) to 5)<br> Skill development based on the plan is performed. (Acquirement of knowledge & skills in order to repair correctly)
  </td>
   <td>6-1) to 5)<br> Skill development is done based on the plan and achieved its expectation level.
  </td>
  <td>1) Necessary education is prioritized and implemented and satisfied the expectation rate.  (Note: if this can't be satisfied,  evaluation point should be 0 pt and following 3 items will not be evaluated ) (Action ratio against the plan is 100% for past 6 months )
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='22,'<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml22;?> Temuan</p>
</td>
</tr>



<tr> 
 

  <td>
  </td>
   <td>
  </td><td>2) Educating method and confirmation method to check understanding level is creatively considered and exercised. ( Activity of silver requirement is continued )
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='23','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml23;?> Temuan</p>
</td>
</tr>



<tr> 
  
  <td rowspan="3">Other</td>
  <td>7. Cost Management ( maintenance cost )</td>
  <td>1) Trend of maintenance cost can be understood by control indicator.

  </td>
   <td>
      1) Supplier cost, material cost and machining cost have achieved the section target.
  </td>
  <td>1) Achieved target on all cost items.(past 6 months) <br>    (Maintenance cost is effectively utilized )
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='24','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml24;?> Temuan</p>
</td>
</tr>



<tr> 
  

  <td>8. Maintenance Work Control</td>
  <td>1)-1 Work delay/progress is visualized and make Kaizen.<br>1)-2 Attacking tasks while utilizing 
      "Maintenance Activity Reflection sheet"etc..

  </td>
   <td>
     1)-1 Heijunka of work is performed.<br>1)-2 Reflection of maintenance activity is implemented and
        preventive-type worksite is produced.
  </td>
  <td>1)-1, 1)-2 Breakdown is reduced and increased preventive maintenance time.
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='25','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml25;?> Temuan</p>
</td>
</tr>

<tr> 
  

  <td>9. Contribution to MFG-Div.</td>
  <td>

  </td>
   <td>
     1) Pass the special maintenance gold conditions.
  </td>
  <td>1Pass more than 3 out of 8 condition items.
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
<td> <a href="isi_temuan_4s.php"  onclick="getId(document.getElementById('fid_score').value='26','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>','<?php echo $fid_c; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>
<p class="text-center"><br/>
  Total : <?php echo $jml26;?> Temuan</p>
</td>
</tr>










</tbody>
</table>
<br/>
<center><h2 style="color:blue"><?php echo $text_score; ?></h2></center>
<br>
<input type="submit" name="submit" value="SUBMIT" style="width:100%" class="btn btn-success" />
</form>
<br><!--
<center><h5>Ada temuan ? <a href="#"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>-->
<br>
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
  $xvalr26 = $_POST["valr26"];


  
  
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


  //
  
  
  $fidx = $_POST["fidx"];
  
  $farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25.";".$xvalr26;

  $farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26;
  
  
  //echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

  $fscore = $xvals1 + $xvals2 + $xvals3 + $xvals4 + $xvals5 + $xvals6 + $xvals7 + $xvals8 + $xvals9 + $xvals10 + $xvals11 + $xvals12 + $xvals13 + $xvals14 + $xvals15 + $xvals16 + $xvals17 + $xvals18 + $xvals19 + $xvals20 + $xvals21 + $xvals22 + $xvals23 + $xvals24 + $xvals25 + $xvals26;

        $score = round(($fscore / 78) * 100);
  
  
  //echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

  mysqli_query($con, "update t_schedule_pm set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fidx'");

  echo "<script>window.location='cek_assessor_pm_maintenance.php?fid=$fidx'</script>";
      
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
    $path = "images/temuanPM/";
    // Proses upload
    if(move_uploaded_file($tmp, $path.$foto)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database

  
  mysqli_query($con, "insert into t_finding_pm (fid_schedule, fphoto, fnote, fid_score, fgroup) values ('$fid_schedule', '$foto', '$fnote', '$fid_score', '$fid_schedule')");

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


  //
  
  
  $fidx = $_POST["fid_schedule"];
  
  $farray_result = $xvalr1.";".$xvalr2.";".$xvalr3.";".$xvalr4.";".$xvalr5.";".$xvalr6.";".$xvalr7.";".$xvalr8.";".$xvalr9.";".$xvalr10.";".$xvalr11.";".$xvalr12.";".$xvalr13.";".$xvalr14.";".$xvalr15.";".$xvalr16.";".$xvalr17.";".$xvalr18.";".$xvalr19.";".$xvalr20.";".$xvalr21.";".$xvalr22.";".$xvalr23.";".$xvalr24.";".$xvalr25.";".$xvalr26;

  $farray_score = $xvals1.";".$xvals2.";".$xvals3.";".$xvals4.";".$xvals5.";".$xvals6.";".$xvals7.";".$xvals8.";".$xvals9.";".$xvals10.";".$xvals11.";".$xvals12.";".$xvals13.";".$xvals14.";".$xvals15.";".$xvals16.";".$xvals17.";".$xvals18.";".$xvals19.";".$xvals20.";".$xvals21.";".$xvals22.";".$xvals23.";".$xvals24.";".$xvals25.";".$xvals26;
  
  
  //echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

  $fscore = $xvals1 + $xvals2 + $xvals3 + $xvals4 + $xvals5 + $xvals6 + $xvals7 + $xvals8 + $xvals9 + $xvals10 + $xvals11 + $xvals12 + $xvals13 + $xvals14 + $xvals15 + $xvals16 + $xvals17 + $xvals18 + $xvals19 + $xvals20 + $xvals21 + $xvals22 + $xvals23 + $xvals24 + $xvals25 + $xvals26;

        $score = round(($fscore / 78) * 100);
  
  
  //echo "update t_schedule_om set farray_result = '$farray_result', farray_score = '$farray_score' where fid = '$fidx'";

  mysqli_query($con, "update t_schedule_pm set farray_result = '$farray_result', farray_score = '$farray_score', fscore = '$score' where fid = '$fidx'");
  
  //Akhir Niai
  
  echo "<script>window.location='cek_assessor_pm_maintenance.php?fid=$fid_schedule'</script>";
  
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
      <form action="cek_assessor_pm_maintenance.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="fid_score" id="fid_score" >
		
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
		
      <!-- Modal body -->
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
    
    <input type="hidden" name="fid_schedule" value="<?php echo $fidx; ?>" >
    
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
    url: 'cek_pm_ok.php',       
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



