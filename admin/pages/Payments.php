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
<div class="card-header"><h1>PAYMENTS</h1></div>
<div class="card-body">
<?php 
if(isset($_POST['submit_payment'])){
$agents = $_POST['agents'];
$paymentplan = $_POST['paymentplan'];
$planprice = $_POST['planprice'];
$month = $_POST['month'];
$expectedammount = $_POST['expectedammount'];
$paidammount = $_POST['paidammount'];
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];

$result_payment=$conn->query("select * from payment where autoid > 0");
$count_payment=$result_payment->rowCount();
$row_payment=$result_payment->fetchObject();
if($count_payment <= 0){$payid="pay1";}else{
do{
$payid="pay".($row_payment->autoid+1);
}while($row_payment=$result_payment->fetchObject());}

$insert_payment = $conn->query("INSERT INTO payment(agents,paymentplan,planprice,month,expectedammount,paidammount,startdate,enddate,payid) VALUES('$agents','$paymentplan','$planprice','$month','$expectedammount','$paidammount','startdate','$enddate'$payid')");
if($insert_payment){
echo "<div class='alert alert-success'>Submission Successfull</div>";
}else{echo "<div class='alert alert-success>Submission Failed</div>";}      
}
?>
<div class="row">
<form method="POST" autocomplete="off">
<div class="row">
<div class="col-lg-3">
<div class="form-group">
<label>Agents</label>
<select class="form-control" name="agents">
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
<label>Payment Plan Type</label>
<input type="text" name="paymentplan" placeholder="Payment Plan Type" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Plan Price</label>
<input type="text" name="planprice" placeholder="Plan Price" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Month</label>
<input type="month" name="month" placeholder="Month" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Expected Ammount</label>
<input type="text" name="expectedammount" placeholder="Expected Ammount" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Paid Ammount</label>
<input type="text" name="paidammount" placeholder="Paid Ammount" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Subscription Start Date </label>
<input type="date" placeholder="Subscription Start Date" name="startdate" class="form-control">
</div>
</div>
<div class="col-lg-3">
<div class="form-group">
<label>Subscription End Date</label>
<input type="date" placeholder="Subscription End Date" name="enddate" class="form-control">
</div>
</div>
<div class="form-group">
<input type="submit" value="Submit" name="submit_payment" class="btn btn-sm btn-rounded btn-info">
</div>

</div>
</form>
</div>

</div>
</div>

<div class="card card-default">
<div class="card-header"></div>
<div class="card-body">
<table class="table table-hover table-bordered table-striped">
<thead>
<tr>
<th>No.</th>
<th>Agents</th>
<th>Payment Plan Type</th>
<th>Plan Price</th>
<th>Month</th>
<th>Expected Ammount</th>
<th>Paid Ammount</th>
<th>Start Date</th>
<th>End Date</th>
</tr>
</thead>
<tbody>
<?php 
$result_payment = $conn->query("select * from payment where status=1");
$count_payment = $result_payment->rowCount();
$row_payment = $result_payment->fetchObject();
if($count_payment > 0){
$y=1;
do{
echo "<tr>
<td>".$y++."</td>
<td>".$row_payment->agents."</td>
<td>".$row_payment->paymentplan."</td>
<td style='font-weight:bold;font-size:20px;'><span>UGX ".number_format($row_payment->planprice)."</span></td>
<td>".$row_payment->month."</td>
<td style='font-weight:bold;font-size:20px;'><span>UGX ".$row_payment->expectedammount."</span></td>
<td style='font-weight:bold;font-size:20px;'><span>UGX ".$row_payment->paidammount."</span></td>
<td>".$row_payment->startdate."</td>
<td>".$row_payment->enddate."</td>
</tr>";
}while($row_payment=$result_payment->fetchObject());
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