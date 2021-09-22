<?php
require_once "../connection.php";
session_start();
if (!isset($_SESSION['users']['role'])) {
    header("location: ../signIn.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
require_once "headerQT.php";

?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="mb-2 row">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Quản trị</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Quản trị </li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- danh mục -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <?php
                                    $tongDM = total("SELECT COUNT(*) FROM categories");
                                    ?>
                                    <h3><?= $tongDM ?></h3>
                                    <p>Danh mục</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-list"></i>
                                </div>
                                <a href="cate.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!--sản phẩm -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                    $tongDV = total("SELECT COUNT(*) FROM services");
                                    ?>
                                    <h3><?= $tongDV ?></h3>
                                    <p>Dịch vụ</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-servicestack"></i>
                                </div>
                                <a href="product.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!--user -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <?php
                                    $tongTK = total("SELECT COUNT(*) FROM users");
                                    ?>
                                    <h3><?= $tongTK ?></h3>
                                    <p>Tài khoản</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="user.php" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!--comment -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <?php
                                    $tongCMT = total("SELECT COUNT(*) FROM comment");
                                    ?>
                                    <h3><?= $tongCMT ?></h3>
                                    <p>Comment</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- visitors -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <?php
                                $tongBlog = total("SELECT COUNT(*) articles");
                                ?>
                                <h3><?= $tongBlog ?></h3>
                                <p>Bài viết</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-blog"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- information -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <?php
                                $tongLich = total("SELECT COUNT(*) orders");
                                ?>
                                <h3><?= $tongLich ?></h3>
                                <p>Lịch hẹn</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- silder -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-dark">
                            <div class="inner">
                                <?php
                                $tongSlide = total("SELECT COUNT(*) sliders");
                                ?>
                                <h3><?= $tongSlide ?></h3>
                                <p>Slider</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-sliders-h"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!--Calendar-->

                </div>


                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

</body>
<?php include_once("footerQT.php"); ?>

</html>