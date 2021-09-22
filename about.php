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
require_once "header.php";
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="trangchu.html"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="gioithieu.html">Giới thiệu</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="blog__details__content">
                    <div class="blog__details__item">
                        <img src="img/1618734548skater-style-21.jpg" alt="">
                        <div class="blog__details__item__title">
                            <span class="tip">Giới thiệu</span>
                            <p>
                                Xin chào !!!<br>
                                Chúng mình cùng trò chuyện với nhau một chút nhé!
                            </p>
                            <h4>SỨ MỆNH CỦA BABER HAIR</h4>
                            <ul>
                                <li>by <span>baber hair</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__details__desc">
                        <p>Baber Hair tin tưởng & nỗ lực mỗi ngày để kết nối bàn tay tài hoa của người thợ Việt cùng quy trình khoa học 30 phút nhằm đe
                            đến cho phái mạnh toàn cầu kiểu tóc đẹp trai, làn da khoẻ mạnh cuốn hút phái đẹp; tinh thần thư giãn để bứt phá trong sự nghiệp.</p>
                    </div>
                    <div class="blog__details__quote">

                    </div>
                    <div class="blog__details__desc">
                        <h4><b>GIÁ TRỊ CỐT LÕI</b></h4>
                        <p>1. TRUNG THỰC <br>Là nghĩ-nói-làm giống nhau, ngược lại với trung thực là gian dối. Gian dối về tiền bạc, gian dối về thời gian, gian dối về thông tin… đều là hành vi bị cấm tại Baber Hair. Baber Hair sẽ dùng tất cả khả năng,
                            nguồn lực để phát hiện và trừng phạt thích đáng mọi hành vi gian dối, kể cả đưa ra pháp luật.
                        </p>
                        <p>2. HAM HỌC HỎI <br>
                            Là không ỉ lại, tự mình sử dụng thời gian, công sức của mình để tìm hiểu bất kỳ vấn đề gì mà mình còn đang
                            thắc mắc, chưa biết. Việc ham học hỏi cũng giúp bản thân không bao giờ bị thụt lùi lại so với sự phát triển không ngừng của xã hội.</p>
                        <p>
                            3. TẬN TÂM <br>
                            Là luôn sẵn sàng dốc hết sức lực và tâm huyết khi thực hiện các công việc, giải quyết các vấn đề để đạt được kết quả tốt đẹp. Tận tâm với khách hàng, tận tâm với đồng nghiệp, bạn bè, gia đình… sẽ khiến chúng ta đạt được nhiều hơn sự hài lòng, sự trân trọng trong công việc và cuộc sống.
                        </p>
                        <p>
                            4. NHẬN TRÁCH NHIỆM <br>
                            Là nhìn ra được nguyên nhân gốc rễ của vấn đề từ chính bản thân mình, từ đó đưa ra được giải giải pháp để thay đổi kết quả tốt đẹp hơn. Nhận trách nhiệm không phải là chịu trách nhiệm. Tinh thần nhận trách nhiệm sẽ giúp hạn chế tối đa các mâu thuẫn, xung đột, xây dựng được tập thể vững mạnh và hướng tới sự chủ động, cải tiến để thay đổi công việc, cuộc sống tốt đẹp hơn.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__item">
                        <div class="section-title">
                            <h4>Bài viết</h4>
                        </div>
                        <?php foreach ($blog as $row) : ?>
                            <a href="#" class="blog__feature__item">
                                <div class="blog__feature__item__pic">
                                    <img src="./upload/<?= $row['image'] ?>" alt="" width="100px" height="80px">
                                </div>
                                <div class="blog__feature__item__text">
                                    <h6><?= $row['title'] ?></h6>
                                    <span><?= $row['created_at'] ?></span>
                                </div>
                            </a>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
</section>
<!-- Blog Details Section End -->

<?php
require_once "footer.php";
?>
</body>

</html>