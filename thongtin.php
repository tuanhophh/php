<?php
session_start();
require_once "connection.php";
if (isset($_SESSION['users']['username']) && isset($_GET['user_id'])) {
    $sql = "SELECT * FROM users where user_id=" . $_GET['user_id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
if (isset($_SESSION['staff']['staff_name']) && isset($_GET['staff_id'])) {
    $sql = "SELECT * FROM staff where staff_id=" . $_GET['staff_id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $staff = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin khách hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../duAn1/css/style.css" type="text/css">
    <link rel="stylesheet" href="css/s.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    body {
        padding-top: 68px;
        padding-bottom: 50px;
    }

    .image-container {
        position: relative;
    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }

    .image-container:hover .image {
        opacity: 0.3;
    }

    .image-container:hover .middle {
        opacity: 1;
    }
    </style>

</head>

<body style="margin-top: -70px;">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->


    <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css" />
    <header class="header mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="index.php"><img src="img/logo_menu.png" alt="" width="200px" height="60px"></a>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php">TRANG CHỦ</a></li>
                            <li><a href="service.php">DỊCH VỤ</a>
                                <ul class="dropdown">
                                    <li><a href="./product-details.html">CẮT TÓC NAM</a></li>
                                    <li><a href="./shop-cart.php">CẮT TÓC NỮ</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.php">LIÊN HỆ</a></li>
                            <li><a href="blog.php">BLOG</a></li>
                            <li><a href="about.php">GIỚI THIỆU</a></li>
                            <li><a href="datlich.php">ĐẶT LỊCH ONLINE</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="">
                        <div class="header__right__auth">
                            <!-- --------------------------------------------- -->
                            <?php if (isset($_SESSION['users']['username']) && $_SESSION['users']['role'] != 0) : ?>
                            <nav class="header__menu">
                                <ul>

                                    <li><a href="">
                                            <?= $_SESSION['users']['username'] ?></a>
                                        <ul class="dropdown">
                                            <li><a href="./thongtin.php?user_id=<?= $_SESSION['users']['user_id'] ?>">Thông
                                                    tin</a></li>
                                            <li><a href="history.php">Lịch sử đặt lịch</a></li>
                                            <li>
                                                <?php if (isset($_SESSION['users']['username'])) : ?>
                                                <a href="signOut.php">Đăng xuất</a>
                                                <?php endif; ?>
                                            </li>

                                        </ul>
                                    </li>


                                </ul>
                            </nav>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['staff']['staff_name'])) : ?>
                            <nav class="header__menu">
                                <ul>

                                    <li><a href="">
                                            <?= $_SESSION['staff']['staff_name'] ?></a>
                                        <ul class="dropdown">
                                            <li><a href="./thongtin.php?staff_id=<?= $_SESSION['staff']['staff_id'] ?>">Thông
                                                    tin</a></li>
                                            <li><a href="history.php">Lịch sử đặt lịch</a></li>
                                            <li>
                                                <?php if (isset($_SESSION['staff']['staff_name'])) : ?>
                                                <a href="signOut.php">Đăng xuất</a>
                                                <?php endif; ?>
                                            </li>

                                        </ul>
                                    </li>


                                </ul>
                            </nav>
                            <?php endif; ?>
                            <?php if (isset($_SESSION['users']['username']) && $_SESSION['users']['role'] == 0) : ?>
                            <nav class="header__menu">
                                <ul>

                                    <li><a href="admin/indexQT.php"> <?= $_SESSION['users']['username'] ?></a>
                                        <ul class="dropdown">

                                            <li>
                                                <?php if (isset($_SESSION['users']['username'])) : ?>
                                                <a href="signOut.php">Đăng xuất</a>
                                                <?php endif; ?>
                                            </li>

                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                            <?php endif; ?>
                            <?php if (!isset($_SESSION['users']['username']) && !isset($_SESSION['staff']['staff_name'])) : ?>
                            <div class="header__right header__menu">
                                <a href="signIn.php">Đăng nhập</a>
                                <a href="signUp.php">Đăng kí</a>
                            </div>
                            <?php endif; ?>
                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <?php if (isset($_SESSION['users']['username'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="mb-4 card-title">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="../duAn1/upload/<?= $user['avatar'] ?>" width="200" height="200"
                                        id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture"
                                            value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                    </div>
                                </div>
                                <div class="ml-3 userData">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a
                                            href="javascript:void(0);"> <?= $_SESSION['users']['username'] ?></a></h2>
                                    <div class="ml-auto">
                                        <a href="changePass.php?user_id=<?= $user['user_id'] ?>"
                                            style="font-weight: bold;font-size: 20px;">Đổi mật khẩu</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="ml-1">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">User Name</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?= $_SESSION['users']['username'] ?>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Phone</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?= $user['phone'] ?>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Address</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?= $user['address'] ?>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Email</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?= $user['email'] ?>
                                        </div>
                                    </div>
                                    <hr />

                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                                    aria-labelledby="ConnectedServices-tab">
                                    Facebook, Google, Twitter Account that are connected to this account
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <?php endif; ?>
    <!-- =============staff============ -->
    <?php if (isset($_SESSION['staff']['staff_id'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="mb-4 card-title">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="../duAn1/upload/<?= $staff['avatar'] ?>" width="200" height="200"
                                        id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" />
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture"
                                            value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="file" />
                                    </div>
                                </div>
                                <div class="ml-3 userData">
                                    <h2 class="d-block" style="font-size: 1.5rem; font-weight: bold"><a
                                            href="javascript:void(0);"> <?= $_SESSION['staff']['staff_name'] ?></a></h2>
                                    <div class="ml-auto">
                                        <a href="changePass.php?user_id=<?= $staff['staff_id'] ?>"
                                            style="font-weight: bold;font-size: 20px;">Đổi mật khẩu</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="ml-1">
                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">User Name</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?= $_SESSION['staff']['staff_name'] ?>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Phone</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?= $staff['phone'] ?>
                                        </div>
                                    </div>
                                    <hr />

                                    <div class="row">
                                        <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Email</label>
                                        </div>
                                        <div class="col-md-8 col-6">
                                            <?= $staff['note'] ?>
                                        </div>
                                    </div>
                                    <hr />

                                </div>
                                <div class="tab-pane fade" id="connectedServices" role="tabpanel"
                                    aria-labelledby="ConnectedServices-tab">
                                    Facebook, Google, Twitter Account that are connected to this account
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <?php endif; ?>
</body>

</html>