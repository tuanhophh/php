<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../signout.php" class="nav-link">Đăng xuất</a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="ml-3 form-inline">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="ml-auto navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="pb-3 mt-3 mb-3 user-panel d-flex">
                    <div class="image">
                        <img src="../img/logo_qt.png" class="img-circle elevation-2" alt="User Image"
                            style="width: 6.1rem;">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Baber Hair</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="py-2 nav-item border-bottom">
                            <a href="indexQT.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản trị </p>
                            </a>
                        </li>
                        <li class="py-2 nav-item border-bottom">
                            <a href="cate.php" class="nav-link ">
                                <i class="fas fa-list"></i>
                                <p>Quản trị danh mục</p>
                            </a>
                        </li>
                        <li class="py-2 nav-item border-bottom">
                            <a href="service.php" class="nav-link ">
                                <i class="fab fa-servicestack"></i>
                                <p>Quản trị dịch vụ</p>
                            </a>
                        </li>
                        <li class="py-2 nav-item border-bottom">
                            <a href="articles.php" class="nav-link ">
                                <i class="fas fa-blog"></i>
                                <p>Quản trị bài viết</p>
                            </a>
                        </li>
                        <li class="py-2 nav-item border-bottom">
                            <a href="user.php" class="nav-link ">
                                <i class="ion ion-person-add"></i>
                                <p>Quản trị tài khoản </p>
                            </a>
                        </li>
                        <li class="py-2 nav-item border-bottom">
                            <a href="staff.php" class="nav-link ">
                                <i class="fas fa-users"></i>
                                <p>Quản trị nhân viên </p>
                            </a>
                        </li>
                        <li class="py-2 nav-item border-bottom">
                            <a href="sliders.php" class="nav-link ">
                                <i class="fas fa-sliders-h"></i>
                                <p>Quản trị slider </p>
                            </a>
                        </li>
                        <li class="py-2 nav-item border-bottom">
                            <a href="comment.php" class="nav-link ">
                                <i class="fas fa-comments"></i>
                                <p>Quản trị comment </p>
                            </a>
                        </li>
                        <li class="py-2 nav-item border-bottom">
                            <a href="QTDatlich.php" class="nav-link ">
                                <i class="fas fa-calendar-alt"></i>
                                <p>Quản trị đặt lịch </p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
    </div>
</body>

</html>