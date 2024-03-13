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
<div class="card-header"><h1>USER</h1></div>
<div class="card-body">
<?php 
if(isset($_POST['submit_users'])){
$firstname = $_POST['firstname'];
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$phonenumber1=$_POST['phonenumber1'];
$email=$_POST['email'];
$agenttitle = $_POST['agenttitle'];
$gender=$_POST['gender'];
$username = $_POST['username'];
$password = $_POST['password'];
$insert_passwords = $conn->query("insert into passwords(rolenumber,username,password) values('$agenttitle','$username','$password')");
if($insert_passwords){
echo "<div class='alert alert-success'>Username & Password Submitted</div>";
}
if(!empty($_FILES['agentimage']['tmp_name'])){
$agtimg_name = str_replace(' ', '_', date('i')."".date('s').$_FILES['agentimage']['tmp_name']);
$destination = "public/".$agtimg_name;
$extension = pathinfo($agtimg_name,PATHINFO_EXTENSION);
$file = $_FILES['agentimage']['tmp_name'];
$size = $_FILES['agentimage']['size'];
if(!in_array($extension, ['png','jpg','jpeg','gif','PNG','JPG','JPEG','GIF'])){
echo "Your file extension must be .png, .jpg, .jpeg, .gif, .PNG, .JPG, .JPEG, .GIF";
}elseif ($_FILES['agentimage']['size'] > 1000000) {
echo "Image shouldn't be larger than one megabyte";
}else{
$insert_property_images = $conn->query("insert into property_images(agentimage,fsize,prop_id) values('$agtimag','$size','$prop_id')");
if(move_uploaded_file($file, $destination)){
echo "<div class='alert alert-success'>Image Uploaded successfully</div>";
}
}
}
$insert_users=$conn->query("INSERT into users(firstname,lastname,email,phone,address,gender) values('$firstname','$lastname','$email','$phonenumber1','$address','$gender')");
if($insert_users){
echo "<div class='alert alert-success'>Submission Successful</div>";
}else{echo "<div class='alert alert-warning'>Submission Failure</div>";}
}
?>
<div class="row">
<form class="POST" autocomplete="off">
<div class="row">
<div class="col-lg-3">
<div class="form-group">
<label>Firstname</label>
<input type="text" name="firstname" placeholder="Firstname" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Lastname</label>
<input type="text" name="lastname" placeholder="Lastname" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Address</label>
<input type="text" name="address" placeholder="Address" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Agent Image</label>
<input type="file" name="agentimage" placeholder="Agent Image" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Phonenumber1</label>
<input type="number" name="phonenumber1" placeholder="Phonenumber1" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Phonenumber2</label>
<input type="number" name="phonenumer2" placeholder="Phonenumber2" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Email</label>
<input type="email" name="email" placeholder="Email" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Gender</label>
<select class="form-control" name="gender">
<option>Select Gender</option>
<option>Female</option>
<option>Male</option>
</select>
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Agent Title</label>
<input type="text" name="agenttitle" placeholder="Agent Title" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Username</label>
<input type="text" name="username" placeholder="Username" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Password</label>
<input type="text" placeholder="Password" class="form-control" name="password">
</div>
</div>
<div class="form-group">
<input type="submit" value="Submit" class="btn btn-sm btn-success" name="submit_users">
</div>




</div>
</form>

</div>
</div>
</div>

<div class="card card-default">
<div class="card-header"></div>
<div class="card-body">
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>No.</th>
<th>Firstname</th>
<th>Lastname</th>
<th>Address</th>
<th>Phonenumber1</th>
<th>Email</th>
<th>Gender</th>
</tr>
</thead>
<tbody>
<?php 
$result_users = $conn->query("SELECT * from users where status=1");
$count_users = $result_users->rowCount();
$row_users = $result_users->fetchObject();
if($count_users>0){
$s=1;
do{
echo "<tr>
<td>".$s++."</td>
<td>".$row_users->firstname."</td>
<td>".$row_users->lastname."</td>
<td>".$row_users->address."</td>
<td>".$row_users->phone."</td>
<td>".$row_users->email."</td>
<td>".$row_users->gender."</td>
</tr>";
}while($row_users=$result_users->fetchObject());
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