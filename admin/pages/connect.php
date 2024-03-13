<?php 
$username = "root";
$password = "";
$dbname = "estates";
$hostname = "localhost";

try{

$conn = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);

}
catch(PDOException $e){

echo $e->getMessage();

}


?>