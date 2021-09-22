<?php

require_once("../connection.php");
$sql = "SELECT * FROM statuss ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['btnSua'])) {
    $name = $_POST['status'];
    $sql = "UPDATE  orders set status='$name' where order_id=" . $_GET['id_order'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $msg = "Update thành công";
    header("location:QTDatlich.php?msg=" . $msg);
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
                            <h1>Sửa trạng thái</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa trạng thái</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên trạng thái</label>

                                    <select name="status" class="form-control" id="">
                                        <?php foreach ($cate as $cate) : ?>
                                        <option value="<?= $cate['id'] ?>"><?= $cate['note'] ?>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="btnSua">Lưu</button>
                                    <a class="btn btn-danger" href="QTDatlich.php">Quay lại</a>
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