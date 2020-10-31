<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Dashboard";

$active_dashboard = "";
$active_4s = "active";
$active_stw = "";
$active_pm = "";
$active_om = "";

$regnox = $_SESSION['fnoreg']; 
?>




<?php


//cek ada schedule bulan ini
$thmo = date("Y-m");
$adakah = 0;
$queryku = mysqli_query($con, "select count(fid) as adakah from t_schedule_4s where substr(fdate, 1, 7) = '$thmo'");
while($queryku2=mysqli_fetch_array($queryku))
{
	$adakah = $queryku2['adakah'];
}

//generate schedule
$senin = ""; 
$nh = 0;  
if($adakah == 0){
for($i=1;$i<=31;$i++){
	
	if($i <= 9){
		$i = "0".$i;
	}
	$tglnow = date("Y-m-").$i;	
	$queryku = mysqli_query($con, "SELECT DAYOFWEEK('$tglnow') as harike");
	while($queryku2=mysqli_fetch_array($queryku))
	{
		$harike = $queryku2['harike'];
	}
	 
	if($harike == 2){
		if($nh == 0){
		$senin = $tglnow;
		}
		$nh++;
	}
	
}


//create ke table
$queryku = mysqli_query($con, "select * from t_pattern_schedule where ftype_pillar = '4S'");
while($queryku2=mysqli_fetch_array($queryku))
{
	$fjobas = $queryku2['fjobas'];
	$fnoreg = $queryku2['fnoreg'];
	$fname = $queryku2['fname'];
	$fdate = $senin;
	$fline = $queryku2['fline'];
	$fworsite = $queryku2['fworsite'];
	
	if($fjobas == "Assessor"){
		mysqli_query($con, "insert into t_schedule_4s (finfo, fdescription, fnoreg, fname, fdate, fline, fworsite) values ('Plan and Do', '', '$fnoreg', '$fname', '$fdate', '$fline', '$fworsite')");
	}elseif($fjobas == "Section Head"){
		mysqli_query($con, "insert into t_schedule_4s (finfo, fdescription, fnoreg, fname, fdate, fline, fworsite) values ('Check and Action', '', '$fnoreg', '$fname', date_add('$fdate', interval 1 day), '$fline', '$fworsite')");
	}elseif($fjobas == "Manager"){
		mysqli_query($con, "insert into t_schedule_4s (finfo, fdescription, fnoreg, fname, fdate, fline, fworsite) values ('Check and Action', '', '$fnoreg', '$fname', date_add('$fdate', interval 2 day), '$fline', '$fworsite')");
	}elseif($fjobas == "Manager Cross"){
		mysqli_query($con, "insert into t_schedule_4s (finfo, fdescription, fnoreg, fname, fdate, fline, fworsite) values ('Check and Action', '', '$fnoreg', '$fname', date_add('$fdate', interval 3 day), '$fline', '$fworsite')");
	}elseif($fjobas == "Division"){
		mysqli_query($con, "insert into t_schedule_4s (finfo, fdescription, fnoreg, fname, fdate, fline, fworsite) values ('Check Board and Report', '', '$fnoreg', '$fname', date_add('$fdate', interval 4 day), '$fline', '$fworsite')");
	}
	
}




}





?>




