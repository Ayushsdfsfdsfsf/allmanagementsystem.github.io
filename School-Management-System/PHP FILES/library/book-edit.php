<?php
SESSION_START();
if(!isset($_SESSION['librarian']))
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
<title><?php echo $_SESSION['school_name']; ?> - Update Book Record</title>
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
                    if(isset($_GET['book'])){
                      $_SESSION['editbook'] = $_GET['book'];
                      $id = $_SESSION['editbook'];
                    }
                    else{
                      $id = $_SESSION['editbook'];
                    }
                    $q = "SELECT * FROM library WHERE id='$id'";
                    $r =mysqli_query($conn,$q);
                    $ro = mysqli_fetch_array($r);
                    echo'<h4>Update Record for Book '.$ro[1].'</h4>';
                    ?>
                  </div>
                  <form action="book-edit.php" method="POST" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                      <?php
                      $q = "SELECT * FROM library WHERE id='$id'";
                      $r =mysqli_query($conn,$q);
                      $ro = mysqli_fetch_array($r);
                      echo'
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Title</label>
                          <div class="input-group">
                            <input type="text" name="title" class="form-control" value="'.$ro[1].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Author</label>
                          <div class="input-group">
                            <input type="text" name="author" class="form-control" value="'.$ro[2].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Type</label>
                          <div class="input-group">
                            <input type="text" name="type" class="form-control" value="'.$ro[4].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Price</label>
                          <div class="input-group">
                            <input type="text" name="price" class="form-control" value="'.$ro[5].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-4 col-md-4 col-lg-4">
                        <div class="form-group">
                          <label>Stock</label>
                          <div class="input-group">
                            <input type="text" name="stock" class="form-control" value="'.$ro[6].'">
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <label>Description</label>
                          <div class="input-group">
                            <textarea type="text" name="description" class="form-control">'.$ro[3].'</textarea>
                          </div>
                        </div>
                      </div>';
                      ?>
                      <div class="col-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <button type="submit" name="updatebook" class="btn btn-primary">Update Record</button>
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
if(isset($_POST['updatebook']))
{
$id = $_SESSION['editbook'];
$title = $_POST['title'];
$author = $_POST['author'];
$type = $_POST['type'];
$price = $_POST['price'];
$stock = $_POST['stock'];
$description = $_POST['description'];

  $sql = "UPDATE library SET 
          title='$title',
          author='$author',
          description='$description',
          type='$type',
          price='$price',
          stock='$stock'
          WHERE id='$id'";
  if ($conn->query($sql) == TRUE) {
  }
  $link = "<script>window.open('book-edit.php','_self')</script>";
  echo $link;
$conn->close();
}
?>