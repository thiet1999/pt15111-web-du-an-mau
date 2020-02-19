<?php
session_start();
require_once '../../config/utils.php';
checkAdminLoggedIn();
// lấy thông tin của loại phương tiện
$id = isset($_GET['id']) ? $_GET['id'] : -1;

// kiểm tra loại phương tiện có tồn tại hay không
$getVehicleTypeByIdQuery = "select * from vehicle_types where id = $id";
$vehicleType = queryExecute($getVehicleTypeByIdQuery, false);
if(!$vehicleType){
    header("location: " . ADMIN_URL . 'vehicle_types?msg=Loại phương tiện tồn tại');die;
}
?>
<!doctype html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản trị - Sửa loại phương tiện</title>
    <?php include_once '../_share/style.php' ?>
</head>
<body>
<div class="container">
    <?php include_once '../_share/header.php' ?>
    <main class="container">
        <h3>Tạo loại phương tiện</h3>
        <form id="edit-vehicle_type-form" action="<?= ADMIN_URL . 'vehicle_types/save-edit.php'?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $vehicleType['id']?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tên loại phương tiện<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" value="<?= $vehicleType['name']?>">
                        <?php if(isset($_GET['nameerr'])):?>
                            <label class="error"><?= $_GET['nameerr']?></label>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option
                                <?php if($vehicleType['status'] == ACTIVE):?>
                                    selected
                                <?php endif?>
                                value="<?= ACTIVE ?>">Active</option>
                            <option
                                <?php if($vehicleType['status'] == INACTIVE):?>
                                    selected
                                <?php endif?>
                                value="<?= INACTIVE ?>">Inactive</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Tạo</button>&nbsp;
                        <a href="<?= ADMIN_URL . 'vehicle_types'?>" class="btn btn-danger">Hủy</a>
                    </div>
                </div>


            </div>
        </form>


    </main>
</div>
<?php include_once '../_share/script.php' ?>
<script>

    $('#edit-vehicle_type-form').validate({
        rules:{
            name: {
                required: true,
                maxlength: 191,
                remote: {
                    url: "<?= ADMIN_URL . 'vehicle_types/verify-name-existed.php'?>",
                    type: "post",
                    data: {
                        name: function() {
                            return $( "input[name='name']" ).val();
                        },
                        id: <?= $vehicleType['id'] ?>
                    }
                }
            }
        },
        messages: {
            name: {
                required: "Hãy nhập loại phương tiện",
                maxlength: "Số lượng ký tự tối đa bằng 191 ký tự",
                remote: "Loại phương tiện đã tồn tại, vui lòng sử dụng tên khác"
            }
        }
    });
</script>
</body>
</html>
