<?php
require_once "../connection.php";
$stt = 0;
$sql = "SELECT * FROM articles ";
$stmt = $conn->prepare($sql);
$stmt->execute();
$article = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            <h1>Quản trị Bài viết </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Bài viết</li>
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
                                    <a href="addArticle.php" class="btn btn-primary">Thêm bài viết</a>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tiêu đề</th>
                                                <th>Ảnh</th>
                                                <th>Nội dung</th>
                                                <th>Chức năng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($article as $row) : ?>
                                                <tr>
                                                    <td scope="article"><?= $stt += 1 ?></td>
                                                    <td style="max-width: 150px;"><?= $row['title'] ?></td>
                                                    <td>
                                                        <img src="../upload/<?= $row['image'] ?>" alt="" width="200px">
                                                    </td>
                                                    <td style="width:50%"><?= $row['content'] ?></td>
                                                    <td> <a href="editArticle.php?article_id=<?= $row['article_id'] ?>" type="submit" class="btn btn-primary" name="sua">Sửa</a>
                                                        <a href="deleteArticle.php?article_id=<?= $row['article_id'] ?>" class="btn btn-danger" onclick="return alert('Bạn có chắc chắn xóa k ?')" name="xoa">Xóa</a>
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