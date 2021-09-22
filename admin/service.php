<?php
require_once "../connection.php";
$stt = 0;
$sql = "SELECT * FROM services inner join categories on services.cate_id = categories.cate_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$service = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            <h1>Quản trị dịch vụ </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Services</li>
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
                                    <a href="addService.php" class="btn btn-primary">Thêm dịch vụ</a>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Danh mục</th>
                                                <th>Tên dịch vụ</th>
                                                <th>Ảnh</th>
                                                <th>Giá</th>
                                                <th>Giá khuyến mãi</th>
                                                <th>Chi tiết dịch vụ</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($service as $row) : ?>
                                                <tr>
                                                    <td scope="service"><?= $stt += 1 ?></td>
                                                    <td><?= $row['cate_name'] ?></td>
                                                    <td><?= $row['service_name'] ?> </td>
                                                    <td>
                                                        <img src="../upload/<?= $row['service_img'] ?>" alt="" width="200px">
                                                    </td>
                                                    <td><?= $row['price'] ?></td>
                                                    <td><?= $row['sale'] ?></td>
                                                    <td style="max-width: 350px;"><?= $row['detail'] ?></td>
                                                    <td> <a href="editService.php?service_id=<?= $row['service_id'] ?>" type="submit" class="btn btn-primary" name="sua">Sửa</a>
                                                        <a href="deleteService.php?service_id=<?= $row['service_id'] ?>" class="btn btn-danger" onclick="return alert('Bạn có chắc chắn xóa k ?')" name="xoa">Xóa</a>
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