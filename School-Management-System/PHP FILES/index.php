<?php
session_start();
$id = 1;
include("conn.php");
$q = "SELECT * FROM general_settings WHERE id='$id'";
$r =mysqli_query($conn,$q);
$ro = mysqli_fetch_array($r);
$_SESSION['school_name'] = $ro[1];
$_SESSION['school_address'] = $ro[2];
$_SESSION['school_mn'] = $ro[3];
$_SESSION['school_pn'] = $ro[4];
$_SESSION['school_logo'] = $ro[5];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?php echo $_SESSION['school_name']; ?></title>
<link rel="stylesheet" href="assets/css/app.min.css">
<link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/components.css">
<link rel='shortcut icon' type='image/x-icon' href=<?php echo "'../admin/" . $_SESSION['school_logo']."'"; ?>/>
</head>
<body class="background-image-body">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <!-- ======= LOGIN DETAILS ======= -->
          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="login-brand login-brand-color">
              <h4><br>Pro Version $10</h4>
            </div>
            <br>
            <div class="card card-auth">
              <div class="card-header card-header-auth">
                <h4>Login Details</h4>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="email">Admin</label>
                    <br>
                    <strong>admin@gmail.com<br>admin</strong>
                  </div>
                  <div class="form-group">
                    <label for="email">Accountant</label>
                    <br>
                    <strong>accountant@gmail.com<br>accountant</strong>
                  </div>
                  <div class="form-group">
                    <label for="email">Librarian</label>
                    <br>
                    <strong>librarian@gmail.com<br>librarian</strong>
                  </div>
              </div>
            </div>
          </div>
          <!-- ======= LOGIN PAGE ======= -->
          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <br>
            <div class="login-brand login-brand-color">
              <h4>School Management</h4>
            </div>
            <br>
            <div class="card card-auth">
              <div class="card-header card-header-auth">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="index.php" class="needs-validation">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Type</label>
                    <select class="form-control" name="option">
                      <option value="1">Admin</option>
                      <option value="2">Accountant</option>
                      <option value="4">Teacher</option>
                      <option value="5">Student</option>
                      <option value="6">Parent</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-block btn-auth-color" name="login" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- ======= DETAILS ======= -->
          <div class="col-12 col-md-6 col-lg-6 col-xl-4">
            <div class="login-brand login-brand-color">
              <h4>Welcome to School Management System</h4>
            </div>
            <br>
            <div class="card card-auth">
              <div class="card-header card-header-auth">
                <h4>Login Details</h4>
              </div>
              <div class="card-body">
                  <div class="form-group">
                    <label for="email">Teacher</label>
                    <br>
                    <strong>teacher@gmail.com<br>teacher</strong>
                  </div>
                  <div class="form-group">
                    <label for="email">Student</label>
                    <br>
                    <strong>student@gmail.com<br>student</strong>
                  </div>
                  <div class="form-group">
                    <label for="email">Parent</label>
                    <br>
                    <strong>parent@gmail.com<br>parent</strong>
                  </div>
              </div>
            </div>
          </div>
          <!-- ======= END OF DETAILS ======= -->
        </div>
      </div>
    </section>
  </div>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/js/scripts.js"></script>  
</body>
</html>
<?php
include("conn.php");
if(isset($_POST['login']))
{
$email = $_POST['email'];
$password = $_POST['password'];
$option = $_POST['option'];
if($option == "1"){
  $q = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
  $r =mysqli_query($conn,$q);
  $ro = mysqli_fetch_array($r);
    if (sizeof($ro) > 0) {
        $_SESSION['admin']=$ro[0];
        $link = "<script>window.open('admin/dashboard.php','_self')</script>";
        echo $link;
    }
}
//LOGIN AS ACCOUNTANT
else if($option == "2"){
  $q1 = "SELECT * FROM accountant WHERE email='$email' AND password='$password'";
  $r1 =mysqli_query($conn,$q1);
  while (($ro1 = mysqli_fetch_array($r1)))
  {
    if (sizeof($ro1) > 0) {
        $_SESSION['accountant']=$ro1[0];
        $link = "<script>window.open('accountant/dashboard.php','_self')</script>";
        echo $link;
    }
  }
}
//LOGIN AS LIBRARIAN
else if($option == "3"){
  $q1 = "SELECT * FROM librarian WHERE email='$email' AND password='$password'";
  $r1 =mysqli_query($conn,$q1);
  while($ro1 = mysqli_fetch_array($r1)){
    if (sizeof($ro1) > 0) {
        $_SESSION['librarian']=$ro1[0];
        $link = "<script>window.open('library/dashboard.php','_self')</script>";
        echo $link;
    }
  }
}
//LOGIN AS TEACHER
else if($option == "4"){
  $q1 = "SELECT * FROM teacher WHERE email='$email' AND password='$password'";
  $r1 =mysqli_query($conn,$q1);
  while (($ro1 = mysqli_fetch_array($r1))){
    if (sizeof($ro1) > 0) {
        $_SESSION['teacher']=$ro1[0];
        $link = "<script>window.open('teacher/complaint-add.php','_self')</script>";
        echo $link;
    }
  }
}
//LOGIN AS STUDENT
else if($option == "5"){
  $q1 = "SELECT * FROM students WHERE email='$email' AND password='$password'";
  $r1 =mysqli_query($conn,$q1);
  while (($ro1 = mysqli_fetch_array($r1))){
    if (sizeof($ro1) > 0) {
        $_SESSION['student']=$ro1[0];
        $link = "<script>window.open('student/attendance-current-month.php','_self')</script>";
        echo $link;
    }
  }
}
//LOGIN AS STUDENT
else if($option == "6"){
  $q1 = "SELECT * FROM parents WHERE email='$email' AND password='$password'";
  $r1 =mysqli_query($conn,$q1);
  while (($ro1 = mysqli_fetch_array($r1))){
    if (sizeof($ro1) > 0) {
        $_SESSION['parent']=$ro1[0];
        $link = "<script>window.open('parent/assignment-pending.php','_self')</script>";
        echo $link;
    }
  }
}
}
?>