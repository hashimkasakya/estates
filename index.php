<?php session_start(); ?>
<?php include('js/Includes/header.php'); ?>
<body>
<div id="wrapper" class="home-page">
<div class="topbar">
<div class="container">
<div class="row">
<div class="col-md-12">
<p class="pull-left hidden-xs"><i class="fa fa-clock-o"></i><span>Mon - Sat 8.00 - 18.00. Sunday CLOSED</span> 
<p class="pull-right"><i class="fa fa-phone"></i>Tel No. (+256) 774-643695</p>
</div>
</div>
</div>
</div>
<!-- start header -->
<?php include('js/Includes/navbar.php'); ?>
<!-- end header -->
<section id="banner">

<!-- Slider -->
<div id="main-slider" class="flexslider">
<ul class="slides">
<li>
<img src="img/slides/2.jpg" alt="" />
<div class="flex-caption">
<h3>Gated Villas</h3>  

</div>
</li>
<li>
<img src="img/slides/1.jpg" alt="" />
<div class="flex-caption">
<h3>Trendy Home</h3>  

</div>
</li>
</ul>
</div>
<!-- end slider -->

</section> 


<section id="content">
<div class="container"> 
<div class="row">
<div class="skill-home"> <div class="skill-home-solid clearfix"> 
<div class="col-md-3 col-sm-6 text-center">
<span class="icons c1"><i class="fa fa-home"></i></span> <div class="box-area">
<h3>Sell On Real Estate</h3> <p>We help customers to sell there properties and also help them advertise there property to the world.</p></div>
</div>
<div class="col-md-3 col-sm-6 text-center"> 
<span class="icons c2"><i class="fa fa-rocket"></i></span> <div class="box-area">
<h3>Become An Agent</h3> <p>Whoever wants to become an agent you are entitled to register with us.</p></div>
</div>
<div class="col-md-3 col-sm-6 text-center"> 
<span class="icons c3"><i class="fa fa-trophy"></i></span> <div class="box-area">
<h3>Buy Property</h3> <p>There are avariety of properties available for sell onto our website.</p></div>
</div>
<div class="col-md-3 col-sm-6 text-center"> 
<span class="icons c4"><i class="fa fa-star"></i></span> <div class="box-area">
<h3>Rent Property</h3><p>There are also specificied apartments that are ready to be rented and we are sincerely able to say that there are in a good condition.</p>
</div></div>
</div></div>
</div> 

</div>

