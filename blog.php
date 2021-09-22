<?php
require_once "connection.php";
$sql_blog = "SELECT *FROM articles ";
$stmt = $conn->prepare($sql_blog);
$stmt->execute();
$blog = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="zxx">
<?php
require_once "header.php"; ?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="trangchu.html"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Blog</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <?php foreach ($blog as $row) : ?>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic large__item set-bg" data-setbg="./upload/<?= $row['image'] ?>"></div>
                        <div class="blog__item__text">
                            <h6><a href="#"><?= $row['title'] ?></a></h6>
                            <ul>
                                <li><?= $row['created_at'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Blog Section End -->
<?php require_once "footer.php" ?>
</body>

</html>