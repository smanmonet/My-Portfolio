
<?php
session_start(); // เริ่มต้น session ที่นี่
require 'config/database.php'; // เชื่อมต่อฐานข้อมูล
require 'controllers/LoginController.php'; // โหลดคอนโทรลเลอร์
require 'models/UserModel.php'; // โหลดโมเดล

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// สร้าง Object ของ Model
$userModel = new UserModel($db);

// สร้าง Controller และเริ่มต้นการทำงาน
$loginController = new LoginController($userModel);


// ตรวจสอบการทำงาน login, logout, หรือ register
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'register') {
        $loginController->register();  // เรียกใช้งานฟังก์ชันสมัครสมาชิก
    } elseif ($_GET['action'] === 'logout') {
        $loginController->logout(); // เรียกใช้งานฟังก์ชันออกจากระบบ
    }
} else {
    $loginController->login(); // เรียกใช้งานฟังก์ชันเข้าสู่ระบบ
}
?>
