<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Form Check & Action";

$active_dashboard = "";
$active_4s = "active";
$active_stw = "";
$active_pm = "";
$active_om = "";

$fidx = $_GET['fid'];
$fline = $_GET['fline'];
$fworsite = $_GET['fworsite'];

$queryku = mysqli_query($con, "select * from t_schedule_4s where fline = '$fline' and fworsite = '$fworsite' and finfo = 'Plan and Do'");
while($queryku2=mysqli_fetch_array($queryku))
{
	$farray_valuenye = $queryku2['farray_value'];
  $fid_pd = $queryku2['fid']; 
}

include 'cek_jml_4s_ok.php';

$vale = explode(";",$farray_valuenye);


$ss = mysqli_query($con, "select count(fid) as jml from t_form_4s_maintenance order by fid asc");
   while($ss2=mysqli_fetch_array($ss))
   {
	$jml_4s = $ss2['jml']; 
   }    
	
	$sum_score = 0;

	for($i=0;$i<=$jml_4s;$i++){			
		$sum_score += $vale[$i];		
	}
	$score = $sum_score;

 $scorex = mysqli_query($con, "select fscore from t_form_4s_maintenance order by fid asc limit 1");
   while($scorex2=mysqli_fetch_array($scorex))
   {
	$ts = $scorex2['fscore']; 
   }
   
   $ns = $jml_4s * $ts;
	


	if($score > $ns){
		$score = $ns;
	}

	$score = round(($score / $ns) * 100);

	$text_score = "";
	if($score != ""){
	$text_score = "Score : ".$score;
	}		



$queryf = mysqli_query($con, "select * from t_finding_4s where fid_schedule = '$fid_pd'");
while($queryf2=mysqli_fetch_array($queryf))
{
  $fnotex = $queryf2['fnote']; 
}	

