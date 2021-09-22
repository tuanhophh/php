<?php
require_once "../connection.php";
if ($_GET['article_id']) {
    $id = $_GET['article_id'];
    $sql = "DELETE from articles where article_id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $msg = "Xóa thành công";
    header("location:articles.php");
    die;
}