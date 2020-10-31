<?php error_reporting(0); ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php require_once dirname(__FILE__) . "/config/connection.php"; 




?>



<?php

if (empty($_SESSION['fname'])) {
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

$regnox = $_SESSION['fnoreg'];
?>
<style>
  .card-menu {
    text-decoration: none;
    background-color: transparent !important;
    border: 0px none !important;
  }

  .active-hover:active {
    background-color: #3df7a0 !important;
    color: black
  }

  .card-header {
    background-color: white !important;
    color: black
  }

  h6 {
    color: black
  }

  .nav-item a {
    color: black
  }

  @media only screen and (min-width: 670px) {
    .menu {
      height: 70px;
    }
  }

  .nav-pills .nav-link.active,
  .nav-pills .show>.nav-link {
    background-color: #12e598 !important;
    color: black !important
  }

  .fa-check-square:before {
    color: green
  }

  #pills-tabContent {
    padding: 0px !important
  }
</style>


<?php include('includes/header.php');

	//
	use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// Include librari phpmailer
include('assets/phpmailer/Exception.php');
include('assets/phpmailer/PHPMailer.php');
include('assets/phpmailer/SMTP.php');
//}



//
$noflag = 1;
$querykustw = mysqli_query($con, "select t_schedule_4s.fid, '4S' as fhave, t_schedule_4s.fline, t_schedule_4s.flag_email, t_schedule_4s.fnoreg, t_users.femail, t_users.fname from t_schedule_4s join t_users on t_schedule_4s.fnoreg = t_users.fnoreg  where t_schedule_4s.fdate = SUBSTR(NOW(), 1, 10) union select t_schedule_om.fid, 'OM' as fhave, t_schedule_om.fline, t_schedule_om.flag_email, t_schedule_om.fnoreg, t_users.femail, t_users.fname from t_schedule_om join t_users on t_schedule_om.fnoreg = t_users.fnoreg  where t_schedule_om.fdate = SUBSTR(NOW(), 1, 10) union select t_schedule_stw.fid, 'STW' as fhave, t_schedule_stw.fline, t_schedule_stw.flag_email, t_schedule_stw.fnoreg, t_users.femail, t_users.fname from t_schedule_stw join t_users on t_schedule_stw.fnoreg = t_users.fnoreg  where t_schedule_stw.fdate = SUBSTR(NOW(), 1, 10) union select t_schedule_pm.fid, 'PM' as fhave, t_schedule_pm.fline, t_schedule_pm.flag_email, t_schedule_pm.fnoreg, t_users.femail, t_users.fname from t_schedule_pm join t_users on t_schedule_pm.fnoreg = t_users.fnoreg  where t_schedule_pm.fdate = SUBSTR(NOW(), 1, 10)");
  while ($querykustw2 = mysqli_fetch_array($querykustw)) {
	$fid = $querykustw2['fid']; 
	$fname = $querykustw2['fname'];  
    $femail = $querykustw2['femail'];
	$flag_email = $querykustw2['flag_email'];
	$fhave = $querykustw2['fhave'];
	$fline = $querykustw2['fline'];
	
	if($flag_email != '1'){
	


	$emailBody = 
	"Dear ".$fname.",
	
	Pemberitahuan hari ini adalah jadwal Audit 3 Pillar System.
	
	LINE           : ".$fline."
	PILLAR         : ".$fhave."
	
	Mohon untuk klik link dibawah ini:
	
	http://smartandonp3.com/assessor_system/ 
	
	Terima kasih atas kerjasamanya.
	
	
	Regards,
	Admin 3 Pillars";
	

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'no.reply.the.mail.check@gmail.com'; // Email Pengirim
    $mail->Password = 'noreply123'; // Isikan dengan Password email pengirim
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging
    $mail->setFrom('no.reply.the.mail.check@gmail.com', 'Mailer');
    $mail->addAddress($femail, '');
    //$mail->isHTML(true); // Aktifkan jika isi emailnya berupa html
    // Load file content.php
   
    $mail->Subject = 'Email Reminder - 3 Pillars System';
    $mail->Body = $emailBody;
    $mail->AddEmbeddedImage('img/logo.png', 'logo.png'); // Aktifkan jika ingin menampilkan gambar dalam email
    if(empty($cv)){ // Jika tanpa attachment
        $send = $mail->send();
        if($send){ // Jika Email berhasil dikirim
            echo "<h1>Email berhasil dikirim tanpa lampiran</h1><br /><a href='index.php'>Kembali ke Form</a>";
        }else{ // Jika Email gagal dikirim
            echo "<h1>Email gagal dikirim tanpa lampiran</h1><br /><a href='index.php'>Kembali ke Form</a>";
            // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
        }
    }

	//
		
	$noflag++;
	
	}else{
		
	echo "";
	
	}
	mysqli_query($con, "update t_schedule_4s set flag_email = '1' where fid = '$fid'");
	mysqli_query($con, "update t_schedule_om set flag_email = '1' where fid = '$fid'");
	mysqli_query($con, "update t_schedule_stw set flag_email = '1' where fid = '$fid'");
	mysqli_query($con, "update t_schedule_pm set flag_email = '1' where fid = '$fid'");

	
  }



