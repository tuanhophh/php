<?php
require_once "../connection.php";
$stt = 0;
$sql = "SELECT *FROM sliders";
$stmt = $conn->prepare($sql);
$stmt->execute();
$slider = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <!-- Main content -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="mb-2 row">
                        <div class="col-sm-6">
                            <h1>Quản trị slider </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Slider</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a href="addSlider.php" class="btn btn-primary">Thêm Slider</a>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên slider</th>
                                                <th>Ảnh</th>
                                                <th>Link</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($slider as $row) : ?>
                                            <tr>
                                                <td scope="slide"><?= $stt += 1 ?></td>
                                                <td><?= $row['slider_name'] ?> </td>
                                                <td>
                                                    <img src="../upload/<?= $row['slider_img'] ?>" alt="" width="200px">
                                                </td>
                                                <td><?= $row['link'] ?></td>
                                                <td> <a href="editSlider.php?slider_id=<?= $row['slider_id'] ?>"
                                                        type="submit" class="btn btn-primary" name="sua">Sửa</a>
                                                    <a href="deleteSlider.php?slider_id=<?= $row['slider_id'] ?>"
                                                        class="btn btn-danger"
                                                        onclick="return alert('Bạn có chắc chắn xóa k ?')"
                                                        name="xoa">Xóa</a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>

                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

</body>
<?php
require_once("footerQT.php");
?>

</html>