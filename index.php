<?php
require_once "connection.php";
//slider
$sql_slider = "SELECT * FROM sliders";
$stmt = $conn->prepare($sql_slider);
$stmt->execute();
$slider = $stmt->fetchAll(PDO::FETCH_ASSOC);
//cate
$sql_cate = "SELECT * FROM categories";
$stmt = $conn->prepare($sql_cate);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);
//service
$sql_service = "SELECT * FROM services";
$stmt = $conn->prepare($sql_service);
$stmt->execute();
$service = $stmt->fetchAll(PDO::FETCH_ASSOC);
//articles
$sql_blog = "SELECT *FROM articles ORDER BY created_at DESC LIMIT 0,3";
$stmt = $conn->prepare($sql_blog);
$stmt->execute();
$blog = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="zxx">

<?php
require_once "header.php";
?>

<!-- Banner Section Begin -->
<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <?php foreach ($slider as $key => $row) : ?>
        <div class="carousel-item <?php echo $key == 0 ? 'active' : '' ?>">
            <a href="<?= $row['link'] ?>">
                <img src="upload/<?= $row['slider_img'] ?>" alt="<?= $row['slider_name'] ?>" width="1100" height="500">
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
<!-- Banner Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Dịch vụ mới nhất</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <em class="text-decoration-underline"><a href="service.php">Xem thêm >>></a></em>
                </ul>
            </div>
        </div>
        <?php if (!isset($_GET['search'])) : ?>
        <div class="row property__gallery">
            <?php foreach ($service as $row) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">

                    <div class="product__item__pic set-bg" data-setbg="upload/<?= $row['service_img'] ?>">
                        <ul class="product__hover">
                            <li><a href="upload/<?= $row['service_img'] ?>" class="image-popup"><span
                                        class="arrow_expand"></span></a></li>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                        </ul>
                    </div>
                    <div class="product__item__text">

                        <h6><a
                                href="service_detail.php?service_id=<?= $row['service_id'] ?>&cate_id=<?= $row['cate_id'] ?>"><?= $row['service_name'] ?></a>
                        </h6>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__price"><?= $row['price'] ?>.000đ</div>

                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
        <!-- ============================ -->
        <?php if (isset($_GET['search'])) : ?>
        <div class="row property__gallery">
            <?php foreach ($Search as $row) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6 mix women">
                <div class="product__item">
                    <a href="service_detail.php?service_id=<?= $row['service_id'] ?>&cate_id=<?= $row['cate_id'] ?>">
                        <div class="product__item__pic set-bg" data-setbg="upload/<?= $row['service_img'] ?>">
                            <ul class="product__hover">
                                <li><a href="upload/<?= $row['service_img'] ?>" class="image-popup"><span
                                            class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><?= $row['service_name'] ?>
                            </h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"><?= $row['price'] ?>.000đ</div>
                        </div>
                    </a>


                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- Product Section End -->
<div class="place">
    <div class="container">
        <div class="place-item">
            <h2>Trải nghiệm không gian salon thế hệ mới</h2>
            <p>
                Đến tháng 4/2021, salon tóc Baber Hairx có 1 salon tại vị trí đắc địa nhất Hà
                Nội, salon đã thay đổi diện mạo hoàn toàn mới.
                Hãy tìm đến salon Barber Hair để tận hưởng trải nghiệm cắt tócđỉnh cao!
            </p>
        </div>
    </div>
</div>

<!-- Blog Start -->
<div class="blog">
    <div class="container">
        <div class=" section-header">
            <div class="section-title d-flex justify-content-between">
                <h4>Bài viết mới nhất</h4>
                <em class="text-decoration-underline"><a href="blog.php">Xem thêm >>></a></em>
            </div>
        </div>
        <div class=" blog-carousel row">
            <?php foreach ($blog as $blog) : ?>
            <div class="blog-item col">
                <div class="blog-img">
                    <img src="upload/<?= $blog['image'] ?>" alt="Blog" style="height: 200px;">
                </div>
                <div class="blog-meta">
                    <i class="fa fa-calendar-alt"></i>
                    <p><?= $blog['created_at'] ?></p>
                </div>
                <div class="blog-text">
                    <h2><?= $blog['title'] ?></h2>
                    <p>
                        <?= $blog['content'] ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<!-- Blog End -->

<?php require_once "footer.php" ?>
</body>

</html>