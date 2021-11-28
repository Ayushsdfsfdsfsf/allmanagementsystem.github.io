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
<title><?php echo $_SESSION['school_name']; ?> - Update Teacher Record</title>
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
                    if(isset($_GET['teacher'])){
                      $_SESSION['editteacher'] = $_GET['teacher'];
                      $id = $_SESSION['editteacher'];
                    }
                    else{
                      $id = $_SESSION['editteacher'];
                    }
                    $q = "SELECT * FROM teacher WHERE id='$id'";
                    $r =mysqli_query($conn,$q);
                    $ro = mysqli_fetch_array($r);
                    echo'<h4>Update Record for '.$ro[1].'</h4>';
                    ?>
                  </div>
                  <form action="teacher-edit.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <?php
                      $q = "SELECT * FROM teacher WHERE id='$id'";
                      $r =mysqli_query($conn,$q);
                      $ro = mysqli_fetch_array($r);
                      echo'
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <label>Profile</label>
                          <div class="input-group">
                            <img src="'.$ro[9].'" style="width:100px; height:100px;"/>
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
                            <input type="password" name="password" class="form-control" value="'.$ro[3].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Gender</label>
                          <div class="input-group">
                            <select class="form-control select2" name="gender">';
                            if($ro[4] == "Male"){
                            echo'
                            <option value="Male" selected>Male</option>
                            <option value="Female">Female</option>';
                            }
                            else if($ro[4] == "Female"){
                            echo'
                            <option value="Male">Male</option>
                            <option value="Female" selected>Female</option>';
                            }
                            echo'
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Address</label>
                          <div class="input-group">
                            <input type="text" name="address" class="form-control" value="'.$ro[5].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Phone Number</label>
                          <div class="input-group">
                            <input type="text" name="p_n" class="form-control" value="'.$ro[6].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Whatsapp Number</label>
                          <div class="input-group">
                            <input type="text" name="w_n" class="form-control" value="'.$ro[7].'">
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
                          <button type="submit" name="updateteacher" class="btn btn-primary">Update Record</button>
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
if(isset($_POST['updateteacher']))
{
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$p_n = $_POST['p_n'];
$w_n = $_POST['w_n'];
$target_dir = "uploads/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
if($target_file == $target_dir){
  $sql = "UPDATE teacher SET 
          fullname='$fullname',
          email='$email',
          password='$password',
          gender='$gender',
          address='$address',
          p_n='$p_n',
          w_n='$w_n'
          WHERE id='$id'";
  if ($conn->query($sql) == TRUE) {
  }
}
else{
 $sql = "UPDATE teacher SET 
          fullname='$fullname',
          email='$email',
          password='$password',
          gender='$gender',
          address='$address',
          p_n='$p_n',
          w_n='$w_n',
          profile='$target_file'
          WHERE id='$id'";
   if ($conn->query($sql) == TRUE) {
  }
}
  $link = "<script>window.open('teacher-edit.php','_self')</script>";
  echo $link;
$conn->close();
}
?>