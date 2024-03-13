<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>REAL ESTATE DEVELOPERS</title>
<!-- plugins:css -->
<link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
<link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
<!-- endinject -->
<!-- Plugin css for this page -->
<!-- End plugin css for this page -->
<!-- inject:css -->
<!-- endinject -->
<!-- Layout styles -->
<link rel="stylesheet" href="assets/css/style.css">
<!-- End layout styles -->
<!--  <link rel="shortcut icon" href="assets/images/favicon.ico" /> -->
</head>
<body>
<div class="container-scroller">
<div class="container-fluid page-body-wrapper full-page-wrapper">
<div class="content-wrapper d-flex align-items-center auth">
<div class="row flex-grow">
<div class="col-lg-4 mx-auto">
<div class="auth-form-light text-left p-5">
<div class="brand-logo">
<!-- <img src="assets/images/logo.svg"> -->
<h3 class="card-title">REAL ESTATE DEVELOPERS</h3>
</div>
<h4 class="text-center mt-0">Admin Login</h4>
<h6 class="font-weight-light">Sign in to continue.</h6>
<?php 
include('pages/connect.php');
if (isset($_POST['sign_in'])) {
$username = $_POST['username'];
$password = $_POST['password']; 
$result_password = $conn->query("SELECT * FROM passwords WHERE status=1 AND username='$username' AND password='$password'");
$count_password = $result_password->rowCount();
$row_password = $result_password->fetchObject();
if($count_password > 0){
$result_users = $conn->query("SELECT * FROM users WHERE rolenumber='$row_password->rolenumber'");
$row_users = $result_users->fetchObject();
$_SESSION['firstname'] = $row_users->firstname;
$_SESSION['lastname'] = $row_users->lastname;
$_SESSION['role'] = $row_users->role;
$_SESSION['rolenumber'] = $row_users->rolenumber;

$ip_address = $_SERVER['REMOTE_ADDR'];
if(isset($_SERVER['HTTP_REFERER'])){$previous_page=$_SERVER['HTTP_REFERER']; }else{$previous_page=""; }
$current_page = $_SERVER['SCRIPT_NAME'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$insert_activity = $conn->query("INSERT INTO useractivity(activity,userid,deviceid,browser,previous_page,current_page) VALUES('System Login','$row_users->rolenumber','$ip_address','$browser','$previous_page','$current_page')");

header('location:pages/Properties.php');
}
else{
echo '<div class="alert alert-warning">Wrong username and password</div>';
}

}
?>
<form class="pt-3" method="POST" autocomplete="off">
<div class="form-group">
<input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
</div>
<div class="form-group">
<input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
</div>
<div class="mt-3">
<button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" style="width: 100%;" name="sign_in" type="submit">SIGN IN</button>
</div>
<div class="my-2 d-flex justify-content-between align-items-center">
<div class="form-check">
<label class="form-check-label text-muted">
<input type="checkbox" class="form-check-input"> Keep me signed in </label>
</div>
<a href="#" class="auth-link text-black">Forgot password?</a>
</div>
<!--  <div class="mb-2">
<button type="button" class="btn btn-block btn-facebook auth-form-btn">
<i class="mdi mdi-facebook me-2"></i>Connect using facebook </button>
</div> -->
<div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
</div>
</form>
</div>
</div>
</div>
</div>
<!-- content-wrapper ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
</body>
</html>