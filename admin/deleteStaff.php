<?php
require_once "../connection.php";
if ($_GET['staff_id']) {
    $id = $_GET['staff_id'];
    $sql = "DELETE from staff where staff_id =".$_GET['staff_id'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $msg = "Xóa thành công";
    header("location:staff.php?msg=".$msg);
    die;
}