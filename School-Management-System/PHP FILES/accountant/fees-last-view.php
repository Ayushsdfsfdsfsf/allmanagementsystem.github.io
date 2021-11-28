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
<title><?php echo $_SESSION['school_name']; ?> - Update Fees Record</title>
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
                    <h4>Update Fees Record
                      <br>
                      <?php
                      $month = date('M-Y',strtotime("last day of previous month"));
                      echo '<span style="color:red;">'.$month.'</span>';
                      ?>
                    </h4>
                  </div>
                  <form action="fees-last-view.php" method="POST" enctype="multipart/form-data">
                  <?php
                  if(isset($_GET['fees'])){
                  $id = $_GET['fees'];
                  $_SESSION['fees_id'] = $_GET['fees'];
                  $month = date('m-Y',strtotime("last day of previous month"));
                  //CHECK EITHER STUDENT PAID FEES OR NOT
                  $q = "SELECT * FROM monthly_fees WHERE id='$id' AND month='$month'";
                  $r =mysqli_query($conn,$q);
                  $ro = mysqli_fetch_array($r);
                  echo'
                  <div class="card-body">
                    <div class="row">
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Total Dues</label>
                          <div class="input-group">
                            <input type="text" class="form-control" value="'.$ro[2].'" disabled>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Collect Fees</label>
                          <div class="input-group">
                            <input type="text" name="collected_fees" class="form-control" value="'.$ro[3].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Note(if any Adjustment)</label>
                          <div class="input-group">
                            <input type="text" name="note" class="form-control" value="'.$ro[4].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Date</label>
                          <div class="input-group">
                            <input type="text" name="date" class="form-control" value="'.$ro[6].'">
                          </div>
                        </div>
                      </div>';
                      }
                      ?>
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <button type="submit" name="updatefees" class="btn btn-primary">Update Record</button>
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
if(isset($_POST['updatefees'])){
$id = $_SESSION['fees_id'];
$collected_fees = $_POST['collected_fees'];
$note = $_POST['note'];
$date = $_POST['date'];

$sql = "UPDATE monthly_fees SET 
        fees_payed='$collected_fees',
        noted='$note',
        date1='$date'
        WHERE id='$id'";
if ($conn->query($sql) == TRUE) {
unset($_SESSION['fees_id']);
$link = "<script>window.open('fees-last-month.php','_self')</script>";
echo $link;
}
$conn->close();

}
?>