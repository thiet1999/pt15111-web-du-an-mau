<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

# Lấy ra tất cả bản ghi trong bảng users
$getAllMemberSql = "select * from users where role_id = 1";
$users = queryExecute($getAllMemberSql, true);

# Lấy ra tất cả các bản ghi trong bảng tickets
$getAllTicketSql = "select * from tickets";
$tickets = queryExecute($getAllTicketSql, true);

# Lấy ra tất cả các bản ghi trong bảng vehicles
$getAllVehicleSql = "select * from vehicles";
$vehicles = queryExecute($getAllVehicleSql, true);
?>
<!doctype html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản trị - Tổng quan</title>
    <?php include_once '../_share/style.php' ?>
</head>
<body>
    <div class="container">
        <?php include_once '../_share/header.php' ?>
        <main>
            <div class="row ">
                <div class="col-3 dashboard-card bg-red">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-user-secret fa-4x"></i>
                        </div>
                        <div class="col-8">
                            <a href="<?php echo ADMIN_URL . "users"?>"><?php echo count($users)?> tài khoản</a>
                        </div>
                    </div>
                </div>

                <div class="col-3 dashboard-card bg-blue">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-ticket fa-4x"></i>
                        </div>
                        <div class="col-8">
                            <a href=""><?php echo count($tickets)?> Vé xe</a>
                        </div>
                    </div>
                </div>

                <div class="col-3 dashboard-card bg-green">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-motorcycle fa-4x"></i>
                        </div>
                        <div class="col-8">
                            <a href=""><?php echo count($vehicles)?> Phương tiện</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <h3>Danh sách vé xe quá hạn</h3>
                <table class="table table-stripped">
                    <thead>
                        <th>ID</th>
                        <th>Biển số</th>
                        <th>Loại xe</th>
                        <th>Chủ xe</th>
                        <th>Căn hộ</th>
                        <th>Số ĐT</th>
                        <th>Email chủ</th>
                    </thead>
                    <tbody>
                    <?php for ($i = 1; $i <= 10; $i++): ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td>29L1 - 123.45</td>
                            <td>SH mode</td>
                            <td>Lê Trọng Đạt</td>
                            <td>1206</td>
                            <td>0988234671</td>
                            <td>datlt34@gmail.com</td>
                        </tr>
                    <?php endfor;?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <?php include_once '../_share/script.php' ?>
</body>
</html>
