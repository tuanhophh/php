<?php
require_once "../connection.php";
//lấy dữ liệu từ slider
if (isset($_GET['slider_id'])) {
    $slider_id = $_GET['slider_id'];
    $sql = "SELECT * from sliders where slider_id=$slider_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sliders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $slider = $sliders[0];
}
//update
if (isset($_POST['btnSua'])) {
    $slider_name = $_POST['slider_name'];
    $link = $_POST['link'];
    if ($_FILES['slider_img']['size'] > 0) {
        $img = time() . $_FILES['slider_img']['name'];
        move_uploaded_file($_FILES['slider_img']['tmp_name'], "../upload/" . $img);
    } else {
        $img = $slider['slider_img'];
    }
    echo $img;
    $sql = "UPDATE sliders set slider_name='$slider_name', slider_img='$img', link='$link' where slider_id =  '$slider_id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $msg = "Update thành công";
    header("location:sliders.php?msg=" . $msg);
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
                            <h1>Sửa Slider</h1>
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
                                    <input type="text" class="form-control" style="width: 100%;" name="slider_name"
                                        value="<?= $slider['slider_name'] ?>">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" class="form-control" style="width: 100%;" name="link"
                                        value="<?= $slider['link'] ?>">
                                </div>

                            </div>
                        </div>
                        <!-- /.row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" name="slider_img" class="form-control" style="width: 100%;"
                                        value="<?= $slider['slider_img'] ?>">
                                    <?php if (!empty($slider['slider_img'])) : ?>
                                    <img src="../upload/<?= $slider['slider_img'] ?>" alt="" width="50%">
                                    <br>
                                    <?php endif; ?>
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="btnSua">Sửa Slide</button>
                                    <a class="btn btn-danger" href="sliders.php">Quay Lại</a>
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