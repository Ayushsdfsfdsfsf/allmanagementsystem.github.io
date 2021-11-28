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
<title><?php echo $_SESSION['school_name']; ?> - All Teachers</title>
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
      <h4>All Teachers</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
          <thead>
            <tr>
              <th>Sr. No</th>
              <th>Full Name</th>
              <th>Phone Number</th>
              <th>Whatsapp Number</th>
              <th>Payments</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $count = 0;
          include ("conn.php");
          $q = "SELECT * FROM teacher ORDER BY id DESC";
          $r =mysqli_query($conn,$q);
          while($ro = mysqli_fetch_array($r))
          {
          echo'<tr>
                <td>'.++$count.'</td>
                <td>'.$ro[1].'</td>
                <td>'.$ro[6].'</td>
                <td>'.$ro[7].'</td>';
                $q1 = "SELECT * FROM teacher_payments WHERE teacher_id='$ro[0]'";
                $r1 =mysqli_query($conn,$q1);
                $ro1 = mysqli_fetch_array($r1);
                if(isset($ro1)){
                  echo'
                  <td>
                  <div class="badge badge-success badge-shadow">ADDED</div>
                  </td>';
                }
                else{
                  echo'
                  <td>
                  <div class="badge badge-success badge-shadow">NOT ADDED</div>
                  </td>';
                }
            echo'<td>
                  <a href="teacher-view.php?teacher='.$ro[0].'">
                  <img src="uploads/view.PNG" style="width:25px; 
                    background-color:white;
                    border-radius:0px; border:0px solid white;"/></a>
                  <a href="teacher-edit.php?teacher='.$ro[0].'">
                  <img src="uploads/pencil.PNG" style="width:25px; 
                    background-color:white;
                    border-radius:0px; border:0px solid white;"/></a>
                  <a href="teacher-all.php?id='.$ro[0].'"><img src="uploads/trash.PNG" style="width:25px; 
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

$q1 = "DELETE FROM teacher where id='$id'";
$r1 =mysqli_query($conn,$q1);

$q2 = "DELETE FROM teacher_payments where teacher_id='$id'";
$r2 =mysqli_query($conn,$q2);

$link = "<script>window.open('teacher-all.php','_self')</script>";
echo $link;
$conn->close();
}
?>