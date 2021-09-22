<?php
require_once "../connection.php";
$details = null;
if (isset($_GET['service_id']) && !isset($_GET['cmt_id'])) {
    $id = $_GET['service_id'];
} else if (isset($_GET['cmt_id']) && isset($_GET['service_id'])) {
    $id = $_GET['service_id'];
    $cmt_id = $_GET['cmt_id'];
    action("DELETE FROM comment WHERE cmt_id = '$cmt_id'");
    header("Location:comment_detail.php?service_id=$id");
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
                                                <th>Người bình luận</th>
                                                <th>Nội dung</th>
                                                <th>Ngày bình luận</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $stt = 0;
                                            foreach (selectDb("SELECT * FROM comment WHERE service_id = '$id'") as $row) {
                                                $user_id = $row['user_id'];
                                                foreach (selectDb("SELECT * FROM users WHERE user_id = '$user_id'") as $tow) {
                                                    foreach (selectDb("SELECT * FROM services WHERE  service_id = '$id'") as $item) {
                                            ?>
                                            <tr>
                                                <td scope="row"><?= $stt += 1 ?></td>
                                                <td><?= $tow['username'] ?></td>
                                                </td>
                                                <td><?= $row['content'] ?></td>
                                                <td><?= $row['created_at'] ?></td>
                                                <td><a href="comment_detail.php?cmt_id=<?= $row['cmt_id'] ?>& service_id=<?= $id ?>"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Bạn muốn xóa bình luận này?')">Xóa</a>
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