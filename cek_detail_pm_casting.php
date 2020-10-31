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

$result = $valr[0] + $valr[1] + $valr[2] + $valr[3] + $valr[4] + $valr[5] + $valr[6] + $valr[7] + $valr[8] + $valr[9] + $valr[10] + $valr[11] + $valr[12] + $valr[13] + $valr[14] + $valr[15];

$score = $vals[0] + $vals[1] + $vals[2] + $vals[3] + $vals[4] + $vals[5] + $vals[6] + $vals[7] + $vals[8] + $vals[9] + $vals[10] + $vals[11] + $vals[12] + $vals[13] + $vals[14] + $vals[15];



if($score > 45){
  $score = 45;
}

//echo $score;

$score = round(($score / 45) * 100);

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
<form action="cek_assessor_pm_casting.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fid; ?>" />
<table  class="table table-bordered" style="font-size:12px"  >
<thead>
<tr align="center">
<th><center>Item</center></th>
<th><center>Assessment criteria<br>＜Silver level＞</center></th>
<th><center>Assessment criteria<br>＜Gold level＞</center></th>
<th><center>Description</center></th>
<th><center>Judgment</center></th>
<th><center>Score</center></th>

</tr>
</thead>
<tbody>

<tr>
  <td>Operation of GL control board</td>
  <td>Result is linked from sub-KPI to main KPI</td>
  <td>Result is linked from sub-KPI to main KPI</td>
  <td> KPI target of the pillar is achieved and so is global target.<br>
  For worksite doesn't set global target, check with section/group target）</td>
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
  <td rowspan="6">Management of operating condition</td>
  <td>１）Confirmation before operation <br> A. The machine condition is confirmed before operation. </td>
  <td>１）Confirmation before operation <br> A. The machine condition prior to operation start is controlled. </td>
  <td> A.1. Inspection prior to operation start is continuously implemented according to inspection sheet. .<br> A.2. Kaizen against the before-start-of-operation problems is continuously implemented. <br>
    A.3. There has been no occurrence of problem thanks to preventive measures (Mizenboshi) for more than 6 months.</td>
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
  
  <td>２）Confirmation during operation <br> A. The manufacturing condition during operation is confirmed.  </td>
  <td>2）Confirmation during operation  <br> A. The manufacturing condition during operation is controlled. </td>
  <td> A.1.  Confirming the trend based on the manufacturing condition, judgment of NG or OK is continuously done.  .<br> A.2. Kaizen of defects about the manufacturing condition is continuously implemented.  <br>
    A.3. There has been no occurrence of problem thanks to preventive measures(Mizenboshi) for more than 6 months. </td>
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
  
  <td>B. The quality of molten metal is confirmed.   </td>
  <td>B. The quality of molten metal is controlled. </td>
  <td> B.1.  Ingredient amount and blend ratio are continuously confirmed according to criteria. <br> B.2. The temperature of molten metal is continuously measured.  <br>
    B.3. Cleanliness of molten metal is measured and judged as OK/NG continuously. 
    <br>B.4. Kaizen of defects about molten metal is continuously implemented. 
    <br>B.5. There has been no occurrence of problem thanks to preventive measures(Mizenboshi) for more than 6 months. 

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
  
  <td>C. The quality of die is confirmed.  </td>
  <td>C. The quality of die is controlled. </td>
  <td> C.1. Die temperature, cooling water temperature and passing water amount, etc. is continuously measured  <br> C.2. Judgment of NG or OK for die profile is done and check result is continuously recorded.  <br>
    C.3. Die problems corrected based on criteria, it is continuously recorded.
    <br>C.4. Die replaced as per plan, it is continuously recorded
    <br>C.5. Die keeping status is visualized, and it is continuously reviewed on a monthly basis.than 6 months. <br>
    C.6. Kaizen of defects about die is continuously implemented. 
    <br>C.7. There has been  no occurrence of problem thanks to preventive measures(Mizenboshi) for more than 6 months. 

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
  
  <td>D. The quality of mold release agent & water-soluble liquid, etc. is confirmed. </td>
  <td>D. The quality of mold release agent & water-soluble liquid, etc. is controlled. </td>
  <td> D.1. The mold-release-agent spraying condition is continuously recorded (concentration/ application/ discharge condition/ amount/ range/ pressure, etc.).  <br> D.2. The condition of water-soluble liquid, etc. is continuously recorded.  <br>
    D.3. Kaizen of defects about mold-release agent, water-soluble liquid,etc. is continuously implemented. 
    <br>D.4. There has been  no occurrence of problem thanks to preventive measures(Mizenboshi) for more than 6 months. 
    

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
  
  <td>3) Confirmation of quantitatively-replaced parts<br>A. Replaceable parts which give impact to quality are confirmed. </td>
  <td>3) Confirmation of quantitatively-replaced parts<br>A. Replaceable parts which give impact to quality are controlled.  </td>
  <td> A.1. Parts replacement is continuously done based on replacement criteria.  <br> A.2. Kaizen of defects about quantitatively-replaced parts is continuously implemented.  <br>
    A.3. There has been  no occurrence of problem thanks to preventive measures(Mizenboshi) for more than 6 months.  
    

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
  <td>Management of change points</td>
  
  <td>４）Change points are managed. <br>A.  It is implemented by 4M as per management rules. 
    <br><br>B. Activity to reduce risks caused by changes is implemented. （Preliminary education / training, etc. ）
  </td>
  <td>４）Change points are managed. <br>A.1. It is implemented by 4M as per management rules. <br>A.2. Manager & Asst MGR confirm the record periodically and follow it up.<br>B.  No customer defect/following-process defect caused by changes has happened for more than 6 months.  </td>
  <td> A.1. Management of change points is done based on rules.   <br> A.2. The history record sheet has approval signatures on a regular basis.    <br>
    B. There is no outflow of own-group-responsible defect.  
    

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
  <td rowspan="6">Management of products</td>
  
  <td>５）Quality inspection of products <br> A. The environment for product inspection is prepared. 
  </td>
   <td>５）Quality inspection of products <br> A. The environment for product inspection is controlled.
  </td>
  <td> A.1. Judgment of OK/NG on products is continuously made based on standards    <br> A.2. Using gauges and boundary samples, judgment of OK/NG on products is continuously made.    <br>
    A.3. OK/NG judgment on an inspection site about brightness, noise, dust, etc. is continuously made based on environment criteria. <br> A.4. Kaizen of defects related to environment in an inspection process is continuously implemented. <br> A.5. There has been  no occurrence of problem thanks to preventive measures(Mizenboshi) for more than 6 months.  
    

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

  
  <td>B. Inspector's skill is developed. <br> C. Activity to prevent recurrence of past problems is 
  </td>
  <td>B. Inspector is developed and managed.  <br> C.Recurrence of past problems is prevented. 
  </td>
  <td> B.1. There is no delay with development plan. （The period should be clarified during development training)   <br> B.2. Teaching materials & tools for developing an inspector have been subjected to Kaizen.  <br>
    C.1. Education/training are implemented for all members in a group to prevent problem recurrence. <br> C.2. There is no customer defect caused by overlooking. 

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
  <td>６）Reduction of problems <br> A. Problems are reduced. 
  </td>
   <td>６）Reduction of problems <br> A. Problems are reduced. 
  </td>
  <td> A.1. With the root cause of occurrence investigated and analyzed, recurrence has been continuously prevented.   <br> A.2. Thanks to above countermeasure, there has been no problem recurrence for mote than 6 months.

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
  <td>B. Outflow of customer defect is prevented. 
  </td>
   <td>B. There is no defect outflow to customer/following process. 
  </td>
  <td> B.1.There has been no defective parts outflow continuously. （There is an actual case.）  <br> B.2. There has been no customer defect outflow caused by selection. 

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
  <td>C. Chronic problems are reduced. 
  </td>
   <td>C. Chronic problems are reduced.  
  </td>
  <td> C.1.The problem reduction activity is continuously conducted with concerned departments.  <br> C.2. The chronic defects reduction activity is continuously conducted （ACT2)<br>
    C.3. Yokoten is implemented based on information. （Yokoten cases) 

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
  <td>７）Management of completed products <br>A. Inventory of completed products is controlled. 
  </td>
   <td>７）Management of completed products <br>A. Inventory of completed products is controlled and Kaizen is implemented.
  </td>
  <td> A.1.Management has been continuously conducted as per operating rules. <br> A.2. There has been no defect caused by operating rules. （More than 6 months)
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
<td>H/R development</td> 
  <td>８）H/R development & Management<br>A. Knowledge and skill of die casting are acquired. 
  </td>
   <td>８）H/R development & Management <br>A. Knowledge and skill of die casting are acquired. 
  </td>
  <td> A.1.There is no delay in development based on the special skill acquisition system and skill Dojo training, etc.   <br> A.2. ＴＬ and higher levels are improved. 
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






</tbody>
</table>
<br/>
<center><h2 style="color:blue"><?php echo $text_score; ?></h2></center>
<br>

</div>
  


</div>
<!-- /.container-fluid -->

 

<?php include('includes/footer.php'); ?>    



