<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php kheader(); ?>
<!-- <link rel="stylesheet" type="text/css" href="../css/adminlte.css"> -->
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
<div class="card-header"><h1>SYSTEM SETTINGS</h1></div>
<div class="card-body">
<div class="row">
<div class="col-md-4">
<div class="card card-default">
<div class="card-header bg-primary"><h2 class="text-center text-white">LOCATION</h2></div>
<div class="card-body">
<?php 
if(isset($_POST['submit_location'])){
$location = $_POST['location'];
//Creating a dynamic unquie id using php//
$result_scrap = $conn->query("SELECT * FROM scrap Where autoid>0");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap<=0){$locid = "loc1";}else{
do{
$locid="loc".($row_scrap->autoid+1);
}while($row_scrap=$result_scrap->fetchObject());
}
$insert_loc = $conn->query("INSERT INTO scrap(item,item2,type) VALUES('$locid','$location','loc')");
if($insert_loc){
echo "<div class='alert alert-success'>Submission Successful</div>";
}else{echo "<div class='alert alert-danger'>Failure Try Again</div>";}
}
if(isset($_POST['delete_location'])){
$locationid=$_POST['locationid'];
$delete_location=$conn->query("delete from scrap where item='$locationid'");
if($delete_location){
echo "<div class='alert alert-danger'>Delete Successful</div>";
}
}
?>
<form method="POST" autocomplete="off">
<div class="form-group">
<label>location name</label>
<input type="text" placeholder="location name" class="form-control" name="location">
</div>
<div class="form-group">
<input type="submit" name="submit_location" class="btn btn-sm btn-block btn-success" style="width: 100%;">
</div>
</form>
<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#loc" aeria-expanded="false" area-controls="loc">View locations</button>
<div class="collapse" id="loc">
<div class="card-body">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>No.</th>
<th>Location</th>
<th colspan="2" >Actions</th>
</tr>
</thead>
<tbody>
<?php 
$result_scrap = $conn->query("select * from scrap where type='loc'");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if ($count_scrap>0){
$t=1;
do{
echo "<tr>
<td>".$t++."</td>
<td>".$row_scrap->item2."</td>
<td>
<a href='edit_entries.php?action=".'location'."&&ourid=".$row_scrap->item."'  class='btn btn-block btn-sm btn-warning'>Update</a></td>
<td>
<form method='POST'>
<input type='hidden' name='locationid' value='".$row_scrap->item."'>
<button type='submit' name='delete_location' class='btn btn-block btn-sm btn-danger'>Delete</button>
</form>
</td>
</tr>";
}while($row_scrap=$result_scrap->fetchObject());
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card card-default">
<div class="card-header bg-primary"><h2 class="text-center text-white">SPECIFICATIONS</h2></div>
<div class="card-body">
<?php 
if(isset($_POST['submit_spec'])){
$Spec = $_POST['spec'];
$result_scrap = $conn->query("select * from scrap where autoid>0");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap<=0){$specid="spec1";}else{
do{
$specid="spec".($row_scrap->autoid+1);
}while($row_scrap=$result_scrap->fetchObject());
}
$insert_spec = $conn->query("insert into scrap(item,item2,type) values('$specid','$Spec','Spec')");
if($insert_spec){
echo "<div class='alert alert-success'>Redirecting...Wait</div>";
}else{echo "<div class='alert alert-danger'>Failure Try Again Later</div>";}
}
if(isset($_POST['delete_spec'])){
$specid=$_POST['specid'];
$delete_spec=$conn->query("delete from scrap where item='$specid'");
if($delete_spec){echo "<div class='alert alert-danger'>Deleted Successfully</div>";}
}
?>
<form method="POST" autocomplete="off">
<div class="form-group">
<label>Specification</label>
<input type="text" placeholder="Specifications" class="form-control" name="spec">
</div>
<div class="form-group">
<input type="submit" name="submit_spec" class="btn btn-sm btn-block btn-success" style="width: 100%;">
</div>
</form>
<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#Spec" aeria-expanded="false" area-controls="Spec">VIEW SPECIFICATIONS</button>
<div class="collapse" id="Spec">
<div class="card-body">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>No.</th>
<th>Specifications</th>
<th colspan="2">Actions</th>
</tr>
</thead>
<tbody>
<?php 
$result_scrap = $conn->query("select * from scrap where type='Spec'");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap > 0){
$h=1;
do{
echo "<tr>
<td>".$h++."</td>
<td>".$row_scrap->item2."</td>
<td>
<a href='edit_entries.php?action=".'spec'."&&ourid=".$row_scrap->item." ' class='btn btn-sm btn-warning'>Update</a>
</td>
<td>
<form method='POST'>
<input type='hidden' name='specid' value='".$row_scrap->item."'>
<button type='submit' name='delete_spec' class='btn btn-sm btn-danger'>Delete</button>
</form>
</td>
</tr>";
}while($row_scrap=$result_scrap->fetchObject());
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card card-default">
<div class="card-header bg-primary"><h2 class="text-center text-white">ROLE</h2></div>
<div class="card-body">
<?php 
if(isset($_POST['submit_role'])){
$rolename = $_POST['rolename'];
$initials = $_POST['initials'];
$result_scrap = $conn->query("select * from scrap where autoid>0");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap<=0){$roleid="role1";$initialsid="initials1";}else{
do{
$roleid = "role".($row_scrap->autoid+1);
$initialsid = "initials".($row_scrap->autoid+1);
}while($row_scrap=$result_scrap->fetchObject());
}
$insert_role = $conn->query("insert into scrap(item,item2,item3,type) values('$roleid','$rolename','$initials','role')");
if($insert_role){
echo "<div class='alert alert-success'>Submission successful</div>";
}else{echo "<div class='alert alert-danger'>Failure</div>";}
}
if(isset($_POST['delete_rolename'])){
$rolenameid=$_POST['rolenameid'];
$delete_spec=$conn->query("delete from scrap where item='$rolenameid'");
if($delete_spec){echo "<div class='alert alert-danger'>Deleted Successfully</div>";}
}
?>
<form method="POST" autocomplete="off">
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label>Rolename</label>
<input type="text" placeholder="Rolename" class="form-control" name="rolename">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>Initials</label>
<input type="text" placeholder="Initials" class="form-control" name="initials">
</div>
</div>
</div>
<div class="form-group">
<input type="submit" name="submit_role" class="btn btn-sm btn-block btn-success" style="width: 100%;">
</div>
</form>
<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#rolename" aeria-expanded="false" area-controls="rolename">VIEW ROLENAMES</button>
<div class="collapse" id="rolename">
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>No.</th>
<th>Rolename</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$result_scrap = $conn->query("select * from scrap where type='role'");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap > 0){
$s=1;
do{
echo "<tr>
<td>".$s++."</td>
<td>".$row_scrap->item2."</td>
<td>
<a href='edit_entries.php?action=".'rolename'."&&ourid=".$row_scrap->item." ' class='btn btn-sm btn-warning'>Update</a>
</td>>
<td>
<form method='POST'>
<input type='hidden' name='rolenameid' value='".$row_scrap->item."'>
<button type='submit' name='delete_rolename' class='btn btn-sm btn-danger'>Delete</button>
</form>
</td>
</tr>";}while($row_scrap = $result_scrap->fetchObject());}?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card card-default">
<div class="card-header bg-primary"><h2 class="text-center text-white">CATEGORIES</h2></div>
<div class="card-body">
<?php if(isset($_POST['submit_categories'])){
$cat = $_POST['cat'];
$result_scrap = $conn->query("SELECT * FROM scrap WHERE autoid > 0");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap <= 0){$catid = 'cat1';}else{do{$catid = 'cat'.($row_scrap->autoid+1);}while($row_scrap = $result_scrap->fetchObject());}
$insert_cat = $conn->query("INSERT INTO scrap(item,item2,type) Values('$catid','$cat','cat')");
if($insert_cat){echo "<div class='alert alert-success'>Redirecting....Please Wait</div>";}else{echo "<div class='alert alert-danger'>Failed Retry</div>";}}
if(isset($_POST['delete_cat'])){
$catid=$_POST['catid'];
$delete_cat=$conn->query("delete from scrap where item='$catid'");
if($delete_cat){echo "<div class='alert alert-danger'>Deleted Successfully</div>";}
}
?>
<form method="POST" autocomplete="off">
<div class="form-group">
<label>Categories</label>
<input type="text" placeholder="categories" class="form-control" name="cat">
</div>
<div class="form-group">
<input type="submit" name="submit_categories" class="btn btn-sm btn-success" style="width: 100%;">
</div>
</form>
<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#cat" aeria-expanded="false" area-controls="cat">VIEW CATEGORIES</button>
<div class="collapse" id="cat">
<div class="card-body">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>No.</th>
<th>Categories</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php $result_scrap = $conn->query("SELECT * from scrap where type='cat'");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap > 0){ $y=1;
do{ echo "<tr>
<td>".$y."</td>
<td>".$row_scrap->item2."</td>
<td>
<a href='edit_entries.php?action=".'cat'."&&ourid=".$row_scrap->item." ' class='btn btn-sm btn-warning'>Update</button>
</td>
<td>
<form method='POST'>
<input type='hidden' name='catid' value='".$row_scrap->item."'>
<button type='submit' name='delete_cat' class='btn btn-sm btn-danger'>Delete</button>
</form>
</td>
</tr>";}while($row_scrap = $result_scrap->fetchObject());}?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card card-default">
<div class="card-header bg-primary"><h2 class="text-center text-white">FACILITIES</h2></div>
<div class="card-body">
<?php  if(isset($_POST['submit_fac'])){
$fac = $_POST['fac'];
$result_scrap = $conn->query("SELECT * from scrap where autoid > 0");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap <= 0){$facid='fac1';}else{
do{$facid = 'fac'.($row_scrap->autoid+1);}while($row_scrap = $result_scrap->fetchObject());}
$insert_fac = $conn->query("INSERT into scrap(item,item2,type) values('$facid','$fac','fac')");
if($insert_fac){echo "<div class='alert alert-success'>Submission Successful</div>";}else{echo "<div class='alert alert-danger'>Submission Failure</div>";}}
if(isset($_POST['delete_fac'])){
$facid=$_POST['facid'];
$delete_fac=$conn->query("delete from scrap where item='$facid'");
if($delete_fac){echo "<div class='alert alert-danger'>Deleted Successfully</div>";}
}
?> 
<form method="POST" autocomplete="off">
<div class="form-group">
<label>Facilities</label>
<input type="text" placeholder="Facilities" class="form-control" name="fac">
</div>
<div class="form-group">
<input type="submit" name="submit_fac" class="btn btn-sm btn-success" style="width: 100%;">
</div>
</form>
<button class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#fac" aeria-expanded="false" area-controls="fac">VIEW FACILITIES</button>
<div class="collapse" id="fac">
<div class="card-body">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>No.</th>
<th>Facilities</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php 
$result_scrap = $conn->query("SELECT * from scrap where type='fac'");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap > 0){
$j=1;
do{
echo "<tr>
<td>".$j++."</td>
<td>".$row_scrap->item2."</td>
<td>
<a href='edit_entries.php?action=".'fac'."&&ourid=".$row_scrap->item." ' class='btn btn-sm btn-warning'>Update</a>
</td>
<td>
<form method='POST'>
<input type='hidden' name='facid' value='".$row_scrap->item."'>
<button type='submit' name='delete_fac' class='btn btn-sm btn-danger'>Delete</button>
</form>
</td>
</tr>";
}while($row_scrap = $result_scrap->fetchObject());
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card card-default">
<div class="card-header bg-primary"><h2 class="text-center text-white">CONDITIONS</h2></div>
<div class="card-body">
<?php 
if(isset($_POST['submit_con'])){
$con = $_POST['con'];
$result_scrap = $conn->query("SELECT * from scrap where autoid > 0");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap <= 0){$conid = 'con1';}else{
do{
$conid = 'con'.($row_scrap->autoid+1);
}while($row_scrap = $result_scrap->fetchObject());
}
$insert_con = $conn->query("INSERT into scrap(item,item2,type) values('$conid','$con','con')");
if($insert_con){echo "<div class='alert alert-success'>Redircting....Please Wait</div>";}else{echo "<div class='alert alert-danger'>Authentication Failure Please Try Again</div>";}
}
if(isset($_POST['delete_con'])){
$conid=$_POST['conid'];
$delete_con=$conn->query("delete from scrap where item='$conid'");
if($delete_con){echo "<div class='alert alert-danger'>Deleted Successfully</div>";}
}
?>
<form method="POST" autocomplete="off">
<div class="form-group">
<label>Conditions</label>
<input type="text" placeholder="Condition" class="form-control" name="con">
</div>
<div class="form-group">
<input type="submit" name="submit_con" class="btn btn-sm btn-success" style="width:100%;">
</div>
</form>
<button class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#con" aeria-expanded="false" area-controls="con">VIEW CONDITIONS</button>
<div class="collapse" id="con">
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>No.</th>
<th>Conditions</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php 
$result_scrap = $conn->query("SELECT * from scrap where type='con'");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap > 0){
$d=1;
do{
echo "<tr>
<td>".$d++."</td>
<td>".$row_scrap->item2."</td>
<td>
<a href='edit_entries.php?action=".'con'."&&ourid=".$row_scrap->item." ' class='btn btn-sm btn-warning'>Update</a>
</td>
<td>
<form method='POST'>
<input type='hidden' name='conid' value='".$row_scrap->item."'>
<button type='submit' name='delete_con' class='btn btn-sm btn-danger'>Delete</button>
</form>
</td>
</tr>";
}while($row_scrap=$result_scrap->fetchObject());
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card card-default">
<div class="card-header bg-primary"><h2 class="text-center text-white">PROPERTY TYPE</h2></div>
<div class="card-body">
<?php 
if(isset($_POST['submit_prop'])){
$prop = $_POST['prop'];
$result_scrap = $conn->query("SELECT * from scrap where autoid > 0");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap <= 0){$propid='prop1';}else{
do{
$propid = 'prop'.($row_scrap->autoid+1);
}while($row_scrap=$result_scrap->fetchObject());
}
$insert_prop = $conn->query("INSERT into scrap(item,item2,type) values('$propid','$prop','prop')");
if($insert_prop){echo "<div class='alert alert-success'>Authenitication Successful....Redirecting</div>";}else{echo "<div class'alert alert-danger'>Authenication Failed</div>";}
}
if(isset($_POST['delete_prop'])){
$propid=$_POST['propid'];
$delete_prop=$conn->query("delete from scrap where item='$propid'");
if($delete_prop){echo "<div class='alert alert-danger'>Deleted Successfully</div>";}
}
?>
<form method="POST" autocomplete="off">
<div class="form-group">
<label>Property type</label>
<input type="text" placeholder="Property type" class="form-control" name="prop">
</div>
<div class="form-group">
<input type="submit" name="submit_prop" class="btn btn-success btn-sm" style="width: 100%;">
</div>
</form>
<button class="btn btn-sm btn-info" type="button" data-toggle="collapse" data-target="#prop" aeria-expanded="false" area-controls="prop">View PROPERTIES</button>
<div class="collapse" id="prop">
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>No.</th>
<th>Properties</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php  
$result_scrap = $conn->query("SELECT * from scrap where type='prop'");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap > 0){
$f=1;
do{
echo "<tr>
<td>".$f++."</td>
<td>".$row_scrap->item2."</td>
<td>
<a href='edit_entries.php?action=".'prop'."&&ourid=".$row_scrap->item." ' class='btn btn-sm btn-warning'>Update</a>
</td>
<td>
<form method='POST'>
<input type='hidden' name='propid' value='".$row_scrap->item."'>
<button type='submit' name='delete_prop' class='btn btn-sm btn-danger'>Delete</button>
</form>
</td>
</tr>";
}while($row_scrap=$result_scrap->fetchObject());
}   
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-4">
<div class="card card-default">
<div class="card-header bg-primary"><h2 class="text-center text-white">FURNISHING</h2></div>
<div class="card-body">
<?php 
if(isset($_POST['submit_furn'])){
$furn = $_POST['furn'];
$result_scrap= $conn->query("SELECT * from scrap where autoid > 0");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap <= 0){$furnid='furn1';}else{
do{
$furnid = 'furn'.($row_scrap->autoid+1);
}while($row_scrap=$result_scrap->fetchObject());
}
$insert_furn = $conn->query("INSERT into scrap(item,item2,type) values('$furnid','$furn','furn')");
if($insert_furn){echo "<div class='alert alert-success'>Authenication Successful</div>";}else{echo "<div class='alert alert-danger'>Authenication Failure</div>";}
}
if(isset($_POST['delete_furn'])){
$furnid=$_POST['furnid'];
$delete_furn=$conn->query("delete from scrap where item='$furnid'");
if($delete_furn){echo "<div class='alert alert-danger'>Deleted Successfully</div>";}
}

