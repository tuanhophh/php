<?php
require_once "../connection.php";
$stt = 0;
$sql = "SELECT u.*, o.*, s.* FROM users as u inner join orders as o on u.user_id = o.user_id
inner join staff as s on o.staff_id = s.staff_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            <h1>Quản trị đặt lịch</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Đặt lịch</li>
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
                                <!-- <div class="card-header">
                                    <a href="addCate.php" class="btn btn-primary">Thêm danh mục</a>
                                </div> -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên khách hàng</th>
                                                <th>Nhân viên</th>
                                                <th>Ngày cắt</th>
                                                <th>Trạng thái</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $row) : ?>
                                            <tr>
                                                <td scope="order"><?= $stt += 1 ?></td>
                                                <td><?= $row['username'] ?> </td>
                                                <td><?= $row['staff_name'] ?></td>
                                                <td><?= $row['cut_day'] ?></td>
                                                <td><?= $row['status'] == 1 ? 'Đang chờ' : 'Hoàn thành' ?></td>
                                                <td> <a href="datlich_detail.php?order_id=<?= $row['order_id'] ?>"
                                                        type="submit" class="btn btn-info btn-sm" name="sua">Xem
                                                        chi tiết</a>
                                                    <a href="editStatus.php?id_order=<?= $row['order_id'] ?>&id=<?= $row['status'] ?>"
                                                        class="btn btn-warning btn-sm">Edit Status</a>
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