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
	<div class="card-header"><h1>REQUESTS</h1></div>
	<div class="card-body">
	<?php 
	if(isset($_POST['delete_requests'])){
	$clientid=$_POST['clientid'];
	$delete_requests=$conn->query("delete from requests where clientid='$clientid'");
	if($delete_requests){echo "<div class='alert alert-danger'>Deleted Successfully</div>";}
	}
	?>
	<div class="row">
	<div class="card-body">
	<table class="table table-striped table-bordered">
	<thead>
	<tr>
	<th>No.</th>
	<th>Name</th>
	<th>Property Abouts</th>
	<th>Details</th>
	<th>Request Date</th>
	<th>Actions</th>
	</tr>
	</thead>
	<tbody>
	<tr>
	<?php 
	$result_requests=$conn->query("select * from requests where status=1");
	$count_requests=$result_requests->rowCount();
	$row_requests=$result_requests->fetchObject();
	$result_properties=$conn->query("select * from properties where prop_id='$row_requests->prop_id'");
	$count_properties=$result_properties->rowCount();
	$row_properties=$result_properties->fetchObject();
	if($count_requests>0){
	$f=1;
	do{echo "<tr>
	<td>".$f++."</td>
	<td>".$row_requests->clientid."</td>
	<td>".$row_requests->message."<br><span>Bedrooms: </span>".$row_properties->bedrooms."<br><span>Bathrooms: </span>".$row_properties->bathrooms."</td>
	<td>".$row_properties->prop_dets."</td>
	<td>".$row_requests->autodate."</td>
	<td>
	<a href='edit_entries.php?action=".'requests'."&&ourid=".$row_requests->prop_id."' class='btn btn-rounded btn-success'>Approve</a>
	</td>
	<td>
	<form method='POST'>
	<input type='hidden' name='clientid' value='".$row_requests->clientid."'>
	<button type='submit' name='delete_requests' class='btn btn-rounded btn-danger'>Reject</button>
	</form>
	</td>
	</tr>";}while($row_requests=$result_requests->fetchObject());
	}
	?>
	</tbody>
	</table>
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
	</body>
	</html>