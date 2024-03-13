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
<div class="card-header"><h1>SUBSCRIBERS</h1></div>
<div class="card-body">
	<?php 
        if(isset($_POST['delete_sub'])){
        	$subid=$_POST['subid'];
        	$delete_sub=$conn->query("delete from subscribers where name='$subid'");
        	if($delete_sub){echo "<div class='alert alert-danger'>Deleted Successfully</div>";}
        }
	 ?>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>No</th>
<th>Name</th>
<th>Phonenumber</th>
<th>Email</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
include ('connect.php');
$result_subscribers = $conn->query("select * from subscribers where status=1");
$count_subscribers = $result_subscribers->rowCount();
$row_subscribers = $result_subscribers->fetchObject();
if($count_subscribers > 0){
$r=1;
echo "<tr>
<td>".$r++."</td>
<td>".$row_subscribers->name."</td>
<td>".$row_subscribers->phonenumber."</td>
<td>".$row_subscribers->sub_email."</td>
<td>
<a href='edit_entries.php?action=".'sub'."&&ourid=".$row_subscribers->name."' class='btn btn-sm btn-block btn-warning'>Update</a>
</td>
<td>
<input type='hidden' name='subid' value='".$row_subscribers->name."'>
<button type='submit' name='delete_sub' class='btn btn-sm btn-block btn-danger'>Delete</button>
</td>
</tr>";
}
?>
</tbody>
</table>
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