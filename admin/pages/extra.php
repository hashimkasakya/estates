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
<div class="card-header"><h2>SYSTEM ADMIN SETTINGS</h2></div>
<div class="card-body">
<div class="row">
<?php 
$result_menu = $conn->query("SELECT * from menu where type='em' and role like '%$role%' order by itemorder asc limit 0,10");
$count_menu = $result_menu->rowCount();
$row_menu = $result_menu->fetchObject();
if($count_menu > 0){
?>
<div class="col-lg-6">
<div class="card card-default">
<div class="card-header bg-success"><h3 style="color: white;">EXTRA MENU TOOLS</h3></div>
<div class="card-body">
<?php 
do{
echo "
<a href='".$row_menu->link."' class='list-group-item'><i class='".$row_menu->img." menu-icon' style='color:maroon;'></i>&nbsp&nbsp".$row_menu->item."</a>
";	 
}while($row_menu=$result_menu->fetchObject());
?>
</div>
</div>
</div>
<?php } ?>
<?php 
$result_menu2 = $conn->query("SELECT * from menu where type='em' and role like '%$role%' order by itemorder asc limit 10,20");
$count_menu2 = $result_menu2->rowCount();
$row_menu2 = $result_menu2->fetchObject();
if($count_menu2 > 0){
?>
<div class="col-lg-6">
<div class="card card-default">
<div class="card-header bg-success"><h3 style="color: white;">EXTRA MENU TOOLS</h3></div>
<div class="card-body">
<?php 
do{
echo "
<a href='".$row_menu2->link."' class='list-group-item'><i class='".$row_menu2->img." menu-icon' style='color:maroon;'></i>&nbsp&nbsp".$row_menu2->item."</a>
";	 
}while($row_menu2=$result_menu2->fetchObject());
?>
</div>
</div>
</div>
<?php } ?>

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