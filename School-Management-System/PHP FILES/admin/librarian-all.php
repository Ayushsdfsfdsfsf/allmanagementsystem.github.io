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
<title><?php echo $_SESSION['school_name']; ?> - All Librarian</title>
<link rel="stylesheet" href="assets/css/app.min.css">
<link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
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
<br>
<div class="row">
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h4>All Librarian</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
          <thead>
            <tr>
              <th>Profile</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Whatsapp Number</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $count = 0;
          include ("conn.php");
          $q = "SELECT * FROM librarian";
          $r =mysqli_query($conn,$q);
          while($ro = mysqli_fetch_array($r))
          {
          echo'<tr>
                <td><img src="'.$ro[8].'" style="width:100px; height:100px;"/></td>
                <td>'.$ro[1].'</td>
                <td>'.$ro[2].'</td>
                <td>'.$ro[5].'</td>
                <td>'.$ro[6].'</td>';
            echo'<td>
                  <a href="librarian-view.php?librarian='.$ro[0].'">
                  <img src="uploads/view.PNG" style="width:25px; 
                    background-color:white;
                    border-radius:0px; border:0px solid white;"/></a>
                  <a href="librarian-edit.php?librarian='.$ro[0].'">
                  <img src="uploads/pencil.PNG" style="width:25px; 
                    background-color:white;
                    border-radius:0px; border:0px solid white;"/></a>
                  <a href="librarian-all.php?id='.$ro[0].'"><img src="uploads/trash.PNG" style="width:25px; 
                    background-color:white;
                    border-radius:0px; border:0px solid white;"/></a>
                </td>
              </tr>';
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>            
<!-- END OF DATA LIST -->
</div>
</section>
</div>
</div>
</div>
<script src="assets/js/app.min.js"></script>
<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/bundles/jquery-ui/jquery-ui.min.js"></script>
<script src="assets/js/page/datatables.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/bundles/jquery.sparkline.min.js"></script>
</body>
</html>
<?php
include("conn.php");
if(isset($_GET['id']))
{
$id = $_GET['id'];

$q1 = "DELETE FROM librarian where id='$id'";
$r1 =mysqli_query($conn,$q1);

$link = "<script>window.open('librarian-all.php','_self')</script>";
echo $link;
$conn->close();
}
?>