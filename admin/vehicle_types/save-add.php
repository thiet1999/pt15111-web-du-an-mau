<?php
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$name = trim($_POST['name']);

// validate bằng php
$nameerr = "";

// check name
if(strlen($name) < 2 || strlen($name) > 191){
    $nameerr = "Yêu cầu nhập tên tài khoản nằm trong khoảng 2-191 ký tự";
}

// check name đã tồn tại hay chưa
$checkNameQuery = "select * from vehicle_types where name = '$name'";
$types = queryExecute($checkNameQuery, true);
if($nameerr == "" && count($types) > 0){
    $nameerr = "Loại phương tiện đã tồn tại, vui lòng sử dụng tên khác";
}

if($nameerr != "" ){
    header('location: ' . ADMIN_URL . "vehicle_types/add-form.php?nameerr=$nameerr");
    die;
}

$insertVehicleTypeQuery = "insert into vehicle_types 
                          (name, status)
                    values 
                          ('$name', ".ACTIVE.")";
queryExecute($insertVehicleTypeQuery, false);
header("location: " . ADMIN_URL . "vehicle_types");
die;