<section class="section-padding noTopMrgn">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="section-title text-center">
<h2><span class="coloured">Trending</span> Projects</h2>
<p>Best selling real estate projects.</p>
</div>
</div>
</div>
<div class="row service-v1 margin-bottom-40">
<?php 
include('admin/pages/connect.php');
$result_properties = $conn->query("select * from properties where status=1");
$count_properties = $result_properties->rowCount();
$row_properties = $result_properties->fetchObject();
if($count_properties>0){
do{
$result_property_images=$conn->query("select * from property_images where prop_id='$row_properties->prop_id' order by autoid asc limit 1");
$count_property_images=$result_property_images->rowCount();
$row_property_images=$result_property_images->fetchObject();
echo "<div class='col-sm-3 md-margin-bottom-40'>
<img class='img-responsive' src='admin/pages/public/".$row_property_images->img1."' alt='' style='width:100%;max-height:230px;height: expression(this.height>400 ? 400: true); mean-height: 400px;height: expression(this.height<400 ? 400: true);'>  
<h3>".$row_properties->prop_name."</h3>
<p>".$row_properties->prop_dets."</p>    
</div>
";}while($row_properties=$result_properties->fetchObject());}
?>
</div>
</div>
</section>


</section>

<section class="section-padding gray-bg">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="section-title text-center">
<h2><span class="coloured">Recent</span> Properties</h2>
<p>Most recent properties at real estate uganda.</p>
</div>
</div>
</div>
<div class="row service-v1 margin-bottom-40">
<?php 
$result_properties=$conn->query("select * from properties where status=1 order by autoid desc");
$count_properties=$result_properties->rowCount();
$row_properties=$result_properties->fetchObject();
if($count_properties>0){
do{
$result_property_images=$conn->query("select * from property_images where prop_id='$row_properties->prop_id'");
$count_property_images=$result_property_images->rowCount();
$row_property_images=$result_property_images->fetchObject();
echo "
<div class='col-sm-3 md-margin-bottom-40'>
<img class='img-responsive' src='admin/pages/public/".$row_property_images->img1."' alt='' style='width:100%;max-height:230px;height: expression(this.height>400 ? 400: true); mean-height: 400px;height: expression(this.height<400 ? 400: true);'>   
<a href='projects.php?propid=".$row_properties->prop_id."'><h3>".$row_properties->prop_name."</h3></a>
<p>".$row_properties->prop_dets."</p>        
</div>
";
}while($row_properties=$result_properties->fetchObject());
}
?>

</div>

</div>
</section>
<section class="section-padding">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="section-title text-center" style="text-align: left;">
<h2><span class="coloured">About</span> Our Company</h2>
<p>Real Estate Developers is a registered company in Uganda dealing in prime Real Estate.</p>
<p>Over the years,we have built unshakable reputation as a highly Trusted real estate dealership.</p>
<p>We strive to offer the best real estate service in regards to home sales, brokerage, property management, home renovations and construction.</p>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-6">
<div class="about-text">
<?php 
include ('admin/pages/connect.php');
if (isset($_POST['sign_news'])){
$name = $_POST['name'];
$phonenumber = $_POST['phonenumber'];
$email = $_POST['email'];
$result_subscribers=$conn->query("insert into subscribers(name,phonenumber,sub_email) values('$name','$phonenumber','$email')");
$count_subscribers=$result_subscribers->rowCount();
$row_subscribers=$result_subscribers->fetchObject();
if($count_subscribers){
echo "<div class='alert alert-success'>Submission Successful</div>";
}else{echo "<div class='alert alert-warning'>Submission Failure</div>";}
}
?>

<p>The following are the services we offer with our company;</p>
<ul class="withArrow">
<li><span class="fa fa-angle-right"></span> Houses</li>
<li><span class="fa fa-angle-right"></span> Mansions</li>
<li><span class="fa fa-angle-right"></span> Villas</li>
<li><span class="fa fa-angle-right"></span> Apartments</li>
</ul>
<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#newsletter" type="button">Sign up to our news later to learn more</a>
</div>
</div>
<div class="col-md-6 col-sm-6">
<div class="about-image">
<img src="img/about.jpg" alt="About Images">
</div>
</div>
</div>
</div>
</section>	  

<div class="modal fade" id="newsletter">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header"><h2 class="modal-title">SIGN UP TO OUR NEWSLETTER</h2></div>
<div class="modal-body">
<form autocomplete="off" method="POST">
<div class="form-group">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
<label>Phonenumber</label>
<input type="number" name="phonenumber" class="form-control">
</div>
<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control" placeholder="Enter Your Email">
</div>
<div class="form-group">
<input type="submit" value="Sign Up" name="sign_news" class="btn btn-sm btn-block btn-info">
</div>
</form>
</div>
</div>
</div>
</div>
<?php 
include('admin/pages/connect.php');
if(isset($_POST['submit_register'])){
$firstname=$_POST['firstname'];
$secondname=$_POST['secondname'];
$username=$_POST['username'];
$password=$_POST['password'];
$contact=$_POST['contact'];
$email=$_POST['email'];

if(!empty($_FILES['img']['tmp_name'])){
$image_name= str_replace(' ', '_', date('i')."".date('s').$_FILES['img']['name']);
$destination = "admin/pages/public".$image_name;
$extension = pathinfo($image_name, PATHINFO_EXTENSION);
$file=$_FILES['img']['name'];
$size=$_FILES['img']['size'];
if(!in_array($extension, ['png','jpg','jpeg','gif','PNG','JPG','JPEG','GIF'])){
echo "Your file extension must be .png, .jpg, .jpeg, .gif, .PNG, .JPG, .JPEG, .GIF";
}elseif ($_FILES['img']['size']>1000000) {
echo "Image shouldn't be larger than One megabyte";
}else{
if(move_uploaded_file($file, $destination)){
echo "<div class='alert alert-success'>Image Uploaded Successfully</div>";
}
}
}

$result_clients=$conn->query("select * from clients where autoid>0");
$count_clients=$result_clients->rowCount();
$row_clients=$result_clients->fetchObject();
if($count_clients <=0 ){$clientid = "cli1";}else{
do{
$clientid = "cli".($row_clients->autoid+1);
}while($row_clients=$result_clients->fetchObject());
}

$insert_clients=$conn->query("insert into clients(firstname,secondname,username,password,contact,email,image,fsize,clientid) values('$firstname','$secondname','$username','$password','$contact','$email','$image_name','$size','$clientid')");
if($insert_clients){
echo "<div class='alert alert-success'>Submission Successful</div>";
}else{echo "<div class='alert alert-warning'>Submission Failure</div>";}
}
?>
<div class="modal fade" id="register">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header"><h2 class="modal-title text-center">REGISTER</h2></div>
<div class="modal-body">
<form method="POST" autocomplete="off" enctype="multipart/form-data">
<div class="form-group">
<label>Firstname</label>
<input type="text" name="firstname" class="form-control">
</div>
<div class="form-group">
<label>Secondname</label>
<input type="text" name="secondname" class="form-control">
</div>
<div class="form-group">
<label>Username</label>
<input type="text" name="username" class="form-control">
</div>
<div class="form-group">
<label>Password</label>
<input type="text" name="password" class="form-control">
</div>
<div class="form-group">
<label>Contact</label>
<input type="text" name="contact" class="form-control">
</div>
<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>
<div class="form-group">
<label>Image</label>
<input type="file" name="img" class="form-control">
</div>
<div class="form-group">
<input type="submit" value="Register" name="submit_register" class="btn btn-sm btn-block btn-primary" >
</div>
</form>
</div>
</div>
</div>
</div>

<div class="modal fade" id="feedback">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header"><h2 class="modal-title text-center">FEEDBACK</h2></div>
<div class="modal-body">
<?php 
if(isset($_POST['submit_feedback'])){
$fullname=$_POST['fullname'];
$phone=$_POST['phone'];
$message=$_POST['message'];

$result_feedback=$conn->query("select * from feedback where autoid>0");
$count_feedback=$result_feedback->rowCount();
$row_feedback=$result_feedback->fetchObject();
if($count_feedback<=0){$feedid="feed1";}else{do{$feedid="feed".($row_feedback->autoid+1);}while($row_feedback=$result_feedback->fetchObject());}

$insert_feedback=$conn->query("insert into feedback(fullname,phone,message,feedid) values('$fullname','$phone','$message','$feedid')");
if($insert_feedback){
echo "<div class='alert alert-success'>Submission Successful</div>";}
else{echo "<div class='alert alert-warning'>Submission Failure</div>";}
}
?>
<form method="POST" autocomplete="off">
<div class="form-group">
<label>Fullname</label>
<input type="text" name="fullname" class="form-control">
</div>
<div class="form-group">
<label>Phone</label>
<input type="number" name="phone" class="form-control">
</div>
<div class="form-group">
<label>Message</label>
<textarea name="message" class="form-control"></textarea>
</div>
<div class="form-group">
<input type="submit" value="Feedback" name="submit_feedback" class="btn btn-sm btn-block btn-primary" >
</div>
</form>
</div>
</div>
</div>
</div>


<?php include('js/Includes/footer.php'); ?>

</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
================================================== -->
<?php include('js/Includes/scripts.php'); ?>
</body>

</html>