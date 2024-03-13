<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php kheader(); ?>
</head>
<body>
<div class="container-scroller">
<!-- partial:../../partials/_navbar.html -->
<?php knavbar(); ?>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
<!-- partial:../../partials/_sidebar.html -->
<?php sidebar(); ?>
<!-- partial -->
<div class="main-panel">
<div class="content-wrapper">
<div class="card card-default">
<div class="card-header"><h2 class="card-title">System Updates</h2></div>
<div class="card-body">
<?php 
$action=$_GET['action'];
$id=$_GET['ourid'];
if($action=="location"){
if(isset($_POST['update_location'])){
$locationid=$_POST['locationid'];
$location=$_POST['location'];
$update_scrap=$conn->query("update scrap set item2='$location' where item='$locationid'");
if($update_scrap){echo "<div class='alert alert-success'>Update Successfull</div>";}else{echo "<div class='alert alert-warning'>Update Failure</div>";}}
$result_scrap= $conn->query("select * from scrap where type='loc' and item='$id'");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
if($count_scrap > 0){ echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='locationid' value='".$row_scrap->item."'>
<div class='row'>
<div class='col-lg-10'>
<label>Location name</label>
<input type='text' class='form-control' name='location' value='".$row_scrap->item2."'>
</div>
<div class='col-lg-2'>
<input type='submit' class='btn btn-sm btn-warning btn-block' name='update_location'>
</div>
</div>
</form>";}
}elseif ($action=="spec"){
if(isset($_POST['update_spec'])){
$specid=$_POST['specid'];
$spec=$_POST['spec'];
$update_scrap=$conn->query("update scrap set item2='$spec' where item='$specid'");
if($update_scrap){echo "<div class='alert alert-success'>Update Successful</div>";}else{echo "<div class='alert alert-warning'>Update Failed</div>";}}
$result_scrap=$conn->query("select * from scrap where type='Spec' and item='$id'");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
if($count_scrap > 0){
echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='specid' value='".$row_scrap->item."'>
<div class='row'>
<div class='col-lg-10'>
<label>Specifications</label>
<input type='text' class='form-control' name='spec' value='".$row_scrap->item2."'>
</div>
<div class='col-lg-2'>
<input type='submit' class='btn btn-sm btn-warning btn-block' name='update_spec'>
</div>
</div>
</form>";}
}elseif($action=="rolename"){
if(isset($_POST['update_rolename'])){
$rolenameid=$_POST['rolenameid'];
$rolename=$_POST['rolename'];
$initials=$_POST['initials'];
$update_scrap=$conn->query("update scrap set item2='$rolename',item3='$initials' where item='$rolenameid' ");
if($update_scrap){ echo "<div class='alert alert-success'>Update successfull</div>";}else{echo "<div class='alert alert-warning'>Update Failure</div>";}}
$result_scrap=$conn->query("select * from scrap where type='role' and item='$id'");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
if($count_scrap>0){echo 
"<form method='POST' autocomplete='off'>
<input type='hidden' name='rolenameid' value='".$row_scrap->item."'>
<div class='row'>
<div class='col-lg-10'>
<div class='col-lg-5'>
<label>Rolename</label>
<input type='text' class='form-control' name='rolename' value='".$row_scrap->item2."'>
</div>
<div class='col-lg-5'>
<label>Initials</label>
<input type='text' name='initials' class='form-control' value='".$row_scrap->item3."'>
</div>
</div>
<div class='col-lg-2'>
<input type='submit' class='btn btn-sm btn-block btn-warning' name='update_rolename'>
</div>
</div>
</form>";
}
}elseif ($action=="cat"){
if(isset($_POST['update_cat'])){
$catid=$_POST['catid'];
$cat=$_POST['cat'];
$update_scrap=$conn->query("update scrap set item2='$cat' where item='$catid'");
if($update_scrap){echo "<div class='alert alert-success'>Update Successfull</div>";}else{echo "<div class='alert alert-warning'>Update Failed</div>";}}
$result_scrap=$conn->query("select * from scrap where type='cat' and item='$id'");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
if($count_scrap>0){
echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='catid' value='".$row_scrap->item."'>
<div class='row'>
<div class='col-lg-10'>
<label>Category</label>
<input type='text' name='cat' class='form-control' value='".$row_scrap->item2."'>
</div>
<div class='col-lg-2'>
<input type='submit' name='update_cat' class='btn btn-sm btn-block btn-warning'>
</div>
</div>
</form>";
}
}elseif ($action=="fac"){
if(isset($_POST['update_fac'])){
$facid=$_POST['facid'];
$fac=$_POST['fac'];
$update_scrap=$conn->query("update scrap set item2='$fac' where item='$facid'");
if($update_scrap){echo "<div class='alert alert-success'>Update Successfull</div>";}else{echo "<div class='alert alert-warning'>Update Failed</div>";}}
$result_scrap=$conn->query("select * from scrap where type='fac' and item='$id'");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
if($count_scrap>0){
echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='facid' value='".$row_scrap->item."'>
<div class='row'>
<div class='col-lg-10'>
<label>Facilities</label>
<input type='text' name='fac' class='form-control' value='".$row_scrap->item2."'>
</div>
<div class='col-lg-2'>
<input type='submit' name='update_fac' class='btn btn-sm btn-block btn-warning'>
</div>
</div>
</form>";
}
}elseif ($action=="con"){
if(isset($_POST['update_con'])){
$conid=$_POST['conid'];
$con=$_POST['con'];
$update_scrap=$conn->query("update scrap set item2='$con' where item='$conid'");
if($update_scrap){echo "<div class='alert alert-success'>Update Successfull</div>";}else{echo "<div class='alert alert-warning'>Update Failed</div>";}}
$result_scrap=$conn->query("select * from scrap where type='con' and item='$id'");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
if($count_scrap>0){
echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='conid' value='".$row_scrap->item."'>
<div class='row'>
<div class='col-lg-10'>
<label>Conditions</label>
<input type='text' name='con' class='form-control' value='".$row_scrap->item2."'>
</div>
<div class='col-lg-2'>
<input type='submit' name='update_con' class='btn btn-sm btn-block btn-warning'>
</div>
</div>
</form>";
}
}elseif ($action=="prop"){
if(isset($_POST['update_prop'])){
$propid=$_POST['propid'];
$prop=$_POST['prop'];
$update_scrap=$conn->query("update scrap set item2='$prop' where item='$propid'");
if($update_scrap){echo "<div class='alert alert-success'>Update Successfull</div>";}else{echo "<div class='alert alert-warning'>Update Failed</div>";}}
$result_scrap=$conn->query("select * from scrap where type='prop' and item='$id'");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
if($count_scrap>0){
echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='propid' value='".$row_scrap->item."'>
<div class='row'>
<div class='col-lg-10'>
<label>Conditions</label>
<input type='text' name='prop' class='form-control' value='".$row_scrap->item2."'>
</div>
<div class='col-lg-2'>
<input type='submit' name='update_prop' class='btn btn-sm btn-block btn-warning'>
</div>
</div>
</form>";
}
}elseif ($action=="furn"){
if(isset($_POST['update_furn'])){
$furnid=$_POST['furnid'];
$furn=$_POST['furn'];
$update_scrap=$conn->query("update scrap set item2='$furn' where item='$furnid'");
if($update_scrap){echo "<div class='alert alert-success'>Update Successfull</div>";}else{echo "<div class='alert alert-warning'>Update Failed</div>";}}
$result_scrap=$conn->query("select * from scrap where type='furn' and item='$id'");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
if($count_scrap>0){
echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='furnid' value='".$row_scrap->item."'>
<div class='row'>
<div class='col-lg-10'>
<label>Conditions</label>
<input type='text' name='furn' class='form-control' value='".$row_scrap->item2."'>
</div>
<div class='col-lg-2'>
<input type='submit' name='update_furn' class='btn btn-sm btn-block btn-warning'>
</div>
</div>
</form>";
}
}elseif ($action=='pswd'){
if(isset($_POST['update_name'])){
$rolenumberid=$_POST['rolenumberid'];
$name=$_POST['name'];
$update_passwords=$conn->query("update passwords set pswdexpiry='$name' where rolenumber='$rolenumberid'");
if($update_passwords){echo "<div class='alert alert-success'>Updating Successful</div>";}else{echo "<div class='alert alert-warning'>Updating Failed</div>";}}
$result_passwords=$conn->query("select * from passwords where rolenumber='$id'");
$count_passwords=$result_passwords->rowCount();
$row_passwords=$result_passwords->fetchObject();
if($count_passwords>0){
echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='rolenumberid' value='".$row_passwords->rolenumber."'>
<div class='row'>
<div class='col-lg-3'>
<label>Name</label>
<input type='text' name='name' value='".$row_passwords->username."' class='form-control' readonly>
</div>
<div class='col-lg-3'>
<label>Expired On</label>
<input type='text' name='password_expiry' value='".$row_passwords->pswdexpiry."' class='form-control' readonly>
</div>
<div class='col-lg-3'>
<label>Renew Account</label>
<input type='date' name='extend_password' class='form-control'>
</div>
<div class='col-lg-3'>
<br>
<input type='submit' class='btn btn-sm btn-block btn-warning' name='update_password'>
</div>
</div>
</form>";
}
}elseif ($action=="prop"){
if(isset($_POST['update_prop'])){
$propid=$_POST['propid'];
$prop=$_POST['prop'];
$update_properties=$conn->query("update properties set prop_name='$prop' where prop_id='$propid'");
if($update_properties){echo "<div class='alert alert-success'>Update Successfull</div>";}else{echo "<div class='alert alert-warning'>Update Failed</div>";}}
$result_properties=$conn->query("select * from properties where prop_id='$id'");
$count_properties=$result_properties->rowCount();
$row_properties=$result_properties->fetchObject();
if($count_properties>0){echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='propid' value='".$row_properties->prop_id."'>
<div class='row'>
<div class='col-lg-10'>
<label>About</label>
<input type='text' name='prop' class='form-control' value='".$row_properties->prop_name."'>
</div>
<div class='col-lg-2'>
<input type='submit' name='update_prop' class='btn btn-sm btn-block btn-warning'>
</div>
</div>
</form>";
}
}elseif($action="requests"){
if(isset($_POST['update_requests'])){
$clientid=$_POST['clientid'];
$requests=$_POST['requests'];
$update_requests=$conn->query("update requests set clientid='$requests' where prop_id='$clientid'");
if($update_requests){echo "<div class='alert alert-success'>Updating Successfull</div>";}else{echo "<div class='alert alert-warning'>Updating Failed</div>";}
}
$result_requests=$conn->query("select * from requests where prop_id='$id'");
$count_requests=$result_requests->rowCount();
$row_requests=$result_requests->fetchObject();
if($count_requests>0){echo
"<form method='POST' autocomplete='off'>
<input type='hidden' name='clientid' value='".$row_requests->prop_id."'>
<div class='row'>
<div class='col-lg-10'>
<label>clientid</label>
<input type='text' class='form-control' name='requests' value='".$row_requests->clientid."'>
</div>
<div class='col-lg-2'>
<input type='submit' class='btn btn-sm btn-block btn-warning' name='update_requests'>
</div>
</div>
</form>";}
}elseif($action=="feed"){
if(isset($_POST['update_feed'])){
$feedid=$_POST['feedid'];
$feed=$_POST['feed'];
$update_feedback=$conn->query("update feedback set message='$feed' where feedid='feedid'");
if($update_feedback){echo "<div class='alert alert-success'>Updating Successfull</div>";}else{echo "<div class='alert alert-warning'>Updating Failed</div>";}
}
$result_feedback=$conn->query("select * from feedback where feedid='$id'");
$count_feedback=$result_feedback->rowCount();
$row_feedback=$result_feedback->fetchObject();
if($count_feedback>0){echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='feedid' value='".$row_feedback->feedid."'>
<div class='row'>
<div class='col-lg-10'>
<label>Message</label>
<input type='text' name='feed' value='".$row_feedback->message."' class='form-control'>
</div>
<div class='col-lg-2'>
<input type='submit' name='update_feed' class='btn btn-sm btn-block btn-warning'>
</div>
</div>
</form>";}
}elseif($action=='sub'){
if(isset($_POST['update_sub'])){
$subid=$_POST['subid'];
$sub=$_POST['sub'];
$update_subscribers=$conn->query("update subscribers set sub_email='sub' where name='subid'");
if($update_subscribers){echo "<div class='alert alert-success'>Updating Successfull</div>";}else{echo "<div class='alert alert-warning'>Updating Failed</div>";}
}
$result_subscribers=$conn->query("select * from subscribers where name='$id'");
$count_subscribers=$result_subscribers->rowCount();
$row_subscribers=$result_subscribers->fetchObject();
if($count_subscribers>0){echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='subid' value='".$row_subscribers->name."'>
<div class='row'>
<div class='col-lg-10'>
<label>Email</div>
<input type='text' name='sub' value='".$row_subscribers->sub_email." class='form-control''>
<div class='col-lg-2'>
<input type='submit' name='update_sub' class='btn btn-sm btn-block btn-warning'>
</div>
</div>
</form>";}
}elseif($action=="clients"){
include ('connect.php');
if(isset($_POST['update_clients'])){
$clientid=$_POST['clientid'];
$clients=$_POST['clients'];
$update_clients=$conn->query("update clients set firstname='$clients' where clientid='$clientid'");
if($update_clients){echo "<div class='alert alert-success'>Updating Successfull</div>";}else{echo "<div class='alert alert-warning'>Updating Failed</div>";}
}
$result_clients=$conn->query("select * from clients where clientid='$id'");
$count_clients=$result_clients->rowCount();
$row_clients=$result_clients->fetchObject();
if($count_clients>0){echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='clientid' value='".$row_clients->clientid."'>
<div class='row'>
<div class='col-lg-10'>
<label>Name</label>
<input type='text' class='form-control' name='clients' value='".$row_clients->firstname."'>
</div>
<div class='col-lg-2'>
<input type='submit' name='update_clients' class='btn btn-sm btn-block btn-warning'>
</div>
</div>
</form>";}
}elseif($action=="status"){
if(isset($_POST['update_status'])){
$statusid=$_POST['statusid'];
$status=$_POST['status'];
$update_clients=$conn->query("update clients set username='$status' where statusid='$statusid'");
if($update_clients){echo "<div class='alert alert-success'>Updating Successfull</div>";}else{echo "<div class='alert alert-warning'>Updating Failed</div>";}
}
$result_clients=$conn->query("select * from client where clientid='$id'");
$count_clients=$result_clients->rowCount();
$row_clients=$result_clients->fetchObject();
if($count_clients>0){
echo "<form method='POST' autocomplete='off'>
<input type='hidden' name='statusid' value='".$row_clients->clientid."'>
<div class='row'>
<div class='col-lg-10'>
<label>Name</label>
<input type='text' class='form-control' name='status' value='".$row_clients->username."'>
</div>
<div class='col-lg-2'>
<input type='submit' name='update_status' class='btn btn-sm btn-block btn-warning'>
</div>
</div>
</form>";
}
}
?>






</div>
</div>
</div>
<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
<?php footer(); ?>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<?php scripts(); ?>
</body>
</html>