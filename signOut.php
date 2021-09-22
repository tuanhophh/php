<?php
session_start();  
if (isset($_SESSION['users']['username'])) {
    unset($_SESSION['users']['username']);
}    
header("location:index.php");
die;