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
<title><?php echo $_SESSION['school_name']; ?> - Update Accountant</title>
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
                    if(isset($_GET['accountant'])){
                      $_SESSION['editaccountant'] = $_GET['accountant'];
                      $id = $_SESSION['editaccountant'];
                    }
                    else{
                      $id = $_SESSION['editaccountant'];
                    }
                    $q = "SELECT * FROM accountant WHERE id='$id'";
                    $r =mysqli_query($conn,$q);
                    $ro = mysqli_fetch_array($r);
                    echo'<h4>Update Record for Accountant '.$ro[1].'</h4>';
                    ?>
                  </div>
                  <form action="accountant-edit.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <?php
                      $q = "SELECT * FROM accountant WHERE id='$id'";
                      $r =mysqli_query($conn,$q);
                      $ro = mysqli_fetch_array($r);
                      echo'
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <label>Profile</label>
                          <div class="input-group">
                            <img src="'.$ro[8].'" style="width:70px; height:70px;"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Full Name</label>
                          <div class="input-group">
                            <input type="text" name="fullname" class="form-control" value="'.$ro[1].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Email</label>
                          <div class="input-group">
                            <input type="text" name="email" class="form-control" value="'.$ro[2].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Password</label>
                          <div class="input-group">
                            <input type="text" name="password" class="form-control" value="'.$ro[3].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Designation</label>
                          <div class="input-group">
                            <input type="text" name="designation" class="form-control" value="'.$ro[4].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Phone Number</label>
                          <div class="input-group">
                            <input type="text" name="p_n" class="form-control" value="'.$ro[5].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Whatsapp Number</label>
                          <div class="input-group">
                            <input type="text" name="w_n" class="form-control" value="'.$ro[6].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Profile</label>
                          <div class="input-group">
                            <input type="file" name="fileToUpload" class="form-control">
                          </div>
                        </div>
                      </div>';
                      ?>
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <button type="submit" name="updateaccountant" class="btn btn-primary">Update Record</button>
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
if(isset($_POST['updateaccountant'])){
$id = $_SESSION['editaccountant'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$designation = $_POST['designation'];
$p_n = $_POST['p_n'];
$w_n = $_POST['w_n'];
$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
if($target_file == $target_dir){

  $sql = "UPDATE accountant SET 
          fullname='$fullname',
          email='$email',
          password='$password',
          designation='$designation',
          phone_number='$p_n',
          whatsapp_number='$w_n'
          WHERE id='$id'";
  if ($conn->query($sql) == TRUE) {
  }
}
else{
  $sql = "UPDATE accountant SET 
          fullname='$fullname',
          email='$email',
          password='$password',
          designation='$designation',
          phone_number='$p_n',
          whatsapp_number='$w_n',
          profile_pic='$target_file'
          WHERE id='$id'";
  if ($conn->query($sql) == TRUE) {
  }
}
$link = "<script>window.open('accountant-edit.php','_self')</script>";
echo $link;
$conn->close();
}
?>