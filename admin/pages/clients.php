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
<div class="card-header"><h1>Manage Clients</h1></div>
<div class="card-body"> 
	<?php 
       if(isset($_POST['delete_clients'])){
       	  $clientid=$_POST['clientid'];
       	  $delete_clients=$conn->query("delete from clients where clientid='$clientid'");
       	  if($delete_clients){echo "<div class='alert alert-warning'>Deleted Successfully</div>";}
       }
	 ?>
<div class="row">
<div class="card-body">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>No.</th>
<th>Name</th>
<th>Status</th>
<th>Img</th>
<th>Contact</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$result_clients = $conn->query("select * from clients where status=1");
$count_clients=$result_clients->rowCount();
$row_clients=$result_clients->fetchObject();
if($count_clients>0){
$e=1;
do{
echo "<tr>
<td>".$e++."</td>
<td>".$row_clients->firstname." ".$row_clients->secondname."</td>
<td>".$row_clients->status."</td>
<td>".$row_clients->image."</td>
<td>".$row_clients->contact."</td>
<td>
<a href='edit_entries.php?action=".'clients'."&&ourid=".$row_clients->clientid."' class='btn btn-sm btn-success'>Active</a>
</td>
<td>
<form method='POST'>
<input type='hidden' name='clientid' value='".$row_clients->clientid."'>
<button type='submit' name='delete_clients' class='alert alert-warning'>Inactive</button>
</form>
</td>
</tr>";
}while($row_clients=$result_clients->fetchObject());
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