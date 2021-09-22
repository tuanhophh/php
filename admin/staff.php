<?php
require_once "../connection.php";
$stt = 0;
$sql = "SELECT * FROM staff";
$stmt = $conn->prepare($sql);
$stmt->execute();
$staff = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            <h1>Quản trị nhân viên </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Staffs</li>
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
                                    <a href="addStaff.php" class="btn btn-primary">Thêm nhân viên</a>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên nhân viên</th>
                                                <th>Ảnh</th>
                                                <th>Số điện thoại</th>
                                                <th>Ghi chú</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($staff as $row) : ?>
                                            <tr>
                                                <td scope="satff"><?= $stt += 1 ?></td>
                                                <td><?= $row['staff_name'] ?> </td>
                                                <td>
                                                    <img src="../upload/<?= $row['avatar'] ?>" alt="" width="150px">
                                                </td>
                                                <td><?= $row['phone'] ?></td>
                                                <td><?= $row['note'] ?></td>
                                                <td>
                                                    <a href="deleteStaff.php?staff_id=<?= $row['staff_id'] ?>"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn xóa k ?')"
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