?>
<form method="POST" autocomplete="off">
<div class="form-group">
<label>Furnishing</label>
<input type="text" placeholder="Furnishing" class="form-control" name="furn">
</div>
<div class="form-group">
<input type="submit" name="submit_furn" class="btn btn-success btn-sm" style="width:100%;">
</div>
</form>
<button class="btn btn-sm btn-info" data-toggle="collapse" data-target="#furn" aeria-expanded="false" area-controls="furn">VIEW FURNISHING</button>
<div class="collapse" id="furn">
<div class="card-body">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>No.</th>
<th>Furnishing</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php 
$result_scrap = $conn->query("SELECT * from scrap where type='furn'");
$count_scrap = $result_scrap->rowCount();
$row_scrap = $result_scrap->fetchObject();
if($count_scrap > 0){
$w=1;
do{echo "<tr>
<td>".$w++."</td>
<td>".$row_scrap->item2."</td>
<td>
<a href='edit_entries.php?action=".'furn'."&&ourid=".$row_scrap->item." ' class='btn btn-sm btn-warning'>Update</a>
</td>
<td>
<form method='POST'>
<input type='hidden' name='furnid' value='".$row_scrap->item."'>
<button type='submit' name='delete_furn' class='btn btn-sm btn-danger'>Delete</button>
</form>
</td>
</tr>";}while($row_scrap=$result_scrap->fetchObject());
}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
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
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>