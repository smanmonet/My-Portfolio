<?php
class UserModel {
    public $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // ฟังก์ชันสำหรับการดึงข้อมูลผู้ใช้โดยใช้ชื่อผู้ใช้
    public function getUserByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ฟังก์ชันสำหรับการสมัครสมาชิก
    public function registerUser($username, $hashedPassword) {
        // ตรวจสอบว่ามีผู้ใช้งานนี้อยู่ในระบบแล้วหรือไม่
        $stmt = $this->db->prepare("SELECT * FROM user WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return false; // ถ้ามีผู้ใช้งานนี้แล้วให้คืนค่า false
        }

        // ถ้ายังไม่มีผู้ใช้นี้ให้ทำการสมัครสมาชิก
        $stmt = $this->db->prepare("INSERT INTO user (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $hashedPassword); // เก็บรหัสผ่านที่แฮชแล้ว
        return $stmt->execute();
    }
}
?>
