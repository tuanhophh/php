<?php
require_once "connection.php";
//hiển thị cate
$sql_cate = "SELECT * FROM categories";
$stmt = $conn->prepare($sql_cate);
$stmt->execute();
$cate1 = $stmt->fetchAll(PDO::FETCH_ASSOC);
//service
// $sql_service = "SELECT * FROM services";
// $stmt = $conn->prepare($sql_service);
// $stmt->execute();
// $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
//hiển thị sản phẩm liên quan
if (isset($_GET['cate_id'])) {
    $cate = $_GET['cate_id'];
    $sql = "SELECT * FROM services where cate_id ='$cate'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $ser = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
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
                    <a href="index.php"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Sản phẩm</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Danh mục</h4>
                        </div>
                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">

                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <ul>
                                                <?php foreach ($cate1 as $cate1) : ?>
                                                <li><a
                                                        href="service_by_cate.php?cate_id=<?= $cate1['cate_id'] ?>"><?= $cate1['cate_name'] ?></a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="row">
                    <?php foreach ($ser as $row) : ?>
                    <div class="col-lg-4 col-md-6">
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
                                <div class="product__price"><?= $row['price'] ?></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="col-lg-12 text-center">
                        <div class="pagination__option">
                            <a href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

<?php
require_once "footer.php";
?>
</body>

</html>