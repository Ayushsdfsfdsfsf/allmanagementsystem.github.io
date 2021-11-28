<?php
error_reporting(0);
?>
<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <div class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li>
        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <li>
          <a href="#" class="nav-link nav-link-lg fullscreen-btn">
            <i class="fas fa-expand"></i>
          </a>
      </li>
      <?php
      include("conn.php");
      $id = $_SESSION['accountant'];
      $q = "SELECT * FROM accountant WHERE id='$id'";
      $r =mysqli_query($conn,$q);
      $ro = mysqli_fetch_array($r);
      echo'
      <li>
          <h5>Welcome '.$ro[1].'</h5>
      </li>';
      ?>
    </ul>
  </div>
</nav>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="dashboard.php">
        <?php echo $_SESSION['school_name']; ?>
      </a>
    </div>
    <ul class="sidebar-menu">
    	<?php
      include("conn.php");
      $id = $_SESSION['accountant'];
      $q = "SELECT * FROM accountant WHERE id='$id'";
      $r =mysqli_query($conn,$q);
      $ro = mysqli_fetch_array($r);
      echo'
      <li class="dropdown active" style="display: block;">
    		 <div class="sidebar-profile">
             <div class="siderbar-profile-pic">
                 <img src="'.$ro[8].'" class="profile-img-circle box-center" alt="User Image">
             </div>
             <div class="siderbar-profile-details">
                 <div class="siderbar-profile-name">'.$ro[1].'</div>
                 <div class="siderbar-profile-position">'.$ro[4].'</div>
             </div>
           </div>
      </li>';
      ?>
      <hr>
      <li class="dropdown">
        <a href="dashboard.php" class="nav-link"><i class="fas fa-desktop"></i><span style="margin-left: 10px;">Dashboard</span></a>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Student Dues</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="student-dues.php">Add Dues</a></li>
          <li><a class="nav-link" href="student-all-dues.php">All Dues</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Teacher Expenses(Pro)</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="">Add Expenses</a></li>
          <li><a class="nav-link" href="">All Expenses</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">School Expenses(Pro)</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="">Add Expenses</a></li>
          <li><a class="nav-link" href="">Current Month Expenses</a></li>
          <li><a class="nav-link" href="">Expenses All Record</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Collect Fees</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="fees-current-month.php">Current Month</a></li>
          <li><a class="nav-link" href="fees-last-month.php">Last Month</a></li>
          <li><a class="nav-link" href="fees-all-record.php">All Record</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Pay Salary(Pro)</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="">Current Month</a></li>
          <li><a class="nav-link" href="">Last Month</a></li>
          <li><a class="nav-link" href="">All Record</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="update-profile.php" class="nav-link"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Update Profile</span></a>
      </li>
      <li class="dropdown">
        <a href="logout.php" class="nav-link"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Logout</span></a>
      </li>
    </ul>
  </aside>
</div>