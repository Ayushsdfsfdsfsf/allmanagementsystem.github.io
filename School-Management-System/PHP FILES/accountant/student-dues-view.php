<?php
SESSION_START();
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
<title><?php echo $_SESSION['school_name']; ?> - View Student Dues</title>
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
<style type="text/css">
  label{
    font-weight:bold;
    font-size: 17px;
    margin-left: 20px;
  }
</style>
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
                  <?php
                  include ("conn.php");
                  if(isset($_GET['student'])){
                  $id = $_GET['student'];
                  $q = "SELECT * FROM students WHERE id='$id'";
                  $r =mysqli_query($conn,$q);
                  $ro = mysqli_fetch_array($r);
                    echo'<h4>Details of '.$ro[1].'</h4>';
                  }
                  ?>
                  </div>
                  <?php
                  include ("conn.php");
                  if(isset($_GET['student'])){
                  $id = $_GET['student'];
                  //GET STUDENT DETAILS
                  $q1 = "SELECT * FROM student_dues WHERE student_id='$id'";
                  $r1 =mysqli_query($conn,$q1);
                  $ro1 = mysqli_fetch_array($r1);
                  echo'
                  <div class="card-body">
                    <div class="row">
                      <div class="col-4 col-md-4 col-lg-4">
                        <div>
                          <label>Tution Fees : <p>'.$ro1[1].'</p></label>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div>
                          <label>Hostel Dues : <p>'.$ro1[2].'</p></label>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div>
                          <label>Labortary Fees : <p>'.$ro1[3].'</p></label>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div>
                          <label>Computer Fees : <p>'.$ro1[4].'</p></label>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div>
                          <label>Stationary Fees : <p>'.$ro1[5].'</p></label>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div>
                          <label>Exam Fees : <p>'.$ro1[6].'</p></label>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div>
                          <label>Transportation : <p>'.$ro1[7].'</p></label>
                        </div>
                      </div>
                      <div class="col-12 col-md-12 col-lg-12">
                        <div>';
                        $total = $ro1[1] + $ro1[2] + $ro1[3] + 
                        $ro1[4] + $ro1[5] + $ro1[6] + $ro1[7];
                        echo'
                          <h5 style="text-align:center; color:red; font-weight:bold;">Total Dues : '.$total.'</h5>
                        </div>
                      </div>
                    </div>
                  </div>';
                  }
                  ?>
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