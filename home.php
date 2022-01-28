<?php 
session_start();
$uname= $_SESSION['username'];
$uemail=$_SESSION['useremail'];
echo "welcome $uname and your email is $uemail";


/*if(isset($_SESSION['Login'])){
header("Location:home.php");
}*/







?>

<a href="logout.php">logout</a>