<?php include('includes/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

 
   
  <center><h1 class="h3 mb-0 text-gray-800">Dashboard 4S</h1></center><br>
 
	<div class="row">
	<div class="col-md-6"></div>
	<div class="col-md-6" style="text-align:right;color:black">Gudance Ok of 4S : <a href="guidance_pdf.php?ffile=guidance_4s.pdf&link_back=dashboard_4s.php">guidance_4s.pdf (click)</a></div>
	</div>
	
	<div class="card shadow mb-4" style="height:500px;overflow-y: scroll;">
			<div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Latest Schedules</h6>
            </div>
            <div class="card-body" >
              <div class="table-responsive">
                <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Event</th>
                      
                    </tr>
                  </thead>
                  <tbody>
				  <?php
				  $queryku = mysqli_query($con, " select fid, right(fdate, 2) as ftgl, date_format(fdate, '%W') as fhr, fname, finfo, fline, fworsite from t_schedule_4s order by fdate desc limit 70");
				  while($queryku2=mysqli_fetch_array($queryku))
				  {
						$fid = $queryku2['fid'];
						$ftgl = $queryku2['ftgl'];
						$fhr = substr($queryku2['fhr'], 0, 3);
						$fname = $queryku2['fname'];
						$finfo = $queryku2['finfo'];
						$fline = $queryku2['fline'];
						$fworsite = $queryku2['fworsite'];
						
						if($finfo == "Plan and Do" && $fworsite == "RNR Quality Control"){
							$link = "cek_assessor_4s_qc.php?fid=$fid";
						}elseif($finfo == "Plan and Do" && $fworsite == "RNR Engine Maintenance"){
							$link = "cek_assessor_4s_maintenance.php?fid=$fid";
						}elseif($finfo == "Plan and Do"){
							$link = "cek_assessor_4s.php?fid=$fid";
						}elseif($finfo == "Plan and Do" && $fworsite == "RNR Quality Control"){
							$link = "cek_assessor_4.php?fid=$fid";
						}elseif($finfo == "Plan and Do" && $fworsite == "RNR Engine Maintenance"){
							$link = "cek_assessor_4s_maintenance.php?fid=$fid";
						}elseif($finfo == "Check and Action" && $fworsite == "RNR Quality Control"){
							$link = "cek_levelup_4s_qc.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
						}elseif($finfo == "Check and Action" && $fworsite == "RNR Engine Maintenance"){
							$link = "cek_levelup_4s_maintenance.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
						}elseif($finfo == "Check and Action"){
							$link = "cek_levelup_4s.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
						}elseif($finfo == "Check Board and Report" && $fworsite == "RNR Engine Maintenance"){
							$link = "cek_board_4s_maintenance.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
						}else{
							$link = "cek_board_4s.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
						}
						
				  ?>
                    <tr>
                      <td align="center"><strong><?php echo $ftgl; ?></strong><br><?php echo $fhr; ?></td>
                      <td>
					    <div class="card border-left-success shadow">
						<div class="card-body">
						  <div class="row no-gutters align-items-center">
							<div class="col mr-2">
							  4S <?php echo $finfo; ?><br>
							  <i><small><?php echo $fline; ?> - <?php echo $fworsite; ?></small></i><br>
							  By <?php echo $fname; ?>
							</div>
							<div class="col-auto">
							  <a href="<?php echo $link; ?>" class="btn btn-info btn-sm">Open</a>
							</div>
						  </div>
						</div>
						</div>
					  </td>
                    </tr>
					<?php
				    }
					?>
                    
                  </tbody>
                </table>
			</div>
		</div>
	</div>
  
   <div class="card shadow mb-4">
		<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		  <h6 class="m-0 font-weight-bold text-primary">Findings</h6>
		  <select>
		  <option value="">All</option>
		  <option value="Casting">Casting</option>
		  <option value="Machining">Machining</option>
		  <option value="Assy">Assy</option>
		  <option value="Support">Support</option>
		  </select>
		</div>
		<div class="card-body">
		<?php
		$queryku = mysqli_query($con, "select t_finding_4s.fid_schedule, t_finding_4s.fnote, t_finding_4s.fstatus, date(t_finding_4s.fdate_modified) as fdate, t_schedule_4s.finfo, t_schedule_4s.fnoreg, t_schedule_4s.fname, t_schedule_4s.fworsite, DAYNAME(date(t_finding_4s.fdate_modified)) as fday from t_finding_4s join t_schedule_4s on t_schedule_4s.fid = t_finding_4s.fid_schedule order by t_finding_4s.fid desc");
		while($queryku2=mysqli_fetch_array($queryku))
		{
			$fid_schedule = $queryku2['fid_schedule'];
			$fnote = $queryku2['fnote'];
			$fstatus = $queryku2['fstatus'];
			$finfo = $queryku2['finfo'];
			$fnoreg = $queryku2['fnoreg'];
			$fname = $queryku2['fname'];
			$fworsite = $queryku2['fworsite'];
			$fbl = substr($queryku2['fdate'], 5, 2);
			$fth = substr($queryku2['fdate'], 0, 4);
			$fda = substr($queryku2['fdate'], 8, 2);
			$fdate = $fda."-".$fbl."-".$fth;
			$fday = $queryku2['fday'];
			
			if($fstatus == "0"){
				$ic_status = "<span class='badge badge-success'>Opened</span>";
			}elseif($fstatus == "1"){
				$ic_status = "<span class='badge badge-default'>Closed</span>";
			}
			
		?>
		<div class="row">
		<div class="col-md-1">
		<img src="assets/images/user.png" width="50px" height="50px" style="border-radius:50%;" />
		</div>
		<div class="col-md-8">
		<?php echo $fname; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ic_status; ?><br>Assesor<br><?php echo $fworsite; ?>
		</div>
		<div class="col-md-3">
		 <?php echo $fday; ?>, <?php echo $fdate; ?>
		</div>
		<div class="col-md-12">
		<strong>Note : </strong><br>
		<?php
		$myXMLData ="<?xml version='1.0' encoding='UTF-8'?>
		<note>
		<to></to>
		<from></from>
		<heading></heading>
		<body>$fnote</body>
		</note>";
		$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");	
		echo $xml->body;
		?>
		</div>
		</div>
		<hr>
		<?php
		}
		?>
		
		
		</div>
	</div>
	
	

</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    

