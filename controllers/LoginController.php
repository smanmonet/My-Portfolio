<?php
class LoginController {
    public $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
     
    }

    public function login() {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password']; // ไม่แปลงเป็น int

            // ดึงข้อมูลผู้ใช้จากฐานข้อมูลโดยใช้ชื่อผู้ใช้
            $user = $this->userModel->getUserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['username'];
                header("Location: welcome.php");
                exit();
            } else {
                $error = "Invalid username or password";
            }
        }

        require 'views/login.php';
    }

    public function logout() {
        session_destroy();
        header("Location: login.php");
        exit();
    }

    // ฟังก์ชันสมัครสมาชิก
    public function register() {
        $error = '';
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];
    
            // ตรวจสอบว่ารหัสผ่านและยืนยันรหัสผ่านตรงกัน
            if ($password !== $confirmPassword) {
                $error = "รหัสผ่านไม่ตรงกัน";
            } else {
                // แฮชรหัสผ่านก่อนเก็บ
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                // เรียกใช้งานโมเดลเพื่อลงทะเบียนผู้ใช้ใหม่
                $result = $this->userModel->registerUser($username, $hashedPassword);
    
                if ($result) {
                    // สมัครสำเร็จแล้ว เปลี่ยนเส้นทางไปยังหน้า welcome.php
                    header("Location: home.php");
                    exit();
                } else {
                    // แสดงข้อผิดพลาดหากมีผู้ใช้นี้แล้ว
                    $error = "Username นี้มีผู้ใช้แล้ว";
                }
            }
        }
    
        // ส่ง error ไปยัง view ของการสมัคร
        require './views/register.php';
    }
}
?>
