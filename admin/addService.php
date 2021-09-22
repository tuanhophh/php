<?php
require_once("../connection.php");
//hiển thị category
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);
//thêm service
if (isset($_POST['btnThem'])) {
    $service_name = $_POST['service_name'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $detail = $_POST['detail'];
    $cate_id = $_POST['cate_id'];
    if ($_FILES['service_img']['size'] > 0) {
        $img = time() . $_FILES['service_img']['name'];
        move_uploaded_file($_FILES['service_img']['tmp_name'], "../upload/" . $img);
    } else {
        $img = "";
    }
    $sql = "INSERT INTO services set service_name='$service_name', price='$price', sale='$sale', detail='$detail',cate_id='$cate_id', service_img='$img'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location:service.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once("headerQT.php"); ?>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="mb-2 row">
                        <div class="col-sm-6">
                            <h1>Thêm dịch vụ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm dịch vụ</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tên dịch vụ</label>
                                    <input type="text" class="form-control" style="width: 100%;" name="service_name">
                                </div>
                                <!-- /.form-group -->

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" class="form-control" style="width: 100%;" name="service_img">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Chi tiết</label>
                                    <textarea name="detail" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input type="text" name="price" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Giá khuyến mại</label>
                                    <input type="text" name="sale" id="" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cate_id" class="form-control" id="">
                                        <?php foreach ($cate as $cate) : ?>
                                        <option value="<?= $cate['cate_id'] ?>"><?= $cate['cate_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a class="btn btn-primary" href="service.php">Quay Lại</a>
                                    <button type="submit" class="btn btn-danger" name="btnThem">Thêm dịch vụ</button>

                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                    </div>
                </form>

                <!-- /.row -->
        </div>
        <!-- /.content-wrapper -->
        <script>
        CKEDITOR.replace('detail')
        </script>
</body>
<?php
require_once("footerQT.php");
?>

</html>