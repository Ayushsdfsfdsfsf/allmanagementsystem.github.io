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
      $id = $_SESSION['admin'];
      $q = "SELECT * FROM admin WHERE id='$id'";
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
      $id = $_SESSION['admin'];
      $q = "SELECT * FROM admin WHERE id='$id'";
      $r =mysqli_query($conn,$q);
      $ro = mysqli_fetch_array($r);
      echo'
      <li class="dropdown active" style="display: block;">
    		 <div class="sidebar-profile">
             <div class="siderbar-profile-pic">
                 <img src="'.$ro[5].'" class="profile-img-circle box-center" alt="User Image">
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
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Manage Students</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="student-add.php">Add Students</a></li>
          <li><a class="nav-link" href="student-all.php">All Students</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Manage Teachers</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="teacher-add.php">Add Teachers</a></li>
          <li><a class="nav-link" href="teacher-all.php">All Teachers</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Manage Parents</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="parent-add.php">Add Parents</a></li>
          <li><a class="nav-link" href="parent-all.php">All Parents</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Manage Librarian</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="librarian-add.php">Add Librarian</a></li>
          <li><a class="nav-link" href="librarian-all.php">All Librarians</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Manage Accountant</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="accountant-add.php">Add Accountant</a></li>
          <li><a class="nav-link" href="accountant-all.php">All Accountant</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Manage Complaints</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="complaint-add.php">Add Complaints</a></li>
          <li><a class="nav-link" href="complaint-all.php">All Complaints</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Assignments(Pro)</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="">Add Assignments</a></li>
          <li><a class="nav-link" href="">Pending Assignments</a></li>
          <li><a class="nav-link" href="">Completed Assignments</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Attendance(Pro)</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="">Record Records</a></li>
          <li><a class="nav-link" href="">Current Month Records</a></li>
      </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Expenses (Pro)</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="">Add Expenses</a></li>
          <li><a class="nav-link" href="">Current Month Record</a></li>
          <li><a class="nav-link" href="">All Record</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Manage Classes</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="class-add.php">Add Classes</a></li>
          <li><a class="nav-link" href="class-all.php">All Classes</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="update-profile.php" class="nav-link"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Update Profile</span></a>
      </li>
      <li class="dropdown">
        <a href="general-settings.php" class="nav-link"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">General Settings</span></a>
      </li>
      <li class="dropdown">
        <a href="logout.php" class="nav-link"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Logout</span></a>
      </li>
    </ul>
  </aside>
</div>