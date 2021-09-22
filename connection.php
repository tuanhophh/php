<?php
$host = "localhost";
$dbname = "duan1";
$username = "root";
$password = "";
$conn = new PDO("mysql:host=$host; dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function total($sql)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchColumn();
    return $result;
}
function action($sql)
{
    global $conn;
    $conn->exec($sql);
}
// Thực thi câu lệnh thêm sửa xóa
function selectDb($sql)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    // $conn->beginTransaction();
    // $conn->commit();
    // print $conn->lastInsertId();
    return $result;
}