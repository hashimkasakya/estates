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
<div class="card-header"><h1>CLIENT FEEDBACK</h1></div>
<div class="card-body">
  <?php 
  if(isset($_POST['delete_feed'])){
  $feedid=$_POST['feedid'];
  $delete_feed=$conn->query("delete from feedback where feedid='$feedid'");
  if($delete_feed){echo "<div class='alert alert-warning'>Deleted Successfully</div>";}
}
?>
<div class="row">
<div class="card-body">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>No.</th>
<th>Feeddate</th>
<th>Client name</th>
<th>Details</th>
<th>Contact</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php 
$result_feedback=$conn->query("select * from feedback where status=1");
$count_feedback=$result_feedback->rowCount();
$row_feedback=$result_feedback->fetchObject();
if($count_feedback>0){
$w=1;
do{
echo "<tr>
<td>".$w++."</td>
<td>".$row_feedback->autodate."</td>
<td>".$row_feedback->fullname."</td>
<td>".$row_feedback->message."</td>
<td>".$row_feedback->phone."</td>
<td>
<a href='edit_entries.php?action=".'feed'."&&ourid=".$row_feedback->feedid." ' class='btn btn-rounded btn-success'>Update</a>
</td>
<td>
<form method='POST'>
<input type='hidden' name='feedid' value='".$row_feedback->feedid."'>
<button type='submit' name='delete_feed' class='btn btn-rounded btn-warning'>Delete</button>
</form>
</td>
</tr>";
}while($row_feedback=$result_feedback->fetchObject());
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