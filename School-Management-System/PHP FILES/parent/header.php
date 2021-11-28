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
      $id = $_SESSION['parent'];
      $q = "SELECT * FROM parents WHERE id='$id'";
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
      <a href="attendance-add.php">
        <?php echo $_SESSION['school_name']; ?>
      </a>
    </div>
    <ul class="sidebar-menu">
    	<?php
      include("conn.php");
      $id = $_SESSION['parent'];
      $q = "SELECT * FROM parents WHERE id='$id'";
      $r =mysqli_query($conn,$q);
      $ro = mysqli_fetch_array($r);
      echo'
      <li class="dropdown active" style="display: block;">
    		 <div class="sidebar-profile">
             <div class="siderbar-profile-pic">
                 <img src="../admin/uploads/profile.PNG" class="profile-img-circle box-center" alt="User Image">
             </div>
             <div class="siderbar-profile-details">
                 <div class="siderbar-profile-name">'.$ro[1].'</div>
             </div>
           </div>
      </li>';
      ?>
      <hr>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Manage Attendance</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="attendance-monthly-details.php">Monthly Attendance</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="#" class="nav-link has-dropdown"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Manage Assignments</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="assignment-pending.php">Pending Assignments</a></li>
          <li><a class="nav-link" href="assignment-completed.php">Completed Assignments</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="complains.php" class="nav-link"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Complains</span></a>
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