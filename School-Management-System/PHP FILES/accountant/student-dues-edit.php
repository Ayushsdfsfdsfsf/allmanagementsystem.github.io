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
<title><?php echo $_SESSION['school_name']; ?> - Update Student Dues</title>
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
                    <?php
                    include ("conn.php");
                    if(isset($_GET['student'])){
                      $_SESSION['editstudent'] = $_GET['student'];
                      $id = $_SESSION['editstudent'];
                    }
                    else{
                      $id = $_SESSION['editstudent'];
                    }
                    $q = "SELECT * FROM students WHERE id='$id'";
                    $r =mysqli_query($conn,$q);
                    $ro = mysqli_fetch_array($r);
                    echo'<h4>Update Student Dues for '.$ro[1].'</h4>';
                    ?>
                  </div>
                  <form action="student-dues-edit.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <?php
                      include ("conn.php");
                      if(isset($_GET['student'])){
                        $_SESSION['editstudent'] = $_GET['student'];
                        $id = $_SESSION['editstudent'];
                      }
                      else{
                        $id = $_SESSION['editstudent'];
                      }
                      $q1 = "SELECT * FROM student_dues WHERE student_id='$id'";
                      $r1 =mysqli_query($conn,$q1);
                      $ro1 = mysqli_fetch_array($r1);
                      echo'
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Tution Fees</label>
                          <div class="input-group">
                            <input type="number" name="tution" class="form-control" value="'.$ro1[1].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Hostel Dues</label>
                          <div class="input-group">
                            <input type="number" name="hostel" class="form-control" value="'.$ro1[2].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Labortary Fees</label>
                          <div class="input-group">
                            <input type="number" name="labortary" class="form-control" value="'.$ro1[3].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Computer Fees</label>
                          <div class="input-group">
                            <input type="number" name="computer" class="form-control" value="'.$ro1[4].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Stationary Fees</label>
                          <div class="input-group">
                            <input type="number" name="stationary" class="form-control" value="'.$ro1[6].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Exam Fees</label>
                          <div class="input-group">
                            <input type="number" name="exam" class="form-control" value="'.$ro1[6].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Transportation</label>
                          <div class="input-group">
                            <input type="number" name="transportation" class="form-control" value="'.$ro1[7].'">
                          </div>
                        </div>
                      </div>';
                      ?>
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <button type="submit" name="updatedues" class="btn btn-primary">Update Record</button>
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
if(isset($_POST['updatedues'])){
$tution = $_POST['tution'];
$hostel = $_POST['hostel'];
$labortary = $_POST['labortary'];
$computer = $_POST['computer'];
$stationary = $_POST['stationary'];
$exam = $_POST['exam'];
$transportation = $_POST['transportation'];
$student_id = $_SESSION['editstudent'];

$sql = "UPDATE student_dues SET 
        fees='$tution',
        hostel='$hostel',
        labortary_fees='$labortary',
        computer_fees='$computer',
        stationary_fees='$stationary',
        exam_fees='$exam',
        transportation='$transportation'
        WHERE student_id='$student_id'";
if ($conn->query($sql) == TRUE) {
unset($_SESSION['editstudent']);
$link = "<script>window.open('student-all-dues.php','_self')</script>";
echo $link;
}
$conn->close();
}
?>