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

$result = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8] + $valr[9] + $valr[10] + $valr[11] + $valr[12] + $valr[13] + $valr[14] + $valr[15] + $valr[16] + $valr[17] + $valr[18] + $valr[19] + $valr[20] + $valr[21] + $valr[22] + $valr[23] + $valr[24] + $valr[25] + $valr[26] + $valr[27] + $valr[28] + $valr[29] + $valr[30] + $valr[31] + $valr[32] + $valr[33] + $valr[34] + $valr[35] + $valr[36] + $valr[37] + $valr[38];

$score = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15] + $vals[16] + $vals[17] + $vals[18] + $vals[19] + $vals[20] + $vals[21] + $vals[22] + $vals[23] + $vals[24] + $vals[25] + $vals[26] + $vals[27] + $vals[28] + $vals[29] + $vals[30] + $vals[31] + $vals[32] + $vals[33] + $vals[34] + $vals[35] + $vals[36] + $vals[37] + $vals[38];



if($score > 117){
  $score = 117;
}

//echo $score;

$score = round(($score / 117) * 100);

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
<form action="cek_assessor_pm_log.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fidx; ?>" />
<table  class="table table-bordered" style="font-size:12px" width="100%" >
<thead>
<tr align="center">
<th><center>Item</center></th>
<th width="20%"><center>Assessment criteria<br>＜Silver level＞</center></th>
<th><center>Assessment criteria<br>＜Gold level＞</center></th>
<th><center>Description</center></th>
<th><center>Hasil</center></th>
<th ><center>Skor</center></th>

</tr>
</thead>
<tbody>

<tr>
  <td>GL control board management</td>
  <td>A. Results are connected from sub-KPI to main KPI.</td>
  <td>A. Results are connected from sub-KPI to main KPI.</td>
  <td>Pillar KPI target is achieved and global target is also achieved.<br>( In case that global target is not set, check with section or group target )</td>
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

  <td rowspan="20">Equipment (Tempat Kerja)</td>
  <td>1) Parts pick-up at receiving yard<br>A. Part pick-up location at receiving yard is visualized.</td>
     <td>1) Parts pick-up at receiving yard<br> A. Part pick-up work are strictly observed and there are no problems occurring</td>
  
  <td><br><br>A. Wrong storage area delivery :  No problems occurred for 6 months  </td>
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
  
  <td>B.  Pick-up time for all parts is visualized. 


   </td>
  <td>B. Silver level is maintained</td>
  <td>B. KAIZEN case examples are reported after silver acquisition 
    
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

</tr>

<tr>
  
  <td>C. There are systems for First-in-First out (FIFO)</td>
<td>C. First-in-First-out work is established.  </td>
  <td>C.  There are systems that parts are picked up from old-dated only, and there are no option.

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

</tr> 


<tr>
  
  <td>２) Unloading area for receiving<br>A. Defects at the designated unloading area of the receiving yard are countermeasured.</td>
    <td>２) Unloading area for receiving<br>A. The unloading work is implemented as specified and no problem has occurred.</td>
  <td><br><br>A. Zero wrong delivery (unloading) by parts supplier for past 6 months.  
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

</tr> 


<tr>
 
  <td>B.  Defects of delivery time for every part are countermeasured. </td>
   <td>B.   Silver level is maintained. </td>
  <td>B> There are kaizen cases after the certification of Silver level
    

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

</tr> 


<tr>
  <td>C. Defects of first-in-first-out are countermeasured.</td>
  <td>C.  First-in-first-out rules are thoroughly followed.</td>
  <td>C. Parts pick-up system is established so as not to fail FIFO.<br>(Delivery sequence is followed in order when they are picked up)
    
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


</tr> 


<tr>

  <td>３) Delivery <br>A.  Delivery tools defects are countermeasured
  </td>
    <td>３) Delivery <br>A. There is no defect of delivery tools.
  </td>
  
  <td><br><br>A. Occurrence of problem due to lack of delivery tool maintenance is zero for past 6 months.   
     (Check with ownership maintenance sheet ,etc)

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

