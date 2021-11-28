<?php
SESSION_START();
if(!isset($_SESSION['admin']))
{
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
          <br>
          <!-- START OF TOP BAR -->
            <div class="row">
              <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon-square card-icon-bg-green">
                    <i class="fas fa-hiking"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i>
                          <?php
                          $count = 0;
                          include ("conn.php");
                          $q = "SELECT * FROM students";
                          $r =mysqli_query($conn,$q);
                          while($ro = mysqli_fetch_array($r)){
                            $count++;
                          }
                          echo $count;
                          ?>
                        </h3>
                        <span class="text-muted">Total Students</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon-square card-icon-bg-orange">
                    <i class="fas fa-hiking"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i>
                          <?php
                          $count = 0;
                          include ("conn.php");
                          $q = "SELECT * FROM teacher";
                          $r =mysqli_query($conn,$q);
                          while($ro = mysqli_fetch_array($r)){
                            $count++;
                          }
                          echo $count;
                          ?>
                        </h3>
                        <span class="text-muted">Total Teachers</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon-square card-icon-bg-cyan">
                    <i class="fas fa-chart-line"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> 
                          <?php
                          $count = 0;
                          include ("conn.php");
                          $q = "SELECT * FROM library";
                          $r =mysqli_query($conn,$q);
                          while($ro = mysqli_fetch_array($r)){
                            $count++;
                          }
                          echo $count;
                          ?>
                        </h3>
                        <span class="text-muted">Books in Library</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon-square card-icon-bg-purple">
                    <i class="fas fa-cart-plus"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> 
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
                          echo $total;
                          ?>
                        </h3>
                        <span class="text-muted">Current Month Expenses</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon-square card-icon-bg-purple">
                    <i class="fas fa-cart-plus"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> 
                          <?php
                          $total = 0;
                          include ("conn.php");
                          $month = date('m-Y');
                          $q1 = "SELECT * FROM monthly_salary WHERE month='$month'";
                          $r1 =mysqli_query($conn,$q1);
                          while($ro1 = mysqli_fetch_array($r1)){
                            $total = $ro1[3];
                          }
                          echo $total;
                          ?>
                        </h3>
                        <span class="text-muted">Salaries Payed</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card card-statistic-1">
                  <div class="card-icon-square card-icon-bg-purple">
                    <i class="fas fa-cart-plus"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="padding-20">
                      <div class="text-right">
                        <h3 class="font-light mb-0">
                          <i class="ti-arrow-up text-success"></i> 
                          <?php
                          $total = 0;
                          include ("conn.php");
                          $month = date('m-Y');
                          $q1 = "SELECT * FROM monthly_fees WHERE month='$month'";
                          $r1 =mysqli_query($conn,$q1);
                          while($ro1 = mysqli_fetch_array($r1)){
                            $total = $ro1[3];
                          }
                          echo $total;
                          ?>
                        </h3>
                        <span class="text-muted">Cash Collected</span>
                      </div>
                    </div>
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