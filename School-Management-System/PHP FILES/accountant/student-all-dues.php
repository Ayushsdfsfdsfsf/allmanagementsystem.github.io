<?php
SESSION_START();
if(!isset($_SESSION['accountant'])){
  header('Location: index.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?php echo $_SESSION['school_name']; ?> - All Students Dues</title>
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
      <h4>All Students Dues</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
          <thead>
            <tr>
              <th>Sr. No</th>
              <th>Full Name</th>
              <th>Roll No.</th>
              <th>Email</th>
              <th>Class</th>
              <th>Total Dues</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php
          $count = 0;
          include ("conn.php");
          $q = "SELECT * FROM students ORDER BY id DESC";
          $r =mysqli_query($conn,$q);
          while($ro = mysqli_fetch_array($r)){

          $q1 = "SELECT * FROM student_dues WHERE student_id='$ro[0]'";
          $r1 =mysqli_query($conn,$q1);
          $ro1 = mysqli_fetch_array($r1);
          if(isset($ro1[0])){
          $total = $ro1[1] + $ro1[2] + $ro1[3] + $ro1[4] + 
                   $ro1[5] + $ro1[6] + $ro1[7];
          echo'<tr>
                <td>'.++$count.'</td>
                <td>'.$ro[1].'</td>
                <td>'.$ro[2].'</td>
                <td>'.$ro[3].'</td>';
                $q2 = "SELECT * FROM class WHERE id='$ro[9]'";
                $r2 =mysqli_query($conn,$q2);
                $ro2 = mysqli_fetch_array($r2);
                echo'<td>'.$ro2[1].'</td>
                <td>
                  <div class="badge badge-success badge-shadow">'.$total.'</div>
                </td>
                <td>
                  <a href="student-dues-view.php?student='.$ro[0].'">
                  <img src="uploads/view.PNG" style="width:25px; 
                    background-color:white;
                    border-radius:0px; border:0px solid white;"/></a>
                  <a href="student-dues-edit.php?student='.$ro[0].'">
                  <img src="uploads/pencil.PNG" style="width:25px; 
                    background-color:white;
                    border-radius:0px; border:0px solid white;"/></a>
                </td>
              </tr>';
          }
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