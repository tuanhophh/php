<?php
require_once "../connection.php";
$stt = 0;
if (isset($_GET['order_id'])) {
    $id = $_GET['order_id'];
    $sql = "SELECT * FROM orders inner join order_detail  on orders.order_id = order_detail.order_id
     inner join services on order_detail.service_id = services.service_id 
     where orders.order_id='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $order = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                                                <th>Dịch vụ</th>
                                                <th>Ngày đặt lịch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($order as $row) : ?>
                                            <tr>
                                                <td scope="order"><?= $stt += 1 ?></td>
                                                <td><?= $row['service_name'] ?> </td>
                                                <td><?= $row['created_at'] ?></td>
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