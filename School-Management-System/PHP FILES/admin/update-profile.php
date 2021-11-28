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
<title><?php echo $_SESSION['school_name']; ?> - Update Profile</title>
<link rel="stylesheet" href="assets/css/app.min.css">
<link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
<link rel="stylesheet" href="assets/bundles/summernote/summernote-bs4.css">
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
            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4>Personal Details</h4>
                  </div>
                  <?php
                  include("conn.php");
                  $id = $_SESSION['admin'];
                  $q = "SELECT * FROM admin WHERE id='$id'";
                  $r =mysqli_query($conn,$q);
                  $ro = mysqli_fetch_array($r);
                  echo'
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-center text-muted">
                          <img src="'.$ro[5].'" style="width:100px; heigh:100px;"/>
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Name
                        </span>
                        <span class="float-right text-muted">
                          '.$ro[1].'
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Email
                        </span>
                        <span class="float-right text-muted">
                          '.$ro[2].'
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Designation
                        </span>
                        <span class="float-right text-muted">
                          Admin
                        </span>
                      </p>
                    </div>
                  </div>';
                  ?>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-pills mb-1" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link">Edit Profile</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTab3Content">
                      <div class="" id="settings">
                        <form action="update-profile.php" method="POST" enctype="multipart/form-data">
                        <?php
                        include("conn.php");
                        $id = $_SESSION['admin'];
                        $q = "SELECT * FROM admin WHERE id='$id'";
                        $r =mysqli_query($conn,$q);
                        $ro = mysqli_fetch_array($r);
                          echo'
                          <div class="card-header">
                            <h4>Edit Profile</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="fullname" value="'.$ro[1].'">
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="'.$ro[2].'">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="'.$ro[3].'">
                              </div>
                              <div class="form-group col-md-6 col-12">
                                <label>Designation</label>
                                <input type="text" class="form-control" name="designation" value="'.$ro[4].'">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-12">
                                <label>Profile Pic</label>
                                <input type="file" class="form-control" name="fileToUpload">
                            </div>
                          </div>';
                          ?>
                          <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary" name="updateprofile">Save Changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
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
<script src="assets/bundles/summernote/summernote-bs4.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/bundles/jquery.sparkline.min.js"></script>
</body>
</html>
<?php
include("conn.php");
if(isset($_POST['updateprofile'])){
$id = $_SESSION['admin'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$designation = $_POST['designation'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

if($target_file == $target_dir){
  $sql = "UPDATE admin SET 
          name='$fullname',
          email='$email',
          password='$password',
          designation='$designation'
          WHERE id='$id'";
  if ($conn->query($sql) == TRUE) {
  }
}
else{
  $sql = "UPDATE admin SET 
          name='$fullname',
          email='$email',
          password='$password',
          designation='$designation',
          profile_pic='$target_file'
          WHERE id='$id'";
  if ($conn->query($sql) == TRUE) {
  }
}
$link="<script>window.open('update-profile.php','_self')</script>";
echo $link;
$conn->close();
}