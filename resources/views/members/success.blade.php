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
    <!-- Success Message Container -->
    <div class="container">
        <div class="form-container">
            <h2>บันทึกข้อมูลเสร็จสิ้น</h2>
            <p>รหัสสมาชิก: <strong>{{ $member_code }}</strong></p>
            <p>ชื่อสมาชิก: <strong>{{ $name }}</strong></p>
            <a href="{{ route('members.create') }}" style="display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #4caf50; color: white; text-decoration: none; border-radius: 5px;">กลับไปที่หน้าเพิ่มสมาชิก</a>
        </div>
    </div>

</body>
</html>