?>

<!-- Begin Page Content -->
<div class="container-fluid p-1">
  <!-- MENU -->
  <div class="card shadow">
    <div class="card-header">
      <h6 class="m-0 font-weight-bold text-dark">Menu <?php echo $noflag;?></h6>
    </div>
    <div class="card-body p-1">
      <div class="d-flex justify-content-between row">
        <div class="col-3">
          <div class="card card-menu active-hover shadow-none" onclick="routes('dashboard_4s.php')">
            <div class="d-flex justify-content-center card-body p-0">
              <img src="./images/4s_menu_2.gif" alt="menu4s" class="menu" width="100%" height="40">
            </div>
            <div class="d-flex justify-content-center card-header p-0 active-hover">
              4S
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card card-menu active-hover shadow-none" onclick="routes('dashboard_om.php')">
            <div class="d-flex justify-content-center card-body p-0">
              <img src="./images/om_menu_gif.jpg" alt="menu4s" class="menu" width="100%" height="40">
            </div>
            <div class="d-flex justify-content-center card-header p-0 active-hover">
              OM
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card card-menu active-hover shadow-none" onclick="routes('dashboard_stw.php')">
            <div class="d-flex justify-content-center card-body p-0">
              <img src="./images/stw_menu.gif" alt="menu4s" class="menu" width="100%" height="40">
            </div>
            <div class="d-flex justify-content-center card-header p-0 active-hover">
              STW
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card card-menu active-hover shadow-none" onclick="routes('dashboard_pm.php')">
            <div class="d-flex justify-content-center card-body p-0">
              <img src="./images/point_mgmt.gif" alt="menu4s" class="menu" width="100%" height="40">
            </div>
            <div class="d-flex justify-content-center card-header p-0 active-hover">
              PM
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="card shadow mb-4 mt-3">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-dark">Information</h6>
    </div>
    <div class="card-body p-1">
      <div class="table-responsive">
        <marquee class="text-danger" style=" font-size: 22px !important;">Let's We sustain 3 Pillars Activity Thru Digitalization Systems</marquee>
      </div>
    </div>
  </div>
  <?php
  if ($regnox != 'admin') {
    echo '';
  } else {
  ?>



    <div class="card shadow mb-4 mt-3">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-dark">Calender </h6>
        <div style="float: right; padding-right: 10px;">
          <p>Confirmed <input type="text" style="width: 100px; background-color: green; border:1px solid white; border-radius: 5px;" />
            Not Confirmed <input type="text" style="width: 100px; background-color: grey; border:1px solid white; border-radius: 5px;" /></p>
        </div>
      </div>


      <div class="card-body p-1">




        <!--Section: -->
        <section id="event-tooltip">


          <!--Section: Live preview-->
          <section>

            <div class="row">
              <div class="col-md-12">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#c-4s" role="tab" aria-controls="pills-home" aria-selected="true">4S</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#c-om" role="tab" aria-controls="pills-profile" aria-selected="false">OM</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#c-stw" role="tab" aria-controls="pills-contact" aria-selected="false">STW</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-pm-tab" data-toggle="pill" href="#c-pm" role="tab" aria-controls="pills-contact" aria-selected="false">PM</a>
                  </li>
                </ul>





                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="c-4s" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div id="calendar-3" style="font-size:9px !important;"></div>
                  </div>
                  <div class="tab-pane fade" id="c-om" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div id="calendar-4" style="font-size:9px !important;"></div>
                  </div>
                  <div class="tab-pane fade" id="c-stw" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <div id="calendar-5" style="font-size:9px !important;"></div>
                  </div>
                  <div class="tab-pane fade" id="c-pm" role="tabpanel" aria-labelledby="pills-pm-tab">
                    <div id="calendar-6" style="font-size:9px !important;"></div>
                  </div>

                </div>




              </div>
            </div>

          </section>
          <!--Section: Live preview-->



        </section>
        <!--/Section: examples-->




      </div>
    </div>

  <?php } ?>

  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div>
        <h6 class="m-0 font-weight-bold text-dark">Top Schedules</h6>
      </div>
      <br>
      <div>
        <!--
                 <input list="assessor" placeholder="Assessor">
                    <datalist id="assessor">
                      <?php
                      $query = mysqli_query($con, "select distinct fname from t_pattern_schedule where fjobas = 'Assessor'");
                      while ($query2 = mysqli_fetch_array($query)) {
                        $fnamex = $query2['fname'];

                      ?>

                      <option value="<?php echo $fnamex; ?>">
                       <?php  } ?>
                    </datalist> 
                  -->


        Filter :
        <select class="js-example-basic-single form-control" id="selectid" onchange="filtering()">
          <option value=""></option>
          <?php
          $xpilih = $_GET["q"];

          $queryku = mysqli_query($con, "select distinct fworsite from t_pattern_schedule");
          while ($queryku2 = mysqli_fetch_array($queryku)) {
            $xworsite = $queryku2['fworsite'];

          ?>

            <option value="<?php echo $xworsite; ?>" <?php if ($xpilih == $xworsite) {
                                                        echo "selected";
                                                      } ?>><?php echo $xworsite; ?></option>
          <?php  } ?>
        </select>

        <script>
          function filtering() {
            var selectid = document.getElementById("selectid").value;
            window.location = "home.php?q=" + selectid;
          }
        </script>


      </div>
    </div>
    <div class="card-body p-1">
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
            $xfilter = "";
            $xfilter = $_GET["q"];
            if ($xfilter != "") {
              $cond = " and fworsite = '$xfilter'";
            } else {
              $cond = "";
            }

            $queryz = mysqli_query($con, "select fdate, finfo, fname, '4S' as fhave, fworsite, farray_value as valuex from t_schedule_4s where fdate = date(now()) $cond union select fdate, finfo, fname, 'OM' as fhave, fworsite, farray_score as valuex from t_schedule_om where fdate = date(now()) $cond union select fdate, finfo, fname, 'STW' as fhave, fworsite, farray_score as valuex from t_schedule_stw where fdate = date(now()) $cond union select fdate, finfo, fname, 'PM' as fhave, fworsite, farray_score as valuex from t_schedule_pm where fdate = date(now()) $cond");
            while ($queryz2 = mysqli_fetch_array($queryz)) {
              $fdate = substr($queryz2['fdate'], 8, 2);
              $finfo = $queryz2['finfo'];
              $fname = $queryz2['fname'];
              $fhave = $queryz2['fhave'];
              $fworsite = $queryz2['fworsite'];
              $valuex = $queryz2['valuex'];
              $fday = substr(date("l", strtotime($queryz2['fdate'])), 0, 3);

              if ($valuex != '') {
                $valuex = '<i style="color:green;" class="fa fa-check-square" aria-hidden="true"></i>';
              } else {
                $valuex = '<i style="color:red;" class="fa fa-times-circle" aria-hidden="true"></i>';
              }
            ?>
              <tr style="font-size: 12px">
                <td align="center"><strong><?php echo $fdate; ?></strong><br><?php echo $fday; ?></td>
                <td>
                  <div class="card border-left-success shadow">
                    <div class="card-body p-1">
                      <div class="row no-gutters align-items-center">
                        <div class="col m-0">
                          <?php echo $fhave; ?> <?php echo $finfo; ?><br>
                          <?php echo $fname ?><br />
                          <small><?php echo $fworsite; ?> </small><br>
                        </div>
                        <div class="col-auto">
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
      </div>
    </div>
  </div>



  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="font-weight-bold text-dark mb-0">Line Achievement</h6>
      <br>
      <ul class="nav nav-pills" id="pills-tab" role="tablist">
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
    </div>
    <div class="card-body p-0" style="padding-bottom:50px">
      <div class="tab-content p-0" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="chart-area" style="height:300px">
            <canvas id="myBarChart_4S"></canvas>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="chart-area" style="height:300px">
            <canvas id="myBarChart_OM"></canvas>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
          <div class="chart-area" style="height:300px">
            <canvas id="myBarChartstw"></canvas>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-pm" role="tabpanel" aria-labelledby="pills-pm-tab">
          <div class="chart-area" style="height:300px">
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
  Chart.defaults.global.defaultFontColor = 'grey';

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
  while ($queryku2 = mysqli_fetch_array($queryku)) {
    $xworsite = $queryku2['fworsite'];

    $hasil_jml = "";
    $qkan = mysqli_query($con, "select fscore from t_schedule_4s where fworsite = '$xworsite' and farray_value is not null and finfo = 'Plan and Do'");
    while ($qkan2 = mysqli_fetch_array($qkan)) {
      $hasil_jml = $qkan2['fscore'];
    }

    $array_jml[] = $hasil_jml;
    $array_worsite[] = $xworsite;


    $no_4s++;
  }

  ?>
  let targets = [90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90, 90]

  var ctx = document.getElementById("myBarChart_4S");
  var myBarChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: [<?php for ($i = 0; $i < $no_4s; $i++) {
                  echo "'" . $array_worsite[$i] . "',";
                } ?>],
      datasets: [{
        label: "Target",
        type: "line",
        fill: false,
        backgroundColor: "yellow",
        hoverBackgroundColor: "red",
        borderColor: "#4aed93",
        data: targets,
      }, {
        label: "Points",
        backgroundColor: "#4aed93",
        hoverBackgroundColor: "#3fcc7e",
        borderColor: "#4aed93",
        data: [<?php for ($i = 0; $i < $no_4s; $i++) {
                  echo $array_jml[$i] . ",";
                } ?>],
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
            minRotation: 90,
            fontSize: 9
          },
          maxBarThickness: 25,

        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: 100,
            fontSize: 9,
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
  while ($querykuom2 = mysqli_fetch_array($querykuom)) {
    $xworsiteom = $querykuom2['fworsite'];

    $hasil_jmlom = "";
    $qkanom = mysqli_query($con, "select fscore from t_schedule_om where fworsite = '$xworsiteom' and farray_score is not null and finfo = 'Plan and Do'");
    while ($qkanom2 = mysqli_fetch_array($qkanom)) {
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
      labels: [<?php for ($i = 0; $i < $no_om; $i++) {
                  echo "'" . $array_worsiteom[$i] . "',";
                } ?>],
      datasets: [{
        label: "Target",
        type: "line",
        fill: false,
        backgroundColor: "yellow",
        hoverBackgroundColor: "red",
        borderColor: "#4aed93",
        data: targets,
      }, {
        label: "Points",
        backgroundColor: "purple",
        hoverBackgroundColor: "#3fcc7e",
        borderColor: "purple",
        data: [<?php for ($i = 0; $i < $no_om; $i++) {
                  echo $array_jmlom[$i] . ",";
                } ?>],
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
            minRotation: 90,
            fontSize: 9
          },
          maxBarThickness: 25,
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: 100,
            fontSize: 9,
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
  while ($querykustw2 = mysqli_fetch_array($querykustw)) {
    $xworsitestw = $querykustw2['fworsite'];
    $hasil_jmlstw = "";

    $qkanstw = mysqli_query($con, "select fscore from t_schedule_stw where fworsite = '$xworsitestw' and farray_score is not null and finfo = 'Plan and Do'");

    while ($qkanstw2 = mysqli_fetch_array($qkanstw)) {
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
      labels: [<?php for ($i = 0; $i < $no_stw; $i++) {
                  echo "'" . $array_worsitestw[$i] . "',";
                } ?>],
      datasets: [{
        label: "Target",
        type: "line",
        fill: false,
        backgroundColor: "yellow",
        hoverBackgroundColor: "red",
        borderColor: "#4aed93",
        data: targets,
      }, {
        label: "Points",
        backgroundColor: "blue",
        hoverBackgroundColor: "#3fcc7e",
        borderColor: "blue",
        data: [<?php for ($i = 0; $i < $no_stw; $i++) {
                  echo $array_jmlstw[$i] . ",";
                } ?>],
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
            minRotation: 90,
            fontSize: 9
          },
          maxBarThickness: 25,
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: 100,
            padding: 10,
            fontSize: 9
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



  <?php
  $no_pm = 0;
  $querykupm = mysqli_query($con, "select distinct fworsite from t_pattern_schedule");
  while ($querykupm2 = mysqli_fetch_array($querykupm)) {
    $xworsitepm = $querykupm2['fworsite'];

    $hasil_jmlpm = "";

    $qkanpm = mysqli_query($con, "select fscore from t_schedule_pm where fworsite = '$xworsitepm' and farray_score is not null and finfo = 'Plan and Do'");

    //select count(fid) as jml from t_schedule_pm where fworsite = '$xworsite' and (farray_value is not null or farray_value <> '') and substr(fdate, 1, 7) = substr(now(), 1, 7)
    while ($qkanpm2 = mysqli_fetch_array($qkanpm)) {
      $hasil_jmlpm = $qkanpm2['fscore'];
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
      labels: [<?php for ($i = 0; $i < $no_pm; $i++) {
                  echo "'" . $array_worsitepm[$i] . "',";
                } ?>],
      datasets: [{
        label: "Target",
        type: "line",
        fill: false,
        backgroundColor: "yellow",
        hoverBackgroundColor: "red",
        borderColor: "#4aed93",
        data: targets,
      }, {
        label: "Points",
        backgroundColor: "orange",
        hoverBackgroundColor: "#3fcc7e",
        borderColor: "orange",
        data: [<?php for ($i = 0; $i < $no_pm; $i++) {
                  echo $array_jmlpm[$i] . ",";
                } ?>],
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
            minRotation: 90,
            fontSize: 9
          },
          maxBarThickness: 25,
        }],
        yAxes: [{
          ticks: {
            min: 0,
            max: 100,
            fontSize: 9,
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
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>
<script>
  (function($) {

    $(document).ready(function() {
      if (document.cookie.indexOf("gdpr_mandatory=") == -1) {
        $('#gdpr_basic').modal({
          backdrop: false
        });
      }
    });

    $('#gdpr_btn_full_agree').click(function(e) {
      e.preventDefault();
      var date = new Date();
      date = new Date(date.getTime() + 1000 * 60 * 60 * 24 * 365);
      document.cookie = "gdpr_mandatory=1; expires=" + date.toGMTString() + "; path=/";
      document.cookie = "gdpr_functional=1; expires=" + date.toGMTString() + "; path=/";
      document.cookie = "gdpr_ga=1; expires=" + date.toGMTString() + "; path=/";
      document.cookie = "gdpr_fbp=1; expires=" + date.toGMTString() + "; path=/";
      $('#gdpr_basic').modal('hide');
    });

    $('#gdpr_btn_adjust').click(function(e) {
      e.preventDefault();
      $('#gdpr_basic').modal('hide');
      $('#gdpr_adjust').modal();
    });

    $('#gdpr_btn_save').click(function(e) {
      e.preventDefault();
      $('#gdpr_adjust_form').submit();
    });

    $('#gdpr_adjust_form').on('submit', function(e) {
      e.preventDefault();

      $(this).find('input[type="checkbox"]')
        .each(function(e) {
          var fieldName = $(this).attr('name');
          var fieldValue = $(this).is(':checked') ? 1 : 0;
          var date = new Date();
          date = new Date(date.getTime() + 1000 * 60 * 60 * 24 * 365);
          document.cookie = fieldName + "=" + fieldValue + "; expires=" + date.toGMTString() + "; path=/;";
        })

      toastr["info"]("Saved");
      $('#gdpr_adjust').modal('hide');

    });
  })(jQuery);
</script>

<div class="xlwcty_header_passed" style="display: none;"></div>

<script type="text/javascript">
  $(document).ready(function() {

    var type = window.location.hash.substr(1);
    if (type === "docsTabsAPI") {
      if ($("#docsTabsAPI").length) {
        $('[href="#docsTabsAPI"]').tab('show');
      }
      $('html, body').animate({
        scrollTop: 0
      }, 'slow');
    } else if (type === "docsTabsOverview") {

      $('html, body').animate({
        scrollTop: 0
      }, 'slow');
    }

    var hash = window.location.hash;
    hash && $('ul.nav a[href="' + hash + '"]').tab('show');

    $('.nav-mtd a').not('#docs-tab-examples').click(function(e) {

      var scrollurl = $('body').scrollTop() || $('html').scrollTop();

      window.location.hash = this.hash;
      $('html, body').scrollTop(scrollurl);
    });

  })
</script>
<script src="assets/calender/moment.js"></script>
<script src="assets/calender/fullcalendar.js"></script>



<script>
  $(function() {
    $('#calendar-3').fullCalendar({
      defaultView: 'month',
      defaultDate: '<?php echo date('Y-m-d'); ?>',

      eventRender: function(eventObj, $el) {
        $el.popover({
          title: eventObj.title,
          content: eventObj.description,
          trigger: 'hover',
          placement: 'top',
          container: 'body'
        });
      },

      events: [

        <?php
        $queryku = mysqli_query($con, "select finfo, fname, fdate, fworsite, farray_value from t_schedule_4s");
        while ($queryku2 = mysqli_fetch_array($queryku)) {
          $finfo = $queryku2['finfo'];
          $fname = $queryku2['fname'];
          $fdate = $queryku2['fdate'];
          $fworsite = $queryku2['fworsite'];
          $farray_value = $queryku2['farray_value'];

          if ($finfo == 'Plan and Do') {
            $finfox = 'P&D';
          } elseif ($finfo == 'Check and Action') {
            $finfox = 'C&A';
          } elseif ($finfo == 'Check Board and Report') {
            $finfox = 'CB&R';
          }


          if ($fworsite == 'RNR Cylinder Block Line') {
            $fworsitex = 'RCBL';
          } elseif ($fworsite == 'RNR Cylinder Head Line') {
            $fworsitex = 'RCHL';
          } elseif ($fworsite == 'RNR Crank Shaft Line') {
            $fworsitex = 'RCSL';
          } elseif ($fworsite == 'RNR Cam Shaft Line') {
            $fworsitex = 'RCMSL';
          } elseif ($fworsite == 'RNR Main Assembling Line') {
            $fworsitex = 'RMAL';
          } elseif ($fworsite == 'RNR Sub Assembly Line') {
            $fworsitex = 'RSL';
          } elseif ($fworsite == 'Casting LP Cylinder Head') {
            $fworsitex = 'CLCH';
          } elseif ($fworsite == 'Die Casting Cylinder Block') {
            $fworsitex = 'DCCB';
          } elseif ($fworsite == 'Die Maintenance') {
            $fworsitex = 'DM';
          } elseif ($fworsite == 'RNR Quality Control') {
            $fworsitex = 'RQC';
          } elseif ($fworsite == 'RNR Tool Regrinding') {
            $fworsitex = 'RTL';
          } elseif ($fworsite == 'RNR Logistic') {
            $fworsitex = 'RL';
          } elseif ($fworsite == 'RNR Engine Maintenance') {
            $fworsitex = 'REM';
          } elseif ($fworsite == 'RNR Test Bench') {
            $fworsitex = 'RTB';
          }


          if ($farray_value != '') {
            $farray_value = 'OK';
            $colorx = "green";
          } else {
            $farray_value = "";
            $colorx = "gray";
          }



          $test = $fname . "/" . $fworsitex . "/" . $farray_value;


          $test1 = "Nama : " . $fname . " / Info : " . $finfo . " / Worsite : " . $fworsite . " / Status : " . $farray_value;
        ?> {
            title: '<?php echo $test; ?>',
            description: '<?php echo $test1; ?>',
            start: '<?php echo $fdate; ?>',
            color: '<?php echo $colorx; ?>'
          },

        <?php } ?>

      ]
    });
  });
</script>
<script>
  $(function() {
    $('#calendar-4').fullCalendar({
      defaultView: 'month',
      defaultDate: '<?php echo date('Y-m-d'); ?>',

      eventRender: function(eventObj, $el) {
        $el.popover({
          title: eventObj.title,
          content: eventObj.description,
          trigger: 'hover',
          placement: 'top',
          container: 'body'
        });
      },

      events: [

        <?php
        $queryku = mysqli_query($con, "select finfo, fname, fdate, fworsite, farray_score from t_schedule_om");
        while ($queryku2 = mysqli_fetch_array($queryku)) {
          $finfo = $queryku2['finfo'];
          $fname = $queryku2['fname'];
          $fdate = $queryku2['fdate'];
          $fworsite = $queryku2['fworsite'];
          $farray_score = $queryku2['farray_score'];


          if ($fworsite == 'RNR Cylinder Block Line') {
            $fworsitex = 'RCBL';
          } elseif ($fworsite == 'RNR Cylinder Head Line') {
            $fworsitex = 'RCHL';
          } elseif ($fworsite == 'RNR Crank Shaft Line') {
            $fworsitex = 'RCSL';
          } elseif ($fworsite == 'RNR Cam Shaft Line') {
            $fworsitex = 'RCMSL';
          } elseif ($fworsite == 'RNR Main Assembling Line') {
            $fworsitex = 'RMAL';
          } elseif ($fworsite == 'RNR Sub Assembly Line') {
            $fworsitex = 'RSL';
          } elseif ($fworsite == 'Casting LP Cylinder Head') {
            $fworsitex = 'CLCH';
          } elseif ($fworsite == 'Die Casting Cylinder Block') {
            $fworsitex = 'DCCB';
          } elseif ($fworsite == 'Die Maintenance') {
            $fworsitex = 'DM';
          } elseif ($fworsite == 'RNR Quality Control') {
            $fworsitex = 'RQC';
          } elseif ($fworsite == 'RNR Tool Regrinding') {
            $fworsitex = 'RTL';
          } elseif ($fworsite == 'RNR Logistic') {
            $fworsitex = 'RL';
          } elseif ($fworsite == 'RNR Engine Maintenance') {
            $fworsitex = 'REM';
          } elseif ($fworsite == 'RNR Test Bench') {
            $fworsitex = 'RTB';
          }


          if ($farray_score != '') {
            $farray_score = 'OK';
            $colorx = "green";
          } else {
            $farray_score = "";
            $colorx = "gray";
          }



          $test = $fname . "/" . $fworsitex . "/" . $farray_score;


          $test1 = "Nama : " . $fname . " / Info : " . $finfo . " / Worsite : " . $fworsite . " / Status : " . $farray_score;
        ?> {
            title: '<?php echo $test; ?>',
            description: '<?php echo $test1; ?>',
            start: '<?php echo $fdate; ?>',
            color: '<?php echo $colorx; ?>'
          },
        <?php } ?>

      ]
    });
  });
</script>
<script>
  $(function() {
    $('#calendar-5').fullCalendar({
      defaultView: 'month',
      defaultDate: '<?php echo date('Y-m-d'); ?>',

      eventRender: function(eventObj, $el) {
        $el.popover({
          title: eventObj.title,
          content: eventObj.description,
          trigger: 'hover',
          placement: 'top',
          container: 'body'
        });
      },

      events: [

        <?php
        $queryku = mysqli_query($con, "select finfo, fname, fdate, fworsite, farray_score from t_schedule_stw");
        while ($queryku2 = mysqli_fetch_array($queryku)) {
          $finfo = $queryku2['finfo'];
          $fname = $queryku2['fname'];
          $fdate = $queryku2['fdate'];
          $fworsite = $queryku2['fworsite'];
          $farray_score = $queryku2['farray_score'];

          if ($finfo == 'Plan and Do') {
            $finfox = 'P&D';
          } elseif ($finfo == 'Check and Action') {
            $finfox = 'C&A';
          } elseif ($finfo == 'Check Board and Report') {
            $finfox = 'CB&R';
          }



          if ($fworsite == 'RNR Cylinder Block Line') {
            $fworsitex = 'RCBL';
          } elseif ($fworsite == 'RNR Cylinder Head Line') {
            $fworsitex = 'RCHL';
          } elseif ($fworsite == 'RNR Crank Shaft Line') {
            $fworsitex = 'RCSL';
          } elseif ($fworsite == 'RNR Cam Shaft Line') {
            $fworsitex = 'RCMSL';
          } elseif ($fworsite == 'RNR Main Assembling Line') {
            $fworsitex = 'RMAL';
          } elseif ($fworsite == 'RNR Sub Assembly Line') {
            $fworsitex = 'RSL';
          } elseif ($fworsite == 'Casting LP Cylinder Head') {
            $fworsitex = 'CLCH';
          } elseif ($fworsite == 'Die Casting Cylinder Block') {
            $fworsitex = 'DCCB';
          } elseif ($fworsite == 'Die Maintenance') {
            $fworsitex = 'DM';
          } elseif ($fworsite == 'RNR Quality Control') {
            $fworsitex = 'RQC';
          } elseif ($fworsite == 'RNR Tool Regrinding') {
            $fworsitex = 'RTL';
          } elseif ($fworsite == 'RNR Logistic') {
            $fworsitex = 'RL';
          } elseif ($fworsite == 'RNR Engine Maintenance') {
            $fworsitex = 'REM';
          } elseif ($fworsite == 'RNR Test Bench') {
            $fworsitex = 'RTB';
          }


          if ($farray_score != '') {
            $farray_score = 'OK';
            $colorx = "green";
          } else {
            $farray_score = "";
            $colorx = "gray";
          }



          $test = $fname . "/" . $fworsitex . "/" . $farray_score;


          $test1 = "Nama : " . $fname . " / Info : " . $finfo . " / Worsite : " . $fworsite . " / Status : " . $farray_score;
        ?> {
            title: '<?php echo $test; ?>',
            description: '<?php echo $test1; ?>',
            start: '<?php echo $fdate; ?>',
            color: '<?php echo $colorx; ?>'
          },

        <?php } ?>

      ]
    });
  });
</script>

<script>
  $(function() {
    $('#calendar-6').fullCalendar({
      defaultView: 'month',
      defaultDate: '<?php echo date('Y-m-d'); ?>',

      eventRender: function(eventObj, $el) {
        $el.popover({
          title: eventObj.title,
          content: eventObj.description,
          trigger: 'hover',
          placement: 'top',
          container: 'body'
        });
      },

      events: [

        <?php
        $queryku = mysqli_query($con, "select finfo, fname, fdate, fworsite, farray_score from t_schedule_pm");
        while ($queryku2 = mysqli_fetch_array($queryku)) {
          $finfo = $queryku2['finfo'];
          $fname = $queryku2['fname'];
          $fdate = $queryku2['fdate'];
          $fworsite = $queryku2['fworsite'];
          $farray_score = $queryku2['farray_score'];

          if ($finfo == 'Plan and Do') {
            $finfox = 'P&D';
          } elseif ($finfo == 'Check and Action') {
            $finfox = 'C&A';
          } elseif ($finfo == 'Check Board and Report') {
            $finfox = 'CB&R';
          }


          if ($fworsite == 'RNR Cylinder Block Line') {
            $fworsitex = 'RCBL';
          } elseif ($fworsite == 'RNR Cylinder Head Line') {
            $fworsitex = 'RCHL';
          } elseif ($fworsite == 'RNR Crank Shaft Line') {
            $fworsitex = 'RCSL';
          } elseif ($fworsite == 'RNR Cam Shaft Line') {
            $fworsitex = 'RCMSL';
          } elseif ($fworsite == 'RNR Main Assembling Line') {
            $fworsitex = 'RMAL';
          } elseif ($fworsite == 'RNR Sub Assembly Line') {
            $fworsitex = 'RSL';
          } elseif ($fworsite == 'Casting LP Cylinder Head') {
            $fworsitex = 'CLCH';
          } elseif ($fworsite == 'Die Casting Cylinder Block') {
            $fworsitex = 'DCCB';
          } elseif ($fworsite == 'Die Maintenance') {
            $fworsitex = 'DM';
          } elseif ($fworsite == 'RNR Quality Control') {
            $fworsitex = 'RQC';
          } elseif ($fworsite == 'RNR Tool Regrinding') {
            $fworsitex = 'RTL';
          } elseif ($fworsite == 'RNR Logistic') {
            $fworsitex = 'RL';
          } elseif ($fworsite == 'RNR Engine Maintenance') {
            $fworsitex = 'REM';
          } elseif ($fworsite == 'RNR Test Bench') {
            $fworsitex = 'RTB';
          }


          if ($farray_score != '') {
            $farray_score = 'OK';
            $colorx = "green";
          } else {
            $farray_score = "";
            $colorx = "gray";
          }



          $test = $fname . "/" . $fworsitex . "/" . $farray_score;


          $test1 = "Nama : " . $fname . " / Info : " . $finfo . " / Worsite : " . $fworsite . " / Status : " . $farray_score;
        ?> {
            title: '<?php echo $test; ?>',
            description: '<?php echo $test1; ?>',
            start: '<?php echo $fdate; ?>',
            color: '<?php echo $colorx; ?>'
          },

        <?php } ?>

      ]
    });
  });

  function routes(page) {
    window.location.href = page
  }
</script>