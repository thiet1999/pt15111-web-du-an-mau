<?php

# Quy định constants
define('BASE_URL', 'http://localhost/pt15111-web/');
define('ADMIN_URL', 'http://localhost/pt15111-web/admin/');
define('AUTH', 'AUTH_SESSION');


# Các hàm sử dụng chung
function getdbConn(){
	try{
		$host = "127.0.0.1";
		$dbname = "pt15111-web";
		$dbusername = "root";
		$dbpass = "123456";

		$connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpass);
		return $connect;
	}catch(Exception $ex){
		var_dump($ex->getMessage());
		die;
	}
}

function queryExecute($sql, $fetchAll = false){
    $conn = getdbConn();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if($fetchAll){
        $data = $stmt->fetchAll();
    }else{
        $data = $stmt->fetch();
    }
    return $data;
}

function checkLoggedInUser(){
    if(isset($_SESSION[AUTH]) || $_SESSION[AUTH] == null || count($_SESSION[AUTH]) == 0){
        header('location: ' . BASE_URL . 'login.php');
        die;
    }
}

function dd($data){
	var_dump($data);
	die;
}






 ?>