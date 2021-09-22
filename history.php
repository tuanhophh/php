<?php
ob_start();
require_once "connection.php";

if ($_SESSION['users']['username'] = $_GET['username'] || $_SESSION['staff']['staff_name'] = $_GET['username']) {
    $username = $_GET['username'];
    $stt = 0;
    $sql = "SELECT u.*, o.*, s.* FROM users as u inner join orders as o on u.user_id = o.user_id
    inner join staff as s on o.staff_id = s.staff_id
    where u.username='$username' or s.staff_name='$username'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
}

?>
<!DOCTYPE html>
<html lang="zxx">
<?php require_once "header.php"; ?>
<div class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Dịch vụ</th>
                <th scope="col">Ngày cắt</th>
                <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $row) : ?>
            <tr>
                <td scope="order"><?= $stt += 1 ?></td>
                <td><?= $row['username'] ?> </td>
                <td><?= $row['staff_name'] ?></td>
                <td><?= $row['cut_day'] ?></td>

                <td><?= $row['status'] == 1 ? 'Đang chờ' : 'Hoàn thành' ?></td>
                <?php if (isset($_SESSION['users']['username'])) : ?>
                <td>
                    <?php if ($row['status'] == 1) : ?>
                    <a
                        href="xoalich.php?username=<?= $_SESSION['users']['username'] ?>&order_id=<?= $row['order_id'] ?>">Hủy
                        đặt
                        lịch</a>
                    <?php endif; ?>
                </td>
                <?php endif; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>

</html>