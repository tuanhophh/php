<?php
require_once "connection.php";
if ($_GET['cmt_id']) {
    $id = $_GET['cmt_id'];
    $sql = "DELETE from comment where cmt_id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $msg = "Xóa thành công";
    
    header("location:service_detail.php?service_id=". $_GET['service_id']."&cate_id=".$_GET['cate_id']);
    die;
}