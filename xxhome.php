<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname (__FILE__) . "/config/connection.php"; ?>

<?php

    if(empty($_SESSION['fname']))
    {
	echo "<script>window.location='login.php'</script>";
    }
	

?>



<?php
$title = "Dashboard";

$active_dashboard = "active";
$active_4s = "";
$active_stw = "";
$active_pm = "";
$active_om = "";

?>


<?php include('includes/header.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  
   <table width="100%">
   <tr>
   <td>
   <center>
   <a href="dashboard_4s.php" class="btn btn-success" ><i class="fa fa-fw fa-universal-access fa-2x"></i>
    <br><span>4S</span></a>
	</center>
   </td>
   <td>
   <center>
   <a href="dashboard_om.php" class="btn btn-warning" ><i class="fa fa-fw fa-wrench fa-2x"></i>
    <br><span>OM</span></a>
	</center>
   </td>
   <td>
   <center>
   <a href="dashboard_stw.php" class="btn btn-info" ><i class="fa fa-fw fa-list-alt fa-2x"></i>
    <br><span>STW</span></a>
	</center>
   </td>
   <td>
   <center>
   <a href="dashboard_pm.php" class="btn btn-primary" ><i class="fa fa-fw fa-briefcase fa-2x"></i>
    <br><span>PM</span></a>
	</center>
   </td>
   </tr>
   </table>
   
   <br>
   <hr>
   <br>
   
  <center><h1 class="h3 mb-0 text-gray-800">Banner Informasi</h1></center><br>


    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Information</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <marquee style="color:blue; font-size: 30px !important;">Announcement Marquee</marquee>
      </div>
    </div>
  </div> 
  
 
  
   <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div>
              <h6 class="m-0 font-weight-bold text-primary">Top Schedules</h6>
              </div>
              <br>
              <div style="float: right;">
                <!--
                 <input list="assessor" placeholder="Assessor">
                    <datalist id="assessor">
                      <?php
                      $query = mysqli_query($con, "select distinct fname from t_pattern_schedule where fjobas = 'Assessor'");
                        while($query2=mysqli_fetch_array($query))
                        {
                        $fnamex = $query2['fname'];

                        ?>

                      <option value="<?php echo $fnamex; ?>">
                       <?php  } ?>
                    </datalist> 
                  -->

                   
                    Filter : 
                    <select class="js-example-basic-single form-control" id="selectid" onchange="filtering()" >
                    <option value=""></option>
                      <?php
                      $xpilih = $_GET["q"]; 

                      $queryku = mysqli_query($con, "select distinct fworsite from t_pattern_schedule");
                        while($queryku2=mysqli_fetch_array($queryku))
                        {
                          $xworsite = $queryku2['fworsite'];

                          ?>

                      <option value="<?php echo $xworsite; ?>" <?php if($xpilih == $xworsite){ echo "selected"; } ?> ><?php echo $xworsite; ?></option>
                   <?php  } ?>
                    </select>

                    <script>
                    function filtering(){
                      var selectid = document.getElementById("selectid").value;
                      window.location = "home.php?q="+selectid;
                    }
                    </script> 


              </div>
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
                     $xfilter ="";
                     $xfilter = $_GET["q"]; 
                     if($xfilter != ""){
                      $cond = " and fworsite = '$xfilter'";
                     }else{
                      $cond = "";
                     }

                      $queryz = mysqli_query($con, "select fdate, finfo, fname, '4S' as fhave, fworsite, farray_value as valuex from t_schedule_4s where fdate = date(now()) $cond union select fdate, finfo, fname, 'OM' as fhave, fworsite, farray_score as valuex from t_schedule_om where fdate = date(now()) $cond union select fdate, finfo, fname, 'STW' as fhave, fworsite, farray_score as valuex from t_schedule_stw where fdate = date(now()) $cond union select fdate, finfo, fname, 'PM' as fhave, fworsite, farray_score as valuex from t_schedule_pm where fdate = date(now()) $cond");
                        while($queryz2=mysqli_fetch_array($queryz))
                        {
                          $fdate = substr($queryz2['fdate'], 8, 2);
                          $finfo = $queryz2['finfo'];
                          $fname = $queryz2['fname'];
                          $fhave = $queryz2['fhave'];
                          $fworsite = $queryz2['fworsite'];
                          $valuex = $queryz2['valuex'];
                          $fday = substr(date("l", strtotime($queryz2['fdate'])),0,3);

                          if($valuex != '')
                          {
                            $valuex = '<i style="color:green;" class="fa fa-check-square" aria-hidden="true"></i>';
                          }
                          ?>
                    <tr>
                      <td align="center"><strong><?php echo $fdate; ?></strong><br><?php echo $fday; ?></td>
                      <td>
					    <div class="card border-left-success shadow">
						<div class="card-body">
						  <div class="row no-gutters align-items-center">
							<div class="col mr-2">
							  <?php echo $fhave; ?>   <?php echo $finfo; ?><br>
							  <?php echo $fname ?><br/>
                <small><?php echo $fworsite; ?>  </small><br>
                

							</div>
							<div class="col-auto">
							 <!--  <u><a href="">Detail</a></u><br><a href="#" class="btn btn-info btn-sm">Open</a>-->
                <br><?php echo $valuex; ?>
							</div>
						  </div>
						</div>
						</div>
					  </td>
          <?php  }  ?>
                    </tr>
             
                  </tbody>
                </table>
                <!--
				<a href="#" class="btn btn-primary btn-sm" style="width:100%">MORE</a> -->
			</div>
		</div>
	</div>
	
	

	<div class="card shadow mb-4" >
		<div class="card-header py-3" >
        <h6 class="m-0 font-weight-bold text-primary">Line Achievement</h6>
        <br>
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">4S</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">OM</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">STW</a>
      </li>
         <li class="nav-item">
        <a class="nav-link" id="pills-pm-tab" data-toggle="pill" href="#pills-pm" role="tab" aria-controls="pills-contact" aria-selected="false">PM</a>
      </li>
    </ul>
      <div class="card-body" style="padding-bottom:50px">
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
         <div class="chart-area" style="height:500px">
          <canvas id="myBarChart_4S" ></canvas>
       </div>
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
       <div class="chart-area" style="height:500px">
          <canvas id="myBarChart_OM"></canvas>
       </div>
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
       <div class="chart-area" style="height:500px">
          <canvas id="myBarChartstw"></canvas>
       </div>
    </div>
    <div class="tab-pane fade" id="pills-pm" role="tabpanel" aria-labelledby="pills-pm-tab">
       <div class="chart-area" style="height:500px">
          <canvas id="myBarChart_PM"></canvas>
       </div>
    </div>

    </div>		
		</div>		
	</div>
	
	

  

</div>
<!-- /.container-fluid -->

 
<?php include('includes/footer.php'); ?>    

<script>
 $(document).ready(function() {
     $('#worsite').select2({
      placeholder: 'Pilih Provinsi',
      allowClear: true
     });
 });


</script>


<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Bar Chart Example 4S
<?php
$no_4s = 0;
$queryku = mysqli_query($con, "select distinct fworsite from t_pattern_schedule");
while($queryku2=mysqli_fetch_array($queryku))
{
  $xworsite = $queryku2['fworsite'];

  $qkan = mysqli_query($con, "select fscore from t_schedule_4s where fworsite = '$xworsite' and farray_value is not null and finfo = 'Plan and Do'");
  //select count(fid) as jml from t_schedule_4s where fworsite = '$xworsite' and (farray_value is not null or farray_value <> '') and substr(fdate, 1, 7) = substr(now(), 1, 7)
  while($qkan2=mysqli_fetch_array($qkan))
  {
    $hasil_jml = $qkan2['fscore'];
  }

  $array_jml[] = $hasil_jml;
  $array_worsite[] = $xworsite;


  $no_4s++;
}

?>

var ctx = document.getElementById("myBarChart_4S");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php for($i=0;$i<$no_4s;$i++){ echo "'".$array_worsite[$i]."',"; } ?> ],
    datasets: [{
      label: "Quantity",
      backgroundColor: "#4aed93",
      hoverBackgroundColor: "#3fcc7e",
      borderColor: "#4aed93",
      data: [<?php for($i=0;$i<$no_4s;$i++){ echo $array_jml[$i].","; } ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6,
          autoSkip: false,
          maxRotation: 90,
          minRotation: 90

        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          //max: 15000,
          //maxTicksLimit: 5,
          padding: 10,
          
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + tooltipItem.yLabel;
        }
      }
    },
  }
});





