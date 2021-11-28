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
<title><?php echo $_SESSION['school_name']; ?> - General Settings</title>
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
                    <h4>General Settings</h4>
                  </div>
                  <form action="general-settings.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                    <?php
                    $id = $_SESSION['admin'];
                    $q = "SELECT * FROM general_settings WHERE admin_id='$id'";
                    $r =mysqli_query($conn,$q);
                    $ro = mysqli_fetch_array($r);
                    if(isset($ro[0])){
                    $s_name = $ro[1];
                    $s_address = $ro[2];
                    $s_mn = $ro[3];
                    $s_pn = $ro[4];
                    $s_logo = $ro[5];
                    echo'
                    <div class="col-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <div class="input-group">
                          <img src="'.$s_logo.'" style="width:100px; height:70px;">
                        </div>
                      </div>
                    </div>';
                    }
                    else{
                    $s_name = "";
                    $s_address = "";
                    $s_mn = "";
                    $s_pn = "";
                    $s_logo = "";
                    }
                    echo'
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>School Name</label>
                          <div class="input-group">
                            <input type="text" name="school_name" class="form-control" value="'.$s_name.'" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>School Address</label>
                          <div class="input-group">
                            <input type="text" name="school_address" class="form-control" value="'.$s_address.'" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>School Mobile Number</label>
                          <div class="input-group">
                            <input type="text" name="school_mn" class="form-control" value="'.$s_mn.'" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>School Phone Number</label>
                          <div class="input-group">
                            <input type="text" name="school_pn" class="form-control" value="'.$s_pn.'" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>School Logo</label>
                          <div class="input-group">
                            <input type="file" name="fileToUpload" class="form-control" required>
                          </div>
                        </div>
                      </div>';
                      ?>
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <button type="submit" name="updatesettings" class="btn btn-primary">Add Record</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  </form>
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
if(isset($_POST['updatesettings'])){
$admin_id = $_SESSION['admin'];
$school_name = $_POST['school_name'];
$school_address = $_POST['school_address'];
$school_mn = $_POST['school_mn'];
$school_pn = $_POST['school_pn'];
$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

$q = "SELECT * FROM general_settings";
$r =mysqli_query($conn,$q);
$ro = mysqli_fetch_array($r);
if(isset($ro)){
  $sql = "UPDATE general_settings SET 
          school_name='$school_name',
          school_address='$school_address',
          school_mn='$school_mn',
          school_pn='$school_pn',
          school_logo='$target_file'
          WHERE admin_id='$admin_id'";
  if ($conn->query($sql) == TRUE) {
  }
}
else{
  $sql = "INSERT INTO general_settings(school_name,school_address,school_mn,school_pn,school_logo,admin_id) VALUES ('$school_name','$school_address','$school_mn','$school_pn','$target_file','$admin_id')";
  if ($conn->query($sql) == TRUE) {
  }
}
  $link = "<script>window.open('general-settings.php','_self')</script>";
  echo $link;
$conn->close();
}
?>