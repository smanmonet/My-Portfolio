<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มสมาชิก</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        header {
            text-align: center;
        }

        header .header-content {
            background-color: rgba(18, 193, 30, 0.638);
            width: 100%;
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding-left: 20px;
            box-sizing: border-box;
        }

        header h1 {
            margin: 0;
            color: white;
        }

        .menu {
            background-color: rgb(75, 228, 241);
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
        }

        .menu h1 {
            margin: 0;
            font-size: 20px;
            padding: 0 15px;
        }

        .menu a {
            text-decoration: none;
            color: black;
            font-size: 18px;
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px; /* ปรับระยะห่าง */
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-container button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #888; /* เปลี่ยนเป็นสีเทาอ่อน */
            margin-top: 10px;
            display: none; /* แสดงข้อความเมื่อไม่มีข้อผิดพลาด */
        }

        .error-message.red {
            color: red; /* สีแดงสำหรับข้อความที่ต้องการ */
        }

        /* Popup Styles */
        .popup {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* เปลี่ยนสีพื้นหลังเป็นสีเข้มขึ้น */
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: white;
            padding: 30px; /* เพิ่มระยะห่างในป๊อปอัพ */
            border-radius: 10px; /* มุมที่โค้งมนมากขึ้น */
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* เพิ่มเงา */
            max-width: 400px; /* จำกัดความกว้าง */
            width: 90%; /* ทำให้มีความกว้าง 90% ของจอ */
        }

        .popup-content h3 {
            margin: 0 0 15px; /* เพิ่มระยะห่างให้หัวข้อ */
            color: black; /* เปลี่ยนสีหัวข้อเป็นสีดำ */
            font-size: 20px; /* ปรับขนาดตัวอักษร */
        }

        .popup-content p {
            margin: 10px 0; /* ระยะห่างระหว่างพารากราฟ */
            color: #555; /* เปลี่ยนสีข้อความ */
            font-size: 16px; /* ปรับขนาดตัวอักษร */
        }

        .popup-content button {
            margin: 10px 5px; /* ระยะห่างระหว่างปุ่ม */
            padding: 10px 15px; /* ขนาดปุ่ม */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #4caf50; /* สีพื้นหลัง */
            color: white;
            transition: background-color 0.3s; /* เอฟเฟกต์การเปลี่ยนสี */
        }

        .popup-content button:hover {
            background-color: #45a049; /* เปลี่ยนสีเมื่อชี้ */
        }

        .popup-content button:focus {
            outline: none; /* ลบเส้นกรอบ */
        }
        .logout-button {
            position: absolute; /* ตำแหน่งที่แน่นอน */
            top: 20px; /* ระยะจากด้านบน */
            right: 20px; /* ระยะจากด้านขวา */
            background-color: #f44336; /* สีแดง */
            color: white; /* สีตัวอักษร */
            border: none;
            padding: 10px 15px;
            border-radius: 5px; /* มุมมน */
            cursor: pointer; /* แสดงว่าเป็นปุ่ม */
        }

        .logout-button:hover {
            background-color: #d32f2f; /* สีแดงเข้มเมื่อ hover */
        }
    </style>
    <script>
        function validateName() {
            const nameInput = document.getElementById('name');
            const errorMessage = document.getElementById('error-message');
            const submitButton = document.getElementById('submit-button');
            const allowedCharPattern = /^[a-zA-Z\s]+$/; // ตรวจสอบตัวอักษร a-z, A-Z และช่องว่าง

            if (nameInput.value.trim() === '') {
                errorMessage.textContent = 'กรุณากรอกชื่อสมาชิก โดยใช้ตัวอักษรเท่านั้น'; // ข้อความเตือนเมื่อไม่มีการกรอก
                errorMessage.classList.remove('red'); // ลบคลาสสีแดง
                errorMessage.style.display = 'block'; // แสดงข้อความเตือน
                submitButton.disabled = true; // ปิดปุ่ม
                return false; // คืนค่า false
            } else if (!allowedCharPattern.test(nameInput.value)) {
                errorMessage.textContent = 'อนุญาติให้ใช้เฉพาะตัวอักษร (a-z, A-Z)'; // ข้อความเตือนเมื่อกรอกข้อมูลไม่ถูกต้อง
                errorMessage.classList.add('red'); // เพิ่มคลาสสีแดง
                errorMessage.style.display = 'block'; // แสดงข้อความเตือน
                submitButton.disabled = true; // ปิดปุ่ม
                return false; // คืนค่า false
            } else {
                errorMessage.style.display = 'none'; // ซ่อนข้อความเตือน
                submitButton.disabled = false; // เปิดปุ่ม
                return true; // คืนค่า true
            }
        }

        function showConfirmationPopup() {
            if (!validateName()) return; // ตรวจสอบชื่อสมาชิก

            const nameInput = document.getElementById('name').value; // รับค่าชื่อสมาชิกที่กรอก
            const memberNameDisplay = document.getElementById('member-name-display'); // องค์ประกอบสำหรับแสดงชื่อสมาชิกในป๊อปอัพ
            memberNameDisplay.textContent = nameInput; // แสดงชื่อสมาชิกที่กรอกไว้ในป๊อปอัพ

            const popup = document.getElementById('confirmation-popup');
            popup.style.display = 'flex'; // แสดง popup
        }

        function confirmAddMember() {
            const form = document.getElementById('add-member-form');
            form.submit(); // ส่งฟอร์มเมื่อกดยืนยัน
        }

        function cancelAddMember() {
            const popup = document.getElementById('confirmation-popup');
            popup.style.display = 'none'; // ซ่อน popup
        }

        function onNameInput() {
            validateName(); // ตรวจสอบชื่อสมาชิกเมื่อมีการกรอกข้อมูล
        }

        // ฟังก์ชันนี้ถูกเรียกเมื่อเริ่มโหลดหน้า
        window.onload = function() {
            validateName(); // ตรวจสอบชื่อสมาชิกเมื่อเข้าหน้าเพิ่มสมาชิก
        };
    </script>
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="header-content">
            <h1>ห้องสมุดหรรษา</h1>
        </div>
    </header>

    <!-- Navbar Section -->
    <div class="menu">
        <h1><a href="{{ route('books.index') }}" class="active">Home</a></h1>
        <h1><a href="/room">Room</a></h1>
        <h1><a href="/borrow">Borrow</a></h1> 
        <h1><a href="{{ route('books.return') }}">Return books-equipment</a></h1>
    
        <h1><a href="{{ route('members.create') }}">Add member</a></h1> <!-- ปุ่มเพิ่มสมาชิก -->
        <h1><a href="/employee">Employee</a></h1>
    </div>
    <button class="logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
    </button>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- Form to Add Member -->
    <div class="container">
        <div class="form-container">
            <h2>เพิ่มสมาชิกใหม่</h2>
            <form id="add-member-form" action="{{ route('members.store') }}" method="POST" onsubmit="return validateName();">
                @csrf
                <label for="name">ชื่อสมาชิก:</label>
                <input type="text" id="name" name="name" oninput="onNameInput();" required>
                <div id="error-message" class="error-message"></div> <!-- ข้อความเตือน -->
                <button type="button" id="submit-button" onclick="showConfirmationPopup()">บันทึก</button> <!-- เปลี่ยนปุ่มเป็น "บันทึก" -->
            </form>
        </div>
    </div>

    <!-- Confirmation Popup -->
    <div id="confirmation-popup" class="popup">
        <div class="popup-content">
            <h3>ยืนยันการเพิ่มสมาชิก</h3>
            <p>คุณต้องการเพิ่มสมาชิก <span id="member-name-display"></span> ใช่หรือไม่?</p>
            <button onclick="confirmAddMember()">ยืนยัน</button>
            <button onclick="cancelAddMember()">ยกเลิก</button>
        </div>
    </div>
</body>
</html>
