<?php
require_once "../connection.php";
if ($_GET['service_id']) {
    $id = $_GET['service_id'];
    $sql = "DELETE from services where service_id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $msg = "Xóa thành công";
    header("location:service.php");
    die;
}