<?php
require_once("../connection.php");
//lấy dữ liệu từ article
if (isset($_GET['article_id'])) {
    $id = $_GET['article_id'];
    $sql = "SELECT * FROM articles where article_id='$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $article = $articles[0];
}
//update
if (isset($_POST['btnSua'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    if ($_FILES['image']['size'] > 0) {
        $img = time() . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../upload/" . $img);
    } else {
        $img = $articles['image'];
    }
    $sql = "UPDATE articles set title='$title', image='$img', content='$content' where article_id =  '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $msg = "Update thành công";
    header("location:articles.php?msg=" . $msg);
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
                            <h1>Sửa bài viết</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Sửa bài viết</li>
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
                                    <input type="text" class="form-control" style="width: 100%;" name="title"
                                        value="<?= $article['title'] ?>">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Ảnh</label>
                                    <input type="file" class="form-control" style="width: 100%;" name="image"
                                        value="<?= $article['image'] ?>">
                                    <?php if (!empty($article['image'])) : ?>
                                    <img src="../upload/<?= $article['image'] ?>" alt="" width="50%">
                                    <br>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <div class="mb-3">
                                        <textarea class="textarea" placeholder="Place some text here" name="content">
                                        <?= $article['content'] ?>
                                         </textarea>
                                    </div>

                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button class="btn btn-primary" href="articles.php">Quay Lại</button>
                                    <button type="submit" class="btn btn-danger" name="btnSua">Sửa bài viết</button>

                                </div>
                                <!-- /.form-group -->
                            </div>
                        </div>
                    </div>
                </form>

                <!-- /.row -->
        </div>
        <!-- /.content-wrapper -->
        <!-- <script>
        CKEDITOR.replace('content')
        </script> -->

</body>
<?php
include_once("footerQT.php");
?>

</html>