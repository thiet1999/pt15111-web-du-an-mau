<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

?>
<!doctype html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản trị - Thêm tài khoản</title>
    <?php include_once '../_share/style.php' ?>
</head>
<body>
<div class="container">
    <?php include_once '../_share/header.php' ?>
    <main class="container">
        <h3>Tạo tài khoản</h3>
        <form id="add-user-form" action="<?= ADMIN_URL . 'users/save-add.php'?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tên người dùng<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="">Email<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="">Nhập lại mật khẩu<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="cfpassword">
                    </div>
                    <div class="form-group">
                        <label for="">Quyền</label>
                        <select name="role_id" class="form-control">
                            <option value="1">Member</option>
                            <option value="1">Member</option>
                            <option value="1">Member</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <img src="<?= PUBLIC_URL . 'images/default-image.jpg'?>" id="preview-img" class="img-fluid">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Ảnh đại diện<span class="text-danger">*</span></label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone_number">
                    </div>
                    <div class="form-group">
                        <label for="">Số nhà</label>
                        <input type="text" class="form-control" name="house_no">
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                    <a href="<?= ADMIN_URL . 'users'?>" class="btn btn-danger">Hủy</a>
                </div>
            </div>
        </form>


    </main>
</div>
<?php include_once '../_share/script.php' ?>
<script>

</script>
</body>
</html>