</tr> 


<tr>
 

  
  <td>B.  Loading parts defects are countermeasured
    
  </td>
   <td>B. There is no defect related to loading.
    
  </td>
  <td> B. There are no parts scratches and drop. <br>(Check with "Logistics quality problem control sheet")  

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

</tr> 



<tr>

 

  <td>C. Defects of delivery routes' passages are countermeasured
  </td>
  <td>C.  There is no defect occurred at delivery route.
     </td>

     <td> Defect (parts scratches/drop/hit by other vehicle) prevention in the delivery route is implemented. 
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

</tr> 


<tr>  
  <td>４) Parts Racks<br>A. Parts details on the rack labels are well-arranged.

  </td>
 <td>４) Parts Racks<br>A. Silver level is maintained and parts rack is sorted out occasionally.

  </td>
   <td><br><br>A. Parts information is indicated in the rack label and maintained occasionally.<br>(Zero forgetting to maintain information for past 6 months)
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

</tr> 



<tr>  
 <td> B. Similar parts are well-segregated to prevent them from mixing up.
  </td>
     <td>B. There is no defect of parts mixed up.
  </td>
   <td>B.  Zero defects of parts mixed-up for past 6 months.
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

</tr> 



<tr>  

  <td>５) Loading of parts <br>
  A. Wrong parts loading is countermeasured 
  </td>
   <td>５) Loading of parts <br>
  A. There is no defect of wrong parts loading.
  </td>
  <td><br><br>A>  Zero defects of wrong parts loading. (Check with "Logistics quality problem control sheet")

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

</tr> 



<tr>  
  
  <td>B. Prevention activities for scratches and parts dropping are implemented.
   <td>B. There is no parts scratch or dropping.
  </td>
  <td>B. There are no parts scratches and drop for past 6 months.<br>(Check with "Logistics quality problem control sheet")
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

</tr> 



<tr> 


  <td>C.  Kaizen activity for manage parts is implemented.
  </td>
 <td>C. There is no parts bringing back. (No manage )
  </td>
   <td>C. Only designated parts are stored in designated area.
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

</tr> 

<tr> 


  <td>6）Picking-up between Processes<br>A. Parts pick-up area is visualized 
  </td>
   <td>6）Picking-up between Processes<br>A. Parts unloading work is strictly observed and there are no problems occurring .
  </td>
  <td><br><br>A> Wrong storage area delivery :  No problems occurred for 6 months 
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

</tr> 


<tr> 
 

  <td>B. Delivery time for every part is visualized
  </td>
     <td>B.  Silver level is maintained
  </td>
  <td> B. KAIZEN case examples are reported after silver acquisition 
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

</tr> 


<tr> 
  
 

  <td>C.  First-in-First-out(=FIFO) rules are followed.
  </td>
   <td>C.  First-in-First-out work is established. 
  </td>
  <td>C.  There are systems that parts are picked up from old-dated only, and there are no option.
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

</tr> 

<tr> 
  <td>7）Shipping area<br>A. Parts storage location is controlled by destination and visualized. 
  </td>
   <td>7）Shipping area<br>A. Parts unloading work is strictly observed and there are no problems occurring .
  </td>
  <td><br><br>A. Wrong storage area delivery :  No problems occurred for 6 months 
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

</tr> 



<tr> 
  <td>B.  Shipping for all parts is visualized. 
  </td>
   <td>B. Silver level is maintained
  </td>
  <td>B. KAIZEN case examples are reported after silver acquisition 
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

</tr> 



<tr> 


  <td>C. First-in-First-out(=FIFO) rules are followed.</td>
  <td>C.  First-in-First-out work is established. </td>
   <td>C. There are systems that parts are picked up from old-dated only, and there are no option.
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

</tr>



