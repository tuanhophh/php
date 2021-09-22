<?php
session_start();

require_once "connection.php";
if ($_GET['order_id']) {
$user=$_SESSION['users']['username'];    
    $id = $_GET['order_id'];
    $sql = "DELETE from orders where order_id = $id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $msg = "Xóa thành công";
    header("location:history.php?username=".$user);
    die;
}