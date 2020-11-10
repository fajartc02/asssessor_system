<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname(__FILE__) . "/config/connection.php"; ?>




<?php


$fidx = $_GET['fid'];

$fid_score = $_GET['fidscore'];

$fid_plan = $_GET['fidplan'];

$fid_check = $_GET['fidcheck'];

$findingx = $_GET['finding'];


$queryku = mysqli_query($con, "select * from t_finding_om where fid = '$findingx'");
while($queryku2=mysqli_fetch_array($queryku))
{
	
	$fnote = $queryku2['fnote'];
	$fphoto = $queryku2['fphoto'];
	
}


$queryku = mysqli_query($con, "select * from t_schedule_om where fid = '$fidx'");
while($queryku2=mysqli_fetch_array($queryku))
{
	
	$flinex = $queryku2['fline'];
	$fworsitex = $queryku2['fworsite'];
	$fjobas = $queryku2['fjobas'];
}

?>


<?php include('includes/header.php'); ?>
<div class="container-fluid p-1">

      <form action="" method="post" enctype="multipart/form-data">

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
	<input type="hidden" name="fid_check" value="<?php echo $fid_check; ?>" />
	<input type="hidden" name="fid_plan" value="<?php echo $fid_plan; ?>" />
	<input type="hidden" name="fid_score" value="<?php echo $fid_score; ?>" />
    <input type="hidden" name="finding" value="<?php echo $findingx; ?>" />
	<input type="hidden" name="fjobas" value="<?php echo $fjobas; ?>" />
    <input type="hidden" name="fidx" value="<?php echo $fidx; ?>" >
    <input type="hidden" name="fworsitex" value="<?php echo $fworsitex; ?>" >
    <input type="hidden" name="flinex" value="<?php echo $flinex; ?>" >
    
     <input type="file" name="fphoto" id="fphoto"><br/><br/>
    <img src="images/temuanOM/<?php echo $fphoto; ?>" id="imgView" style="width: 30%;"class="card-img-top img-fluid">
    <hr/>
    <label>Note :</label>
	
	<?php
						$myXMLData = "<?xml version='1.0' encoding='UTF-8'?>
							<note>
							<to></to>
							<from></from>
							<heading></heading>
							<body>$fnote</body>
							</note>";
						$xml = simplexml_load_string($myXMLData) or die("Error: Cannot create object");
					
						?>
	
    <textarea id="myTextarea" name="fnote" ><?php echo $fnote; ?></textarea>
    
    
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="submit" name="submit_temuan" value="Update" class="btn btn-info" /> <a href="javascript:window.history.go(-1);" class="btn btn-danger">CLOSE</a>
      </div>
      <hr/>
      <div id="tableku"></div>
      </form>
</div>




<?php


//save temuan
if (isset($_POST['submit_temuan']))
{
	
  
  $fidx = $_POST["fidx"];
  $finding = $_POST["finding"];
 
  $fnote = $_POST["fnote"];
  
  $foto = $_FILES['fphoto']['name'];
   $tmp = $_FILES['fphoto']['tmp_name'];
   
    // Cek apakah user ingin mengubah fotonya atau tidak
    if(empty($foto)){ // Jika user tidak memilih file foto pada form
  // Lakukan proses update tanpa mengubah fotonya
  // Proses ubah data ke Databa 
     mysqli_query($con, "update t_finding_om set fnote = '$fnote' where fid = '$finding'");
    
		  $fidx = $_POST["fidx"];
		  $finding = $_POST["finding"];
		  $fid_score = $_POST["fid_score"];
		  $fid_plan = $_POST["fid_plan"];
		  $fid_check = $_POST["fid_check"];

		$fjobas = $_POST["fjobas"];
		$fworsitex = $_POST["fworsitex"];
		  $flinex = $_POST["flinex"];

		//$queryz = mysqli_query($con, "delete from t_finding_4s where fid = '$findingx'");

		if($fjobas == 'Assessor'){
		echo "<script>window.location='cek_assessor_om.php?fid=$fidx&fafteredit=1&fid_score=$fid_score'</script>";
		}else if($fjobas == 'Section Head'){
		echo "<script>window.location='cek_levelup_om.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan'</script>";
		}else if($fjobas == 'Manager'){
		echo "<script>window.location='cek_levelup_om.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan'</script>";
		}else if($fjobas == 'Manager Cross'){
		echo "<script>window.location='cek_levelup_om.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan'</script>";
		}else if($fjobas == 'Division'){
		echo "<script>window.location='cek_board_om.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan&fid_check=$fid_check'</script>";
		}
	
		
	
    
    }

    
    if(isset($foto) and !empty($foto)){
    $path = "images/temuanOM/";
    // Proses upload
    if(move_uploaded_file($tmp, $path.$foto)){ // Cek apakah gambar berhasil diupload atau tidak
  // Proses simpan ke Database

  
  mysqli_query($con, "update t_finding_om set fnote = '$fnote', fphoto = '$foto' where fid = '$finding'");

}



$fidx = $_POST["fidx"];
  $finding = $_POST["finding"];
  $fid_score = $_POST["fid_score"];
  $fid_plan = $_POST["fid_plan"];

$fjobas = $_POST["fjobas"];
$fworsitex = $_POST["fworsitex"];
  $flinex = $_POST["flinex"];

//$queryz = mysqli_query($con, "delete from t_finding_4s where fid = '$findingx'");

		if($fjobas == 'Assessor'){
		echo "<script>window.location='cek_assessor_om.php?fid=$fidx&fafteredit=1&fid_score=$fid_score'</script>";
		}else if($fjobas == 'Section Head'){
		echo "<script>window.location='cek_levelup_om.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan'</script>";
		}else if($fjobas == 'Manager'){
		echo "<script>window.location='cek_levelup_om.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan'</script>";
		}else if($fjobas == 'Manager Cross'){
		echo "<script>window.location='cek_levelup_om.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan'</script>";
		}else if($fjobas == 'Division'){
		echo "<script>window.location='cek_board_om.php?fid=$fidx&&fline=$flinex&&fworsite=$fworsitex&fafteredit=1&fid_score=$fid_score&fid_plan=$fid_plan&fid_check=$fid_check'</script>";
		}

}

}

?>

<?php include('includes/footer.php'); ?>

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




