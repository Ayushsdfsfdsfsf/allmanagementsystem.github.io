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
      <li>
        <h4 class="nav-link nav-link-lg fullscreen-btn">
            <?php
            include("conn.php");
            if(isset($_SESSION['librarian'])){
              $id = $_SESSION['librarian'];
              $q = "SELECT * FROM librarian WHERE id='$id'";
              $r =mysqli_query($conn,$q);
              $ro = mysqli_fetch_array($r);
              if(isset($ro[0])){
                echo 'Welcome ' . $ro[1];
              }
            }
            ?>
        </h4>
      </li>
    </ul>
  </div>
</nav>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">
        <?php echo $_SESSION['school_name']; ?>
      </a>
    </div>
    <ul class="sidebar-menu">
    	<li class="dropdown active" style="display: block;">
      <?php
      if(isset($_SESSION['librarian'])){
        $id = $_SESSION['librarian'];
        $q = "SELECT * FROM librarian WHERE id='$id'";
        $r =mysqli_query($conn,$q);
        $ro = mysqli_fetch_array($r);
    	  echo'
         <div class="sidebar-profile">
             <div class="siderbar-profile-pic">
                 <img src="../admin/'.$ro[8].'" class="profile-img-circle box-center" alt="User Image">
             </div>
             <div class="siderbar-profile-details">
                 <div class="siderbar-profile-name"> '.$ro[1].' </div>
                 <div class="siderbar-profile-position"> '.$ro[4].' </div>
             </div>
           </div>';
         }
         ?>
       </li>
       <hr>
      <li>
        <a href="dashboard.php" class="nav-link"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Dashboard</span></a>
      </li>
      <li>
        <a class="nav-link" href="book-add.php">
          <i class="fab fa-atlassian"></i>
          <span style="margin-left: 10px;">Add Books</span>
        </a>
      </li>
      <li>
        <a class="nav-link" href="book-all.php">
          <i class="fab fa-atlassian"></i>
          <span style="margin-left: 10px;">All Books</span>
        </a>
      </li>
      <li>
        <a class="nav-link" href="book-give.php">
          <i class="fab fa-atlassian"></i>
          <span style="margin-left: 10px;">Issue Books(Pro)</span>
        </a>
      </li>
      <li>
        <a class="nav-link" href="book-return.php">
          <i class="fab fa-atlassian"></i>
          <span style="margin-left: 10px;">Reutrn Books(Pro)</span>
        </a>
      </li>
      <li class="dropdown">
        <a href="logout.php" class="nav-link"><i class="fab fa-atlassian"></i><span style="margin-left: 10px;">Logout</span></a>
      </li>
    </ul>
  </aside>
</div>