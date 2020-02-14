<?php 
session_start();
require_once "./config/utils.php";
$email = isset($_POST['email']) == true ? trim($_POST['email']) : "";
$password = isset($_POST['password']) == true ? trim($_POST['password']) : "";
$loggedInUser = loginUser($email, $password);
if($loggedInUser){
	$_SESSION[AUTH] = $loggedInUser;
	header('location: index.php');
	die;
}
header('location: login.php?msg=Sai thông tin đăng nhập!');
die;

 ?>