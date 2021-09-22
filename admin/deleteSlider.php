<?php
require_once "../connection.php";
if ($_GET['slider_id']) {
    $slider_id = $_GET['slider_id'];
    $sql = "DELETE from sliders where slider_id = $slider_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $msg = "Xóa thành công";
    header("location:sliders.php");
    die;
}