<tr> 
  <td rowspan="6">Kanban (Information) Control
  </td>
  
  <td>8) Handling rules for in-house kanban <br>A.  Number of Kanban matching defects are countermeasured.
  </td>
  <td>8) Handling rules for in-house kanban <br>A. There is no missing parts due to insufficient number of Kanbans.
  </td>
  <td>A. There are no line stop due to missing parts <br>(Check with "Logistics quality problem control sheet")
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

</tr>



<tr> 


  <td>B.  Spare Kanban defects are countermeasured.
  </td>
   <td>B. There is no spare Kanban shortage.
  </td>
  <td>B. Defects of spare kanban (torn / dirty kanban) are reviewed and countermeasured periodically.
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

</tr>



<tr> 
  

  <td>9) Handling rules for supplier (TOPPS) kanban 
  	<br>
  	A. Defects caused by Kanban operation are countermeasured.
  </td>
    <td>9) Handling rules for supplier (TOPPS) kanban 
    <br>
    A. There is no missing parts due to Kanban operation.
  </td>
  <td><br><br>A. Overs & shorts of kanban are continuously checked with PC dept.
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

</tr>

<tr> 
  

  <td>B. Number of Kanban matching defects caused by production fluctuation <br>are countermeasured.
  </td>
    <td>B. Production volume and number of Kanban are always matched and no problem.
   
  </td>
  <td>B. Missing parts prevention activity is implemented with worksite & PC dept.
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

</tr>


<tr> 
  

  <td>10) Kanban Operation<br>A. Rules for kanban collection time and routes are improved 
  </td>
   <td>10) Kanban Operation<br>A. Collecting kanban has never been delayed or forgotten.
  </td>
  <td><br><br>A. Kanban collection is controlled by "Kanban collection board" 
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

</tr>

<tr> 
  

  <td>B. Defects of Kanban reading and forgetting to order are countermeasured.   
  </td>
   <td>B. There is no Kanban mis-reading or forgetting to order.
  </td>
  <td>B. Kanban operation is controlled  by "kanban reading / order check list"
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

</tr>


<tr> 
  
  <td rowspan="6">Change Points Control</td>
  <td>11) Information centralization<br>A. Information defect Kaizen has been promoted. 
  </td>
   <td>11) Information centralization<br>A. Production is controlled without missing/wrong parts.
  </td>
  <td>A.1. There are no line stop due to missing parts <br>
     (Check with "Logistics quality problem control sheet")<br><br>A.2.  Silver level is maintained by utilizing "Problem solving activity sheet".<br>(Countermeasure implemented at 90% and unadministered items should not be delayed more than 2 mos.)
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

</tr>


