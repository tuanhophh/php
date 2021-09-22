<?php
require_once "connection.php";
//show nhân viên
$sql_staff = "SELECT * FROM staff";
$stmt = $conn->prepare($sql_staff);
$stmt->execute();
$staff = $stmt->fetchAll(PDO::FETCH_ASSOC);

//show dịch vụ
$sql_service = "SELECT * FROM services";
$stmt = $conn->prepare($sql_service);
$stmt->execute();
$service = $stmt->fetchAll(PDO::FETCH_ASSOC);
//đặt lịch

if (isset($_POST['btnDat'])) {
    session_start();
    $service_selected = $_POST['service'];
    $user_id = $_SESSION['users']['user_id'];
    $staff_id = $_POST['staff_id'];
    $note = isset($_POST['note']) ? $_POST['note'] : '';
    $cut_day = date_format(date_create(($_POST['cut_day'])), 'Y-m-d H:i:s');
    $sql_order = "INSERT INTO orders set user_id='$user_id', staff_id='$staff_id', note='$note', cut_day='$cut_day',status=1";
    $stmt = $conn->prepare($sql_order);
    $stmt->execute();
    $queryLastOrder = $conn->prepare('SELECT * FROM orders ORDER BY `order_id` DESC');
    $queryLastOrder->execute();
    $lastOrder = $queryLastOrder->fetch(PDO::FETCH_ASSOC);
    $lastOrderId = $lastOrder['order_id'];
    foreach ($service_selected as $item) {
        $sql = "INSERT INTO order_detail set order_id=$lastOrderId, service_id=$item";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
    header("location: history.php?username=" . $_SESSION['users']['username']);
}



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
                    <a href="index.php"><i class="fa fa-home"></i>Trang chủ</a>
                    <span>Đặt lịch online</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!--form đặt lịch start-->
<section class="my-5 online" style="margin-top: 70px !important;">
    <div class="container p-5 rounded bg-light">
        <div class="row">
            <div class="col">
                <img src="upload/1618130014toc-ngan-duoi-cup-1a.jpg" alt="">
            </div>

            <div class="col">
                <form action="" method="post">
                    <h3 style="text-align: center; margin-bottom: 50px;">ĐẶT LỊCH CẮT TÓC ONLINE</h3>
                    <div class="form-row">
                        <?php
                        if (isset($_SESSION['users']['username'])) {
                            $username = $_SESSION['users']['username'];
                            foreach (selectDb("SELECT * FROM users WHERE username = '$username'") as $tow) {
                            }
                        }
                        ?>
                        <?php
                        if (isset($_SESSION['users']['username'])) : ?>
                        <div class="form-group col-md-6">

                            <label for="">Họ tên :</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Họ tên" name='user_id'
                                value="<?= $tow['username'] ?>" required="required">
                        </div>
                        <?php endif ?>
                        <?php
                        if (!isset($_SESSION['users']['username'])) : ?>
                        <div class="form-group col-md-6">

                            <label for="">Họ tên :</label>
                            <input type="text" class="form-control" id="inputEmail4" placeholder="Họ tên" name='user_id'
                                required="required">
                        </div>
                        <?php endif ?>
                        <?php
                        if (isset($_SESSION['users']['username'])) : ?>
                        <div class="form-group col-md-6">
                            <label for="">Số điện thoại :</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Số điện thoại"
                                name="phone" value="<?= $tow['phone'] ?>" required="required">
                        </div>
                        <?php endif ?>
                        <?php
                        if (!isset($_SESSION['users']['username'])) : ?>
                        <div class="form-group col-md-6">
                            <label for="">Số điện thoại :</label>
                            <input type="text" class="form-control" id="inputPassword4" placeholder="Số điện thoại"
                                name="phone" required="required">
                        </div>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <label for="">Chọn ngày :</label>
                        <input type="datetime-local" class="form-control" id="inputAddress"
                            placeholder="25/04/2021 14:00 PM" name="cut_day" required="required">
                    </div>
                    <?php foreach ($service as $key => $row) : ?>
                    <div class="form-check">
                        <input type="checkbox" name="service[]" value="<?= $row['service_id'] ?>"
                            class="form-check-input" id="js-service-check<?= $key ?>">
                        <label class="form-check-label"
                            for="js-service-check<?= $key ?>"><?= $row['service_name'] ?></label>
                    </div>
                    <?php endforeach; ?>
                    <div class="form-group">
                        <label for="inputState">Chọn nhân viên :</label>
                        <select id="inputState" class="form-control" name="staff_id" required="required">
                            <option selected value="">Chọn nhân viên </option>
                            <?php foreach ($staff as $row) : ?>
                            
                            <option value="<?= $row['staff_id'] ?>"><?= $row['staff_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Ghi chú thêm :</label>
                        <textarea name="" class="form-control" id="" cols="30" rows="10" name="note"></textarea>

                    </div>
                    <div class="form-group" style="text-align: center;">
                        <?php
                        if (isset($_SESSION['users']['username'])) : ?>
                        <button type="submit" class="btn btn-danger" name="btnDat">Đặt lịch</button>
                        <?php endif ?>
                        <?php
                        if (!isset($_SESSION['users']['username'])) : ?>
                        <button type="button" class="btn btn-danger" name="btnDat"
                            onclick="return alert('Vui lòng đăng nhập để đặt lịch!')">Đặt lịch</button>
                        <?php endif ?>
                    </div>

                </form>
            </div>

        </div>

    </div>

</section>

<!--form đặt lịch end-->
<?php require_once "footer.php" ?>
</body>

</html>