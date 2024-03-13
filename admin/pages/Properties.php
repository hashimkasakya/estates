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
<div class="card-header"><h1>PROPERTIES</h1></div>
<div class="card-body">
<?php 
if(isset($_POST['submit_properties'])){
$prop_name = $_POST['prop_name'];
$prop_cat = $_POST['prop_cat'];
$loc = $_POST['loc'];
$prop_agent = $_POST['prop_agent'];
$prop_type = $_POST['prop_type'];
$prop_cond = $_POST['prop_cond'];
$prop_furn = $_POST['prop_furn'];
$bedrooms = $_POST['bedrooms'];
$bathrooms = $_POST['bathrooms'];
$prop_fac = $_POST['prop_fac'];
$plot_size = $_POST['plot_size'];
$prop_dets = $_POST['prop_dets'];
$prop_price = $_POST['prop_price'];
$result_properties = $conn->query("select * from properties where autoid > 0");
$count_properties = $result_properties->rowCount();
$row_properties = $result_properties->fetchObject();
if($count_properties<=0){$prop_id='prop1';$submitted_by_id= 'role1';}else{
do{
$prop_id = "prop".($row_properties->autoid+1);
$submitted_by_id = "role".($row_properties->autoid+1);
}while($row_properties = $result_properties->fetchObject());
}
// Image Submission 
if (!empty($_FILES['image1']['tmp_name'])) {
$img_name1 = str_replace(' ','_', date('i')."".date('s').$_FILES['image1']['name']);
$img_name2 = str_replace(' ','_',date('i')."".date('s').$_FILES['image2']['name']);
$img_name3 = str_replace(' ','_',date('i')."".date('s').$_FILES['image3']['name']);
$img_name4 = str_replace(' ','_',date('i')."".date('s').$_FILES['image4']['name']);
$destination1 = "public/".$img_name1;
$destination2 = "public/".$img_name2;
$destination3 = "public/".$img_name3;
$destination4 = "public/".$img_name4;
$extension = pathinfo($img_name1,PATHINFO_EXTENSION);
$file1 = $_FILES['image1']['tmp_name'];
$file2 = $_FILES['image2']['tmp_name'];
$file3 = $_FILES['image3']['tmp_name'];
$file4 = $_FILES['image4']['tmp_name'];
$size1 = $_FILES['image1']['size'];
$size2 = $_FILES['image2']['size'];
$size3 = $_FILES['image3']['size'];
$size4 = $_FILES['image4']['size'];
if (!in_array($extension, ['png','jpeg','gif','jpg','PNG','JPEG','GIF','JPG'])) {
echo "Your file extension must be .png, .jpeg, .gif, .jpg, .PNG, .JPEG, .GIF, .JPG";
}elseif ($_FILES['image1']['size'] > 1000000) {
echo "Image shouldn't be larger than one megabyte";
}else{
$insert_property_images = $conn->query("insert into property_images(img1,img2,img3,img4,fsize1,fsize2,fsize3,fsize4,prop_id) values('$img_name1','$img_name2','$img_name3','$img_name4','$size1','$size2','$size3','$size4','$prop_id')");
if (move_uploaded_file($file1, $destination1) && move_uploaded_file($file2, $destination2) && move_uploaded_file($file3, $destination3) && move_uploaded_file($file4, $destination4)) {echo "<div class='alert alert-success'>Images uploaded successfully</div>";}
}}
// End of image submission
$insert_properties = $conn->query("INSERT into properties(prop_name,prop_cat,prop_agent,prop_type,prop_cond,prop_furn,bedrooms,bathrooms,prop_fac,plot_size,prop_dets,prop_price,prop_id,submitted_by) values('$prop_name','$prop_cat','$prop_agent','$prop_type','$prop_cond','$prop_furn','$bedrooms','$bathrooms','$prop_fac','$plot_size','$prop_dets','$prop_price','$prop_id','$rolenumber')");
if($insert_properties){
echo "<div class='alert alert-success'>Submission Successful</div>";
}else{echo "<div class='alert alert-warning'>Submission Failed....Retry</div>";}
}
if(isset($_POST['delete_prop'])){
$propid=$_POST['propid'];
$delete_prop=$conn->query("delete from properties where prop_id='$propid'");
if($delete_prop){
	echo "<div class='alert alert-success'>Deleted Successfully</div>";
}
}
?>
<div class="row">
<form method="POST" autocomplete="off" enctype="multipart/form-data">
<div class="row">
<div class="col-lg-3">
<div class="form-group">
<label>Property name</label>
<input type="text" name="prop_name" class="form-control" placeholder="Prop_name">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Category</label>
<select class="form-control" name="prop_cat">
<option>Select category</option>
<?php 
$result_cat = $conn->query("SELECT * from scrap where type='cat'");
$count_cat = $result_cat->rowCount();
$row_cat = $result_cat->fetchObject();
if($count_cat > 0){
do{
echo "<option value=".$row_cat->item.">".$row_cat->item2."</option>";
}while ($row_cat = $result_cat->fetchObject());
}
?>
</select>
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<div class="form-group">
<label>Location</label>
<select class="form-control" name="loc">
<option>Select location</option>
<?php 
$result_loc = $conn->query("select * from scrap where type='loc'");
$count_loc = $result_loc->rowCount();
$row_loc = $result_loc->fetchObject();
if($count_loc > 0){
do{
echo "<option value=".$row_loc->item.">".$row_loc->item2."</option>";
}while($row_loc = $result_loc->fetchObject());
}                                       
?>
</select>
</div>

