<?php
/**
 * Created by PhpStorm.
 * User: ginv2
 * Date: 2/17/20
 * Time: 18:41
 * 1. lấy id xuống
 * 2. kiểm tra id có hợp lệ hay không?
 * 3. kiểm tra xem id có tồn tại hay không
 * 4. thực hiện câu lệnh xóa với csdl
 * 5. điều hướng về danh sách
 *
 */
session_start();
include_once "../../config/utils.php";
checkAdminLoggedIn();
$id = isset($_GET['id']) ? $_GET['id'] : -1;

$removeUserQuery = "delete from users where id = $id";
queryExecute($removeUserQuery, false);
header("location: " . ADMIN_URL . "users");
die;