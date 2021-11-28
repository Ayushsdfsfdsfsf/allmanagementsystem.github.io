<?php
SESSION_START();
error_reporting(0);
if(!isset($_SESSION['parent']))
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
<title><?php echo $_SESSION['school_name']; ?> - Pending Assignments</title>
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
    <?php
    include("conn.php");
    $date=date("Y-m-d");
    $id = $_SESSION['parent'];
    //Get Parent Details
    $q = "SELECT * FROM parents WHERE id='$id'";
    $r =mysqli_query($conn,$q);
    $ro = mysqli_fetch_array($r);

    //Get Students
    $myArray = explode(',', $ro[8]);
    for($i=0; $i<sizeof($myArray)-1; $i++)
    {
    $temp = $myArray[$i];

    //Get Student Details
    $q1 = "SELECT * FROM students WHERE id='$temp'";
    $r1 =mysqli_query($conn,$q1);
    $ro1 = mysqli_fetch_array($r1);
    echo'
    <div class="card-header">
      <h4>Pending Assignments for <strong style="color:red;">'.$ro1[1].'</strong></h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover" id="save-stage" style="width:100%;">
          <thead>
            <tr>
              <th>#</th>
              <th>TITLE</th>
              <th>DESCRIPTION</th>
              <th>ASSIGNED DATE</th>
              <th>DEADLINE</th>
              <th>FILE</th>
              <th>SUBJECT</th>
            </tr>
          </thead>
          <tbody>';
          //Get Assignments
          $q = "SELECT * FROM assignments WHERE class='$ro1[9]' AND deadline<'$date'";
          $r =mysqli_query($conn,$q);
          while($ro1 = mysqli_fetch_array($r)){
          echo'<tr>
          <td>'.$ro1[0].'</td>
          <td>'.$ro1[1].'</td>
          <td>'.$ro1[2].'</td>
          <td><span style="color:green; font-weight:bold;">'.$ro1[3].'</span></td>
          <td><span style="color:green; font-weight:bold;">'.$ro1[4].'</span></td>';
          if($ro[5] == "0"){
              echo'<td>No File</td>';
          }
          else{
              echo'<td><a href="'.$ro1[5].'" download>Download File</td>';
          }
          echo'<td>'.$ro1[7].'</td>
          </tr>';
          }
            echo'
            </tbody>
        </table>
      </div>
    </div>';
    }
    ?>
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

$q1 = "DELETE FROM assignments where id='$id'";
$r1 =mysqli_query($conn,$q1);

$link = "<script>window.open('assignment-pending.php','_self')</script>";
echo $link;
$conn->close();
}
?>