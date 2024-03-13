<?php 
@session_start();
include('connect.php'); ?>
<?php 
$rolenumber = $_SESSION['rolenumber'];
$role = $_SESSION['role'];
function kheader(){
echo "
<!-- Required meta tags -->
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
<title>REAL ESTATE DEVELOPERS</title>
<!-- plugins:css -->
<link rel='stylesheet' href='../assets/vendors/mdi/css/materialdesignicons.min.css'>
<link rel='stylesheet' href='../assets/vendors/css/vendor.bundle.base.css'>
<!-- endinject -->
<!-- Plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel='stylesheet' href='../assets/css/style.css'>
<!-- End layout styles -->
<!-- <link rel='shortcut icon' href='../assets/images/favicon.ico' /> -->
";
}
function knavbar(){
echo "
<nav class='navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row'>
<div class='text-center navbar-brand-wrapper d-flex align-items-center justify-content-center'>
<a class='navbar-brand brand-logo' href='../../index.html'>
<h3 class='text-primary'>UG REAL ESTATES</h3>
</a>
</div>
<div class='navbar-menu-wrapper d-flex align-items-stretch'>
<button class='navbar-toggler navbar-toggler align-self-center' type='button' data-toggle='minimize'>
<span class='mdi mdi-menu'></span>
</button>
<div class='search-field d-none d-md-block'>
<form class='d-flex align-items-center h-100' action='#'>
<div class='input-group'>
<div class='input-group-prepend bg-transparent'>
<i class='input-group-text border-0 mdi mdi-magnify'></i>
</div>
<input type='text' class='form-control bg-transparent border-0' placeholder='Search projects'>
</div>
</form>
</div>
<ul class='navbar-nav navbar-nav-right'>
<li class='nav-item nav-profile dropdown'>
<a class='nav-link dropdown-toggle' id='profileDropdown' href='#' data-bs-toggle='dropdown' aria-expanded='false'>
<div class='nav-profile-img'>
<img src='../pages/public/faces/001.jpg' alt='image'>
<span class='availability-status online'></span>
</div>
<div class='nav-profile-text'>
<p class='mb-1 text-black'>".$_SESSION['firstname']." ".$_SESSION['lastname']."</p>
</div>
</a>
<div class='dropdown-menu navbar-dropdown' aria-labelledby='profileDropdown'>
<a class='dropdown-item' href='#'>
<i class='mdi mdi-cached me-2 text-success'></i> Activity Log </a>
<div class='dropdown-divider'></div>
<a class='dropdown-item' href='../pages/logout.php'>
<i class='mdi mdi-logout me-2 text-primary'></i> Signout </a>
</div>
</li>
<li class='nav-item d-none d-lg-block full-screen-link'>
<a class='nav-link'>
<i class='mdi mdi-fullscreen' id='fullscreen-button'></i>
</a>
</li>
<li class='nav-item dropdown'>
<a class='nav-link count-indicator dropdown-toggle' id='messageDropdown' href='#' data-bs-toggle='dropdown' aria-expanded='false'>
<i class='mdi mdi-email-outline'></i>
<span class='count-symbol bg-warning'></span>
</a>
<div class='dropdown-menu dropdown-menu-right navbar-dropdown preview-list' aria-labelledby='messageDropdown'>
<h6 class='p-3 mb-0'>Messages</h6>
<div class='dropdown-divider'></div>
<a class='dropdown-item preview-item'>
<div class='preview-thumbnail'>
<img src='../assets/images/faces/face4.jpg' alt='image' class='profile-pic'>
</div>
<div class='preview-item-content d-flex align-items-start flex-column justify-content-center'>
<h6 class='preview-subject ellipsis mb-1 font-weight-normal'>Mark send you a message</h6>
<p class='text-gray mb-0'> 1 Minutes ago </p>
</div>
</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item preview-item'>
<div class='preview-thumbnail'>
<img src='../assets/images/faces/face2.jpg' alt='image' class='profile-pic'>
</div>
<div class='preview-item-content d-flex align-items-start flex-column justify-content-center'>
<h6 class='preview-subject ellipsis mb-1 font-weight-normal'>Cregh send you a message</h6>
<p class='text-gray mb-0'> 15 Minutes ago </p>
</div>
</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item preview-item'>
<div class='preview-thumbnail'>
<img src='../assets/images/faces/face3.jpg' alt='image' class='profile-pic'>
</div>
<div class='preview-item-content d-flex align-items-start flex-column justify-content-center'>
<h6 class='preview-subject ellipsis mb-1 font-weight-normal'>Profile picture updated</h6>
<p class='text-gray mb-0'> 18 Minutes ago </p>
</div>
</a>
<div class='dropdown-divider'></div>
<h6 class='p-3 mb-0 text-center'>4 new messages</h6>
</div>
</li>
<li class='nav-item dropdown'>
<a class='nav-link count-indicator dropdown-toggle' id='notificationDropdown' href='#' data-bs-toggle='dropdown'>
<i class='mdi mdi-bell-outline'></i>
<span class='count-symbol bg-danger'></span>
</a>
<div class='dropdown-menu dropdown-menu-right navbar-dropdown preview-list' aria-labelledby='notificationDropdown'>
<h6 class='p-3 mb-0'>Notifications</h6>
<div class='dropdown-divider'></div>
<a class='dropdown-item preview-item'>
<div class='preview-thumbnail'>
<div class='preview-icon bg-success'>
<i class='mdi mdi-calendar'></i>
</div>
</div>
<div class='preview-item-content d-flex align-items-start flex-column justify-content-center'>
<h6 class='preview-subject font-weight-normal mb-1'>Event today</h6>
<p class='text-gray ellipsis mb-0'> Just a reminder that you have an event today </p>
</div>
</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item preview-item'>
<div class='preview-thumbnail'>
<div class='preview-icon bg-warning'>
<i class='mdi mdi-settings'></i>
</div>
</div>
<div class='preview-item-content d-flex align-items-start flex-column justify-content-center'>
<h6 class='preview-subject font-weight-normal mb-1'>Settings</h6>
<p class='text-gray ellipsis mb-0'> Update dashboard </p>
</div>
</a>
<div class='dropdown-divider'></div>
<a class='dropdown-item preview-item'>
<div class='preview-thumbnail'>
<div class='preview-icon bg-info'>
<i class='mdi mdi-link-variant'></i>
</div>
</div>
<div class='preview-item-content d-flex align-items-start flex-column justify-content-center'>
<h6 class='preview-subject font-weight-normal mb-1'>Launch Admin</h6>
<p class='text-gray ellipsis mb-0'> New admin wow! </p>
</div>
</a>
<div class='dropdown-divider'></div>
<h6 class='p-3 mb-0 text-center'>See all notifications</h6>
</div>
</li>
<li class='nav-item nav-logout d-none d-lg-block'>
<a class='nav-link' href='../pages/logout.php'>
<i class='mdi mdi-power'></i>
</a>
</li>
<li class='nav-item nav-settings d-none d-lg-block'>
<a class='nav-link' href='#'>
<i class='mdi mdi-format-line-spacing'></i>
</a>
</li>
</ul>
<button class='navbar-toggler navbar-toggler-right d-lg-none align-self-center' type='button' data-toggle='offcanvas'>
<span class='mdi mdi-menu'></span>
</button>
</div>
</nav>
";
}
function sidebar(){
$role = $_SESSION['role'];
include('connect.php');
$rolenumber = $_SESSION['rolenumber'];
echo "
<nav class='sidebar sidebar-offcanvas' id='sidebar'>
<ul class='nav'>
<li class='nav-item nav-profile'>
<a href='#' class='nav-link'>
<div class='nav-profile-image'>
<img src='../pages/public/faces/001.jpg' alt='profile'>
<span class='login-status online'></span>
<!--change to offline or busy as needed-->
</div>
<div class='nav-profile-text d-flex flex-column'>
<span class='font-weight-bold mb-2'>".$_SESSION['firstname']." ".$_SESSION['lastname']."</span>";
$result_users =$conn->query("SELECT * FROM users WHERE rolenumber='$rolenumber'");
$row_users = $result_users->fetchObject();
echo
"<span class='text-secondary text-small'>".$row_users->fulltitle."</span>
</div>
<i class='mdi mdi-bookmark-check text-success nav-profile-badge'></i>
</a>
</li>";
$result_menu = $conn->query("SELECT * FROM menu WHERE role like '%$role%' and type='' order by itemorder asc ");
$count_menu = $result_menu->rowCount();
$row_menu = $result_menu->fetchObject();
if($count_menu>0){
do{
echo"
<li class='nav-item'>
<a class='nav-link' href='".$row_menu->link."'>
<span class='menu-title'>".$row_menu->item."</span>	
<i class='".$row_menu->img." menu-icon'></i>
</a>
</li>
";
}while($row_menu=$result_menu->fetchObject());
}
echo "
</ul>
</nav>
";
}
function scripts(){
echo "
<script src='../assets/vendors/js/vendor.bundle.base.js'></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src='../assets/js/off-canvas.js'></script>
<script src='../assets/js/hoverable-collapse.js'></script>
<script src='../assets/js/misc.js'></script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->
";
}
function footer(){
echo "<footer class='footer'>
<div class='container-fluid d-flex justify-content-between'>
<span class='text-muted d-block text-center text-sm-start d-sm-inline-block'>Copyright © hashim.2021</span>
<span class='float-none float-sm-end mt-1 mt-sm-0 text-end'>REAL ESTATE MANAGEMENT SYSTEM</span>
</div>
</footer>";
}
$ip_address = $_SERVER['REMOTE_ADDR'];
if(isset($_SERVER['HTTP_REFERER'])){$previous_page=$_SERVER['HTTP_REFERER']; }else{$previous_page=""; }
$current_page = $_SERVER['SCRIPT_NAME'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$insert_activity = $conn->query("INSERT INTO useractivity(activity,userid,deviceid,browser,previous_page,current_page) VALUES('System Usage','$rolenumber','$ip_address','$browser','$previous_page','$current_page')");

?>