</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Agent</label>
<select class="form-control" name="prop_agent">
<option>Select Agent</option>
<?php 
$result_agent = $conn->query("select * from agents order by firstname asc");
$count_agent = $result_agent->rowCount();
$row_agent = $result_agent->fetchObject();
if($count_agent > 0){
do{
echo "<option value=".$row_agent->autoid.">".$row_agent->firstname." ".$row_agent->lastname."</option>";
}while($row_agent=$result_agent->fetchObject());
}
?>
</select>
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Type</label>
<select class="form-control" name="prop_type">
<option>Select Spec</option>
<?php 
$result_prop = $conn->query("select * from scrap where type='prop'");
$count_prop = $result_prop->rowCount();
$row_prop = $result_prop->fetchObject();
if($count_prop > 0){
do{
echo "<option value=".$row_prop->item.">".$row_prop->item2."</option>";
}while($row_prop=$result_prop->fetchObject());
}
?>
</select>
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Conditions</label>
<select class="form-control" name="prop_cond">
<option>Select Condition</option>
<?php 
$result_con = $conn->query("select * from scrap where type='con'");
$count_con = $result_con->rowCount();
$row_con = $result_con->fetchObject();
if($count_con > 0){
do{
echo "<option value=".$row_con->item.">".$row_con->item2."</option>";
}while($row_con=$result_con->fetchObject());
}
?>
</select>
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Furnishing</label>
<select class="form-control" name="prop_furn">
<option>Select Furnishing</option>
<?php 
$result_furn = $conn->query("select * from scrap where type='furn'");
$count_furn = $result_furn->rowCount();
$row_furn = $result_furn->fetchObject();
if($count_furn > 0){
do{
echo "<option value=".$row_furn->item.">".$row_furn->item2."</option>";
}while($row_furn=$result_furn->fetchObject());
}
?>
</select>
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Bedrooms</label>
<input type="number" name="bedrooms" placeholder="Bedrooms" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Bathrooms</label>
<input type="number" placeholder="Bathrooms" class="form-control" name="bathrooms">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Facility</label>
<select class="form-control" name="prop_fac">
<option>Select Facilities</option>
<?php 
$result_fac = $conn->query("select * from scrap where type='fac'");
$count_fac = $result_fac->rowCount();
$row_fac = $result_fac->fetchObject();
if($count_fac>0){
do{
echo "<option value=".$row_fac->item.">".$row_fac->item2."</option>";
}while($row_fac=$result_fac->fetchObject());
}
?>
</select>
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Plot size</label>
<input type="text" placeholder="Plot size" class="form-control" name="plot_size">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Parking space</label>
<select class="form-control" name="parking_space">
<option>Select Parking Space</option>
<option>Yes</option>
<option>No</option>
</select>
</div>
</div>
<div class="row">
<div class="col-lg-3">
<div class="form-group">
<label>Image1</label>
<input type="file" name="image1" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Image2</label>
<input type="file" name="image2" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Image3</label>
<input type="file" name="image3" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Image4</label>
<input type="file" name="image4" class="form-control">
</div>
</div>
</div>
<div class="row">
<div class="col-lg-10">
<label>Property Details</label>
<textarea class="form-control" name="prop_dets"></textarea></div>
<div class="col-lg-2">
<label>Price</label>
<input type="text" name="prop_price" class="form-control" placeholder="Price">
</div>
</div>
<div class="form-group">
<input type="submit" value="submit" class="btn btn-sm btn-success" name="submit_properties">
</div>

