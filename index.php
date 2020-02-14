<?php 
// bắt đầu sử dụng session
session_start();
require_once "./config/utils.php";
$loggedInUser = $_SESSION[AUTH];

// echo password_hash("123456", PASSWORD_DEFAULT);
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hệ thống quản lý vé xe chung cư icid complex</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/public/css/main.css'?>">
</head>
<body>
    <div class="container">
        <header >
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= BASE_URL ?>">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Loại vé</a>
                </li>
                <?php if ($loggedInUser): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hi, <?= $loggedInUser['email']?></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Thông tin cá nhân</a>
                            <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                            <a class="dropdown-item" href="#">Thông tin vé xe</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo BASE_URL . '/logout.php'?>">Đăng xuất</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" title="">Đăng nhập</a>
                    </li>
                <?php endif ?>
            </ul>
        </header>
        <main class="main-content">
            <div class="row">
                <div class="col-9">
                    <h3>Thông báo chung</h3>
                    <?php for ($i = 0; $i < 5; $i++): ?>
                    <div class="post-unit">
                        <div class="row">
                            <div class="col-4 post-image">
                                <img src="<?php echo BASE_URL . '/public/images/demo.jpeg'?>" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-8 post-content">
                                <h3>
                                    <a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur culpa distinctio ducimus eveniet ex expedita explicabo in incidunt.</p>
                            </div>
                        </div>
                    </div>
                    <?php endfor;?>
                </div>
                <div class="col-3 ticket-price">
                    <h3>Giá vé cho cư dân</h3>
                    <ul>
                        <li>
                            <div class="ticket-type-img">
                                <img src="<?php echo BASE_URL . 'public/images/xe-may.png'?>" alt="" class="img-thumbnail">
                            </div>
                            <p>Vé xe máy: 70.000đ/tháng</p>
                        </li>
                        <li>
                            <div class="ticket-type-img">
                                <img src="<?php echo BASE_URL . 'public/images/o-to.jpg'?>" alt="" class="img-thumbnail">
                            </div>
                            <p>Vé xe ô tô: 800.000đ/tháng</p>
                        </li>
                    </ul>
                    <h3>Giá vé lượt</h3>
                    <ul>
                        <li>
                            <div class="ticket-type-img">
                                <img src="<?php echo BASE_URL . 'public/images/xe-may2.jpg'?>" alt="" class="img-thumbnail">
                            </div>
                            <p>Vé xe máy: 5.000đ/lượt</p>
                        </li>
                        <li>
                            <div class="ticket-type-img">
                                <img src="<?php echo BASE_URL . 'public/images/o-to2.jpg'?>" alt="" class="img-thumbnail">
                            </div>
                            <p>Vé xe ô tô: 30.000đ/lượt</p>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
    <footer class="container-fluid">
        <div class="row">
            <div class="col-8 offset-2">
                <p class="text-center">
                    ICID Complex - Địa chỉ: Lô 37 Lê Trọng Tấn, Dương Nội, Hà Đông, Hà Nội
                </p>
            </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>

    </script>
</body>
</html>