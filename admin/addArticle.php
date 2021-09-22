<?php
require_once("../connection.php");
if (isset($_POST['btnThem'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if ($_FILES['image']['size'] > 0) {
        $image = time() . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../upload/" . $image);
    } else {
        $image = "";
    }
    $sql = "INSERT INTO articles set title='$title', content='$content', image='$image'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    header("location:articles.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once("headerQT.php"); ?>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="mb-2 row">
                        <div class="col-sm-6">
                            <h1>Thêm bài viết</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Thêm bài viết</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tiêu đề</label>
                                    <input type="text" class="form-control" style="width: 100%;" name="title">
                                </div>
                                <!-- /.form-group -->

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" class="form-control" style="width: 100%;" name="image">
                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea name="content" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="reset" class="btn btn-primary" href="service.php">Quay Lại</button>
                                    <button type="submit" class="btn btn-danger" name="btnThem">Thêm bài viết</button>

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
        CKEDITOR.replace('content')
        </script>

</body>
<?php
include_once("footerQT.php");
?>

</html>