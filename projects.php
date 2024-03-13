<?php include('js/Includes/header.php'); ?>
<body>
<div id="wrapper">
<div class="topbar">
<div class="container">
<div class="row">
<div class="col-md-12">
<p class="pull-left hidden-xs"><i class="fa fa-clock-o"></i><span>Mon - Sat 8.00 - 18.00. Sunday CLOSED</span>
<p class="pull-right"><i class="fa fa-phone"></i>Tel No. (+256) 774643695</p>
</div>
</div>
</div>
</div>
<!-- start header -->
<?php include('js/Includes/navbar.php'); ?>
<!-- end header -->
<?php
include('admin/pages/connect.php');
$propid = $_GET['propid'];
$result_properties=$conn->query("select * from properties where prop_id='$propid'");
$count_poperties=$result_properties->rowCount();
$row_properties=$result_properties->fetchObject();
if($count_poperties>0){
$result_scrap = $conn->query("select * from scrap where item='$row_properties->prop_cat' and type='cat'");
$count_scrap=$result_scrap->rowCount();
$row_scrap=$result_scrap->fetchObject();
$result_agents = $conn->query("select * from agents where autoid='$row_properties->prop_agent' and status=1");
$count_agents=$result_agents->rowCount();
$row_agents=$result_agents->fetchObject();
$result_property_images=$conn->query("select * from property_images where prop_id='$row_properties->prop_id' and status=1");
$count_property_images=$result_property_images->rowCount();
$row_property_images=$result_property_images->fetchObject();
}
?>
<section id="inner-headline">
<div class="container">
<div class="row">
<div class="col-lg-12">
<h2 class="pageTitle">Real Estate Developers Uganda</h2>
</div>
</div>
</div>
</section>
<section id="content">
<div class="container">

<div class="row"> 
<div class="col-md-12">
<div class="about-logo">
<h2><span class="coloured"><?php echo $row_properties->prop_name; ?></span>&nbsp<?php echo $row_scrap->item2; ?></h2>

<p> <?php echo $row_properties->prop_dets; ?></p>
<p><span style="font-weight: bold;font-size: 24px;">UGX: <?php echo number_format($row_properties->prop_price); ?></span></p>
</div>  
</div>
</div> 

</div>
</section>	
<!-- Start Gallery 1-2 -->
<section id="gallery-1" class="content-block section-wrapper gallery-1">
<div class="container">

<div class="editContent">
<div class="row">
<div class="col-lg-3">
<div class="card card-default">
<div class="card-header"><h3 class="card-title">Agent Details</h3></div>
<div class="card-body">
<?php echo "<ul class='list-group'>
<li class='list-group-item'>".$row_agents->firstname." ".$row_agents->lastname."</li>
<li class='list-group-item'>".$row_agents->address."</li>
<li class='list-group-item'>".$row_agents->phonenumber1." <span style='color:maroon;font-weight:bold;'>[".$row_agents->email."]</span></li>

