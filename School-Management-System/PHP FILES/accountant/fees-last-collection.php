<?php
SESSION_START();
error_reporting(0);
if(!isset($_SESSION['accountant']))
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
<title><?php echo $_SESSION['school_name']; ?> - Collect Fees</title>
<link rel="stylesheet" href="assets/css/app.min.css">
<link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
<link rel="stylesheet" href="assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/components.css">
<link rel='shortcut icon' type='image/x-icon' href=<?php echo "'../admin/" . $_SESSION['school_logo']."'"; ?>/>
</head>
<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <?php include("header.php"); ?>
      <div class="main-content">
        <section class="section">
          <br>
          <div class="section-body">
            <div class="row">              
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>You are going to Collect Fees for<br>
                    <?php
                    $date = date('M-Y',strtotime("last day of previous month"));
                    if(isset($_GET['student'])){
                      $student = $_GET['student'];
                      $_SESSION['student_fees'] = $_GET['student'];
                      $q = "SELECT * FROM students WHERE id='$student'";
                      $r =mysqli_query($conn,$q);
                      $ro = mysqli_fetch_array($r);
                      echo 'Student 
                            <span style="color:red;">' . $ro[1] . '</span><br>';
                      echo 'Month
                            <span style="color:red;">' . $date . '</span><br>';
                    }
                    ?>
                    </h4>
                  </div>
                  <form action="fees-last-collection.php" method="POST" enctype="multipart/form-data">
                  <?php
                  if(isset($_GET['student'])){
                  $student = $_GET['student'];
                  //GET STUDENT DUES
                  $q1 = "SELECT * FROM student_dues WHERE student_id='$student'";
                  $r1 =mysqli_query($conn,$q1);
                  $ro1 = mysqli_fetch_array($r1);
                  if(isset($ro1[0])){
                  $total = $ro1[1] + $ro1[2] + $ro1[3] + $ro1[4] + 
                           $ro1[5] + $ro1[6] + $ro1[7];
                  }
                  else{
                    $total = 0;
                  }
                  echo'
                  <div class="card-body">
                    <div class="row">
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Total Dues</label>
                          <div class="input-group">
                            <input type="text" name="total_dues" class="form-control" value="'.$total.'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Collect Fees</label>
                          <div class="input-group">
                            <input type="text" name="collected_fees" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Note(if any Adjustment)</label>
                          <div class="input-group">
                            <input type="text" name="note" class="form-control">
                          </div>
                        </div>
                      </div>';
                      }
                      ?>
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <button type="submit" name="collectfees" class="btn btn-primary">Collect Fees</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
  </div>
</div>
<script src="assets/js/app.min.js"></script>
<script src="assets/bundles/cleave-js/dist/cleave.min.js"></script>
<script src="assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<script src="assets/js/page/forms-advanced-forms.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/bundles/jquery.sparkline.min.js"></script>
</body>
</html>
<?php
include("conn.php");
if(isset($_POST['collectfees'])){
$student_id = $_SESSION['student_fees'];
$total_dues = $_POST['total_dues'];
$collected_fees = $_POST['collected_fees'];
$note = $_POST['note'];
$month = date('m-Y',strtotime("last day of previous month"));
$date = date('d-m-Y',strtotime("last day of previous month"));

$sql = "INSERT INTO monthly_fees(student_id,actual_dues,fees_payed,noted,month,date1) VALUES (
'$student_id',
'$total_dues',
'$collected_fees',
'$note',
'$month',
'$date')";
if ($conn->query($sql) == TRUE) {
unset($_SESSION['student_fees']);
$link = "<script>window.open('fees-last-month.php','_self')</script>";
echo $link;
}
$conn->close();

}
?>