// Bar Chart Example OM
<?php
$no_om = 0;
$querykuom = mysqli_query($con, "select distinct fworsite from t_pattern_schedule");
while($querykuom2=mysqli_fetch_array($querykuom))
{
  $xworsiteom = $querykuom2['fworsite'];

  $qkanom = mysqli_query($con, "select fscore from t_schedule_om where fworsite = '$xworsiteom' and farray_score is not null and finfo = 'Plan and Do'");
   //select count(fid) as jml from t_schedule_om where fworsite = '$xworsite' and (farray_value is not null or farray_value <> '') and substr(fdate, 1, 7) = substr(now(), 1, 7)
  while($qkanom2=mysqli_fetch_array($qkanom))
  {
    $hasil_jmlom = $qkanom2['fscore'];
  }

  $array_jmlom[] = $hasil_jmlom;
  $array_worsiteom[] = $xworsiteom;


  $no_om++;
}

?>

var ctx = document.getElementById("myBarChart_OM");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php for($i=0;$i<$no_om;$i++){ echo "'".$array_worsiteom[$i]."',"; } ?> ],
    datasets: [{
      label: "Quantity",
      backgroundColor: "purple",
      hoverBackgroundColor: "#3fcc7e",
      borderColor: "purple",
      data: [<?php for($i=0;$i<$no_om;$i++){ echo $array_jmlom[$i].","; } ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6,
          autoSkip: false,
          maxRotation: 90,
          minRotation: 90
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
        min: 0,
          //max: 15000,
          //maxTicksLimit: 5,
          padding: 10,
          
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + tooltipItem.yLabel;
        }
      }
    },
  }
});



