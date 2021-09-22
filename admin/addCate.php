<?php
require_once("../connection.php");
if (isset($_POST['btnThem'])) {
    $name = $_POST['cate_name'];
    if ($_FILES['cate_img']['size'] > 0) {
        $img = time() . $_FILES['cate_img']['name'];
        move_uploaded_file($_FILES['cate_img']['tmp_name'], "../upload/" . $img);
    } else {
        $img = "";
    }
    $sql = "INSERT INTO categories set cate_name='$name', cate_img='$img'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location:cate.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once("headerQT.php"); ?>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="mb-2 row">
                        <div class="col-sm-6">
                            <h1>Thêm danh mục</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm danh mục</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên danh mục</label>
                                    <input type="text" class="form-control" style="width: 100%;" name="cate_name">
                                </div>
                                <!-- /.form-group -->

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" class="form-control" style="width: 100%;" name="cate_img">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="btnThem">Thêm danh mục</button>
                                    <a class="btn btn-danger" href="cate.php">Quay lại</a>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                    </div>
                </form>

                <!-- /.row -->
        </div>
        <!-- /.content-wrapper -->

</body>
<?php
include_once("footerQT.php");
?>

</html>