</div>
</form>
</div>

<div class="card card-default">
<div class="card-header bg-primary"><h2 class="card-title text-center" style="color: white;">REGISTERED PROPERTIES</h2></div>
<div class="card-body">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>No.</th>
<th>Image1</th>
<th>About</th>
<th>Agent</th>
<th>Specifications</th>
<th>Price</th>
<th>Details</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php 
$result_properties = $conn->query("SELECT * from properties where status=1");
$count_properties = $result_properties->rowCount();
$row_properties = $result_properties->fetchObject();
if($count_properties > 0){
$r=1;
do{
$result_property_images = $conn->query("SELECT * from property_images where prop_id = '$row_properties->prop_id'");
$count_property_images = $result_property_images->rowCount();
$row_property_images = $result_property_images->fetchObject();
$result_cat = $conn->query("SELECT * from scrap where item = '$row_properties->prop_cat' AND type='cat'");
$count_cat = $result_cat->rowCount();
$row_cat = $result_cat->fetchObject();

$result_type =$conn->query("SELECT * from scrap where item = '$row_properties->prop_type' AND type='prop'");
$count_type = $result_type->rowCount();
$row_type = $result_type->fetchObject();

$result_cond =$conn->query("SELECT * FROM scrap WHERE item = '$row_properties->prop_cond' AND type='con'");
$count_cond = $result_cond->rowCount();
$row_cond = $result_cond->fetchObject();

$result_agent = $conn->query("SELECT * FROM agents WHERE autoid ='$row_properties->prop_agent'");
$count_agent = $result_agent->rowCount();
$row_agent = $result_agent->fetchObject();

$result_furn = $conn->query("SELECT * FROM scrap WHERE item = '$row_properties->prop_furn' AND type='furn'");
$count_furn = $result_furn->rowCount();
$row_furn = $result_furn->fetchObject();

echo "<tr>
<td>".$r++."</td>
<td><img src='public/".$row_property_images->img1."'></td>
<td>".$row_properties->prop_name."</td>
<td>".$row_agent->firstname." ".$row_agent->lastname."<br>".$row_agent->phonenumber1."<br>".$row_agent->address."<br>".$row_agent->email."</td>
<td><span>Bedrooms: ".$row_properties->bedrooms."</span><br><span>Bathrooms: ".$row_properties->bathrooms."</span><br><span>Plot size: ".$row_properties->plot_size."</span></td>
<td style='font-weight:bold;font-size:24px;'><span>UGX ".number_format($row_properties->prop_price)."</span></td>
<td>".$row_properties->prop_dets."</td>
<td>
<a href='edit_entries.php?action=".'prop'."&&ourid=".$row_properties->prop_id." ' class='btn btn-block btn-sm btn-warning'>Update</a>
</td>
<td>
<form method='POST'>
<input type='hidden' name='propid' value='".$row_properties->prop_id."'>
<button type='submit' name='delete_prop' class='btn btn-block btn-sm btn-danger'>Delete</button>
</form>
</td>
</tr>";
}while($row_properties=$result_properties->fetchObject());
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