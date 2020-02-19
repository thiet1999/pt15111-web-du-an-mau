<?php
session_start();
require_once '../../config/utils.php';

$loggedInUser = $_SESSION[AUTH];
?>
<header >
    <div class="row">
        <div class="col-2 dashboard-logo">
            <a href="<?php echo ADMIN_URL?>">
                <img src="<?php echo BASE_URL . 'public/images/logo.ico'?>" alt="" class="img-thumbnail">
            </a>
        </div>
        <div class="col-10">

            <ul class="dashboard-nav nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= ADMIN_URL . 'dashboard/' ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= ADMIN_URL . 'users' ?>">Quản lý tài khoản</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quản lý loại xe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quản lý xe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Quản lý vé</a>
                </li>
                <?php if ($loggedInUser): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hi, <?= $loggedInUser['email']?></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Thông tin cá nhân</a>
                            <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                            <a class="dropdown-item" href="#">Thông tin vé xe</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo BASE_URL . 'logout.php'?>">Đăng xuất</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php" title="">Đăng nhập</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</header>