$queryconfirm = mysqli_query($con, "select * from t_schedule_4s where fid = '$fidx'");
while($queryconfirm2=mysqli_fetch_array($queryconfirm))
{
  $farray_valuex = $queryconfirm2['farray_value'];  
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
<form action="cek_levelup_4s_maintenance.php" method="post" >
<input type="hidden" name="fidx" value="<?php echo $fidx; ?>" />
<input type="hidden" name="fid_pdx" value="<?php echo $fid_pd; ?>" />
<input type="hidden" name="flinex" value="<?php echo $fline; ?>" />
<input type="hidden" name="fworsitex" value="<?php echo $fworsite; ?>" />
<input type="hidden" name="farray_valuexx" value="1">
<th><center>Temuan</center></th>

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
<th><center>Temuan</center></th>
</tr>
</thead>
<tbody>

<?php  
$no = 0;
$no_jml = 1;

$test = mysqli_query($con, "select * from t_form_4s_maintenance order by fid asc");
  while($test2=mysqli_fetch_array($test))
  {

  $id = $test2['fid']; 
  $fjudul = $test2['fjudul']; 
  $fpoint = $test2['fpoint']; 
  $fscore = $test2['fscore']; 
  $fverybad = $test2['fverybad']; 
  $fbad = $test2['fbad']; 
  $fnormal = $test2['fnormal']; 
  $fgood = $test2['fgood']; 
  $fverygood = $test2['fverygood']; 
  
 
  
  
  ?>

<tr>
<td><span><?php echo $no_jml; ?></span></td>
<td><?php echo $fjudul; ?></td>
<td><?php echo $fpoint; ?></td>
<td>
	
   <select name="val<?php echo $no_jml; ?>" id="val<?php echo $no_jml; ?>" value="<?php echo $vale[$no]; ?>" style="width: 45px;">
	
	<?php for($i=0; $i <= $fscore; $i++){ ?>
     <option value="<?php echo $i; ?>" <?php echo ($vale[$no] ==  $i) ? ' selected="selected"' : '';?>><?php echo $i; ?></option>
   
	 
  <?php } ?>
  </select>  
</td>
<td><?php echo $fverybad; ?></td>
<td><?php echo $fbad; ?></td>
<td><?php echo $fnormal; ?></td>
<td><?php echo $fgood; ?>.</td>
<td><?php echo $fverygood; ?></td>
<td> 

 <a href="#myModal" onclick="getId(document.getElementById('fid_score').value='<?php echo $no_jml; ?>','<?php echo $fidx; ?>','<?php echo $fid_pd; ?>');" data-toggle="modal" data-target="#myModal" class="btn btn-info" >Isi Temuan</a>

<p class="text-center"><br/>
Total : <?php echo ${"jml".$no_jml};?> Temuan 
</p>
</td>
</tr>


  <?php 
  $no_jml++; 
$no++;  
  }

  ?>

</tbody>
</table>
<br>
<h2 class="text-center" style="color:blue"><?php echo $text_score; ?></h2>

<br>


<input type="submit" name="update" value="UPDATE" style="width:100%" class="btn btn-success" />


<br><br>
<!--
<center><h5>Ada temuan ? <a href="#myModal"  data-toggle="modal" data-target="#myModal" class="btn btn-info">Isi Temuan</a></h5></center>
<br>
<br>
<h3 class="text-center"><a style="color:green;">Isi Temuan</a></h3></center>
<br>
<div style="padding-left: 20px;">

<?php

$queryf = mysqli_query($con, "select t_finding_4s.fnote, t_finding_4s.fdate_modified as tgl, t_schedule_4s.* from t_finding_4s join t_schedule_4s on t_finding_4s.fid_schedule =  t_schedule_4s.fid where t_finding_4s.fid_schedule in ($fid_pd,$fidx) order by t_finding_4s.fdate_modified desc");
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





</form> 
<br/>
</div>
  


</div>
<!-- /.container-fluid -->

 
<?php



if (isset($_POST['update']))
{
  
  
	
  $fworsitex = $_POST["fworsitex"];
  $flinex = $_POST["flinex"];
  $fid_pd = $_POST["fid_pdx"];
  $fidx= $_POST["fidx"];
	
	$sub = mysqli_query($con, "select count(fid) as jml from t_form_4s order by fid asc");
   while($sub2=mysqli_fetch_array($sub))
   {
	$jml_form_4s = $sub2['jml']; 
   }
    
	$sum_score = 0;
    $sum_array_value = "";
	for($i=1;$i<=$jml_form_4s;$i++){
		${"val".$i} = $_POST["val$i"];
		$sum_array_value .= ${"val".$i}.";";
		$sum_score += ${"val".$i};
	}

	$farray_value = $sum_array_value;	
	
   $fscore = $sum_score;
   
   $scorex = mysqli_query($con, "select fscore from t_form_4s order by fid asc limit 1");
   while($scorex2=mysqli_fetch_array($scorex))
   {
	$total_score = $scorex2['fscore']; 
   }
	
	$nilai = $jml_form_4s * $total_score;

    $score = round(($fscore / $nilai) * 100);
		
  mysqli_query($con, "update t_schedule_4s set farray_value = '$farray_value', fscore = '$score' where fid = '$fid_pd'");


  $fidx = $_POST["fidx"];
$farray_valuexx = $_POST["farray_valuexx"];
$fid_pd = $_POST["fid_pd"];


  
  mysqli_query($con, "update t_schedule_4s set farray_value = '$farray_valuexx', fid_pd = '$fid_pd' where fid = '$fidx'");
  
  
  echo "<script>window.location='cek_levelup_4s_maintenance.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex'</script>";
  
  //echo "update t_schedule_4s set farray_value = '$farray_value' where fid = '$fidx'";
      
}
  
  
  
  



//save temuan
if (isset($_POST['submit_temuan']))
{
  $fworsitex = $_POST["fworsitex"];
  $flinex = $_POST["flinex"];
  $fid_schedulex = $_POST["fid_schedule"];
  $fid_score = $_POST["fid_score"];
  $fnote = $_POST["fnote"];
   $fid_pd = $_POST["fid_pdx"];
  
  $foto = $_FILES['fphoto']['name'];
   $tmp = $_FILES['fphoto']['tmp_name'];
    
    if(isset($foto) and !empty($foto)){
    $path = "images/temuan4s/";
    // Proses upload
    if(move_uploaded_file($tmp, $path.$foto)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database

  
   mysqli_query($con, "insert into t_finding_4s (fid_schedule, fphoto, fnote, fid_score, fgroup) values ('$fid_schedulex', '$foto', '$fnote', '$fid_score', '$fid_pd')");


}

}
      //Simpan nilai
	  

	  
  $fidx_ = $_POST["fid_pdx"];

  $sub = mysqli_query($con, "select count(fid) as jml from t_form_4s_maintenance order by fid asc");
   while($sub2=mysqli_fetch_array($sub))
   {
	$jml_form_4s = $sub2['jml']; 
   }
    
	$sum_score = 0;
    $sum_array_value = "";
	for($i=1;$i<=$jml_form_4s;$i++){
		${"val".$i."_"} = $_POST["val".$i."_"];
		$sum_array_value .= ${"val".$i."_"}.";";
		$sum_score += ${"val".$i."_"};
	}

	$farray_value_ = $sum_array_value;	
	
   $fscore_ = $sum_score;
   
   $scorex = mysqli_query($con, "select fscore from t_form_4s_maintenance order by fid asc limit 1");
   while($scorex2=mysqli_fetch_array($scorex))
   {
	$total_score = $scorex2['fscore']; 
   }
	
	$nilai = $jml_form_4s * $total_score;

    $score_ = round(($fscore_ / $nilai) * 100);
 
  mysqli_query($con, "update t_schedule_4s set farray_value = '$farray_value_', fscore = '$score_' where fid = '$fidx_'");


   
  //
  
  
  echo "<script>window.location='cek_levelup_4s_maintenance.php?fid=$fid_schedulex&&fline=$flinex&&fworsite=$fworsitex'</script>";
  
}


?>



 
 <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
	
	
	
      <!-- Modal Header -->

      <div class="modal-header">
        <h4 class="modal-title">Isi Temua 4S</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="cek_levelup_4s_maintenance.php" method="post" enctype="multipart/form-data">
	  
	     <!-- data score -->

		<?php $sub = mysqli_query($con, "select count(fid) as jml from t_form_4s order by fid asc");
   while($sub2=mysqli_fetch_array($sub))
   {
	$jml_form_4s = $sub2['jml']; 
   }
    

	for($i=1;$i<=$jml_form_4s;$i++){
		?>

	<input type="hidden" name="val<?php echo $i; ?>_" id="val<?php echo $i; ?>_" />	
    
	<?php  } ?>		

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
    
	<input type="hidden" name="fid_pdx" value="<?php echo $fid_pd; ?>" />
    <input type="hidden" name="fid_schedule" value="<?php echo $fidx; ?>" >
    <input type="hidden" name="fworsitex" value="<?php echo $fworsite; ?>" >
    <input type="hidden" name="flinex" value="<?php echo $fline; ?>" >
    
    <input type="file" name="fphoto" id="fphoto" required="required"><br/><br/>
    <img src="" id="imgView" style="width: 30%;"class="card-img-top img-fluid">
    <hr/>
    <label>Note :</label>
    <textarea id="myTextarea" name="fnote" ></textarea>
    
    
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="submit" name="submit_temuan" value="Save" class="btn btn-success" /> <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      <hr/>
      <div id="tableku"></div>
      </form>
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
    url: 'cek_4s_ok.php',       
    success: function(htmlx) {
      var myStr = htmlx;
      document.getElementById('tableku').innerHTML = htmlx;
    }
    });
	
	 //get score
   <?php $subx = mysqli_query($con, "select count(fid) as jml from t_form_4s order by fid asc");
   while($subx2=mysqli_fetch_array($subx))
   {
	$jml_form_4x = $subx2['jml']; 
   }
    

	for($i=1;$i<=$jml_form_4x;$i++){
		?>

	 document.getElementById('val<?php echo $i; ?>_').value = document.getElementById('val<?php echo $i; ?>').value;
    
	<?php  }	?>
	

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