// Bar Chart Example STW
<?php
$no_stw = 0;
$querykustw = mysqli_query($con, "select distinct fworsite from t_pattern_schedule");
while($querykustw2=mysqli_fetch_array($querykustw))
{
  $xworsitestw = $querykustw2['fworsite'];

  $qkanstw = mysqli_query($con, "select fscore from t_schedule_stw where fworsite = '$xworsitestw' and farray_score is not null and finfo = 'Plan and Do'");

  //select count(fid) as jml from t_schedule_stw where fworsite = '$xworsite' and (farray_value is not null or farray_value <> '') and substr(fdate, 1, 7) = substr(now(), 1, 7)
  while($qkanstw2=mysqli_fetch_array($qkanstw))
  {
    $hasil_jmlstw = $qkanstw2['fscore'];
  }

  $array_jmlstw[] = $hasil_jmlstw;
  $array_worsitestw[] = $xworsitestw;


  $no_stw++;
}

?>

var ctx = document.getElementById("myBarChartstw");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php for($i=0;$i<$no_stw;$i++){ echo "'".$array_worsitestw[$i]."',"; } ?> ],
    datasets: [{
      label: "Quantity",
      backgroundColor: "blue",
      hoverBackgroundColor: "#3fcc7e",
      borderColor: "blue",
      data: [<?php for($i=0;$i<$no_stw;$i++){ echo $array_jmlstw[$i].","; } ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6,
          autoSkip: false,
          maxRotation: 90,
          minRotation: 90
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          //max: 15000,
          //maxTicksLimit: 5,
          padding: 10,
          
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + tooltipItem.yLabel;
        }
      }
    },
  }
});



// Bar Chart Example PM
<?php
$no_pm = 0;
$querykupm = mysqli_query($con, "select distinct fworsite from t_pattern_schedule");
while($querykupm2=mysqli_fetch_array($querykupm))
{
  $xworsitepm = $querykupm2['fworsite'];

  $qkanpm = mysqli_query($con, "select count(fid) as jml from t_schedule_pm where fworsite = '$xworsitepm' and farray_score is not null");

  //select count(fid) as jml from t_schedule_pm where fworsite = '$xworsite' and (farray_value is not null or farray_value <> '') and substr(fdate, 1, 7) = substr(now(), 1, 7)
  while($qkanpm2=mysqli_fetch_array($qkanpm))
  {
    $hasil_jmlpm = $qkanpm2['jml'];
  }

  $array_jmlpm[] = $hasil_jmlpm;
  $array_worsitepm[] = $xworsitepm;


  $no_pm++;
}

?>

var ctx = document.getElementById("myBarChart_PM");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [<?php for($i=0;$i<$no_pm;$i++){ echo "'".$array_worsitepm[$i]."',"; } ?> ],
    datasets: [{
      label: "Quantity",
      backgroundColor: "orange",
      hoverBackgroundColor: "#3fcc7e",
      borderColor: "orange",
      data: [<?php for($i=0;$i<$no_pm;$i++){ echo $array_jmlpm[$i].","; } ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6,
          autoSkip: false,
          maxRotation: 90,
          minRotation: 90
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          //max: 15000,
          //maxTicksLimit: 5,
          padding: 10,
          
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': ' + tooltipItem.yLabel;
        }
      }
    },
  }
});




</script>
<!-- 
 <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/ select2.min.js"></script>-->
                    <script>
                      $(document).ready(function() {
                        $('.js-example-basic-single').select2();
                    });
                    </script>