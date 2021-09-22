<?php
session_start();
require_once "connection.php";


if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $check = "SELECT * FROM users WHERE  username = '$username' AND password = '$password' ";
    $count = $conn->prepare($check);
    $count->execute();
    $user = $count->fetch(PDO::FETCH_ASSOC);
    if ($count->rowCount() > 0) {
        $_SESSION['users'] = $user;
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($_SESSION['users']['role'] == 0) {
            header("location:admin/indexQT.php");
        } elseif ($_SESSION['users']['role'] == 1 || $_SESSION['users']['role']==2 ) {
            header("location:index.php");
        }
    } else {
        $error = "Username hoặc mật khẩu chưa đúng!";
    }
    if ($username == "") {
        $err_name = "Bạn cần nhập username";
    } elseif ($password == "") {
        $err_pass = "Bạn cần nhập password";
    }

    $check = "SELECT * FROM staff WHERE  staff_name = '$username' AND password = '$password' ";
    $count = $conn->prepare($check);
    $count->execute();
    $staff = $count->fetch(PDO::FETCH_ASSOC);
    if ($count->rowCount() > 0) {
        $_SESSION['staff'] = $staff;
        $staff_id = $_POST['staff_id'];
        $staff_name = $_POST['staff_name'];
        $password = $_POST['password'];
        if (isset(($_SESSION['staff']['staff_name']))) {
            header("location:index.php");
        }
    } else {
        $error = "Username hoặc mật khẩu chưa đúng!";
    }
    if ($username == "") {
        $err_name = "Bạn cần nhập username";
    } elseif ($password == "") {
        $err_pass = "Bạn cần nhập password";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/236237b42b.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="">
        <div class="container mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col w-1/2">
            <a href="quantri/index.php"><i class="fas fa-arrow-circle-left text-3xl text-blue-700"></i></a>
            <h2 class="text-center text-blue-700 font-bold text-2xl">Đăng nhập</h2>
            <form action="" method="post">
                <div class="mb-4">
                    <label class="block text-grey-darker text-sm font-bold mb-2">
                        Tên đăng nhập
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker"
                        name="username" type="text" placeholder="Username">
                    <?php if (isset($err_name)) : ?>
                    <div><?= $err_name ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-6">
                    <label class="block text-grey-darker text-sm font-bold mb-2">
                        Mật khẩu
                    </label>
                    <input
                        class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3"
                        type="password" name="password" placeholder="******************">
                    <?php if (isset($err_pass)) : ?>
                    <div><?= $err_pass ?></div>
                    <?php endif; ?>
                    <?php if (isset($error)) : ?>
                    <div><?= $error ?></div>
                    <?php endif; ?>

                </div>
                <a href="" class="font-bold text-sm text-blue-400 hover:text-blue-700 mb-6">Forfot password?</a>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded" name="signin"
                        type="submit">
                        Đăng nhập
                    </button>
                    <a class="inline-block align-baseline font-bold text-sm text-blue-400 hover:text-blue-700"
                        href="signUp.php">
                        Tạo tài khoản mới
                    </a>
                </div>
            </form>
            <?php if (isset($msg)) : ?>
            <h3><?= $msg ?></h3>
            <?php endif; ?>
        </div>
    </div>

</body>

</html>