<?php
require_once("../connection.php");
if (isset($_POST['btnThem'])) {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $note = $_POST['note'];
    if ($_FILES['avatar']['size'] > 0) {
        $img = time() . $_FILES['avatar']['name'];
        move_uploaded_file($_FILES['avatar']['tmp_name'], "../upload/" . $img);
    } else {
        $img = "";
    }
    $sql = "INSERT INTO staff set staff_name='$username', phone='$phone', note='$note', avatar='$img'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location:staff.php");
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
                            <h1>Thêm nhân viên</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm nhân viên</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên nhân viên</label>
                                    <input type="text" class="form-control" style="width: 100%;" name="username">
                                </div>
                                <!-- /.form-group -->

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" class="form-control" style="width: 100%;" name="avatar">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Ghi chú</label>
                                    <textarea name="note" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Số điện thoại</label>
                                    <input type="text" class="form-control" style="width: 100%;" name="phone">
                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" name="btnThem">Thêm nhân viên</button>
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