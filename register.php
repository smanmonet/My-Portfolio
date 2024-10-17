<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // เริ่มต้น session เฉพาะเมื่อยังไม่มี session
}

require_once 'config/database.php'; // โหลดการเชื่อมต่อฐานข้อมูล
require_once 'controllers/LoginController.php';
require_once 'models/UserModel.php';

$userModel = new UserModel($db); // ส่งตัวแปร $db ไปยังโมเดล
$loginController = new LoginController($userModel);

// ตรวจสอบการทำงานของการสมัครสมาชิก
if (isset($_GET['action']) && $_GET['action'] === 'register') {
    $loginController->register();  // เรียกใช้งานฟังก์ชันสมัครสมาชิก
}
?>


<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Register</title>
</head>

<body>

    <form method="POST" action="?action=register">
        <div class="login-container">
            <h2>Register</h2>

            <input type="text" name="username" id="username" placeholder="Enter username" required>


            <input type="password" name="password" id="password" placeholder="Enter password" required>


            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confrim your password"
                required>

            <button type="submit" name="register">Register</button>
            <a href="index.php">
                <button type="button">
                    Back
                </button>

            </a> 

   
        </div>

    </form>
         <?php if (!empty($error)): ?>
                 <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>

</body>

</html>