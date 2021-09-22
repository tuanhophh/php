<?php
require_once "../connection.php";

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
                            <h1>Quản trị comment </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Comments</li>
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
                                    <a href="comment.php" class="btn btn-primary">Comment</a>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên dịch vụ</th>
                                                <th>Ảnh</th>
                                                <th>Số lượng</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stt = 0;
                                            foreach (selectDb("SELECT DISTINCT service_id FROM comment") as $item) {
                                                $id = $item['service_id'];
                                                // Lấy id sản phẩm bảng conment
                                                foreach (selectDb("SELECT * FROM services WHERE service_id= '$id'") as $value) {
                                                    // Truy vấn bảng sản phẩm có id sản phẩm trùng với id sản phẩm vừa lấy ở bảng conment
                                                    $tong = total("SELECT COUNT(*) FROM comment WHERE service_id = '$id'");
                                                    // Đếm số conment ở mỗi sản phẩm 
                                                    foreach (selectDb("SELECT * FROM comment WHERE service_id='$id' ORDER BY service_id DESC LIMIT 1 ") as $row) {
                                            ?>

                                                        <tr>
                                                            <th scope="comment"><?= $stt += 1 ?></th>
                                                            <td><?= $value['service_name'] ?></td>
                                                            <td><img src="../upload/<?= $value['service_img'] ?>" alt="" width="150px">
                                                            </td>
                                                            <td><?= $tong ?></td>
                                                            <td>
                                                                <a href="comment_detail.php?service_id=<?= $id ?>" class="btn btn-danger">Xem chi tiết</a>
                                                            </td>
                                                        </tr>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
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