<tr> 
  

  <td>B. There are systems to follow own-process problems<br>which occurred in the past. 
  </td>
   <td>B. Silver level is maintained and activity hascontinued.
  </td>
  <td>B.  Recurrence of own-process problems : Zero for past 6 months 
     </td>
  <td>
  <select name="valr29" id="valr29" style="width: 45px;">
     <option value="X" <?php echo ($valr[28] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[28] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals29" id="vals29" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[28] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>





<tr> 
    <td>12) Change point management for Man and Material<br>A.  Countermeasures of defects of back-up jobs for work delays are in progress.
  </td>
  <td>12) Change point management for Man and Material<br>A. No quality problems (wrong parts/missing parts) are caused by the back-up jobs
  </td>
  <td><br><br>A. There are no problems such as wrong/missing parts in back-up jobs.  (Zero for past 6 mos)
     </td>
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
    <td>B. Countermeasures of defects of troubleshooting are in progress. 
  </td>
  <td>B. Rules for troubleshooting are followed and there is no quality problem.
  </td>
  <td>B. There are no quality defects in troubleshooting jobs. (Zero for past 6 mos.)
     </td>
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
    <td>C.  Countermeasures for process change, ECI defects (difficult jobs) are in progress.
  </td>
  <td>C. Rules for process changes and engineering changes are followed,<br>and there is no defect.
  </td>
  <td>C. There are no quality defects caused by "against the rules"<br>during process change / engineering changes. (Zero for past 6 mos.)
     </td>
  <td>
  <select name="valr32" id="valr32" style="width: 45px;">
     <option value="X" <?php echo ($valr[31] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[31] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals32" id="vasl32" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[31] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>

<tr> 
    <td>D. Problem solving at the timing of changes in personnel are in progress.
  </td>
  <td>D.  Rules for personnel changes is followed and there is no problem.
  </td>
  <td>D. There are no quality defects related to changes in personnel. (Zero for past 6 mos.)
     </td>
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
  <td rowspan="4">Human Resources Development</td>
    <td>13) Implementation of parts function training & Process acquisition training<br>
      A. Training materials for individual levels are utilized for OJT
  </td>
  <td>13) Implementation of parts function training & Process acquisition training<br>
      A. Quality training material, tools are always maintained and updated.
  </td>
  <td><br><br>A. Quality training manual and tools are continuously maintained.
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

    <td>B. Training is implemented by using critical function parts handling documents for each responsible process.
  </td>
  <td>B.  Trainee understands the functions and roles of critical parts and can instruct.<br>(50% of all members)
  </td>
  <td>B. Trainee understands the functions and roles of critical parts and can instruct.
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

    <td>C. Training is implemented as planned by using training materials of Kanban function and roles 
  </td>
  <td>C. Trainee understands the functions and handling method of TOPPS and can instruct.<br>(50% of all members)
  </td>
  <td>C.  Training is implemented by using Parts procurement handling manuals to teach functions and roles
     </td>
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

    <td>D. Training schedule is available and training is conducted as planned <br>(level 3)
  </td>
  <td>D. Training schedule is available and TLs or upper members are developed as planned<br>(Level 4)
  </td>
  <td>D. Check with "Skill development sheet" & individual job acquirement status<br>( Skill leader and above should be acquired level 4. )
     </td>
  <td>
  <select name="valr37" id="valr37" style="width: 45px;">
     <option value="X" <?php echo ($valr[36] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[36] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals37" id="vals37" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[36] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>


<tr> 
  <td rowspan="2">Activity Result</td>
    <td>14) Occurrence of defects (logistics quality defect)<br>A. Wrong parts loading, missing parts: 0 (for the past 3 months)<br>B. Parts drop, scratches and rust : 0 (for the past 3 months)
  </td>
  <td>14) Occurrence of defects (logistics quality defect)<br>A. Wrong parts loading, missing parts
         : 0 (for the past 6 months)<br>B. Parts drop, scratches and rust : 0 (for the past 6 months)
  </td>
  <td><br><br>Zero wrong parts loading for past 6 mos. No line stops / <br>Zero temporary relief delivery requests for past 6 mos.<br><br>B. Zero parts drop/scratches/rust problems for past 6 mos. <br>(In-process quality problems)
     </td>
  <td>
  <select name="valr38" id="valr38" style="width: 45px;">
     <option value="X" <?php echo ($valr[37] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[37] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals38" id="vals38" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[37] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>


<tr> 

    <td>C. Logistics management evaluation sheet - Silver level completion at 80% or more
  </td>
  <td>C. Logistics management evaluation sheet - Gold level completion at 100%
  </td>
  <td>C.  Full score of silver level & Gold level completion at 100%
     </td>
  <td>
  <select name="valr39" id="valr39" style="width: 45px;">
     <option value="X" <?php echo ($valr[38] ==  'X') ? ' selected="selected"' : "";?>>X</option>
     <option value="O" <?php echo ($valr[38] ==  'O') ? ' selected="selected"' : "";?>>O</option>
  </select>  

</td>

<td>
  <select name="vals39" id="vals39" style="width: 45px;">
    <?php for($i=0;$i < 4;$i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vals[38] == $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
  <?php }  ?>    
  </select>  
</td>

</tr>









</tbody>
</table>
<br/>
<center><h2 style="color:blue"><?php echo $text_score; ?></h2></center>
<br>

</div>
  


</div>
<!-- /.container-fluid -->

 

<?php include('includes/footer.php'); ?>    




