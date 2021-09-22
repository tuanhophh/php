<?php
require_once "../connection.php";
if (isset($_POST['btnThem'])) {
    $name = $_POST['slider_name'];
    $link = $_POST['link'];
    if ($_FILES['slider_img']['size'] > 0) {
        $img = time() . $_FILES['slider_img']['name'];
        move_uploaded_file($_FILES['slider_img']['tmp_name'], "../upload/" . $img);
    } else {
        $img = "";
    }
    $sql = "INSERT INTO sliders set slider_name='$name', slider_img='$img', link='$link' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location:sliders.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php require_once("headerQT.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="mb-2 row">
                        <div class="col-sm-6">
                            <h1>Thêm Slider</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm Slider</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên Slide</label>
                                    <input type="text" class="form-control" style="width: 100%;" name="slider_name">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" style="width: 100%;" name="link">
                                </div>

                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" class="form-control" style="width: 100%;" name="slider_img">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="btnThem">Thêm Slide</button>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                    </div>
                </form>

                <!-- /.row -->
        </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

</body>
<?php
require_once("footerQT.php");
?>

</html>