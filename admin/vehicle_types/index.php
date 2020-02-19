<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();

// danh sách vehicle_types
$getVehicleTypesQuery = "select * from vehicle_types";

//dd($getUsersQuery);
$vehicleTypes = queryExecute($getVehicleTypesQuery, true);

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
        <!-- Danh sách vehicle types  -->
        <div class="row">
            <h3>Danh sách loại phương tiện</h3>
            <table class="table table-stripped">
                <thead>
                <th>ID</th>
                <th>Tên</th>
                <th>Trạng thái</th>
                <th>
                    <a href="<?php echo ADMIN_URL . 'vehicle_types/add-form.php'?>" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm</a>
                </th>
                </thead>
                <tbody>
                <?php foreach ($vehicleTypes as $vt): ?>
                    <tr>
                        <td><?php echo $vt['id']?></td>
                        <td><?php echo $vt['name']?></td>
                        <td>
                            <?php if($vt['status'] == 1):?>
                                Active
                            <?php else: ?>
                                Inactive
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo ADMIN_URL . 'vehicle_types/edit-form.php?id=' . $vt['id'] ?>" class="btn btn-sm btn-info">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="<?php echo ADMIN_URL . 'vehicle_types/remove.php?id=' . $vt['id'] ?>" class="btn-remove btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
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
                text: "Bạn có chắc chắn muốn xóa loại phương tiện này?",
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
