<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

$keyword = isset($_GET['keyword']) == true ? $_GET['keyword'] : "";
$roleId = isset($_GET['role']) == true ? $_GET['role'] : false;

// Lấy danh sách roles
$getRolesQuery = "select * from roles where status = 1";
$roles = queryExecute($getRolesQuery, true);

// danh sách users
$getUsersQuery = "select * from users";

if($keyword !== ""){
    $getUsersQuery .= " where (email like '%$keyword%' 
                            or phone_number like '%$keyword%'  
                            or name like '%$keyword%'  
                            or house_no like '%$keyword%'  )
                      ";
    if($roleId !== false && $roleId !== ""){
        $getUsersQuery .= " and role_id = $roleId";
    }
}else{
    if($roleId !== false && $roleId !== ""){
        $getUsersQuery .= " where role_id = $roleId";
    }
}
//dd($getUsersQuery);
$users = queryExecute($getUsersQuery, true);

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
            <!-- Filter  -->
            <form action="" method="get">
                <div class="form-row">
                    <div class="form-group col-6">
                        <input type="text" value="<?php echo $keyword?>" class="form-control" name="keyword" placeholder="Nhập tên, email, căn hộ, số điện thoại,...">
                    </div>
                    <div class="form-group col-4">
                        <select name="role" class="form-control" >
                            <option selected value="">Tất cả</option>
                            <?php foreach($roles as $ro): ?>
                                <option
                                    <?php if($roleId === $ro['id'] ) {echo "selected";} ?>
                                value="<?php echo $ro['id'] ?>"><?php echo $ro['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <div class="form-group col-2">
                        <button type="submit" class="btn btn-success">Tìm kiếm</button>
                    </div>
                </div>
            </form>
            <!-- Danh sách users  -->
            <div class="row">
                <h3>Danh sách tài khoản</h3>
                <table class="table table-stripped">
                    <thead>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Ảnh</th>
                        <th>Căn hộ</th>
                        <th>Số ĐT</th>
                        <th>Số lượng xe</th>
                        <th>
                            <a href="<?php echo ADMIN_URL . 'users/add-form.php'?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</a>
                        </th>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $us): ?>
                        <tr>
                            <td><?php echo $us['id']?></td>
                            <td><?php echo $us['name']?></td>
                            <td><?php echo $us['email']?></td>
                            <td><?php echo $us['avatar']?></td>
                            <td><?php echo $us['house_no']?></td>
                            <td><?php echo $us['phone_number']?></td>
                            <td><?php echo $us['id']?></td>
                            <td>
                                <?php if($us['role_id'] < $_SESSION[AUTH]['role_id'] || $us['id'] === $_SESSION[AUTH]['id']): ?>
                                <a href="<?php echo ADMIN_URL . 'users/edit.php?id=' . $us['id'] ?>" class="btn btn-sm btn-info">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <?php endif; ?>
                                <?php if($us['role_id'] < $_SESSION[AUTH]['role_id']): ?>
                                <a href="<?php echo ADMIN_URL . 'users/remove.php?id=' . $us['id'] ?>" class="btn-remove btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <?php include_once '../_share/script.php' ?>
    <script>
        $(document).ready(function(){
            $('.btn-remove').on('click', function () {
                var redirectUrl = $(this).attr('href');
                Swal.fire({
                    title: 'Thông báo!',
                    text: "Bạn có chắc chắn muốn xóa tài khoản này?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý'
                }).then((result) => { // arrow function es6 (es2015)
                    if (result.value) {
                        window.location.href = redirectUrl;
                    }
                });
                return false;
            });
            <?php if(isset($_GET['msg'])):?>
            Swal.fire({
                position: 'bottom-end',
                icon: 'warning',
                title: "<?= $_GET['msg'];?>",
                showConfirmButton: false,
                timer: 1500
            });
            <?php endif;?>
        });
    </script>
</body>
</html>
