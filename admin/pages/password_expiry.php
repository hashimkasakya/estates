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
<div class="card-header"><h2 class="card-title">Manage User Passwords</h2></div>
<div class="card-body">
<div class="col-lg-12"><br></div>
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>Name</th>
<th>Phonenumber</th>
<th>Email</th>
<th>Expires On</th>
<th>Username</th>
<th>Password</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$today=date("Y-m-d");
$result_passwords=$conn->query("select * from passwords where pswdexpiry < $today");
$count_passwords=$result_passwords->rowCount();
$row_passwords=$result_passwords->fetchObject();
if($count_passwords>0){
do{
$result_users=$conn->query("select * from users where rolenumber='$row_passwords->rolenumber'");
$count_users=$result_users->rowCount();
$row_users=$result_users->fetchObject();

		echo "<tr>
		        <td>";
		        if($count_users>0){echo $row_users->firstname." ".$row_users->lastname; }
		        echo "</td>
		        <td>";
		        if($count_users>0){echo $row_users->phone; }
		       echo "</td>
		        <td>";
		        if($count_users>0){echo $row_users->email; }
		        echo"</td>
		        <td>".$row_passwords->pswdexpiry."</td>
		        <td>".$row_passwords->username."</td>
		        <td>".$row_passwords->password."</td>
		        <td>
		        <a href='edit_entries.php?action=".'pswd'."&&ourid=".$row_passwords->rolenumber."' class='btn btn-sm btn-block btn-primary'>Update</a>
		        </td>
		     </tr>";
}while($row_passwords=$result_passwords->fetchObject());
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