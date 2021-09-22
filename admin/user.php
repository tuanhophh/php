<?php
require_once "../connection.php";
$stt = 0;
$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();
$user = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            <h1>Quản trị tài khoản</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
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
                                    <a href="addUser.php" class="btn btn-primary">Thêm nhân viên</a>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên người dùng</th>
                                                <th>Ảnh</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th>Địa chỉ</th>
                                                <th>Phân quyền</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($user as $row) : ?>
                                                <tr>
                                                    <td><?= $stt += 1 ?></td>
                                                    <td><?= $row['username'] ?></td>
                                                    <td><?= $row['avatar'] ?></td>
                                                    <td><?= $row['email'] ?></td>
                                                    <td><?= $row['phone'] ?></td>
                                                    <td><?= $row['address'] ?></td>
                                                    <td><?= $row['role'] == 0 ? 'Admin' : 'Khách Hàng' ?></td>
                                                    <td>
                                                        <a href="deleteUser.php?user_id=<?= $row['user_id'] ?>" class="btn btn-primary" onclick="return alert('Bạn có chắc chắn xóa k ?')" name="xoa">Xóa</a>
                                                        <a href="editUser.php?user_id=<?= $row['user_id'] ?>" class="btn btn-primary">Sửa</a>

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