</ul>";
?>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="card card-default">
<div class="card-header"><h3 class="card-title">About</h3></div>
<div class="card-body">
<?php
echo "<ul class='list-group'>
<li class='list-group-item'>".$row_properties->prop_name."</li>
<li class='list-group-item'>".$row_properties->prop_dets."</li>
<li class='list-group-item'>".$row_scrap->item2."</li>
</ul>";
?>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="card card-default">
<div class="card-header"><h3 class="card-title">Specifications</h3></div>
<div class="card-body">
<?php 
echo "<ul class='list-group'>
<li class='list-group-item'><span>Bathrooms: </span>".$row_properties->bathrooms."</li>
<li class='list-group-item'><span>Bedrooms: </span>".$row_properties->bedrooms."</li>
<li class='list-group-item'><span>Plot size: </span>".$row_properties->plot_size."</li>
</ul>";
?>
</div>
</div>
</div>
<div class="col-lg-3">
<?php 
if(isset($_SESSION['clientid'])){
?>
<button class="btn btn-success" type="button" data-toggle="collapse" data-target="#requests" aeria-expanded="false" area-controls="requests">Make Request</button>
<div class="collapse" id="requests">
<div class="card-body">
<?php 
if(isset($_POST['submit_requests'])){
$result_requests=$conn->query("select * from requests where autoid > 0");
$count_requests=$result_requests->rowCount();
$row_requests=$result_requests->fetchObject();
if($count_requests<=0){$clientid="cli1";}else{
do{$clientid="cli".($row_requests->autoid+1);}while($row_requests=$result_requests->fetchObject());
}
$message=$_POST['message'];
$propid=$_GET['propid'];
$insert_requests=$conn->query("insert into requests(clientid,message,prop_id) values('$clientid','$message','$propid')");
if($insert_requests){
echo "<div class='alert alert-success'>Submission Successful</div>";
}else{echo "<div class='alert alert-warning'>Submission Failure</div>";}
}
?>
<form method="POST" autocomplete="off">
<div class="form-group">
<label>Message</label>
<textarea class="form-control" placeholder="Leave comment here" name="message"></textarea>
</div>
<div class="form-group">
<input type="submit" name="submit_requests" value="Request" class="btn btn-sm btn-success">
</div>
</form>
</div>
</div>
<?php }else{echo "
<a href='#' data-toggle='modal' data-target='#signin' type='button' class='btn btn-sm btn-block btn-success'>Sign in</a></li>
";} ?>
</div>
</div>
</div>
<!-- /.gallery-filter -->

<div class="row">
<div id="isotope-gallery-container">
<div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper apartments villas">
<div class="gallery-item">
<div class="gallery-thumb">
<img src="admin/pages/public/<?php echo $row_property_images->img1; ?>" class="img-responsive" alt="1st gallery Thumb" style='width:100%;max-height:230px;height: expression(this.height>400 ? 400: true); mean-height: 400px;height: expression(this.height<400 ? 400: true);'>
<div class="image-overlay"></div>
<a href="img/works/1.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>
<a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
</div>
</div>
</div>
<!-- /.gallery-item-wrapper -->
<div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper commercial gated">
<div class="gallery-item">
<div class="gallery-thumb">
<img src="admin/pages/public/<?php echo $row_property_images->img2; ?>" class="img-responsive" alt="2nd gallery Thumb" style='width:100%;max-height:230px;height: expression(this.height>400 ? 400: true); mean-height: 400px;height: expression(this.height<400 ? 400: true);'>
<div class="image-overlay"></div>
<a href="img/works/2.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>
<a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
</div>
</div>
</div>
<!-- /.gallery-item-wrapper -->
<div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper housing apartments">
<div class="gallery-item">
<div class="gallery-thumb">
<img src="admin/pages/public/<?php echo $row_property_images->img3; ?>" class="img-responsive" alt="3rd gallery Thumb" style='width:100%;max-height:230px;height: expression(this.height>400 ? 400: true); mean-height: 400px;height: expression(this.height<400 ? 400: true);'>
<div class="image-overlay"></div>
<a href="img/works/3.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>
<a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
</div>

</div>
</div>
<!-- /.gallery-item-wrapper -->
<div class="col-md-4 col-sm-6 col-xs-12 gallery-item-wrapper villas commercial">
<div class="gallery-item">
<div class="gallery-thumb">
<img src="admin/pages/public/<?php echo $row_property_images->img4; ?>" class="img-responsive" alt="4th gallery Thumb" style='width:100%;max-height:230px;height: expression(this.height>400 ? 400: true); mean-height: 400px;height: expression(this.height<400 ? 400: true);'>
<div class="image-overlay"></div>
<a href="img/works/4.jpg" class="gallery-zoom"><i class="fa fa-eye"></i></a>
<a href="#" class="gallery-link"><i class="fa fa-link"></i></a>
</div>

</div>
</div>
<!-- /.gallery-item-wrapper -->
<!-- /.gallery-item-wrapper -->


</div>
<!-- /.isotope-gallery-container -->
</div>
<!-- /.row --> 
<!-- /.container -->
</div>
</section>
<!--// End Gallery 1-2 -->  
</div>
<?php include('js/Includes/footer.php'); ?>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<?php include('js/Includes/scripts.php'); ?> 
</body>

</html>