<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname(__FILE__) . "/config/connection.php"; ?>

<?php
$title = "Dashboard PM";

$active_dashboard = "";
$active_4s = "";
$active_pm = "";
$active_pm = "active";
$active_om = "";

$regnox = $_SESSION['fnoreg'];

?>


<?php


//cek ada schedule bulan ini
$thmo = date("Y-m");
$adakah = 0;
$queryku = mysqli_query($con, "select count(fid) as adakah from t_schedule_pm where substr(fdate, 1, 7) = '$thmo'");
while ($queryku2 = mysqli_fetch_array($queryku)) {
	$adakah = $queryku2['adakah'];
}

//generate schedule
$senin = "";
$nh = 0;
if ($adakah <= 7) {
	for ($i = 1; $i <= 31; $i++) {

		if ($i <= 9) {
			$i = "0" . $i;
		}
		$tglnow = date("Y-m-") . $i;
		$queryku = mysqli_query($con, "SELECT DAYOFWEEK('$tglnow') as harike");
		while ($queryku2 = mysqli_fetch_array($queryku)) {
			$harike = $queryku2['harike'];
		}

		if ($harike == 2) {
			if ($nh == 3) {
				$senin = $tglnow;
			}
			$nh++;
		}
	}




	//create ke table
	$queryku = mysqli_query($con, "select * from t_pattern_schedule where ftype_pillar = 'PM'");
	while ($queryku2 = mysqli_fetch_array($queryku)) {
		$fjobas = $queryku2['fjobas'];
		$fnoreg = $queryku2['fnoreg'];
		$fname = $queryku2['fname'];
		$fdate = $senin;
		$fline = $queryku2['fline'];
		$fworsite = $queryku2['fworsite'];

		if ($fjobas == "Assessor") {
			mysqli_query($con, "insert into t_schedule_pm (finfo, fdescription, fnoreg, fname, fdate, fline, fworsite, fjobas) values ('Plan and Do', '', '$fnoreg', '$fname', '$fdate', '$fline', '$fworsite', '$fjobas')");
		} elseif ($fjobas == "Section Head") {
			mysqli_query($con, "insert into t_schedule_pm (finfo, fdescription, fnoreg, fname, fdate, fline, fworsite, fjobas) values ('Check and Action', '', '$fnoreg', '$fname', date_add('$fdate', interval 1 day), '$fline', '$fworsite', '$fjobas')");
		} elseif ($fjobas == "Manager") {
			mysqli_query($con, "insert into t_schedule_pm (finfo, fdescription, fnoreg, fname, fdate, fline, fworsite, fjobas) values ('Check and Action', '', '$fnoreg', '$fname', date_add('$fdate', interval 2 day), '$fline', '$fworsite', '$fjobas')");
		} elseif ($fjobas == "Manager Cross") {
			mysqli_query($con, "insert into t_schedule_pm (finfo, fdescription, fnoreg, fname, fdate, fline, fworsite, fjobas) values ('Check and Action', '', '$fnoreg', '$fname', date_add('$fdate', interval 3 day), '$fline', '$fworsite', '$fjobas')");
		} elseif ($fjobas == "Division") {
			mysqli_query($con, "insert into t_schedule_pm (finfo, fdescription, fnoreg, fname, fdate, fline, fworsite, fjobas) values ('Check Board and Report', '', '$fnoreg', '$fname', date_add('$fdate', interval 4 day), '$fline', '$fworsite', '$fjobas')");
		}
	}
}





?>




