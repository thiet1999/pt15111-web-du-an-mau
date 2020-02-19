<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = trim($_POST['id']);
$name = trim($_POST['name']);
$status = trim($_POST['status']);

// validate bằng php
$nameerr = "";

// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

// check name đã tồn tại hay chưa
$checkNameQuery = "select * from vehicle_types where name = '$name' and id != $id";
$types = queryExecute($checkNameQuery, true);
if($nameerr == "" && count($types) > 0){
    $nameerr = "Loại phương tiện đã tồn tại, vui lòng sử dụng tên khác";
}

if($nameerr != "" ){
    header('location: ' . ADMIN_URL . "vehicle_types/edit-form.php?nameerr=$nameerr");
    die;
}

$updateVehicleTypeQuery = "update vehicle_types 
                            set
                                name = '$name', 
                                status = $status
                            where id = $id";
queryExecute($updateVehicleTypeQuery, false);
header("location: " . ADMIN_URL . "vehicle_types");
die;