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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baber Hair</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/s.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Make the image fully responsive */
    </style>
</head>

<body>
    <!-- Instagram Begin -->
    <div class="instagram">
        <div class="container-fluid">
            <div class="row">
                <div class="p-0 col-lg-2 col-md-4 col-sm-4">
                    <div class="instagram__item set-bg" data-setbg="img/insta1.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ baber hair</a>
                        </div>
                    </div>
                </div>
                <div class="p-0 col-lg-2 col-md-4 col-sm-4">
                    <div class="instagram__item set-bg" data-setbg="img/insta4.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ baber hair</a>
                        </div>
                    </div>
                </div>
                <div class="p-0 col-lg-2 col-md-4 col-sm-4">
                    <div class="instagram__item set-bg" data-setbg="img/insta2.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ baber hair</a>
                        </div>
                    </div>
                </div>
                <div class="p-0 col-lg-2 col-md-4 col-sm-4">
                    <div class="instagram__item set-bg" data-setbg="img/insta5.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ baber hair</a>
                        </div>
                    </div>
                </div>
                <div class="p-0 col-lg-2 col-md-4 col-sm-4">
                    <div class="instagram__item set-bg" data-setbg="img/insta3.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ baber hair</a>
                        </div>
                    </div>
                </div>
                <div class="p-0 col-lg-2 col-md-4 col-sm-4">
                    <div class="instagram__item set-bg" data-setbg="img/insta6.jpg">
                        <div class="instagram__text">
                            <i class="fa fa-instagram"></i>
                            <a href="#">@ baber hair</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Instagram End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer__about">
                        <div class="footer__logo">
                            <a href="index.php"><img src="img/logo_menu.png" alt="" style="width: 70%;"></a>
                        </div>
                        <p>
                            Địa chỉ: 300 Nguyễn Trãi, P.Văn Quán, Q.Hà Đông, Hà Nội<br>
                            Số điện thoại: 0983 426 052<br>
                            Email: baberhair@gmail.com<br>

                        </p>
                        <div class="footer__payment">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer__widget">
                        <h6>Thời gian mở cửa: </h6>
                        <p>Thứ 2 đến Chủ Nhật từ 8h30 đến 22h30</p>

                    </div>
                </div>
                <div class="col">
                    <div class="footer__newslatter">
                        <h6>NEWSLETTER</h6>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <div class="footer__copyright__text">
                        <p>Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> by Baber Hair. <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        </p>
                    </div>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form" action="service.php" method="get">
                <input type="text" name="search" id="search-input" placeholder="Search here.....">
                <button type="submit" name="send">Send</button>
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>