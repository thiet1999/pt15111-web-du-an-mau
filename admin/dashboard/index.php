<?php
session_start();
require_once '../../config/utils.php';
checkLoggedInUser();
$sql = "select * from users";
$users = queryExecute($sql, true);
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
                            <i class="fa fa-users fa-5x"></i>
                        </div>
                        <div class="col-8">
                            <a href="">1 tài khoản</a>
                        </div>
                    </div>
                </div>

                <div class="col-3 dashboard-card bg-blue">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-ticket fa-5x"></i>
                        </div>
                        <div class="col-8">
                            <a href="">1 tài khoản</a>
                        </div>
                    </div>
                </div>

                <div class="col-3 dashboard-card bg-green">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-motorcycle fa-5x"></i>
                        </div>
                        <div class="col-8">
                            <a href="">1 tài khoản</a>
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
