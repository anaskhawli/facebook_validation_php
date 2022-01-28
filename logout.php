<?php 
session_start();

unset($_SESSION['username']);
unset($_SESSION['useremail']);

session_destroy();

header('location:sign.php');
?>