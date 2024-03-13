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
<div class="card-header"><h2 class="card-title">System Monitor</h2></div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Date</th>
<th>Device Id</th>
<th>User</th>
<th>From-Page</th>
<th>To-page</th>
<th>Browser</th>
</tr>
</thead>
<tbody>
<?php 
$result_useractivity = $conn->query("SELECT * FROM useractivity WHERE autoid > 0 order by autoid desc limit 50 ");
$count_useractivity = $result_useractivity->rowCount();
$row_useractivity = $result_useractivity->fetchObject();
if($count_useractivity > 0){
do{
$result_user = $conn->query("SELECT * FROM users WHERE rolenumber='$row_useractivity->userid'");
$count_user = $result_user->rowCount();
$row_user = $result_user->fetchObject();
echo "<tr>
<td>".$row_useractivity->autodate."</td>
<td>".$row_useractivity->deviceid."</td>
<td>".$row_user->firstname." ".$row_user->lastname."</td>
<td>".$row_useractivity->previous_page."</td>
<td>".$row_useractivity->current_page."</td>
<td>".substr($row_useractivity->browser, 0,30)."</td>
</tr>";
}while($row_useractivity = $result_useractivity->fetchObject());
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