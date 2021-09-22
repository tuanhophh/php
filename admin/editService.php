<?php
require_once("../connection.php");
//hien thi danh muc
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);
//hien thi du lieu sp
if (isset($_GET['service_id'])) {
    $id = $_GET['service_id'];
    $sql = "SELECT * FROM services where service_id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $service = $stmt->fetch();
    // echo '<pre>';
    // var_dump($service);
    // die();
    if (!$service) {
        echo 'Không tìm thấy service';
        die;
    }
}
//update
if (isset($_POST['btnSua'])) {
    $name = $_POST['service_name'];
    $price = $_POST['price'];
    $sale = $_POST['sale'];
    $detail = $_POST['detail'];
    $cate_id = $_POST['cate_id'];
    if ($_FILES['service_img']['size'] > 0) {
        $image = time() . $_FILES['service_img']['name'];
        move_uploaded_file($_FILES['service_img']['tmp_name'], "../upload/" . $image);
    } else {
        $image = $service['service_img'];
    }
    $sql = "UPDATE services set service_name='$name', price='$price', sale='$sale', detail='$detail',
     cate_id='$cate_id',service_img='$image' where service_id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $msg = "Update thành công";
    header("location:service.php?msg=" . $msg);
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
                            <h1>Sửa dịch vụ</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa dịch vụ</li>
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
                                    <input type="text" class="form-control" style="width: 100%;" name="service_name"
                                        value="<?= $service['service_name'] ?>">
                                </div>
                                <!-- /.form-group -->

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cate_id" class="form-control" id="">
                                        <?php foreach ($cate as $cate) : ?>
                                        <?php if ($cate['cate_id'] == $service['cate_id']) : ?>
                                        <option selected value="<?= $cate['cate_id'] ?>"><?= $cate['cate_name'] ?>
                                        </option>
                                        <?php else : ?>
                                        <option value="<?= $cate['cate_id'] ?>"><?= $cate['cate_name'] ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- /.form-group -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Chi tiết</label>
                                    <div class="card card-outline card-info">
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea class="textarea" placeholder="Place some text here"
                                                    name="detail"
                                                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                                <?= $service['detail'] ?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input type="text" name="price" id="" class="form-control"
                                        value="<?= $service['price'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Giá khuyến mại</label>
                                    <input type="text" name="sale" id="" class="form-control" <?= $service['sale'] ?>>
                                </div>
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" name="service_img" class="form-control" style="width: 100%;"
                                        value="<?= $service['service_img'] ?>">
                                    <?php if (!empty($service['service_img'])) : ?>
                                    <img src="../upload/<?= $service['service_img'] ?>" alt="" width="100%">
                                    <br>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a class="btn btn-primary" href="service.php">Quay Lại</a>
                                    <button type="submit" class="btn btn-danger" name="btnSua">Sửa dịch vụ</button>

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