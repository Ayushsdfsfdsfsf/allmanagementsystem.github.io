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
<title><?php echo $_SESSION['school_name']; ?> - Fees Record</title>
<link rel="stylesheet" href="assets/css/app.min.css">
<link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/components.css">
<link rel='shortcut icon' type='image/x-icon' href=<?php echo "'../admin/" . $_SESSION['school_logo']."'"; ?>/>
</head>
<body>
<div id="app">
<div class="main-wrapper main-wrapper-1">
<?php include("header.php"); ?>
<div class="main-content">
<section class="section">
<div class="section-body">
<br>
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <?php
      if(isset($_GET['student'])){
      $student = $_GET['student'];
      $q = "SELECT * FROM students WHERE id='$student'";
      $r =mysqli_query($conn,$q);
      $ro = mysqli_fetch_array($r);
        echo'<h4>Fees Record <span style="color:red;">'.$ro[1].'</span></h4>';
      }
      ?>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
          <thead>
            <tr>
              <th>Sr. No</th>
              <th>Actual Dues</th>
              <th>Fees Payed</th>
              <th>Note</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $count = 0;
          $total = 0;
          include ("conn.php");
          if(isset($_GET['student'])){
          $student = $_GET['student'];

            $q1 = "SELECT * FROM monthly_fees WHERE student_id='$student' ORDER BY ID DESC";
            $r1 =mysqli_query($conn,$q1);
            while($ro1 = mysqli_fetch_array($r1)){
            echo'<tr>
                  <td>'.++$count.'</td>
                  <td>'.$ro1[2].'</td>
                  <td>'.$ro1[3].'</td>
                  <td>'.$ro1[4].'</td>
                  <td style="background-color:green; color:white; font-weight:bold;">'.$ro1[6].'</td>
                </tr>';
            }
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>            
<!-- END OF DATA LIST -->
</div>
</section>
</div>
</div>
</div>
<script src="assets/js/app.min.js"></script>
<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/bundles/jquery.sparkline.min.js"></script>
</body>
</html>