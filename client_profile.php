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
<h2><span class="coloured"><?php echo $_SESSION['clientid']; ?></span></h2>

<div class="card card-default">
<div class='card-header'><h2 class="card-title">Your Requests</h2></div>
<div class="card-body">
<?php
if(isset($_POST['delete_sta'])){
$clientid=$_POST['clientid'];
$delete_client=$conn->query("delete from clients where clientid='$clientid'");
if($delete_client){echo "<div class='alert alert-danger'>Deleted Successfully</div>";}
}
?>
<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg-10">
<table class="table table-bordered table-striped">
<thead>
<tr>
<th>No.</th>
<th>Date</th>
<th>Abouts</th>
<th>Agent</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php 
$result_clients=$conn->query("select * from clients where status=1");
$count_clients=$result_clients->rowCount();
$row_clients=$result_clients->fetchObject();
if($count_clients>0){
$f=1; 
do{
$result_agents = $conn->query("select * from agents where autoid='$row_clients->autoid' and status=1");
$count_agents=$result_agents->rowCount();
$row_agents=$result_agents->fetchObject();

echo "<tr>
<td>".$f++."</td>
<td>".$row_clients->autodate."</td>
<td>".$row_clients->firstname." ".$row_clients->secondname."<br>".$row_clients->contact."<br>".$row_clients->email."</td>
<td>".$row_agents->firstname."  ".$row_agents->lastname."<br>".$row_agents->agenttitle."<br>".$row_agents->address."<br>".$row_agents->phonenumber1."<br>".$row_agents->email."</td>
<td>
<a href='admin/pages/edit_entries.php?action=".'status'."&&ourid=".$row_clients->clientid." ' class='btn btn-rounded btn-info'>Approved</a>
</td>
<td>
<form method='POST'>
<input type='hidden' name='statusid' value='".$row_clients->clientid."'>
<button type='submit' name='delete_status' class='btn btn-rounded btn-warning'>Denied</button>
</form>
</td>
</tr>";
}while($row_clients=$result_clients->fetchObject());
}
?>
</tbody>
</table>
</div>
<div class="col-lg-2"></div>
</div>
</div>
</div>

</div>  
</div>
</div> 

</div>
</section>  
<!-- Start Gallery 1-2 -->

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