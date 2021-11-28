<?php
SESSION_START();
if(!isset($_SESSION['student'])){
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
                  $student_id = $_SESSION['student'];
                  $q = "SELECT * FROM students WHERE id='$student_id'";
                  $r =mysqli_query($conn,$q);
                  $ro = mysqli_fetch_array($r);
                  echo'
                  <div class="card-body">
                    <div class="py-4">
                      <p class="clearfix">
                        <span class="float-center">
                          <img src="../admin/'.$ro[10].'" style="width:100px; heigh:100px;"/>
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
                          Roll Id
                        </span>
                        <span class="float-right text-muted">
                          '.$ro[2].'
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Email
                        </span>
                        <span class="float-right text-muted">
                          '.$ro[3].'
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Address
                        </span>
                        <span class="float-right text-muted">
                          '.$ro[6].'
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Phone Number
                        </span>
                        <span class="float-right text-muted">
                          '.$ro[7].'
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Whatsapp Number
                        </span>
                        <span class="float-right text-muted">
                          '.$ro[8].'
                        </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Reg Date
                        </span>
                        <span class="float-right text-muted">
                          '.$ro[11].'
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
                    <div class="tab-content" id="myTab3Content">
                      <div class="" id="settings">
                        <form action="update-profile.php" method="POST" class="needs-validation">
                        <div class="card-header">
                          <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Current Password</label>
                              <input type="text" class="form-control" name="c_p" required>
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label>New Password</label>
                              <input type="text" class="form-control" name="n_p" required>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6 col-12">
                              <label>Confirm Password</label>
                              <input type="text" class="form-control" name="confirm_p" required>
                            </div>
                            <div class="form-group col-md-6 col-12">
                              <label id="block1" style="color:red;"></label>
                              <label id="block2" style="color:green;"></label>
                            </div>
                          </div>
                          <button type="submit" name="updateprofile" class="btn btn-primary">Change Password</button>
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
$student_id = $_SESSION['student'];
$current_password = $_POST['c_p'];
$new_password = $_POST['n_p'];
$confirm_p = $_POST['confirm_p'];

  if(isset($_SESSION['student'])){
      $id = $_SESSION['student'];
      if($new_password != $confirm_p){
      ?>
      <script>
    document.getElementById('block1').innerHTML = "Password does not match";
      </script>
      <?php
      }
      else{
          $q = "SELECT * FROM students WHERE id='$id' AND password='$current_password'";
          $r =mysqli_query($conn,$q);
          $ro = mysqli_fetch_array($r);
          if(isset($ro[0])){
              $sql = "UPDATE students SET password='$new_password' WHERE id='$id'";
              if ($conn->query($sql) == TRUE) {
              ?>
              <script>
            document.getElementById('block2').innerHTML = "Password Successfully Changed";
              </script>
              <?php
              }
          }
          else{
          ?>
          <script>
        document.getElementById('block1').innerHTML = "Current Password is wrong";
          </script>
          <?php
          }
      }
  }
}
?>