<?php include('includes/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid p-1">



	<center>
		<h1 class="h3 mb-0 text-gray-800">Dashboard PM</h1>
	</center><br>

	<!--<div class="row">
	<div class="col-md-6"></div>
	<div class="col-md-6" style="text-align:right;color:black">Guidance Ok of PM : <a href="guidance_pdf.php?ffile=guidance_pm.pdf&link_back=dashboard_pm.php">guidance_pm.pdf (click)</a></div>
	</div>-->

	<div class="card shadow mb-4" style="height:500px;overflow-y: scroll;">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Latest Schedules</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Date</th>
							<th>Event</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($regnox == 'admin') {
							$queryku = mysqli_query($con, " select fid, right(fdate, 2) as ftgl, date_format(fdate, '%W') as fhr, fname, finfo, fline, fworsite, farray_score from t_schedule_pm order by fdate desc limit 100");
						} else {
							$queryku = mysqli_query($con, " select fid, right(fdate, 2) as ftgl, date_format(fdate, '%W') as fhr, fname, finfo, fline, fworsite, farray_score from t_schedule_pm where fnoreg = '$regnox' order by fdate desc limit 100");
						}
						while ($queryku2 = mysqli_fetch_array($queryku)) {
							$fid = $queryku2['fid'];
							$ftgl = $queryku2['ftgl'];
							$fhr = substr($queryku2['fhr'], 0, 3);
							$fname = $queryku2['fname'];
							$finfo = $queryku2['finfo'];
							$fline = $queryku2['fline'];
							$fworsite = $queryku2['fworsite'];
							$farray_scorex = $queryku2['farray_score'];


							if ($finfo == "Plan and Do" && $fworsite == "RNR Cylinder Head Line") {
								$link = "cek_assessor_pm.php?fid=$fid";
							}

							if ($finfo == "Plan and Do" && $fworsite == "RNR Cam Shaft Line") {
								$link = "cek_assessor_pm.php?fid=$fid";
							}

							if ($finfo == "Plan and Do" &&  $fworsite == "RNR Cylinder Block Line") {
								$link = "cek_assessor_pm.php?fid=$fid";
							}

							if ($finfo == "Plan and Do" && $fworsite == "RNR Crank Shaft Line") {
								$link = "cek_assessor_pm.php?fid=$fid";
							} elseif ($finfo == "Plan and Do" && $fworsite == "Casting LP Cylinder Head") {
								$link = "cek_assessor_pm_casting.php?fid=$fid";
							} elseif ($finfo == "Plan and Do" && $fworsite == "Die Casting Cylinder Block") {
								$link = "cek_assessor_pm_casting.php?fid=$fid";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Main Assembling Line") {
								$link = "cek_assessor_pm_assy.php?fid=$fid";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Sub Assembly Line") {
								$link = "cek_assessor_pm_assy.php?fid=$fid";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Test Bench") {
								$link = "cek_assessor_pm_test.php?fid=$fid";
							} elseif ($finfo == "Plan and Do" && $fworsite == "Die Maintenance") {
								$link = "cek_assessor_pm_die_maintenance.php?fid=$fid";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Logistic") {
								$link = "cek_assessor_pm_log.php?fid=$fid";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Engine Maintenance") {
								$link = "cek_assessor_pm_maintenance.php?fid=$fid";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Quality Control") {
								$link = "cek_assessor_pm_qc.php?fid=$fid";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Tool Regrinding") {
								$link = "cek_assessor_pm_tool.php?fid=$fid";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Cam Shaft Line") {
								$link = "cek_levelup_pm.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Cylinder Block Line") {
								$link = "cek_levelup_pm.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Crank Shaft Line") {
								$link = "cek_levelup_pm.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Cylinder Head Line") {
								$link = "cek_levelup_pm.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "Casting LP Cylinder Head") {
								$link = "cek_levelup_pm_casting.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "Die Casting Cylinder Block") {
								$link = "cek_levelup_pm_casting.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Main Assembling Line") {
								$link = "cek_levelup_pm_assy.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Sub Assembly Line") {
								$link = "cek_levelup_pm_assy.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Test Bench") {
								$link = "cek_levelup_pm_test	.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "Die Maintenance") {
								$link = "cek_levelup_pm_die_maintenance.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Logistic") {
								$link = "cek_levelup_pm_log.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Engine Maintenance") {
								$link = "cek_levelup_pm_maintenance.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Quality Control") {
								$link = "cek_levelup_pm_qc.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check and Action" && $fworsite == "RNR Tool Regrinding") {
								$link = "cek_levelup_pm_tool.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Cylinder Head Line") {
								$link = "cek_board_pm.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Cam Shaft Line") {
								$link = "cek_board_pm.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Cylinder Block Line") {
								$link = "cek_board_pm.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Crank Shaft Line") {
								$link = "cek_board_pm.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "Casting LP Cylinder Head") {
								$link = "cek_board_pm_casting.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "Die Casting Cylinder Block") {
								$link = "cek_board_pm_casting.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Main Assembling Line") {
								$link = "cek_board_pm_assy.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Sub Assembly Line") {
								$link = "cek_board_pm_assy.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Test Bench") {
								$link = "cek_board_pm_test.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "Die Maintenance") {
								$link = "cek_board_pm_die_maintenance.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Logistic") {
								$link = "cek_board_pm_log.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Engine Maintenance") {
								$link = "cek_board_pm_pm_maintenance.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Quality Control") {
								$link = "cek_board_pm_qc.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							} elseif ($finfo == "Check Board and Report" && $fworsite == "RNR Tool Regrinding") {
								$link = "cek_board_pm_tool.php?fid=$fid&&fline=$fline&&fworsite=$fworsite";
							}

						?>
							<tr style="font-size: 12px">
								<td align="center"><strong><?php echo $ftgl; ?></strong><br><?php echo $fhr; ?></td>
								<td>
									<div class="card border-left-success shadow">
										<div class="card-body p-1">
											<div class="row no-gutters align-items-center">
												<div class="col mr-2">
													PM <?php echo $finfo; ?><br>
													<i><small><?php echo $fline; ?> - <?php echo $fworsite; ?></small></i><br>
													By <?php echo $fname; ?>
												</div>
												<div class="col-auto">
													<a style="float: right;" href="<?php echo $link; ?>" class="btn btn-info btn-sm">Open</a><br><br>
													<?php
													$confirm = "";
													if ($farray_scorex != '') {
														$confirm = "<span class='badge badge-success'>Confirmed</span>";
													}
													?>
													<?php echo $confirm; ?>
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
			<h6 class="m-0 font-weight-bold text-primary">Result Audit</h6>
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

/*
						if ($regnox == 'admin') {
							$queryku = mysqli_query($con, "select t_finding_pm.fid_schedule, t_finding_pm.fnote, t_finding_pm.fstatus, date(t_finding_pm.fdate_modified) as fdate, t_schedule_pm.finfo, t_schedule_pm.fnoreg, t_schedule_pm.fname, t_schedule_pm.fworsite, DAYNAME(date(t_finding_pm.fdate_modified)) as fday from t_finding_pm join t_schedule_pm on t_schedule_pm.fid = t_finding_pm.fid_schedule order by t_finding_pm.fid desc");
						} else {

*/							
							$queryku = mysqli_query($con, "select t_schedule_pm.*, DAYNAME(date(t_schedule_pm.fdate)) as fday, t_pattern_schedule.fjobas from t_schedule_pm join t_pattern_schedule on t_schedule_pm.fnoreg = t_pattern_schedule.fnoreg where t_schedule_pm.finfo = 'plan and do' and t_pattern_schedule.ftype_pillar = 'PM' group by t_schedule_pm.fid desc");
//}


			
			while ($queryku2 = mysqli_fetch_array($queryku)) {
				$fidx = $queryku2['fid'];
				$fnote = $queryku2['fnote'];
				$fstatus = $queryku2['fstatus'];
				$finfo = $queryku2['finfo'];
				$fnoreg = $queryku2['fnoreg'];
				$fname = $queryku2['fname'];
				$farray_score = $queryku2['farray_score'];
				$fscore = $queryku2['fscore'];
				$finfo = $queryku2['finfo'];
				$fline = $queryku2['fline'];
				$fworsite = $queryku2['fworsite'];
				$fbl = substr($queryku2['fdate'], 5, 2);
				$fth = substr($queryku2['fdate'], 0, 4);
				$fda = substr($queryku2['fdate'], 8, 2);
				$fdate = $fda . "-" . $fbl . "-" . $fth;
				$fday = $queryku2['fday'];


							if ($finfo == "Plan and Do" && $fworsite == "RNR Cylinder Head Line") {
								$link = "cek_detail_pm.php?fid=$fidx";
							}

							if ($finfo == "Plan and Do" && $fworsite == "RNR Cam Shaft Line") {
								$link = "cek_detail_pm.php?fid=$fidx";
							}

							if ($finfo == "Plan and Do" &&  $fworsite == "RNR Cylinder Block Line") {
								$link = "cek_detail_pm.php?fid=$fidx";
							}

							if ($finfo == "Plan and Do" && $fworsite == "RNR Crank Shaft Line") {
								$link = "cek_detail_pm.php?fid=$fidx";
							} elseif ($finfo == "Plan and Do" && $fworsite == "Casting LP Cylinder Head") {
								$link = "cek_detail_pm_casting.php?fid=$fidx";
							} elseif ($finfo == "Plan and Do" && $fworsite == "Die Casting Cylinder Block") {
								$link = "cek_detail_pm_casting.php?fid=$fidx";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Main Assembling Line") {
								$link = "cek_detail_pm_assy.php?fid=$fidx";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Sub Assembly Line") {
								$link = "cek_detail_pm_assy.php?fid=$fidx";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Test Bench") {
								$link = "cek_detail_pm_test.php?fid=$fidx";
							} elseif ($finfo == "Plan and Do" && $fworsite == "Die Maintenance") {
								$link = "cek_detail_pm_die_maintenance.php?fid=$fidx";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Logistic") {
								$link = "cek_detail_pm_log.php?fid=$fidx";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Engine Maintenance") {
								$link = "cek_detail_pm_maintenance.php?fid=$fidx";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Quality Control") {
								$link = "cek_detail_pm_qc.php?fid=$fidx";
							} elseif ($finfo == "Plan and Do" && $fworsite == "RNR Tool Regrinding") {
								$link = "cek_detail_pm_tool.php?fid=$fidx";
							}	
				


				$query =  mysqli_query($con, "SELECT COUNT(fgroup) as hitung FROM t_finding_pm where fgroup = '$fidx'");
				while ($query2 = mysqli_fetch_array($query)) {
				$finding = $query2['hitung'];

				}

				$queryoke =  mysqli_query($con, "SELECT fscore FROM t_schedule_pm where fid = '$fidx'");
				while ($queryoke2 = mysqli_fetch_array($queryoke)) {
				$score = $queryoke2['fscore'];

				}

				if ($fstatus == "0") {
					$ic_status = "<span class='badge badge-primary tx-dark'>On Solving</span>";
				} else if ($fstatus == "1") {
					$ic_status = "<span class='badge badge-success tx-dark'>Solved</span>";
				}

				// if ($fname == "Yunizar") {
				// 	$ic_status = "<span class='badge badge-success tx-dark'>Solved</span>";
				// }
				
				
					$query_acc =  mysqli_query($con, "SELECT t_schedule_pm.*, t_pattern_schedule.fname from t_schedule_pm  join t_pattern_schedule on t_schedule_pm.fnoreg = t_pattern_schedule.fnoreg where t_pattern_schedule.fjobas = 'Assessor' and t_schedule_pm.fid = '$fidx' and t_schedule_pm.fworsite = '$fworsite' and t_pattern_schedule.ftype_pillar = 'PM'");
				while ($query_acc2 = mysqli_fetch_array($query_acc)) {
				$acc = $query_acc2['fname'];
				$fid_pd_acc = $query_acc2['fid_pd'];
				$farray_value_acc = $query_acc2['farray_score'];
				$fdate_acc = $query_acc2['fdate'];	
				}
				
				if($farray_value_acc != ''){
					$bg_acc = "bg-success";
				}else if($fdate_acc < date("Y-m-d")){
					$bg_acc = "bg-danger";	
				}else if($farray_value_acc == ''){
					$bg_acc = "bg-info";
				}

				
				
				/*$query_sh =  mysqli_query($con, "SELECT t_schedule_pm.fid, t_pattern_schedule.fname from t_pattern_schedule join t_schedule_pm on t_schedule_pm.fnoreg = t_pattern_schedule.fnoreg where t_pattern_schedule.fline='$fline' and t_pattern_schedule.fworsite = '$fworsite' and t_pattern_schedule.fjobas = 'Section Head' and t_schedule_pm.fid = '$fid' limit 1");*/
				$query_sh =  mysqli_query($con, "SELECT t_schedule_pm.* from t_schedule_pm join t_pattern_schedule on t_schedule_pm.fnoreg = t_pattern_schedule.fnoreg where t_schedule_pm.fjobas = 'Section Head' and t_schedule_pm.fid_pd = '$fidx' and t_pattern_schedule.ftype_pillar = 'PM' and t_schedule_pm.fworsite = '$fworsite' and t_schedule_pm.finfo = 'Check and Action' group by t_schedule_pm.fid_pd limit 1");
				while ($query_sh2 = mysqli_fetch_array($query_sh)) {
				
				
				$sh = $query_sh2['fname'];
				$fid_pd_sh = $query_sh2['fid_pd'];
				$farray_value_sh = $query_sh2['farray_score'];
				$fdate_sh = $query_sh2['fdate'];	
				}
				//SH	
				
				/*
				if($fid_pd_sh == $fidx){
					$bg_sh = "bg-success";
					
				}else if($fid_pd_sh != $fidx){
					$bg_sh = "bg-danger";
				}else if($farray_value_sh != ''){
					$bg_sh = "bg-success";
				}else if($fdate_sh < date("Y-m-d")){
					$bg_sh = "bg-danger";	
				}
				else if($fid_pd_sh == ''){
					$bg_sh = "bg-info";
				
				}	
				*/
				
				
				if($farray_value_sh != ''){
					$bg_sh = "bg-success";
				}else if($fdate_sh < date("Y-m-d")){
					$bg_sh = "bg-danger";	
				}else if($farray_value_sh == ''){
					$bg_sh = "bg-info";
				}
				
				/*
				else if{
					$bg_sh = "bg-danger";
				}
				
				*/
				$query_cross =  mysqli_query($con, "SELECT t_schedule_pm.fid_pd, t_pattern_schedule.fname, t_schedule_pm.farray_score, t_schedule_pm.fdate from t_schedule_pm  join t_pattern_schedule on t_schedule_pm.fnoreg = t_pattern_schedule.fnoreg where t_schedule_pm.fjobas = 'Manager' and t_schedule_pm.fworsite = '$fworsite' and t_schedule_pm.fid_pd = '$fidx' and t_pattern_schedule.ftype_pillar = 'PM' and t_schedule_pm.finfo = 'Check and Action'");
				while ($query_cross2 = mysqli_fetch_array($query_cross)) {
				$mgr = $query_cross2['fname'];
				$fid_pd_mgr = $query_cross2['fid_pd'];
				$farray_value_mgr = $query_cross2['farray_score'];
				$fdate_mgr = $query_cross2['fdate'];
				}	
				
				//CROSS
				if($fid_pd_mgr == $fidx){
					$bg_mgr = "bg-success";
				}else if($fid_pd_mgr != $fidx){
					$bg_mgr = "bg-danger";
				}else if($farray_value_mgr != ''){
					$bg_mgr = "bg-success";
				}else if($fdate_mgr < date("Y-m-d")){
					$bg_mgr = "bg-danger";	
				}else if($farray_value_mgr == ''){
					$bg_mgr = "bg-info";
				}
				
				
				
				
				$query_cross =  mysqli_query($con, "SELECT t_schedule_pm.fid_pd, t_pattern_schedule.fname, t_schedule_pm.farray_score, t_schedule_pm.fdate from t_schedule_pm  join t_pattern_schedule on t_schedule_pm.fnoreg = t_pattern_schedule.fnoreg where t_schedule_pm.fjobas = 'Manager Cross' and t_schedule_pm.fworsite = '$fworsite' and t_schedule_pm.fid_pd = '$fidx' and t_pattern_schedule.ftype_pillar = 'PM' and t_schedule_pm.finfo = 'Check and Action'");
				while ($query_cross2 = mysqli_fetch_array($query_cross)) {
				$cross = $query_cross2['fname'];
				$fid_pd_cross = $query_cross2['fid_pd'];
				$farray_value_cross = $query_cross2['farray_score'];
				$fdate_cross = $query_cross2['fdate'];
				}	
				
				//CROSS
				if($fid_pd_cross == $fidx){
					$bg_cross = "bg-success";
				}else if($fid_pd_cross != $fidx){
					$bg_cross = "bg-danger";
				}else if($farray_value_cross != ''){
					$bg_cross = "bg-success";
				}else if($fdate_cross < date("Y-m-d")){
					$bg_cross = "bg-danger";	
				}else if($farray_value_cross == ''){
					$bg_cross = "bg-info";
				}
				
				
				
				$query_div =  mysqli_query($con, "SELECT t_schedule_pm.fid_pd, t_pattern_schedule.fname, t_schedule_pm.farray_score, t_schedule_pm.fdate from t_schedule_pm  join t_pattern_schedule on t_schedule_pm.fnoreg = t_pattern_schedule.fnoreg where t_schedule_pm.fjobas = 'Division' and t_schedule_pm.fid_pd = '$fidx' and t_schedule_pm.fworsite = '$fworsite' and t_pattern_schedule.ftype_pillar = 'PM' and t_schedule_pm.finfo = 'Check Board and Report'");
				while ($query_div2 = mysqli_fetch_array($query_div)) {
				$div = $query_div2['fname'];
				$fid_pd_div = $query_div2['fid_pd'];
				$farray_value_div = $query_div2['farray_score'];
				$fdate_div = $query_div2['fdate'];
				}	
				
				//Division
				if($fid_pd == $fidx){
					$bg_div = "bg-success";
				}else if($fid_pd_div != $fidx){
					$bg_div = "bg-danger";
				}else if($fid_pd_div != ''){
					$bg_div = "bg-success";
				}else if($fdate_div < date("Y-m-d")){
					$bg_div = "bg-danger";	
				}else if($farray_value_div == ''){
					$bg_div = "bg-info";
				}
					

			?>
				<div class="row">
					<div class="col-3 p-0 m-0">
						<img src="assets/images/user.png" width="50px" height="50px" style="border-radius:50%;" />
					</div>
					<div class="col-4 p-0 m-0">
					
						<b><?php echo $fname; ?></b>
						
						
						
						<b><?php echo $fidx; ?></b>
			
						<br>
						<p class="p-0 m-0" style="font-size: 9px"><?php echo $fworsite; ?></p>
						<p class="p-0 m-0">STW</p>
					</div>
					<div class="col-5 p-0 m-0">
						<p class="d-flex justify-content-end p-0 m-0" style="font-size: 9px"><?php echo $fday; ?>, <?php echo $fdate; ?></p>
						<div class="row m-0 p-0">
							<div class="d-flex justify-content-center col-6 m-0 p-0 mt-2" style="font-size: 11px;">
								<table>
									<tr>
										<td class="border-right" style="font-size: 9px;font-weight: bold!important">
											<center>Points: <?php echo $fscore; ?></center>
										</td>
									</tr>
									<tr>
										<td>
											<center><a href="<?php echo $link; ?>" class="btn bg-info py-0 my-1" style="font-size: 9px;height: 15px;color: black">Details</a></center>
										</td>
									</tr>
								</table>
							</div>
							<div class="d-flex justify-content-center col-6 m-0 p-0 mt-2" style="font-size: 11px;">
								<table>
									<tr>
										<td class="d-flex border-right justify-content-center" style="font-size: 9px;font-weight: bold!important">
											<center>Findings: <?php echo $finding; ?></center>
										</td>
									</tr>
									<tr>
										<td>
											<center><button class="btn bg-info py-0 my-1" style="font-size: 9px;height: 15px;color: black" data-toggle="modal" data-target="#exampleModalCenterFindings" href="#exampleModalCenterFindings" onclick="getfid('<?php echo $fidx; ?>','<?php echo $fnoreg; ?>');" >Details</button></center>

											<!-- Modal -->
											<div class="modal fade" id="exampleModalCenterFindings" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLongTitle">Detail Findings</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body p-0">

															<!--
															<table class="table table-hover table-bordered table-responsive">
																<thead>
																	<tr>
																		<th scope="col">No</th>
																		<th scope="col">Date</th>
																		<th scope="col">Description</th>
																		<th scope="col">Ilustration</th>
																		<th scope="col">Status</th>
																	</tr>
																</thead>
															-->
															
																
								
														
																	<!--
																	<tr>
																		<th scope="row"><?php echo $nox; ?></th>
																		<td><?php echo $fdate_modifiedx; ?></td>
																		<td><?php echo $fnotex; ?></td>
																		<td>
																			<img src="./assets/images/<?php echo $fphotox; ?>" width="70"> <br>
																			<center><button class="btn btn-info mt-1" style="font-size: 9px">View</button></center>
																		</td>
																		<td>
																			<button class="btn btn-primary" style="font-size: 9px">On Solving</button>
																			<button class="btn btn-success" style="font-size: 9px">Solved</button>
																		</td>
																	</tr>
																-->
																<div id="tableku"></div>									
														</div>
													</div>
												</div>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<b style="font-size: 9px;">Status checked:</b>
					
				</div>
				
				<div class="row border justify-content-around">
					<div class="col-2 <?php echo $bg_acc; ?> m-1 rounded" style="height: 12px;font-size: 9px;color: white">
						<center>Acc / <?php echo $acc; ?></center>
						<br/>
					</div>
					<div class="col-2  <?php echo $bg_sh; ?> m-1 rounded" style="height: 12px;font-size: 9px;color: white">
						<center>SH / <?php echo $fdate_sh; ?></center>
						<br/>
					</div>
					<div class="col-2 <?php echo $bg_mgr; ?> m-1 rounded" style="height: 12px;font-size: 9px;color: white">
						<center>Mgr / <?php echo $mgr; ?></center>
						<br/>
					</div>
					<div class="col-2 <?php echo $bg_cross; ?> m-1 rounded" style="height: 12px;font-size: 9px;color: white">
						<center>Crs Mgr / <?php echo $cross; ?></center>
						<br/>
					</div>
					<div class="col-2 <?php echo $bg_div; ?> m-1 rounded" style="height: 12px;font-size: 9px;color: white">
						<center>Div / <?php echo $div; ?></center>
						<br/>
					</div>
				</div>
				<!-- <div class="row">
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
						$myXMLData = "<?xml version='1.0' encoding='UTF-8'?>
							<note>
							<to></to>
							<from></from>
							<heading></heading>
							<body>$fnote</body>
							</note>";
						$xml = simplexml_load_string($myXMLData) or die("Error: Cannot create object");
						echo $xml->body;
						?>
					</div>
				</div> -->
				<hr>
			<?php } ?>
		</div>
	</div>


</div>
<!-- /.container-fluid -->


<?php include('includes/footer.php'); ?>



<script>

function mySolving(fid) {
      
    var dataString = "fid="+fid; 	
	//alert(dataString);
	
	var yoi = "oke"+fid;
	
	 $.ajax({
    type: 'POST',
    data: dataString,
    url: 'status_dashboard_pm_os.php',       
    success: function(htmlx) {
      var myStr = htmlx;
      document.getElementById(yoi).innerHTML = "On Solving";
    }
    });
	
	
	
  }	
	

</script>

<script>
function myFunction(fid) {
      
    var dataString = "fid="+fid; 	
	//alert(dataString);
	
	var yoi = "oke"+fid;
	
	 $.ajax({
    type: 'POST',
    data: dataString,
    url: 'status_dashboard_pm.php',       
    success: function(htmlx) {
      var myStr = htmlx;
      document.getElementById(yoi).innerHTML = "Solved";
    }
    });
	
	
	
  }	
	

</script>


 <script>

    function getfid(fidschedule,fnoreg){
    //alert (fidschedule);
    var dataString = "fidschedule="+fidschedule+"&fnoreg="+fnoreg; 
    //alert(dataString);

    $.ajax({
    type: 'POST',
    data: dataString,
    url: 'detail_dashboard_pm.php',       
    success: function(htmlx) {
      var myStr = htmlx;
      document.getElementById('tableku').innerHTML = htmlx;
    }
    });
	
	
	
  }
  
  </script>
  

