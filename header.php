<?php
session_start();
?>
<?php
if (isset($_GET['send']) && $_GET["search"] != '') {
    $search = $_GET['search'];
    $sql = "SELECT * FROM services WHERE service_name like '%$search%'  ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $Search = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baber Hair</title>

    <!-- Google Font -->
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
    <script src="js/main.js"></script>
</head>


<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                    <div class="tip">2</div>
                </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                    <div class="tip">2</div>
                </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="index.php"><img src="" alt=""></a>

        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Đăng nhập</a>
            <a href="#">Đăng ký</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
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
                                            <li><a href="history.php?username=<?= $_SESSION['users']['username'] ?>">Lịch
                                                    sử đặt lịch</a></li>
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
                                            <li><a href="history.php?username=<?= $_SESSION['staff']['staff_name'] ?>">Lịch
                                                    sử đặt lịch</a></li>
                                            <li>
                                                <?php if (isset($_SESSION['staff']['staff_name'])) : ?>
                                                <a
                                                    href="signOut.php?staff_name=<?= $_SESSION['staff']['staff_name'] ?>">Đăng
                                                    xuất</a>
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
    <!-- Header Section End -->
</body>

</html>