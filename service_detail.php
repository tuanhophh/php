<?php
ob_start();
require_once "header.php";

require_once "connection.php";
//hiển thị detail service
if (isset($_GET['service_id'])) {
    $id =   $_GET['service_id'];
    $sql = "SELECT * from services inner join categories on services.cate_id = categories.cate_id where service_id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//hiển thị dịch vụ liên quan
if (isset($_GET['cate_id'])) {
    $cate = $_GET['cate_id'];
    $sql = "SELECT * FROM services where cate_id ='$cate'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $cate = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
//comment 
if (isset($_POST['gui']) && isset($_GET['service_id'])) {
    if (isset($_SESSION['users']['username'])) {
        $id_user = $_SESSION['users']['user_id'];
        $id_sp = $_GET['service_id'];
        $content = $_POST['comment'];
        $sql = "INSERT INTO comment SET content='$content',service_id='$id_sp',user_id=$id_user ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        header(" window.location.reload()");
    } else if (!isset($_SESSION['users']['username'])) {
        echo "<script>alert('Vui lòng đăng nhập trước khi bình luận')</script>";
    }
}
// hiển thị comment
if (isset($_GET['service_id'])) {
    $id_sp = $_GET['service_id'];
    $sql = "SELECT * FROM comment join users on comment.user_id=users.user_id where service_id='$id_sp' order by created_at desc ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// đặt lịch
if (!isset($_SESSION['users']['username']) && isset($_POST['oder'])) {
    echo "<script>alert('Vui lòng đăng nhập trước khi đặt lịch!')</script>";
}
?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.php"><i class="fa fa-home"></i> Trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <?php foreach ($service as $row) : ?>
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-hash="product-1" class="product__big__img" src="upload/<?= $row['service_img'] ?>"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3><?= $row['service_name'] ?> <span>Danh mục :<?= $row['cate_name'] ?></span></h3>
                    <div class="product__details__price"><?= $row['price'] ?>.000đ<span><?= $row['sale'] ?></span>
                    </div>
                    <p><?= $row['detail'] ?></p>
                    <?php
                        if (!isset($_SESSION['users']['username'])) {
                        ?>
                    <div class="col-md-4" style="padding: 0px;">
                        <form action="" method="post">
                            <button type="submit" name="oder" id="" class="btn btn-primary" btn-lg btn-block"
                                style="margin-top: 10px;">Đặt lịch</button>
                        </form>
                    </div>

                    <?php
                        } else {
                        ?>
                    <div class="col-md-4" style="padding: 0px;">
                        <form action="" method="post">
                            <a href="datlich.php?service_id=<?= $row['service_id'] ?>" name="oder" id=""
                                class="btn btn-primary" btn-lg btn-block" style="margin-top: 10px;">Đặt lịch</a>
                        </form>
                    </div>
                    <?php
                        }
                        ?>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link">Reviews</a>
                        </li>
                    </ul>
                    <div class="">
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <h6>Comment:</h6>
                            <div class="row">
                                <form action="" method="POST" class="col" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <textarea name="comment" id="" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                    <button type="submit" name="gui" class="btn btn-danger">Gửi</button>
                                </form>
                                <div class="col">
                                    <h6 style="color:orange"><span
                                            style="color:black;margin-right:5px;text-transform: uppercase;">Xin chào:
                                        </span>
                                        <?php if (isset($_SESSION['users']['username'])) : ?>
                                        <?= $_SESSION['users']['username'] ?>
                                        <?php endif; ?></h6>
                                    <p><?php if (isset($_GET['service_id'])) : ?>
                                        <?php foreach ($comment as $comment) : ?>

                                        <tr>
                                            <td class="border border-black "><span
                                                    style="color:orange"><?= $comment['username'] ?></span>
                                            </td>
                                            <td class="border border-black" style="margin-left: 50px;width:400px">
                                                <?= $comment['created_at'] ?></td>
                                            <td>
                                                <?php if (isset($_SESSION['users']['username']) && $_SESSION['users']['username'] == $comment['username']) : ?>
                                                <a href="deletecmt.php?service_id=<?= $comment['service_id'] ?>&cate_id=<?= $row['cate_id'] ?>&cmt_id=<?= $comment['cmt_id'] ?>"
                                                    onclick="return alert('Bạn có chắc chắn xóa k ?')" name="xoa"
                                                    style="color:red">Xóa</a>
                                                <?php endif; ?>
                                            </td>

                                            <br>
                                            <td class="border border-black "><?= $comment['content'] ?></td>

                                            <br>
                                        </tr>

                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>Dịch vụ liên quan</h5>
                </div>
            </div>
            <?php foreach ($cate as $row) : ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="upload/<?= $row['service_img'] ?>">

                        <ul class="product__hover">
                            <li><a href="img/product/related/rp-1.jpg" class="image-popup"><span
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
    </div>
</section>
<!-- Product Details Section End -->

<?php require_once "footer.php"; ?>
</body>

</html>