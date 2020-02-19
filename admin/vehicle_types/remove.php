<?php

session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$getRemoveVehicleTypeQuery = "select * from vehicle_types where id = $id";
$removeType = queryExecute($getRemoveVehicleTypeQuery, false);

if(!$removeType){
    header("location: " . ADMIN_URL . "vehicle_types?msg=Loại phương tiện không tồn tại");
    die;
}


$removeVehicleTypeQuery = "delete from vehicle_types where id = $id";
queryExecute($removeVehicleTypeQuery, false);
header("location: " . ADMIN_URL . "vehicle_types?msg=Xóa loại phương tiện thành công");
die;