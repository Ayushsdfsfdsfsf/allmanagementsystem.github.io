<?php
SESSION_START();
error_reporting(0);
if(!isset($_SESSION['accountant'])){
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?php echo $_SESSION['school_name']; ?> - Dashboard</title>
<link rel="stylesheet" href="assets/css/app.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/components.css">
<link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
<link rel="stylesheet" href="assets/bundles/flag-icon-css/css/flag-icon.min.css">
<link rel='shortcut icon' type='image/x-icon' href=<?php echo "'../admin/" . $_SESSION['school_logo']."'"; ?>/>
</head>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <?php include("header.php"); ?>
      <div class="main-content">
        <section class="section">
          <div class="section-header">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
								<div class="section-header-breadcrumb-content">
									<h1>Dashboard</h1>
								</div>
							</div>
						</div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card card-sales-widget card-bg-yellow-gradient">
                <div class="card-icon shadow-primary bg-green">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap pull-right">
                  <div class="card-header">
                    <?php
                    $total = 0;
                    include ("conn.php");
                    $duration = date('Y-m');
                    $month = $duration[5].$duration[6];
                    $year = $duration[0].$duration[1].$duration[2].$duration[3];
                    $q = "SELECT * FROM expenses WHERE month='$month' AND year='$year'";
                    $r =mysqli_query($conn,$q);
                    $ro = mysqli_fetch_array($r);
                    if(isset($ro[0])){
                      $total = $ro[1] + $ro[2] + $ro[3] + 
                      $ro[4] + $ro[5] + $ro[6] + 
                      $ro[7] + $ro[8] + $ro[9] + 
                      $ro[10];
                    }
                    echo '<h3>'.$total.'</h3>';
                    ?>
                    <h4>Current Month Expenses</h4>
                  </div>
                </div>
                <div class="card-chart">
                  <div id="chart-2"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card card-sales-widget card-bg-orange-gradient">
                <div class="card-icon shadow-primary bg-green">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap pull-right">
                  <div class="card-header">
                    <?php
                    $total = 0;
                    include ("conn.php");
                    $month = date('m-Y');
                    $q1 = "SELECT * FROM monthly_salary WHERE month='$month'";
                    $r1 =mysqli_query($conn,$q1);
                    while($ro1 = mysqli_fetch_array($r1)){
                      $total = $ro1[3];
                    }
                    echo '<h3>'.$total.'</h3>';
                    ?>
                    <h4>Salaries Payed</h4>
                  </div>
                </div>
                <div class="card-chart">
                  <div id="chart-3"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card card-sales-widget card-bg-green-gradient">
                <div class="card-icon shadow-primary bg-green">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap pull-right">
                  <div class="card-header">
                    <?php
                    $total = 0;
                    include ("conn.php");
                    $month = date('m-Y');
                    $q1 = "SELECT * FROM monthly_fees WHERE month='$month'";
                    $r1 =mysqli_query($conn,$q1);
                    while($ro1 = mysqli_fetch_array($r1)){
                      $total = $ro1[3];
                    }
                    echo '<h3>' . $total . '</h3>';
                    ?>
                    <h4>Fees Collected</h4>
                  </div>
                </div>
                <div class="card-chart">
                  <div id="chart-4"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
	  </div>
    </div>
  </div>
<script src="assets/js/app.min.js"></script>
<script src="assets/bundles/echart/echarts.js"></script>
<script src="assets/bundles/chartjs/chart.min.js"></script>
<script src="assets/bundles/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/page/index.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/bundles/jquery.sparkline.min.js"></script>
</body>
</html>