<?php
SESSION_START();
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
<title><?php echo $_SESSION['school_name']; ?> - Monthly Attendance Record</title>
<link rel="stylesheet" href="assets/css/app.min.css">
<link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/components.css">
<link rel='shortcut icon' type='image/x-icon' href=<?php echo "'../admin/" . $_SESSION['school_logo']."'"; ?>/>
<script src="ajax/ajax-general.js" type="text/javascript"></script>
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
        <h4>Monthly Attendance Record for 
        <?php
        include ("conn.php");
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
          echo '<br><span style="color:green;">'.$ro1[1].'</span>';
        }
        ?>
        </h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-striped table-hover" id="save-stage">
        <thead>
            <tr style="background-color: red;">
                <th style="color:white;">SR. NO</th>
                <th style="color:white;">STUDENT</th>
                <?php
                $date = date('d');
                $day = 1;
                $month = date('m');
                $year = date('Y');
                while($day<32){
                  if($day<10){
                  $date1 = $year.'-'.$month.'-'.'0'.$day;
                  $timestamp = strtotime($date1);
                  $day_of_date = date('D', $timestamp);
                  }
                  else{
                  $date1 = $year.'-'.$month.'-'.$day;
                  $timestamp = strtotime($date1);
                  $day_of_date = date('D', $timestamp);
                  }
                  echo'<th style="color:white;" width="30%">'.$day.'<br>' . $day_of_date . '</th>';
                  $day = $day + 1;
                }
                ?>
            </tr>
        </thead>
        <tbody>
        <?php
        include("conn.php");
        $count = 0;

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
        $count = $count + 1;
        if($count%2 == 0){
            echo'<tr style="background-color:#585858;">';
        }
        else if($count%3 == 0){
            echo'<tr style="background-color:#003300;">';
        }
        else{
            echo'<tr style="background-color:#009900;">';
        }
            echo'<td style="color:white; font-size:17px; font-weight:bold;">'.$count.'</td>
                 <td style="color:white; font-size:17px; font-weight:bold;">'.$ro1[1].'</td>';
            //GET STUDENTS ATTENDANCE
            $date = date('d');
            $day = 1;
            $month = date('m');
            $year = date('Y');
            while($day<32){
                if($day<10){
                $date1 = $year.'-'.$month.'-'.'0'.$day;
                }
                else{
                $date1 = $year.'-'.$month.'-'.$day;
                }
                //GET ATTENDANCE
                $q2 = "SELECT * FROM attendance WHERE student='$ro1[0]' AND date='$date1'";
                $r2 =mysqli_query($conn,$q2);
                $ro2 = mysqli_fetch_array($r2);
                if(isset($ro2[0])){
                    echo'<td style="text-align:center; color:white; font-weight:bold; font-size:17px;">'.$ro2[1].'</td>';
                }
                else{
                    echo'<td style="text-align:center;"></td>';
                }
                $day = $day + 1;
                }
                echo'</tr>';
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