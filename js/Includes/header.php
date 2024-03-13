<?php @session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Real Estate Developers</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com/" />
<!-- css -->
<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
<link href="css/flexslider.css" rel="stylesheet" /> 
<link href="css/style.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<?php
include('admin/pages/connect.php');
if(isset($_POST['submit_signin'])){
$username=$_POST['username'];
$password=$_POST['password'];
$result_clients=$conn->query("select * from clients where status=1 and username='$username' and password='$password'");
$count_clients=$result_clients->rowCount();
$row_clients=$result_clients->fetchObject();
if($count_clients > 0){
$_SESSION['firstname']=$row_clients->firstname;
$_SESSION['secondname']=$row_clients->secondname;
$_SESSION['email']=$row_clients->email;
$_SESSION['clientid']=$row_clients->clientid; ?>
<script type="text/javascript">
var allowed=function(){window.location='client_profile.php';}
setTimeout(allowed,500);
</script>
<?php }else{echo "<div class='alert alert-warning'>Wrong Username and Password</div>";}
}
?>
<div class="modal fade" id="signin">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header"><h2 class="modal-title text-center">SIGN IN</h2></div>
<div class="modal-body">

<form method="POST" autocomplete="off">
<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control">
</div>
<div class="form-group">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>
<div class="form-group">
<input type="submit" value="Sign in" name="submit_signin" class="btn btn-sm btn-block btn-primary" >
</div>
</form>
</div>
</div>
</div>
</div>
