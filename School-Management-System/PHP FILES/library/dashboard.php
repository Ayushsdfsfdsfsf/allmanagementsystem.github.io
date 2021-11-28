<?php
session_start();
if(!isset($_SESSION['librarian']))
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
        <br>
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card card-sales-widget card-bg-blue-gradient">
                <div class="card-icon shadow-primary bg-blue">
                  <i class="fas fa-user-plus"></i>
                </div>
                <div class="card-wrap pull-right">
                  <div class="card-header">
                    <?php
                    $count = 0;
                    include ("conn.php");
                    $q = "SELECT * FROM library";
                    $r =mysqli_query($conn,$q);
                    while($ro = mysqli_fetch_array($r)){
                      $count++;
                    }
                    echo '<h3>'.$count.'</h3>';
                    ?>
                    <h4>Total Books</h4>
                  </div>
                </div>
                <div class="card-chart">
                  <div id="chart-1"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card card-sales-widget card-bg-yellow-gradient">
                <div class="card-icon shadow-primary bg-warning">
                  <i class="fas fa-drafting-compass"></i>
                </div>
                <div class="card-wrap pull-right">
                  <div class="card-header">
                    <?php
                    $count = 0;
                    include ("conn.php");
                    $q = "SELECT * FROM publish_book";
                    $r =mysqli_query($conn,$q);
                    while($ro = mysqli_fetch_array($r)){
                      $count++;
                    }
                    echo '<h3>'.$count.'</h3>';
                    ?>
                    <h4>Issued Books</h4>
                  </div>
                </div>
                <div class="card-chart">
                  <div id="chart-2"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="card card-sales-widget card-bg-orange-gradient">
                <div class="card-icon shadow-primary bg-hibiscus">
                  <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="card-wrap pull-right">
                  <div class="card-header">
                    <h3><?php echo date('d-m-Y'); ?></h3>
                    <h4>Date</h4>
                  </div>
                </div>
                <div class="card-chart">
                  <div id="chart-3"></div>
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