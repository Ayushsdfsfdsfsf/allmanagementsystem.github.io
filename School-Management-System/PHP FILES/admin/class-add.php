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
<title><?php echo $_SESSION['school_name']; ?> - Add Classes</title>
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
                    <h4>Add Classes</h4>
                  </div>
                  <form action="class-add.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Class Name</label>
                          <div class="input-group">
                            <input type="text" name="class_name" class="form-control" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Class Teacher</label>
                          <div class="input-group">
                            <select class="form-control select2" name="teacher" required>
                            <?php
                            include ("conn.php");
                            $q = "SELECT * FROM teacher";
                            $r =mysqli_query($conn,$q);
                            while($ro = mysqli_fetch_array($r)){

                            $q1 = "SELECT * FROM class WHERE teacher_id='$ro[0]'";
                            $r1 =mysqli_query($conn,$q1);
                            $ro1 = mysqli_fetch_array($r1);
                            if(isset($ro1)){
                            }
                            else{
                              echo '<option value="'.$ro[0].'">'.$ro[1].'</option>';
                            }
                            }
                            ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <button type="submit" name="addclass" class="btn btn-primary">Add Record</button>
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
if(isset($_POST['addclass']))
{
$teacher = $_POST['teacher'];
$class_name = $_POST['class_name'];

$sql = "INSERT INTO class(name,teacher_id) VALUES ('$class_name','$teacher')";
if ($conn->query($sql) == TRUE) {
$link = "<script>window.open('class-add.php','_self')</script>";
echo $link;
}
$conn->close();
}
?>